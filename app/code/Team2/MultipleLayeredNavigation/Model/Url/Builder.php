<?php
/**
 * Multiple Layered Navigation
 * 
 * @author Slava Yurthev
 */
namespace Team2\MultipleLayeredNavigation\Model\Url;

class Builder extends \Magento\Framework\Url {
	public function getFilterUrl($code, $value, $query = [], $singleValue = false){
		$params = ['_current' => true, '_use_rewrite' => true, '_query' => $query];
		$values = array_unique(
			array_merge(
				$this->getValuesFromUrl($code), 
				[$value]
			)
		);
		$params['_query'][$code] = implode(',', $values);
		$url = $this->getRemovePaginationFilterUrl(urldecode($this->getUrl('*/*/*', $params)));
		return $url;
		// return urldecode($this->getUrl('*/*/*', $params));
	}
	public function getRemoveFilterUrl($code, $value, $query = []){
		$params = ['_current' => true, '_use_rewrite' => true, '_query' => $query, '_escape' => true];
		$values = $this->getValuesFromUrl($code);
		$key = array_search($value, $values);
		unset($values[$key]);
		$params['_query'][$code] = $values ? implode(',', $values) : null;
		return urldecode($this->getUrl('*/*/*', $params));
	}
	public function getValuesFromUrl($code){
		return array_filter(explode(',', $this->_getRequest()->getParam($code)));
	}

	public function getRemovePaginationFilterUrl($url)
	{
		$parts = parse_url($url);

		$urlVar = ""; 
		$urlVar = $parts['query'];
		$urlVar = preg_replace('/&p=[0-9]+/', '', $urlVar); 
		// echo "<br>";
		// print_r( $parts); echo "<br>"; 
		$newUrl = "{$parts['scheme']}://{$parts['host']}{$parts['path']}?".$urlVar;
		return $newUrl;
	}
}
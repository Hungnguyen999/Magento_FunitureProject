<?php
/**
 * Catalog layer filter renderer
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Phu\Priceslider\Block;

use Magento\Catalog\Model\Layer\Filter\FilterInterface;
use Magento\Catalog\Model\Layer\Filter\AbstractFilter;

class FilterRenderer extends \Magento\LayeredNavigation\Block\Navigation\FilterRenderer
{
    /**
     * @param FilterInterface $filter
     * @return string
     */
    protected $collectionFactory;

    public function render(FilterInterface $filter)
    {
        $this->assign('filterItems', $filter->getItems());
        $this->assign('filter' , $filter);
        $html = $this->_toHtml();
        $this->assign('filterItems', []);
        return $html;
    }

    public function getPriceRange($filter){

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $category = $objectManager->get('Magento\Framework\Registry')->registry('current_category');//get current category
        $idCat = $category->getId();
        $productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\Collection');
        /** Apply filters here */
        if($category->getId()==16)
        {
            if(isset($_GET['cat']))
            {
                $collection = $productCollection->addAttributeToSelect('special_price')->addCategoriesFilter(['in' => $_GET['cat']])->setOrder('price', 'ASC')
                    ->load();
            } else{
                $collection = $productCollection->addAttributeToSelect('special_price')->setOrder('price', 'ASC')
                    ->load();
            }
        } else{
            $collection = $productCollection->addAttributeToSelect('special_price')->addCategoriesFilter(['in' => $idCat])->setOrder('price', 'ASC')
                    ->load();
        }


        $array = [];
        foreach ($collection as $product){
            $array[] = $product->getFinalPrice();
        }
        $min = min($array);
        $max = max($array);

        $Filterprice = array('min' => 0 , 'max'=>0);
        if($filter instanceof \Magento\CatalogSearch\Model\Layer\Filter\Price) {
            $priceArr = $filter->getResource()->loadPrices(10000000000);
            $Filterprice['min'] = $min;
            $Filterprice['max'] = $max;
        }
    	return $Filterprice;
    }

    public function getFilterUrl($filter){
    		$query = ['price'=> ''];
    	 return $this->getUrl('*/*/*', ['_current' => true, '_use_rewrite' => true, '_query' => $query]);

    }
    //code filter get curent category

    public function getProductCollection()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\Collection');
        $collection = $productCollection->addAttributeToSelect('*')
            ->load();
        return $collection;
    }
    public function getProductCollectionByCategories($ids)
    {
        $collection = $this->collectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoriesFilter(['in' => $ids]);
        $collection->getSelect();
        return $collection;
    }

}

<?php

namespace Team2\RewardPoint\Ui\Component\Listing\Column;


use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;


/**
 * Class DatapointActions
 */
class DatapointActions extends Column
{
    /** Url path */
    const CMS_URL_PATH_EDIT = 'rewardpoint/index/edit';
    const CMS_URL_PATH_DELETE = 'rewardpoint/index/delete';

    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []

    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $name = $this->getData('name');
                $item[$name]['edit'] = [
                    'href' => $this->urlBuilder->getUrl(self::CMS_URL_PATH_EDIT, ['id' => $item['id']]),
                    'label' => __('Edit')
                ];
                $item[$name]['delete'] = [
                    'href' => $this->urlBuilder->getUrl(self::CMS_URL_PATH_DELETE, ['id' => $item['id']]),
                    'label' => __('Delete'),
                    'confirm' => [
                        'title' => __('Delete'),
                        'message' => __('Are you sure you want to delete a  record?')
                    ]
                ];
            }
        }

        return $dataSource;
    }

    /**
     * Get instance of escaper
     * @return Escaper
     * @deprecated 101.0.7
     */
    private function getEscaper()
    {
        if (!$this->escaper) {
            $this->escaper = ObjectManager::getInstance()->get(Escaper::class);
        }
        return $this->escaper;
    }
}

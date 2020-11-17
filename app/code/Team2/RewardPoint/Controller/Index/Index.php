<?php

namespace Team2\RewardPoint\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Team2\RewardPoint\Model\DataExampleFactory;

class Index extends Action
{
    protected $_dataExample;
    protected $resultRedirect;

    public function __construct(Context $context,
                                DataExampleFactory $dataExample,
                                ResultFactory $result)
    {
        parent::__construct($context);
        $this->_dataExample = $dataExample;
        $this->resultRedirect = $result;
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirect->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        $model = $this->_dataExample->create();
        $model->addData([
            "customer_id" => 1,
            "action" => 'demo',
            "point" => 100,
            "type" => 'shopping cart',
            "order_id" => 2,
            "author" => 'Demo SP',
            "sort_order" => 1
        ]);
        $saveData = $model->save();
        if ($saveData) {
            $this->messageManager->addSuccess(__('Insert Record Successfully !'));
        }
        return $resultRedirect;
    }

}

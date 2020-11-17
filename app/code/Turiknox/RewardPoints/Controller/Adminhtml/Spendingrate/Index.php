<?php
/*
 * Turiknox_RewardPoints

 * @category   Turiknox
 * @package    Turiknox_RewardPoints
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/Turiknox/magento2-rewardpoints-setup/blob/master/LICENSE.md
 * @version    1.0.0
 */
namespace Turiknox\RewardPoints\Controller\Adminhtml\Spendingrate;

use Turiknox\RewardPoints\Controller\Adminhtml\RewardPoints;

class Index extends RewardPoints
{
    /**
     * @return \Magento\Backend\Model\View\Result\Page $resultPage
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Turiknox_RewardPoints::spending_rate');
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Spending Rates'));

        return $resultPage;
    }
}

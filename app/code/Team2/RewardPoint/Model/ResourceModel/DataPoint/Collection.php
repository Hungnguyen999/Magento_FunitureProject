<?php
namespace Team2\RewardPoint\Model\ResourceModel\DataPoint;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
    public function _construct()
    {
        $this->_init("Team2\RewardPoint\Model\DataPoint","Team2\RewardPoint\Model\ResourceModel\DataPoint");

    }
}

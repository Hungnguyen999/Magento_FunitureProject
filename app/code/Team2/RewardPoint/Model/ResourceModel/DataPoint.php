<?php


namespace Team2\RewardPoint\Model\ResourceModel;


class DataPoint extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct(){
        $this->_init("reward_point","id");
    }
}

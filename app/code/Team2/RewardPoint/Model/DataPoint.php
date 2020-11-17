<?php
namespace Team2\RewardPoint\Model;
class DataPoint extends \Magento\Framework\Model\AbstractModel
{
    public function _construct(){
        $this->_init("Team2\RewardPoint\Model\ResourceModel\DataPoint");
    }
}

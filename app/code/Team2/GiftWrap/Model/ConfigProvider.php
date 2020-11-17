<?php

namespace Team2\GiftWrap\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\View\LayoutInterface;

class ConfigProvider implements ConfigProviderInterface
{
    /** @var LayoutInterface  */
    protected $_layout;

    public function __construct(LayoutInterface $layout)
    {
        $this->_layout = $layout;
    }

    public function getConfig()
    {
        $myBlockId = "my_static_block"; // CMS Block Identifier
        //$myBlockId = 20; // CMS Block ID

        return [
            'my_block_content' => $this->_layout->createBlock('Team2\GiftWrap\Block\Widget\GiftWrap')->setTeamplate('Team2_GiftWrap::widget/GiftWrap.phtml')->toHtml()
        ];
    }
}
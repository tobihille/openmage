<?php
/**
 * OpenMage
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * @category    Mage
 * @package     Mage_Shipping
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Mage_Shipping_Model_Source_HandlingAction
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => Mage_Shipping_Model_Carrier_Abstract::HANDLING_ACTION_PERORDER, 'label' => Mage::helper('shipping')->__('Per Order')],
            ['value' => Mage_Shipping_Model_Carrier_Abstract::HANDLING_ACTION_PERPACKAGE , 'label' => Mage::helper('shipping')->__('Per Package')],
        ];
    }
}

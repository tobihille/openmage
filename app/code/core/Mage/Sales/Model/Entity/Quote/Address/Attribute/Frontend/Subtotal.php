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
 * @package     Mage_Sales
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


class Mage_Sales_Model_Entity_Quote_Address_Attribute_Frontend_Subtotal extends Mage_Sales_Model_Entity_Quote_Address_Attribute_Frontend
{
    /**
     * @param Mage_Sales_Model_Quote_Address $address
     * @return $this
     */
    public function fetchTotals(Mage_Sales_Model_Quote_Address $address)
    {
        $address->addTotal([
            'code'=>'subtotal',
            'title'=>Mage::helper('sales')->__('Subtotal'),
            'value'=>$address->getSubtotal()
        ]);

        return $this;
    }
}

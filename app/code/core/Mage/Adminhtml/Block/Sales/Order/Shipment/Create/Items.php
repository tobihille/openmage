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
 * @package     Mage_Adminhtml
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Adminhtml shipment items grid
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */

class Mage_Adminhtml_Block_Sales_Order_Shipment_Create_Items extends Mage_Adminhtml_Block_Sales_Items_Abstract
{
    /**
     * Retrieve invoice order
     *
     * @return Mage_Sales_Model_Order
     */
    public function getOrder()
    {
        return $this->getShipment()->getOrder();
    }

    /**
     * Retrieve source
     *
     * @return Mage_Sales_Model_Order_Invoice
     */
    public function getSource()
    {
        return $this->getShipment();
    }

    /**
     * Retrieve shipment model instance
     *
     * @return Mage_Sales_Model_Order_Shipment
     */
    public function getShipment()
    {
        return Mage::registry('current_shipment');
    }

    /**
     * Prepare child blocks
     */
    protected function _beforeToHtml()
    {
        $this->setChild(
            'submit_button',
            $this->getLayout()->createBlock('adminhtml/widget_button')->setData([
                'label'     => Mage::helper('sales')->__('Submit Shipment'),
                'class'     => 'save submit-button',
                'onclick'   => 'submitShipment(this);',
            ])
        );

        return parent::_beforeToHtml();
    }

    /**
     * Format given price
     *
     * @param float $price
     * @return string
     */
    public function formatPrice($price)
    {
        return $this->getShipment()->getOrder()->formatPrice($price);
    }

    /**
     * Retrieve HTML of update button
     *
     * @return string
     */
    public function getUpdateButtonHtml()
    {
        return $this->getChildHtml('update_button');
    }

    /**
     * Get url for update
     *
     * @return string
     */
    public function getUpdateUrl()
    {
        return $this->getUrl('*/*/updateQty', ['order_id'=>$this->getShipment()->getOrderId()]);
    }

    /**
     * Check possibility to send shipment email
     *
     * @return bool
     */
    public function canSendShipmentEmail()
    {
        return Mage::helper('sales')->canSendNewShipmentEmail($this->getOrder()->getStore()->getId());
    }

    /**
     * Checks the possibility of creating shipping label by current carrier
     *
     * @return bool
     */
    public function canCreateShippingLabel()
    {
        $shippingCarrier = $this->getOrder()->getShippingCarrier();
        return $shippingCarrier && $shippingCarrier->isShippingLabelsAvailable();
    }
}

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
 * @package     Mage_Centinel
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Adminhtml sales order create validation card block
 */
class Mage_Centinel_Block_Adminhtml_Validation extends Mage_Adminhtml_Block_Sales_Order_Create_Abstract
{
    /**
     * construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('sales_order_create_validation_card');
    }

    /**
     * Return text for block`s header
     *
     * @return string
     */
    public function getHeaderText()
    {
        return Mage::helper('centinel')->__('3D Secure Card Validation');
    }

    /**
     * Return css class name for header block
     *
     * @return string
     */
    public function getHeaderCssClass()
    {
        return 'head-payment-method';
    }

    /**
     * Prepare html output
     *
     * @return string
     */
    protected function _toHtml()
    {
        $payment = $this->getQuote()->getPayment();
        if (!$payment->getMethod()
            || !$payment->getMethodInstance()
            || $payment->getMethodInstance()->getIsDummy()
            || !$payment->getMethodInstance()->getIsCentinelValidationEnabled())
        {
            return '';
        }
        return parent::_toHtml();
    }
}


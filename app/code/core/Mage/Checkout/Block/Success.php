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
 * @package     Mage_Checkout
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Class Mage_Checkout_Block_Success
 *
 * @method int getLastOrderId()
 */
class Mage_Checkout_Block_Success extends Mage_Core_Block_Template
{
    /**
     * @return string
     */
    public function getRealOrderId()
    {
        $order = Mage::getModel('sales/order')->load($this->getLastOrderId());
        #print_r($order->getData());
        return $order->getIncrementId();
    }
}

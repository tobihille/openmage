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

/**
 * Adminhtml recurring profile items grid
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_Adminhtml_Block_Sales_Recurring_Profile_View_Items extends Mage_Adminhtml_Block_Sales_Items_Abstract
{
    /**
     * Retrieve required options from parent
     */
    protected function _beforeToHtml()
    {
        if (!$this->getParentBlock()) {
            Mage::throwException(Mage::helper('adminhtml')->__('Invalid parent block for this block'));
        }
        return parent::_beforeToHtml();
    }

    /**
     * Return current recurring profile
     *
     * @return Mage_Sales_Model_Recurring_Profile
     */
    public function _getRecurringProfile()
    {
        return Mage::registry('current_recurring_profile');
    }

    /**
     * Retrieve recurring profile item
     *
     * @return Mage_Sales_Model_Order_Item
     */
    public function getItem()
    {
        return $this->_getRecurringProfile()->getItem();
    }

    /**
     * Retrieve formated price
     *
     * @param   float $value
     * @return  string
     */
    public function formatPrice($value)
    {
        $store = Mage::app()->getStore($this->_getRecurringProfile()->getStore());
        return $store->formatPrice($value);
    }
}

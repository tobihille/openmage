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
 * @package     Mage_CatalogInventory
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Mage_CatalogInventory_Model_Source_Backorders
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => Mage_CatalogInventory_Model_Stock::BACKORDERS_NO, 'label'=>Mage::helper('cataloginventory')->__('No Backorders')],
            ['value' => Mage_CatalogInventory_Model_Stock::BACKORDERS_YES_NONOTIFY, 'label'=>Mage::helper('cataloginventory')->__('Allow Qty Below 0')],
            ['value' => Mage_CatalogInventory_Model_Stock::BACKORDERS_YES_NOTIFY , 'label'=>Mage::helper('cataloginventory')->__('Allow Qty Below 0 and Notify Customer')],
        ];
    }
}

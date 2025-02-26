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

/**
 * API2 Stock Item Validator
 *
 * @category   Mage
 * @package    Mage_CatalogInventory
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class Mage_CatalogInventory_Model_Api2_Stock_Item_Validator_Item extends Mage_Api2_Model_Resource_Validator_Fields
{
    /**
     * Validate data.
     * If fails validation, then this method returns false, and
     * getErrors() will return an array of errors that explain why the
     * validation failed.
     *
     * @param array $data
     * @return bool
     */
    public function isValidSingleItemDataForMultiUpdate(array $data)
    {
        // Validate item id
        if (!isset($data['item_id']) || !is_numeric($data['item_id'])) {
            $this->_addError('Invalid value for "item_id" in request.');
        } else {
            // Validate Stock Item
            /** @var Mage_CatalogInventory_Model_Stock_Item $stockItem */
            $stockItem = Mage::getModel('cataloginventory/stock_item')->load($data['item_id']);
            if (!$stockItem->getId()) {
                $this->_addError(sprintf('StockItem #%d not found.', $data['item_id']));
            } else {
                parent::isValidData($data);
            }
        }
        return !count($this->getErrors());
    }
}

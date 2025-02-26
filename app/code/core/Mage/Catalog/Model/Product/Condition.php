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
 * @package     Mage_Catalog
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Class Mage_Catalog_Model_Product_Condition
 *
 * @method string getTable()
 * @method $this setTable(string $tableName)
 * @method string getPkFieldName()
 * @method $this setPkFieldName(string $fieldName)
 */
class Mage_Catalog_Model_Product_Condition extends Varien_Object implements Mage_Catalog_Model_Product_Condition_Interface
{
    /**
     * @param Mage_Catalog_Model_Resource_Product_Collection $collection
     * @return $this
     */
    public function applyToCollection($collection)
    {
        if ($this->getTable() && $this->getPkFieldName()) {
            $collection->joinTable(
                $this->getTable(),
                $this->getPkFieldName().'=entity_id',
                ['affected_product_id'=>$this->getPkFieldName()]
            );
        }
        return $this;
    }

    /**
     * @param Magento_Db_Adapter_Pdo_Mysql $dbAdapter
     * @return string|Varien_Db_Select
     */
    public function getIdsSelect($dbAdapter)
    {
        if ($this->getTable() && $this->getPkFieldName()) {
            $select = $dbAdapter->select()
                ->from($this->getTable(), $this->getPkFieldName());
            return $select;
        }
        return '';
    }
}

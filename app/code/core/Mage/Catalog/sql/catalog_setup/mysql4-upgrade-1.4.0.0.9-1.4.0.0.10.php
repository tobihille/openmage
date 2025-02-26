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

/** @var Mage_Catalog_Model_Resource_Eav_Mysql4_Setup $installer */
$installer = $this;

$table = $this->getTable('catalog/category_product_index');

/**
 * Remove data duplicates
 */
$stmt = $installer->getConnection()->query(
    'SELECT * FROM ' . $table . ' GROUP BY category_id, product_id, store_id HAVING count(*)>1'
);

while ($row = $stmt->fetch()) {
    $condition = 'category_id=' . $row['category_id']
        . ' AND product_id=' . $row['product_id']
        . ' AND store_id=' . $row['store_id'] . ' AND is_parent=0';
    $installer->getConnection()->delete($table, $condition);
}

$installer->getConnection()->addKey(
    $table,
    'UNQ_CATEGORY_PRODUCT',
    ['category_id', 'product_id', 'store_id'],
    'unique'
);

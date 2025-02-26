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
 * @package     Mage_Reports
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;

/**
 * Create table 'reports/compared_product_index'.
 * In MySQL version this table comes with unique keys to implement insertOnDuplicate(), so that
 * only one record is added when customer/visitor compares same product again.
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('reports/compared_product_index'))
    ->addColumn('index_id', Varien_Db_Ddl_Table::TYPE_BIGINT, null, [
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ], 'Index Id')
    ->addColumn('visitor_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [
        'unsigned'  => true,
    ], 'Visitor Id')
    ->addColumn('customer_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [
        'unsigned'  => true,
    ], 'Customer Id')
    ->addColumn('product_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [
        'unsigned'  => true,
        'nullable'  => false,
    ], 'Product Id')
    ->addColumn('store_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, [
        'unsigned'  => true,
    ], 'Store Id')
    ->addColumn('added_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, [
        'nullable'  => false,
    ], 'Added At')
    ->addIndex(
        $installer->getIdxName('reports/compared_product_index', ['visitor_id', 'product_id'], Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE),
        ['visitor_id', 'product_id'],
        ['type' => Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE]
    )
    ->addIndex(
        $installer->getIdxName('reports/compared_product_index', ['customer_id', 'product_id'], Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE),
        ['customer_id', 'product_id'],
        ['type' => Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE]
    )
    ->addIndex(
        $installer->getIdxName('reports/compared_product_index', ['store_id']),
        ['store_id']
    )
    ->addIndex(
        $installer->getIdxName('reports/compared_product_index', ['added_at']),
        ['added_at']
    )
    ->addIndex(
        $installer->getIdxName('reports/compared_product_index', ['product_id']),
        ['product_id']
    )
    ->addForeignKey(
        $installer->getFkName('reports/compared_product_index', 'customer_id', 'customer/entity', 'entity_id'),
        'customer_id',
        $installer->getTable('customer/entity'),
        'entity_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE,
        Varien_Db_Ddl_Table::ACTION_CASCADE
    )
    ->addForeignKey(
        $installer->getFkName('reports/compared_product_index', 'product_id', 'catalog/product', 'entity_id'),
        'product_id',
        $installer->getTable('catalog/product'),
        'entity_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE,
        Varien_Db_Ddl_Table::ACTION_CASCADE
    )
    ->addForeignKey(
        $installer->getFkName('reports/compared_product_index', 'store_id', 'core/store', 'store_id'),
        'store_id',
        $installer->getTable('core/store'),
        'store_id',
        Varien_Db_Ddl_Table::ACTION_SET_NULL,
        Varien_Db_Ddl_Table::ACTION_CASCADE
    )
    ->setComment('Reports Compared Product Index Table');
$installer->getConnection()->createTable($table);

/**
 * Create table 'reports/viewed_product_index'
 * In MySQL version this table comes with unique keys to implement insertOnDuplicate(), so that
 * only one record is added when customer/visitor views same product again.
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('reports/viewed_product_index'))
    ->addColumn('index_id', Varien_Db_Ddl_Table::TYPE_BIGINT, null, [
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ], 'Index Id')
    ->addColumn('visitor_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [
        'unsigned'  => true,
    ], 'Visitor Id')
    ->addColumn('customer_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [
        'unsigned'  => true,
    ], 'Customer Id')
    ->addColumn('product_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [
        'unsigned'  => true,
        'nullable'  => false,
    ], 'Product Id')
    ->addColumn('store_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, [
        'unsigned'  => true,
    ], 'Store Id')
    ->addColumn('added_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, [
        'nullable'  => false,
    ], 'Added At')
    ->addIndex(
        $installer->getIdxName('reports/viewed_product_index', ['visitor_id', 'product_id'], Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE),
        ['visitor_id', 'product_id'],
        ['type' => Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE]
    )
    ->addIndex(
        $installer->getIdxName('reports/viewed_product_index', ['customer_id', 'product_id'], Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE),
        ['customer_id', 'product_id'],
        ['type' => Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE]
    )
    ->addIndex(
        $installer->getIdxName('reports/viewed_product_index', ['store_id']),
        ['store_id']
    )
    ->addIndex(
        $installer->getIdxName('reports/viewed_product_index', ['added_at']),
        ['added_at']
    )
    ->addIndex(
        $installer->getIdxName('reports/viewed_product_index', ['product_id']),
        ['product_id']
    )
    ->addForeignKey(
        $installer->getFkName('reports/viewed_product_index', 'customer_id', 'customer/entity', 'entity_id'),
        'customer_id',
        $installer->getTable('customer/entity'),
        'entity_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE,
        Varien_Db_Ddl_Table::ACTION_CASCADE
    )
    ->addForeignKey(
        $installer->getFkName('reports/viewed_product_index', 'product_id', 'catalog/product', 'entity_id'),
        'product_id',
        $installer->getTable('catalog/product'),
        'entity_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE,
        Varien_Db_Ddl_Table::ACTION_CASCADE
    )
    ->addForeignKey(
        $installer->getFkName('reports/viewed_product_index', 'store_id', 'core/store', 'store_id'),
        'store_id',
        $installer->getTable('core/store'),
        'store_id',
        Varien_Db_Ddl_Table::ACTION_SET_NULL,
        Varien_Db_Ddl_Table::ACTION_CASCADE
    )
    ->setComment('Reports Viewed Product Index Table');
$installer->getConnection()->createTable($table);

$installFile = dirname(__FILE__) . DS . 'install-1.6.0.0.php';
if (file_exists($installFile)) {
    include $installFile;
}

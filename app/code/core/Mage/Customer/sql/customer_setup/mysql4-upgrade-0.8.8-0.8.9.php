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
 * @package     Mage_Customer
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

$installer = $this;
/** @var Mage_Customer_Model_Entity_Setup $installer */

$installer->startSetup();

$installer->getConnection()->addKey($installer->getTable('customer_address_entity_datetime'), 'IDX_VALUE', ['entity_id', 'attribute_id', 'value']);
$installer->getConnection()->addKey($installer->getTable('customer_address_entity_decimal'), 'IDX_VALUE', ['entity_id', 'attribute_id', 'value']);
$installer->getConnection()->addKey($installer->getTable('customer_address_entity_int'), 'IDX_VALUE', ['entity_id', 'attribute_id', 'value']);
$installer->getConnection()->addKey($installer->getTable('customer_address_entity_text'), 'IDX_VALUE', ['entity_id', 'attribute_id']);
$installer->getConnection()->addKey($installer->getTable('customer_address_entity_varchar'), 'IDX_VALUE', ['entity_id', 'attribute_id', 'value']);

$installer->getConnection()->addKey($installer->getTable('customer_entity_datetime'), 'IDX_VALUE', ['entity_id', 'attribute_id', 'value']);
$installer->getConnection()->addKey($installer->getTable('customer_entity_decimal'), 'IDX_VALUE', ['entity_id', 'attribute_id', 'value']);
$installer->getConnection()->addKey($installer->getTable('customer_entity_int'), 'IDX_VALUE', ['entity_id', 'attribute_id', 'value']);
$installer->getConnection()->addKey($installer->getTable('customer_entity_text'), 'IDX_VALUE', ['entity_id', 'attribute_id']);
$installer->getConnection()->addKey($installer->getTable('customer_entity_varchar'), 'IDX_VALUE', ['entity_id', 'attribute_id', 'value']);

$installer->endSetup();

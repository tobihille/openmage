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


/** @var Mage_Sales_Model_Mysql4_Setup $installer */
$installer = $this;

$this->startSetup();

$installer->run("
    CREATE TABLE `{$installer->getTable('sales/invoiced_aggregated')}`
    (
        `id`                        int(11) unsigned NOT NULL auto_increment,
        `period`                    date NOT NULL DEFAULT '0000-00-00',
        `store_id`                  smallint(5) unsigned NULL DEFAULT NULL,
        `order_status`              varchar(50) NOT NULL default '',
        `orders_count`              int(11) NOT NULL DEFAULT '0',
        `orders_invoiced`           decimal(12,4) NOT NULL DEFAULT '0',
        `invoiced`                  decimal(12,4) NOT NULL DEFAULT '0',
        `invoiced_captured`         decimal(12,4) NOT NULL DEFAULT '0',
        `invoiced_not_captured`     decimal(12,4) NOT NULL DEFAULT '0',
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNQ_PERIOD_STORE_ORDER_STATUS` (`period`,`store_id`, `order_status`),
        KEY `IDX_STORE_ID` (`store_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    CREATE TABLE `{$installer->getTable('sales/invoiced_aggregated_order')}`
    (
        `id`                        int(11) unsigned NOT NULL auto_increment,
        `period`                    date NOT NULL DEFAULT '0000-00-00',
        `store_id`                  smallint(5) unsigned NULL DEFAULT NULL,
        `order_status`              varchar(50) NOT NULL default '',
        `orders_count`              int(11) NOT NULL DEFAULT '0',
        `orders_invoiced`           decimal(12,4) NOT NULL DEFAULT '0',
        `invoiced`                  decimal(12,4) NOT NULL DEFAULT '0',
        `invoiced_captured`         decimal(12,4) NOT NULL DEFAULT '0',
        `invoiced_not_captured`     decimal(12,4) NOT NULL DEFAULT '0',
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNQ_PERIOD_STORE_ORDER_STATUS` (`period`,`store_id`, `order_status`),
        KEY `IDX_STORE_ID` (`store_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");


$installer->getConnection()->addConstraint(
    'SALES_INVOICED_AGGREGATED_STORE',
    $installer->getTable('sales/invoiced_aggregated'),
    'store_id',
    $installer->getTable('core/store'),
    'store_id',
    'SET NULL'
);

$installer->getConnection()->addConstraint(
    'SALES_INVOICED_AGGREGATED_ORDER_STORE',
    $installer->getTable('sales/invoiced_aggregated_order'),
    'store_id',
    $installer->getTable('core/store'),
    'store_id',
    'SET NULL'
);

$this->endSetup();

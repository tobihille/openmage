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

$installer = $this;
/** @var Mage_Sales_Model_Mysql4_Setup $installer */

$installer->run("
DELETE FROM `{$this->getTable('sales_order_tax')}`
WHERE `order_id` NOT IN (
    SELECT `entity_id` FROM `{$this->getTable('sales_order')}`
)
");

$installer->getConnection()->addConstraint(
    'FK_SALES_ORDER_TAX_ORDER',
    $this->getTable('sales_order_tax'),
    'order_id',
    $this->getTable('sales_order'),
    'entity_id'
);

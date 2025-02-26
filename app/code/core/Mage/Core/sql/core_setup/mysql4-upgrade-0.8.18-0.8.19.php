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
 * @package     Mage_Core
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;

$installer->startSetup();
$installer->run("
    ALTER TABLE `{$installer->getTable('core_email_variable')}` RENAME TO `{$installer->getTable('core/variable')}`;
    ALTER TABLE `{$installer->getTable('core_email_variable_value')}` RENAME TO `{$installer->getTable('core/variable_value')}`;
");

$installer->getConnection()->dropForeignKey($installer->getTable('core/variable_value'), 'FK_CORE_EMAIL_VARIABLE_VALUE_STORE_ID');
$installer->getConnection()->dropForeignKey($installer->getTable('core/variable_value'), 'FK_CORE_EMAIL_VARIABLE_VALUE_VARIABLE_ID');

$installer->getConnection()->addConstraint(
    'FK_CORE_VARIABLE_VALUE_STORE_ID',
    $installer->getTable('core/variable_value'),
    'store_id',
    $installer->getTable('core/store'),
    'store_id'
);
$installer->getConnection()->addConstraint(
    'FK_CORE_VARIABLE_VALUE_VARIABLE_ID',
    $installer->getTable('core/variable_value'),
    'variable_id',
    $installer->getTable('core/variable'),
    'variable_id'
);

$installer->endSetup();

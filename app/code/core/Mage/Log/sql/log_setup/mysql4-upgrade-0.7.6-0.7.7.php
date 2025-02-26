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
 * @package     Mage_Log
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;

$installer->startSetup();

$installer->run("
    ALTER TABLE `{$installer->getTable('log/customer')}` ENGINE INNODB;
    ALTER TABLE `{$installer->getTable('log/quote_table')}` ENGINE INNODB;
    ALTER TABLE `{$installer->getTable('log/summary_table')}` ENGINE INNODB;
    ALTER TABLE `{$installer->getTable('log/summary_type_table')}` ENGINE INNODB;
    ALTER TABLE `{$installer->getTable('log/url_table')}` ENGINE INNODB;
    ALTER TABLE `{$installer->getTable('log/url_info_table')}` ENGINE INNODB;
    ALTER TABLE `{$installer->getTable('log/visitor')}` ENGINE INNODB;
    ALTER TABLE `{$installer->getTable('log/visitor_info')}` ENGINE INNODB;
");

$installer->endSetup();

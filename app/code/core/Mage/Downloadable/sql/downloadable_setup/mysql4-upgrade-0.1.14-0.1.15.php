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
 * @package     Mage_Downloadable
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Catalog_Model_Resource_Eav_Mysql4_Setup $installer */
$installer = $this;

$installer->startSetup();
$installer->getConnection()->addKey(
    $installer->getTable('downloadable/link_title'),
    'UNQ_LINK_TITLE_STORE',
    ['link_id', 'store_id'],
    'unique'
);
$installer->getConnection()->addKey(
    $installer->getTable('downloadable/sample_title'),
    'UNQ_SAMPLE_TITLE_STORE',
    ['sample_id', 'store_id'],
    'unique'
);
$installer->endSetup();

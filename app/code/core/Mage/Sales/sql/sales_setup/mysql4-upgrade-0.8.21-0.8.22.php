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


/**
 * Add "Save in address book" attribute to quote address
 *
 * @category   Mage
 * @package    Mage_Sales
 * @author      Magento Core Team <core@magentocommerce.com>
 */
$installer = $this;
/** @var Mage_Sales_Model_Entity_Setup $installer */

$installer->startSetup();
$installer->getConnection()->addColumn($installer->getTable('sales_quote_address'), 'save_in_address_book', 'tinyint(1) default 0 after `customer_id`');
$installer->addAttribute('quote_address', 'save_in_address_book', ['type'=>'static']);
$installer->endSetup();

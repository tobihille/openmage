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
 * @package     Mage_Paypal
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Core_Model_Resource_Setup $this */
$installer = $this;
$connection = $installer->getConnection();
$select = $connection->select()
    ->from(
        ['config' => $installer->getTable('core/config_data')],
        ['scope_id' => 'config.scope_id']
    )
    ->where('config.path=?', 'paypal/general/merchant_country')
    ->where('config.value<>?', 'US');

$result = $connection->fetchAll($select);
foreach ($result as $row) {
    $connection->delete(
        $installer->getTable('core/config_data'),
        'path LIKE "%express_bml%"'
        . $connection->quoteInto(' AND scope_id = ?', $row['scope_id'])
    );
}

$installer->endSetup();

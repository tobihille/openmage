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
 * @package     Mage_Adminhtml
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Product option types mode source
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class Mage_Adminhtml_Model_System_Config_Source_Product_Options_Type
{
    const PRODUCT_OPTIONS_GROUPS_PATH = 'global/catalog/product/options/custom/groups';

    public function toOptionArray()
    {
        $groups = [
            ['value' => '', 'label' => Mage::helper('adminhtml')->__('-- Please select --')]
        ];

        $helper = Mage::helper('catalog');

        foreach (Mage::getConfig()->getNode(self::PRODUCT_OPTIONS_GROUPS_PATH)->children() as $group) {
            $types = [];
            $typesPath = self::PRODUCT_OPTIONS_GROUPS_PATH . '/' . $group->getName() . '/types';
            foreach (Mage::getConfig()->getNode($typesPath)->children() as $type) {
                $labelPath = self::PRODUCT_OPTIONS_GROUPS_PATH . '/' . $group->getName() . '/types/' . $type->getName()
                    . '/label';
                $types[] = [
                    'label' => $helper->__((string) Mage::getConfig()->getNode($labelPath)),
                    'value' => $type->getName()
                ];
            }

            $labelPath = self::PRODUCT_OPTIONS_GROUPS_PATH . '/' . $group->getName() . '/label';

            $groups[] = [
                'label' => $helper->__((string) Mage::getConfig()->getNode($labelPath)),
                'value' => $types
            ];
        }

        return $groups;
    }
}

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
 * Configuration source model for Wysiwyg toggling
 *
 * @category    Mage
 * @package     Mage_Cms
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_Adminhtml_Model_System_Config_Source_Cms_Wysiwyg_Enabled
{
    public function toOptionArray()
    {
        return [
            [
                'value' => Mage_Cms_Model_Wysiwyg_Config::WYSIWYG_ENABLED,
                'label' => Mage::helper('cms')->__('Enabled by Default')
            ],
            [
                'value' => Mage_Cms_Model_Wysiwyg_Config::WYSIWYG_HIDDEN,
                'label' => Mage::helper('cms')->__('Disabled by Default')
            ],
            [
                'value' => Mage_Cms_Model_Wysiwyg_Config::WYSIWYG_DISABLED,
                'label' => Mage::helper('cms')->__('Disabled Completely')
            ]
        ];
    }
}

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

class Mage_Adminhtml_Model_System_Config_Source_Price_Step
{
    public function toOptionArray()
    {
        return [
            [
                'value' => Mage_Catalog_Model_Layer_Filter_Price::RANGE_CALCULATION_AUTO,
                'label' => Mage::helper('adminhtml')->__('Automatic (equalize price ranges)')
            ],
            [
                'value' => Mage_Catalog_Model_Layer_Filter_Price::RANGE_CALCULATION_IMPROVED,
                'label' => Mage::helper('adminhtml')->__('Automatic (equalize product counts)')
            ],
            [
                'value' => Mage_Catalog_Model_Layer_Filter_Price::RANGE_CALCULATION_MANUAL,
                'label' => Mage::helper('adminhtml')->__('Manual')
            ],
        ];
    }
}

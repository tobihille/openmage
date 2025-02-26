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
 * Watermark position config source model
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_Adminhtml_Model_System_Config_Source_Watermark_Position
{

    /**
     * Get available options
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'stretch',         'label' => Mage::helper('catalog')->__('Stretch')],
            ['value' => 'tile',            'label' => Mage::helper('catalog')->__('Tile')],
            ['value' => 'top-left',        'label' => Mage::helper('catalog')->__('Top/Left')],
            ['value' => 'top-right',       'label' => Mage::helper('catalog')->__('Top/Right')],
            ['value' => 'bottom-left',     'label' => Mage::helper('catalog')->__('Bottom/Left')],
            ['value' => 'bottom-right',    'label' => Mage::helper('catalog')->__('Bottom/Right')],
            ['value' => 'center',          'label' => Mage::helper('catalog')->__('Center')],
        ];
    }

}

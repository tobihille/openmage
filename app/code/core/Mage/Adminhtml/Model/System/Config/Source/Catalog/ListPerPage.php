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
 * Catalog products per page on List mode source
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_Adminhtml_Model_System_Config_Source_Catalog_ListPerPage
{

    public function toOptionArray()
    {
        $result = [];
        $perPageValues = Mage::getConfig()->getNode('frontend/catalog/per_page_values/list');
        $perPageValues = explode(',', $perPageValues);
        foreach ($perPageValues as $option) {
            $result[] = ['value' => $option, 'label' => $option];
        }
        //$result[] = array('value' => 'all', 'label' => Mage::helper('catalog')->__('All'));
        return $result;
    }

}

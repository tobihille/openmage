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


class Mage_Adminhtml_Model_System_Config_Backend_Sitemap extends Mage_Core_Model_Config_Data
{

    protected function _beforeSave()
    {
        $value     = $this->getValue();
            if ($value < 0 || $value > 1) {
                throw new Exception(Mage::helper('sitemap')->__('The priority must be between 0 and 1.'));
            } elseif (($value == 0) && !($value === '0' || $value === '0.0')) {
                throw new Exception(Mage::helper('sitemap')->__('The priority must be between 0 and 1.'));
            }
        return $this;
    }

}

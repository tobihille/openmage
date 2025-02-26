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
 * @package     Mage_Core
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Model for working with system.xml module files
 *
 * @category   Mage
 * @package    Mage_Core
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_Core_Model_Config_System extends Mage_Core_Model_Config_Base
{
    /**
     * @param string|null $sourceData
     */
    public function __construct($sourceData = null)
    {
        parent::__construct($sourceData);
    }

    /**
     * @param string $module
     * @return $this
     */
    public function load($module)
    {
        $file = Mage::getConfig()->getModuleDir('etc', $module).DS.'system.xml';
        $this->loadFile($file);
        return $this;
    }
}

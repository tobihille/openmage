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

abstract class Mage_Core_Model_Resource_Entity_Abstract
{
    protected $_name = null;
    /**
     * Configuration object
     *
     * @var Varien_Simplexml_Config
     */
    protected $_config = [];

    /**
     * Set config
     *
     * @param Varien_Simplexml_Config $config
     */
    public function __construct($config)
    {
        $this->_config = $config;
    }

    /**
     * Get config by key
     *
     * @param string $key
     * @return string|boolean
     */
    public function getConfig($key = '')
    {
        if ($key === '') {
            return $this->_config;
        } elseif (isset($this->_config->$key)) {
            return $this->_config->$key;
        } else {
            return false;
        }
    }
}

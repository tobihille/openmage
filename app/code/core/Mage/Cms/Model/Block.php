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
 * @package     Mage_Cms
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * CMS block model
 *
 * @method Mage_Cms_Model_Resource_Block _getResource()
 * @method Mage_Cms_Model_Resource_Block getResource()
 * @method Mage_Cms_Model_Resource_Block_Collection getCollection()
 *
 * @method string getTitle()
 * @method $this setTitle(string $value)
 * @method string getIdentifier()
 * @method $this setIdentifier(string $value)
 * @method string getContent()
 * @method $this setContent(string $value)
 * @method string getCreationTime()
 * @method $this setCreationTime(string $value)
 * @method string getUpdateTime()
 * @method $this setUpdateTime(string $value)
 * @method int getIsActive()
 * @method $this setIsActive(int $value)
 * @method $this setStoreId(int $storeId)
 * @method int getStoreId()
 * @method int getBlockId()
 *
 * @category    Mage
 * @package     Mage_Cms
 * @author      Magento Core Team <core@magentocommerce.com>
 */

class Mage_Cms_Model_Block extends Mage_Core_Model_Abstract
{
    const CACHE_TAG     = 'cms_block';
    protected $_cacheTag= 'cms_block';

    protected function _construct()
    {
        $this->_init('cms/block');
    }

    /**
     * Prevent blocks recursion
     *
     * @throws Mage_Core_Exception
     * @return Mage_Core_Model_Abstract
     */
    protected function _beforeSave()
    {
        $needle = 'block_id="' . $this->getBlockId() . '"';
        if (strstr($this->getContent(), $needle) == false) {
            return parent::_beforeSave();
        }
        Mage::throwException(
            Mage::helper('cms')->__('The static block content cannot contain  directive with its self.')
        );
    }
}

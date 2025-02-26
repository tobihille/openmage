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
 * Store group model
 *
 * @method Mage_Core_Model_Resource_Store_Group _getResource()
 * @method Mage_Core_Model_Resource_Store_Group getResource()
 * @method Mage_Core_Model_Resource_Store_Group_Collection getCollection()
 *
 * @method $this setWebsiteId(int $value)
 * @method string getName()
 * @method $this setName(string $value)
 * @method $this setRootCategoryId(int $value)
 * @method $this setDefaultStoreId(int $value)
 * @method $this setHomeUrl(string $value)
 * @method bool hasDefaultStoreId()
 * @method bool hasGroupId()
 * @method int getGroupId()
 * @method int getOriginalGroupId()
 * @method int getOriginalWebsiteId()
 *
 * @category    Mage
 * @package     Mage_Core
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_Core_Model_Store_Group extends Mage_Core_Model_Abstract
{
    const ENTITY         = 'store_group';
    const CACHE_TAG      = 'store_group';

    protected $_cacheTag = true;

    /**
     * @var string
     */
    protected $_eventPrefix = 'store_group';

    /**
     * @var string
     */
    protected $_eventObject = 'store_group';

    /**
     * Group Store collection array
     *
     * @var array
     */
    protected $_stores;

    /**
     * Group store ids array
     *
     * @var array
     */
    protected $_storeIds = [];

    /**
     * Group store codes array
     *
     * @var array
     */
    protected $_storeCodes = [];

    /**
     * The number of stores in a group
     *
     * @var int
     */
    protected $_storesCount = 0;

    /**
     * Group default store
     *
     * @var Mage_Core_Model_Store
     */
    protected $_defaultStore;

    /**
     * Website model
     *
     * @var Mage_Core_Model_Website
     */
    protected $_website;

    /**
     * @var bool
     */
    private $_isReadOnly = false;

    /**
     * init model
     *
     */
    protected function _construct()
    {
        $this->_init('core/store_group');
    }

    /**
     * Load store collection and set internal data
     */
    protected function _loadStores()
    {
        $this->_stores = [];
        $this->_storesCount = 0;
        /** @var Mage_Core_Model_Store $store */
        foreach ($this->getStoreCollection() as $store) {
            $storeId = $store->getId();
            $this->_stores[$storeId] = $store;
            $this->_storeIds[$storeId] = $storeId;
            $this->_storeCodes[$storeId] = $store->getCode();
            if ($this->getDefaultStoreId() == $storeId) {
                $this->_defaultStore = $store;
            }
            $this->_storesCount ++;
        }
    }

    /**
     * Set website stores
     *
     * @param array $stores
     */
    public function setStores($stores)
    {
        $this->_stores = [];
        $this->_storesCount = 0;
        foreach ($stores as $store) {
            $storeId = $store->getId();
            $this->_stores[$storeId] = $store;
            $this->_storeIds[$storeId] = $storeId;
            $this->_storeCodes[$storeId] = $store->getCode();
            if ($this->getDefaultStoreId() == $storeId) {
                $this->_defaultStore = $store;
            }
            $this->_storesCount ++;
        }
    }

    /**
     * Retrieve new (not loaded) Store collection object with group filter
     *
     * @return Mage_Core_Model_Resource_Store_Collection
     */
    public function getStoreCollection()
    {
        return Mage::getModel('core/store')
            ->getCollection()
            ->addGroupFilter($this->getId());
    }

    /**
     * Retrieve wersite store objects
     *
     * @return Mage_Core_Model_Store[]
     */
    public function getStores()
    {
        if (is_null($this->_stores)) {
            $this->_loadStores();
        }
        return $this->_stores;
    }

    /**
     * Retrieve website store ids
     *
     * @return array
     */
    public function getStoreIds()
    {
        if (is_null($this->_stores)) {
            $this->_loadStores();
        }
        return $this->_storeIds;
    }

    /**
     * Retrieve website store codes
     *
     * @return array
     */
    public function getStoreCodes()
    {
        if (is_null($this->_stores)) {
            $this->_loadStores();
        }
        return $this->_storeCodes;
    }

    /**
     * @return int
     */
    public function getStoresCount()
    {
        if (is_null($this->_stores)) {
            $this->_loadStores();
        }
        return $this->_storesCount;
    }

    /**
     * Retrieve default store model
     *
     * @return Mage_Core_Model_Store|false
     */
    public function getDefaultStore()
    {
        if (!$this->hasDefaultStoreId()) {
            return false;
        }
        if (is_null($this->_stores)) {
            $this->_loadStores();
        }
        return $this->_defaultStore;
    }

    /**
     * Get most suitable store by locale
     * If no store with given locale is found - default store is returned
     * If group has no stores - null is returned
     *
     * @param string $locale
     * @return Mage_Core_Model_Store|null
     */
    public function getDefaultStoreByLocale($locale)
    {
        if ($this->getDefaultStore() && $this->getDefaultStore()->getLocaleCode() == $locale) {
            return $this->getDefaultStore();
        } else {
            $stores = $this->getStoresByLocale($locale);
            if (count($stores)) {
                return $stores[0];
            } else {
                return $this->getDefaultStore() ? $this->getDefaultStore() : null;
            }
        }
    }

    /**
     * Retrieve list of stores with given locale
     *
     * @param string $locale
     * @return array
     */
    public function getStoresByLocale($locale)
    {
        $stores = [];
        foreach ($this->getStores() as $store) {
            if ($store->getLocaleCode() == $locale) {
                $stores[] = $store;
            }
        }
        return $stores;
    }

    /**
     * Set website model
     *
     * @param Mage_Core_Model_Website $website
     */
    public function setWebsite(Mage_Core_Model_Website $website)
    {
        $this->_website = $website;
    }

    /**
     * Retrieve website model
     *
     * @return Mage_Core_Model_Website|false
     */
    public function getWebsite()
    {
        if (is_null($this->getWebsiteId())) {
            return false;
        }
        if (is_null($this->_website)) {
            $this->_website = Mage::app()->getWebsite($this->getWebsiteId());
        }
        return $this->_website;
    }

    /**
     * Is can delete group
     *
     * @return bool
     */
    public function isCanDelete()
    {
        if (!$this->getId()) {
            return false;
        }

        return $this->getWebsite()->getDefaultGroupId() != $this->getId();
    }

    /**
     * @return int
     */
    public function getDefaultStoreId()
    {
        return $this->_getData('default_store_id');
    }

    /**
     * @return int
     */
    public function getRootCategoryId()
    {
        return $this->_getData('root_category_id');
    }

    /**
     * @return int
     */
    public function getWebsiteId()
    {
        return $this->_getData('website_id');
    }

    /**
     * @inheritDoc
     */
    protected function _beforeDelete()
    {
        $this->_protectFromNonAdmin();
        return parent::_beforeDelete();
    }

    /**
     * Get/Set isReadOnly flag
     *
     * @param bool $value
     * @return bool
     */
    public function isReadOnly($value = null)
    {
        if ($value !== null) {
            $this->_isReadOnly = (bool)$value;
        }
        return $this->_isReadOnly;
    }
}

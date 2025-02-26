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
 * @package     Mage_Tag
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Tags Customer Reviews Block
 *
 * @category    Mage
 * @package     Mage_Tag
 * @author      Magento Core Team <core@magentocommerce.com>
 */

class Mage_Tag_Block_Customer_Recent extends Mage_Core_Block_Template
{
    /**
     * @var Mage_Tag_Model_Resource_Product_Collection
     */
    protected $_collection;

    protected function _construct()
    {
        parent::_construct();

        $this->_collection = Mage::getModel('tag/tag')->getEntityCollection()
            ->addStoreFilter(Mage::app()->getStore()->getId())
            ->addCustomerFilter(Mage::getSingleton('customer/session')->getCustomerId())
            ->addAttributeToSelect(Mage::getSingleton('catalog/config')->getProductAttributes())
            ->setDescOrder()
            ->setPageSize(5)
            ->setActiveFilter()
            ->load()
            ->addProductTags();

        Mage::getSingleton('catalog/product_visibility')
            ->addVisibleInSiteFilterToCollection($this->_collection);
    }

    /**
     * @return int
     */
    public function count()
    {
        return $this->_collection->getSize();
    }

    /**
     * @return Mage_Tag_Model_Resource_Product_Collection
     */
    protected function _getCollection()
    {
        return $this->_collection;
    }

    /**
     * @return Mage_Tag_Model_Resource_Product_Collection
     */
    public function getCollection()
    {
        return $this->_getCollection();
    }

    /**
     * @param string $date
     * @return string
     */
    public function dateFormat($date)
    {
        return $this->formatDate($date, Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
    }

    /**
     * @return string
     */
    public function getAllTagsUrl()
    {
        return Mage::getUrl('tag/customer');
    }

    /**
     * @return string
     */
    protected function _toHtml()
    {
        if ($this->_collection->getSize() > 0) {
            return parent::_toHtml();
        }
        return '';
    }
}

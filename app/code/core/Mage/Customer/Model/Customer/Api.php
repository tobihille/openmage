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
 * @package     Mage_Customer
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Customer api
 *
 * @category   Mage
 * @package    Mage_Customer
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class Mage_Customer_Model_Customer_Api extends Mage_Customer_Model_Api_Resource
{
    protected $_mapAttributes = [
        'customer_id' => 'entity_id'
    ];
    /**
     * Prepare data to insert/update.
     * Creating array for stdClass Object
     *
     * @param array $data
     * @return array
     */
    protected function _prepareData($data)
    {
        foreach ($this->_mapAttributes as $attributeAlias => $attributeCode) {
            if (isset($data[$attributeAlias])) {
                $data[$attributeCode] = $data[$attributeAlias];
                unset($data[$attributeAlias]);
            }
        }
        return $data;
    }

    /**
     * Create new customer
     *
     * @param array $customerData
     * @return int
     */
    public function create($customerData)
    {
        $customer = Mage::getModel('customer/customer');
        $customerData = $this->_prepareData($customerData);
        try {
            $customer
                ->setData($customerData)
                ->save();
        } catch (Mage_Core_Exception $e) {
            $this->_fault('data_invalid', $e->getMessage());
        }
        return $customer->getId();
    }

    /**
     * Retrieve customer data
     *
     * @param int $customerId
     * @param array $attributes
     * @return array
     */
    public function info($customerId, $attributes = null)
    {
        $customer = Mage::getModel('customer/customer')->load($customerId);

        if (!$customer->getId()) {
            $this->_fault('not_exists');
        }

        if (!is_null($attributes) && !is_array($attributes)) {
            $attributes = [$attributes];
        }

        $result = [];

        foreach ($this->_mapAttributes as $attributeAlias => $attributeCode) {
            $result[$attributeAlias] = $customer->getData($attributeCode);
        }

        foreach ($this->getAllowedAttributes($customer, $attributes) as $attributeCode => $attribute) {
            $result[$attributeCode] = $customer->getData($attributeCode);
        }

        return $result;
    }

    /**
     * Retrieve customers data
     *
     * @param  object|array $filters
     * @return array
     */
    public function items($filters)
    {
        $collection = Mage::getModel('customer/customer')->getCollection()->addAttributeToSelect('*');
        /** @var Mage_Api_Helper_Data $apiHelper */
        $apiHelper = Mage::helper('api');
        $filters = $apiHelper->parseFilters($filters, $this->_mapAttributes);
        try {
            foreach ($filters as $field => $value) {
                $collection->addFieldToFilter($field, $value);
            }
        } catch (Mage_Core_Exception $e) {
            $this->_fault('filters_invalid', $e->getMessage());
        }
        $result = [];
        /** @var Mage_Customer_Model_Customer $customer */
        foreach ($collection as $customer) {
            $data = $customer->toArray();
            $row  = [];
            foreach ($this->_mapAttributes as $attributeAlias => $attributeCode) {
                $row[$attributeAlias] = (isset($data[$attributeCode]) ? $data[$attributeCode] : null);
            }
            foreach ($this->getAllowedAttributes($customer) as $attributeCode => $attribute) {
                if (isset($data[$attributeCode])) {
                    $row[$attributeCode] = $data[$attributeCode];
                }
            }
            $result[] = $row;
        }

        return $result;
    }

    /**
     * Update customer data
     *
     * @param int $customerId
     * @param array $customerData
     * @return boolean
     */
    public function update($customerId, $customerData)
    {
        $customerData = $this->_prepareData($customerData);

        $customer = Mage::getModel('customer/customer')->load($customerId);

        if (!$customer->getId()) {
            $this->_fault('not_exists');
        }

        foreach ($this->getAllowedAttributes($customer) as $attributeCode => $attribute) {
            if (isset($customerData[$attributeCode])) {
                $customer->setData($attributeCode, $customerData[$attributeCode]);
            }
        }

        $customer->save();
        return true;
    }

    /**
     * Delete customer
     *
     * @param int $customerId
     * @return boolean
     */
    public function delete($customerId)
    {
        $customer = Mage::getModel('customer/customer')->load($customerId);

        if (!$customer->getId()) {
            $this->_fault('not_exists');
        }

        try {
            $customer->delete();
        } catch (Mage_Core_Exception $e) {
            $this->_fault('not_deleted', $e->getMessage());
        }

        return true;
    }
}

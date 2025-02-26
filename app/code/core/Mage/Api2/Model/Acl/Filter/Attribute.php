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
 * @package     Mage_Api2
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * API2 filter ACL attribute model
 *
 * @category    Mage
 * @package     Mage_Api2
 * @author      Magento Core Team <core@magentocommerce.com>
 * @method Mage_Api2_Model_Resource_Acl_Filter_Attribute_Collection getCollection()
 * @method Mage_Api2_Model_Resource_Acl_Filter_Attribute_Collection getResourceCollection()
 * @method Mage_Api2_Model_Resource_Acl_Filter_Attribute getResource()
 * @method Mage_Api2_Model_Resource_Acl_Filter_Attribute _getResource()
 * @method string getUserType()
 * @method Mage_Api2_Model_Acl_Filter_Attribute setUserType() setUserType(string $type)
 * @method string getResourceId()
 * @method Mage_Api2_Model_Acl_Filter_Attribute setResourceId() setResourceId(string $resource)
 * @method string getOperation()
 * @method Mage_Api2_Model_Acl_Filter_Attribute setOperation() setOperation(string $operation)
 * @method string getAllowedAttributes()
 * @method Mage_Api2_Model_Acl_Filter_Attribute setAllowedAttributes() setAllowedAttributes(string $attributes)
 */
class Mage_Api2_Model_Acl_Filter_Attribute extends Mage_Core_Model_Abstract
{
    /**
     * Permissions model
     *
     * @var Mage_Api2_Model_Acl_Filter_Attribute_ResourcePermission
     */
    protected $_permissionModel;

    /**
     * Initialize resource model
     */
    protected function _construct()
    {
        $this->_init('api2/acl_filter_attribute');
    }

    /**
     * Get pairs resources-permissions for current attribute
     *
     * @return Mage_Api2_Model_Acl_Filter_Attribute_ResourcePermission
     */
    public function getPermissionModel()
    {
        if ($this->_permissionModel == null) {
            $this->_permissionModel = Mage::getModel('api2/acl_filter_attribute_resourcePermission');
        }
        return $this->_permissionModel;
    }
}

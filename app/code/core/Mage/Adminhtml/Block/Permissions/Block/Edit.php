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
 * Adminhtml permissions block edit page
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class Mage_Adminhtml_Block_Permissions_Block_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Construct
     */
    public function __construct()
    {
        $this->_objectId = 'block_id';
        $this->_controller = 'permissions_block';

        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('adminhtml')->__('Save Block'));
        $this->_updateButton('delete', 'label', Mage::helper('adminhtml')->__('Delete Block'));
    }

    /**
     * Return text that to be placed to block header
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('permissions_block')->getId()) {
            return Mage::helper('adminhtml')->__("Edit Block '%s'", $this->escapeHtml(Mage::registry('permissions_block')->getBlockName()));
        }
        else {
            return Mage::helper('adminhtml')->__('New block');
        }
    }
}

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
 * Adminhtml sales create order product search grid price column renderer
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_Adminhtml_Block_Sales_Order_Create_Search_Grid_Renderer_Price extends
    Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Price
{
    /**
     * Render minimal price for downloadable products
     *
     * @param   Varien_Object $row
     * @return  string
     */
    public function render(Varien_Object $row)
    {
        if ($row->getTypeId() == 'downloadable') {
            $row->setPrice($row->getPrice());
        }
        return parent::render($row);
    }

}

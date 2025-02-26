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
 * @package     Mage_Catalog
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


/**
 * Product information tabs
 *
 * @category   Mage
 * @package    Mage_Catalog
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class Mage_Catalog_Block_Product_View_Tabs extends Mage_Core_Block_Template
{
    protected $_tabs = [];

    /**
     * Add tab to the container
     *
     * @param string $alias
     * @param string $title
     * @param string $block
     * @param string $template
     * @return bool
     */
    public function addTab($alias, $title, $block, $template)
    {

        if (!$title || !$block || !$template) {
            return false;
        }

        $this->_tabs[] = [
            'alias' => $alias,
            'title' => $title
        ];

        $this->setChild(
            $alias,
            $this->getLayout()->createBlock($block, $alias)
                ->setTemplate($template)
        );
    }

    /**
     * @return array
     */
    public function getTabs()
    {
        return $this->_tabs;
    }
}

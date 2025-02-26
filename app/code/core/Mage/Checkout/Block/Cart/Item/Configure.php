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
 * @package     Mage_Checkout
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Cart Item Configure block
 * Updates templates and blocks to show 'Update Cart' button and set right form submit url
 *
 * @category   Mage
 * @package    Mage_Checkout
 * @module     Checkout
 */
class Mage_Checkout_Block_Cart_Item_Configure extends Mage_Core_Block_Template
{
    /**
     * Configure product view blocks
     *
     * @inheritDoc
     * @throws Exception
     */
    protected function _prepareLayout()
    {
        // Set custom submit url route for form - to submit updated options to cart
        $block = $this->getLayout()->getBlock('product.info');
        if ($block) {
             $block->setSubmitRouteData([
                'route' => 'checkout/cart/updateItemOptions',
                'params' => ['id' => $this->getRequest()->getParam('id')]
             ]);
        }

        // Set custom template with 'Update Cart' button
        $block = $this->getLayout()->getBlock('product.info.addtocart');
        if ($block) {
            $block->setTemplate('checkout/cart/item/configure/updatecart.phtml');
        }

        return parent::_prepareLayout();
    }
}

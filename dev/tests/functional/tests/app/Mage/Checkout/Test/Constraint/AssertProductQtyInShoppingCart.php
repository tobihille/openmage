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
 * @category    Tests
 * @package     Tests_Functional
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Mage\Checkout\Test\Constraint;

use Mage\Checkout\Test\Block\Cart\CartItem;

/**
 * Assert that quantity in the shopping cart is equals to expected quantity from data set.
 */
class AssertProductQtyInShoppingCart extends AbstractAssertProductInShoppingCart
{
    /* tags */
    const SEVERITY = 'low';
    /* end tags */

    /**
     * Data type.
     *
     * @var string
     */
    protected $dataType = 'qty';

    /**
     * Get cart data.
     *
     * @param CartItem $cartItem
     * @return array
     */
    protected function getCartData(CartItem $cartItem)
    {
        return [$this->dataType => $cartItem->getQty()];
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return 'Quantity in the shopping cart equals to expected quantity from data set.';
    }
}

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

namespace Mage\Wishlist\Test\Constraint;

use Mage\Cms\Test\Page\CmsIndex;
use Mage\Customer\Test\Fixture\Customer;
use Mage\Wishlist\Test\Page\WishlistIndex;
use Magento\Mtf\Constraint\AbstractConstraint;
use Magento\Mtf\Fixture\InjectableFixture;
use Mage\Customer\Test\Constraint\FrontendActionsForCustomer;

/**
 * Assert products is absent in Wishlist on frontend.
 */
class AssertProductsIsAbsentInWishlist extends AbstractConstraint
{
    /* tags */
    const SEVERITY = 'low';
    /* end tags */

    /**
     * Assert that product is not present in Wishlist on frontend.
     *
     * @param WishlistIndex $wishlistIndex
     * @param CmsIndex $cmsIndex
     * @param Customer $customer
     * @param FrontendActionsForCustomer $frontendActionsForCustomer
     * @param InjectableFixture[] $products
     * @return void
     */
    public function processAssert(
        WishlistIndex $wishlistIndex,
        CmsIndex $cmsIndex,
        Customer $customer,
        FrontendActionsForCustomer $frontendActionsForCustomer,
        array $products
    ) {
        $frontendActionsForCustomer->loginCustomer($customer);
        $cmsIndex->getTopLinksBlock()->openAccountLink("My Wishlist");
        $itemBlock = $wishlistIndex->getItemsBlock();
        foreach ($products as $itemProduct) {
            \PHPUnit_Framework_Assert::assertFalse(
                $itemBlock->getItemProductBlock($itemProduct)->isVisible(),
                "Product '{$itemProduct->getName()}' is present in Wishlist on frontend."
            );
        }
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return 'Product is absent in Wishlist on frontend.';
    }
}

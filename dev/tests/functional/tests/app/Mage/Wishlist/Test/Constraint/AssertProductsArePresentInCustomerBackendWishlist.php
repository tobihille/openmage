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

use Mage\Customer\Test\Fixture\Customer;
use Mage\Customer\Test\Page\Adminhtml\CustomerIndex;
use Mage\Customer\Test\Page\Adminhtml\CustomerEdit;
use Magento\Mtf\Constraint\AbstractConstraint;
use Magento\Mtf\Fixture\InjectableFixture;

/**
 * Assert that products added to wishlist are present on Customers account on backend
 * - in section Customer Activities - Wishlist.
 */
class AssertProductsArePresentInCustomerBackendWishlist extends AbstractConstraint
{
    /* tags */
    const SEVERITY = 'low';
    /* end tags */

    /**
     * Assert that products added to wishlist are present on Customers account on backend.
     *
     * @param CustomerIndex $customerIndex
     * @param Customer $customer
     * @param CustomerEdit $customerEdit
     * @param AssertProductIsPresentInCustomerBackendWishlist $assertProductIsPresentInBackendWishlist
     * @param array $products
     * @return void
     */
    public function processAssert(
        CustomerIndex $customerIndex,
        Customer $customer,
        CustomerEdit $customerEdit,
        AssertProductIsPresentInCustomerBackendWishlist $assertProductIsPresentInBackendWishlist,
        array $products
    ) {
        foreach ($products as $product) {
            $assertProductIsPresentInBackendWishlist->processAssert($customerIndex, $customer, $customerEdit, $product);
        }
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return "Products are visible in customer wishlist on backend.";
    }
}

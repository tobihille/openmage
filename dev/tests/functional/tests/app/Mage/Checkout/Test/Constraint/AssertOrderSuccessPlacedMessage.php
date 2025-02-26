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

use Mage\Checkout\Test\Page\CheckoutOnepageSuccess;
use Magento\Mtf\Constraint\AbstractConstraint;

/**
 * Assert that success message is correct.
 */
class AssertOrderSuccessPlacedMessage extends AbstractConstraint
{
    /* tags */
    const SEVERITY = 'high';
    /* end tags */

    /**
     * Message of success checkout.
     */
    const SUCCESS_MESSAGE = 'YOUR ORDER HAS BEEN RECEIVED.';

    /**
     * Assert that success message is correct.
     *
     * @param CheckoutOnepageSuccess $checkoutOnepageSuccess
     * @return void
     */
    public function processAssert(CheckoutOnepageSuccess $checkoutOnepageSuccess)
    {
        \PHPUnit_Framework_Assert::assertEquals(
            self::SUCCESS_MESSAGE,
            $checkoutOnepageSuccess->getTitleBlock()->getTitle()
        );
    }

    /**
     * Returns string representation of successful assertion.
     *
     * @return string
     */
    public function toString()
    {
        return 'Success message on Checkout onepage success page is correct.';
    }
}

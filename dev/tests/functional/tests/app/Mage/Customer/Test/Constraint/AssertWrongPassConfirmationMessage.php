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

namespace Mage\Customer\Test\Constraint;

use Mage\Customer\Test\Fixture\Customer;
use Mage\Customer\Test\Page\CustomerAccountEdit;
use Magento\Mtf\Constraint\AbstractConstraint;

/**
 * Check that confirmation message is present.
 */
class AssertWrongPassConfirmationMessage extends AbstractConstraint
{
    /* tags */
    const SEVERITY = 'low';
    /* end tags */

    /**
     * Confirmation message.
     */
    const CONFIRMATION_MESSAGE = 'Please make sure your passwords match.';

    /**
     * Assert that confirmation message is present.
     *
     * @param Customer $customer
     * @param CustomerAccountEdit $customerAccountEdit
     * @return void
     */
    public function processAssert(Customer $customer, CustomerAccountEdit $customerAccountEdit)
    {
        \PHPUnit_Framework_Assert::assertEquals(
            self::CONFIRMATION_MESSAGE,
            $customerAccountEdit->getAccountInfoForm()->getValidationMessages($customer)['password_confirmation'],
            'Wrong password confirmation validation text message.'
        );
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return 'Password confirmation validation text message is displayed.';
    }
}

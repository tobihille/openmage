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

use Mage\Customer\Test\Page\Adminhtml\CustomerGroupIndex;
use Magento\Mtf\Constraint\AbstractConstraint;

/**
 * Assert that success message is displayed after customer group save.
 */
class AssertCustomerGroupSuccessSaveMessage extends AbstractConstraint
{
    /* tags */
    const SEVERITY = 'low';
    /* end tags */

    /**
     * Customer group success save message.
     */
    const SUCCESS_MESSAGE = 'The customer group has been saved.';

    /**
     * Assert that success message is displayed after customer group save.
     *
     * @param CustomerGroupIndex $customerGroupIndex
     * @return void
     */
    public function processAssert(CustomerGroupIndex $customerGroupIndex)
    {
        \PHPUnit_Framework_Assert::assertEquals(
            self::SUCCESS_MESSAGE,
            $customerGroupIndex->getMessagesBlock()->getSuccessMessages()
        );
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return 'Customer group success save message is present.';
    }
}

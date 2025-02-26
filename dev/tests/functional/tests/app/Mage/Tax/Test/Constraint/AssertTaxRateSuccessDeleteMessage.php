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

namespace Mage\Tax\Test\Constraint;

use Mage\Tax\Test\Page\Adminhtml\TaxRateIndex;
use Magento\Mtf\Constraint\AbstractConstraint;

/**
 * Assert that success delete message is displayed after tax rate has been deleted.
 */
class AssertTaxRateSuccessDeleteMessage extends AbstractConstraint
{
    /* tags */
    const SEVERITY = 'low';
    /* end tags */

    /**
     * Text for verify.
     */
    const SUCCESS_DELETE_MESSAGE = 'The tax rate has been deleted.';

    /**
     * Assert that success delete message is displayed after tax rate has been deleted.
     *
     * @param TaxRateIndex $taxRateIndex
     * @return void
     */
    public function processAssert(TaxRateIndex $taxRateIndex)
    {
        \PHPUnit_Framework_Assert::assertEquals(
            self::SUCCESS_DELETE_MESSAGE,
            $taxRateIndex->getMessagesBlock()->getSuccessMessages()
        );
    }

    /**
     * Returns string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return 'Tax rate success delete message is present.';
    }
}

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

namespace Mage\Paypal\Test\TestCase;

use Magento\Mtf\TestCase\Scenario;
use Mage\Customer\Test\Page\CustomerAccountLogout;

/**
 * Preconditions:
 * 1. Create product.
 * 2. Apply configuration for test.
 *
 * Steps:
 * 1. Go to Frontend.
 * 2. Add products to the cart.
 * 3. Click the 'Proceed to Checkout' button.
 * 4. Select checkout method according to dataset.
 * 5. Fill billing information and select the 'Ship to this address' option.
 * 6. Select shipping method according to dataset.
 * 7. Select payment method according to dataset.
 * 8. Place order.
 * 9. Perform assertions.
 *
 * @group Order_Management_(CS)
 * @ZephyrId MPERF-7163
 */
class CreateOrderWithOnlinePaymentsMethodsWithoutIFrameTest extends Scenario
{
    /* tags */
    const TEST_TYPE = '3rd_party_test';
    /* end tags */

    /**
     * Customer logout page.
     *
     * @var CustomerAccountLogout
     */
    protected $customerAccountLogout;

    /**
     * Prepare pages and environment for test.
     *
     * @param CustomerAccountLogout $customerAccountLogout
     * @return void
     */
    public function __prepare(CustomerAccountLogout $customerAccountLogout)
    {
        // Delete existing tax rules.
        $this->objectManager->create('Mage\Tax\Test\TestStep\DeleteAllTaxRulesStep')->run();
        $this->customerAccountLogout = $customerAccountLogout;
    }

    /**
     * Create order with online payments methods without i-frame.
     *
     * @return void
     */
    public function test()
    {
        $this->executeScenario();
    }

    /**
     * Disable enabled config after test.
     *
     * @return void
     */
    public function tearDown()
    {
        $this->customerAccountLogout->open();
        $this->objectManager->create(
            'Mage\Core\Test\TestStep\SetupConfigurationStep',
            ['configData' => $this->currentVariation['arguments']['configData'], 'rollback' => true]
        )->run();
    }
}

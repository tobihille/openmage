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

namespace Mage\Catalog\Test\Constraint;

use Mage\Catalog\Test\Page\Product\CatalogProductView;
use Mage\Catalog\Test\Fixture\GroupedProduct;
use Magento\Mtf\Client\Browser;

/**
 * Assert that displayed grouped price on grouped product page equals passed from fixture.
 */
class AssertGroupedPriceOnGroupedProductPage extends AbstractAssertPriceOnGroupedProductPage
{
    /* tags */
    const SEVERITY = 'low';
    /* end tags */

    /**
     * Format error message.
     *
     * @var string
     */
    protected $errorMessage = 'This "%s" product\'s grouped price on product page NOT equals passed from fixture.';

    /**
     * Successful message.
     *
     * @var string
     */
    protected $successfulMessage = 'Displayed grouped price on grouped product page equals to passed from a fixture.';

    /**
     * Assert that displayed grouped price on grouped product page equals passed from fixture.
     *
     * @param CatalogProductView $catalogProductView
     * @param GroupedProduct $product
     * @param AssertProductGroupedPriceOnProductPage $groupedPrice
     * @param Browser $browser
     * @return void
     */
    public function processAssert(
        CatalogProductView $catalogProductView,
        GroupedProduct $product,
        AssertProductGroupedPriceOnProductPage $groupedPrice,
        Browser $browser
    ) {
        $this->processAssertPrice($product, $catalogProductView, $groupedPrice, $browser);
    }
}

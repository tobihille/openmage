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

use Mage\Catalog\Test\Fixture\CatalogProductSimple;
use Mage\Catalog\Test\Page\Product\CatalogProductView;
use Magento\Mtf\Client\BrowserInterface;
use Magento\Mtf\Constraint\AbstractConstraint;
use Magento\Mtf\Fixture\InjectableFixture;

/**
 * Assert that product is not displayed in related products section.
 */
class AssertProductAbsentRelatedProducts extends AbstractConstraint
{
    /* tags */
    const SEVERITY = 'low';
    /* end tags */

    /**
     * Assert that product is not displayed in related products section.
     *
     * @param BrowserInterface $browser
     * @param CatalogProductSimple $product
     * @param CatalogProductView $catalogProductView
     * @param InjectableFixture[]|null $promotedProducts
     * @return void
     */
    public function processAssert(
        BrowserInterface $browser,
        CatalogProductSimple $product,
        CatalogProductView $catalogProductView,
        array $promotedProducts = null
    ) {
        if (!$promotedProducts) {
            $promotedProducts = $product->hasData('related_products')
                ? $product->getDataFieldConfig('related_products')['source']->getProducts()
                : [];
        }

        $browser->open($_ENV['app_frontend_url'] . $product->getUrlKey() . '.html');
        foreach ($promotedProducts as $promotedProduct) {
            \PHPUnit_Framework_Assert::assertFalse(
                $catalogProductView->getRelatedProductBlock()->getItemBlock($promotedProduct)->isVisible(),
                "Product {$promotedProduct->getName()} is exist in related products."
            );
        }
    }

    /**
     * Text success product is not displayed in related products section.
     *
     * @return string
     */
    public function toString()
    {
        return 'Product is not displayed in related products section.';
    }
}

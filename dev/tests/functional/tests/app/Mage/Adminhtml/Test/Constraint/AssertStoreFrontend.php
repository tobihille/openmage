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

namespace Mage\Adminhtml\Test\Constraint;

use Mage\Adminhtml\Test\Page\Adminhtml\Cache;
use Magento\Mtf\Constraint\AbstractConstraint;
use Mage\Adminhtml\Test\Fixture\Store;
use Mage\Cms\Test\Page\CmsIndex;

/**
 * Assert that created store view available on frontend.
 */
class AssertStoreFrontend extends AbstractConstraint
{
    /**
     * Constraint severeness.
     *
     * @var string
     */
    protected $severeness = 'low';

    /**
     * Assert that created store view available on frontend.
     *
     * @param Store $store
     * @param CmsIndex $cmsIndex
     * @param Cache $cache
     * @return void
     */
    public function processAssert(Store $store, CmsIndex $cmsIndex, Cache $cache)
    {
        $cache->open()->getPageActions()->flushCacheStorage();
        $cmsIndex->open();
        $footerBlock = $cmsIndex->getFooterBlock();
        $headerBlock = $cmsIndex->getHeaderBlock();
        if ($footerBlock->isStoreGroupSwitcherVisible() && $footerBlock->isStoreGroupVisible($store)) {
            $footerBlock->selectStoreGroup($store);
        }

        $isStoreViewVisible = $headerBlock->isStoreViewDropdownVisible()
            ? $headerBlock->isStoreViewVisible($store)
            : true; // if only one store view is assigned to store group

        \PHPUnit_Framework_Assert::assertTrue(
            $isStoreViewVisible,
            "Store view '{$store->getName()}' is not visible in dropdown on CmsIndex page."
        );
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return 'Store view is visible in dropdown on CmsIndex page.';
    }
}

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
 * @category    Mage
 * @package     Mage_Core
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Url rewrite interface
 *
 * @category Mage
 * @package Mage_Core
 * @author Magento Core Team <core@magentocommerce.com>
 */
interface Mage_Core_Model_Url_Rewrite_Interface
{
    /**
     * Load rewrite information for request
     *
     * @param array|string $path
     * @return Mage_Core_Model_Url_Rewrite_Interface
     */
    public function loadByRequestPath($path);
}

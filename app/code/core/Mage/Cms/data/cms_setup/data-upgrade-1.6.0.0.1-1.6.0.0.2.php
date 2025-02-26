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
 * @package     Mage_Cms
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
$content = "<p>This website requires cookies to provide all of its features. For more " .
    "information on what data is contained in the cookies, please see our " .
    "<a href=\"{{store direct_url=\"privacy-policy-cookie-restriction-mode\"}}\">Privacy Policy page</a>. " .
    "To accept cookies from this site, please click the Allow button below.</p>";

$cmsBlock = [
    'title'         => 'Cookie restriction notice',
    'identifier'    => 'cookie_restriction_notice_block',
    'content'       => $content,
    'is_active'     => 1,
    'stores'        => 0
];

Mage::getModel('cms/block')->setData($cmsBlock)->save();

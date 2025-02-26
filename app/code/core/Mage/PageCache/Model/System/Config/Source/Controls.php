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
 * @package     Mage_PageCache
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Page cache system config source model
 *
 * @category   Mage
 * @package    Mage_PageCache
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class Mage_PageCache_Model_System_Config_Source_Controls
{
    /**
     * Return array of external cache controls for using as options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [];
        foreach (Mage::helper('pagecache')->getCacheControls() as $code => $type) {
            $options[] = [
                'value' => $code,
                'label' => $type['label']
            ];
        }
        return $options;
    }
}

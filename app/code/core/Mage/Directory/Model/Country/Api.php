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
 * @package     Mage_Directory
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Directory Country Api
 *
 * @category   Mage
 * @package    Mage_Directory
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class Mage_Directory_Model_Country_Api extends Mage_Api_Model_Resource_Abstract
{
    /**
     * Retrieve countries list
     *
     * @return array
     */
    public function items()
    {
        $collection = Mage::getModel('directory/country')->getCollection();

        $result = [];
        foreach ($collection as $country) {
            /** @var Mage_Directory_Model_Country $country */
            $country->getName(); // Loading name in default locale
            $result[] = $country->toArray(['country_id', 'iso2_code', 'iso3_code', 'name']);
        }

        return $result;
    }
}

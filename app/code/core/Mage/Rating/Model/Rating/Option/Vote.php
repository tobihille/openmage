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
 * @package     Mage_Rating
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Rating vote model
 *
 * @category   Mage
 * @package    Mage_Rating
 * @author      Magento Core Team <core@magentocommerce.com>
 *
 * @method Mage_Rating_Model_Resource_Rating_Option_Vote_Collection getResourceCollection()()
 * @method string getEntityPkValue()
 * @method int getRatingId()
 * @method $this setRatingOptions(Mage_Rating_Model_Resource_Rating_Option_Collection $options)
 */

class Mage_Rating_Model_Rating_Option_Vote extends Mage_Core_Model_Abstract
{
    public function __construct()
    {
        $this->_init('rating/rating_option_vote');
    }
}

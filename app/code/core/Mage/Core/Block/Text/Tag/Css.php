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
 * Base html block
 *
 * @method Mage_Core_Block_Text_Tag_Css setTagName(string $value)
 * @method Mage_Core_Block_Text_Tag_Css setTagParams(array $value)
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_Core_Block_Text_Tag_Css extends Mage_Core_Block_Text_Tag
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTagName('link');
        $this->setTagParams(['rel'=>'stylesheet', 'type'=>'text/css', 'media'=>'all']);
    }

    /**
     * @param string $href
     * @param string|null $type
     * @return Mage_Core_Block_Text_Tag_Css
     */
    public function setHref($href, $type = null)
    {
        $type = (string)$type;
        if (empty($type)) {
            $type = 'skin';
        }
        $url = Mage::getBaseUrl($type).$href;

        return $this->setTagParam('href', $url);
    }
}

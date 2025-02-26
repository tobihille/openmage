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
 * @package     Mage_Install
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


class Mage_Install_Controller_Action extends Mage_Core_Controller_Varien_Action
{
    protected function _construct()
    {
        parent::_construct();

        Mage::getDesign()->setArea('install')
            ->setPackageName('default')
            ->setTheme('default');

        $this->getLayout()->setArea('install');

        $this->setFlag('', self::FLAG_NO_CHECK_INSTALLATION, true);
    }
}

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
 * @category    Varien
 * @package     Varien_Db
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


require_once 'Varien/Db/Tree/Node/Exception.php';

class Varien_Db_Tree_Node {

    private $left;
    private $right;
    private $id;
    private $pid;
    private $level;
    private $title;
    private $data;


    public $hasChild = false;
    public $numChild = 0;

    /**
     * Varien_Db_Tree_Node constructor.
     * @param array $nodeData
     * @param array $keys
     * @throws Varien_Db_Tree_Node_Exception
     */
    function __construct($nodeData, $keys)
    {
        if (empty($nodeData)) {
            throw new Varien_Db_Tree_Node_Exception('Empty array of node information');
        }
        if (empty($keys)) {
            throw new Varien_Db_Tree_Node_Exception('Empty keys array');
        }

        $this->id = $nodeData[$keys['id']];
        $this->pid = $nodeData[$keys['pid']];
        $this->left = $nodeData[$keys['left']];
        $this->right = $nodeData[$keys['right']];
        $this->level = $nodeData[$keys['level']];

        $this->data = $nodeData;
        $a = $this->right - $this->left;
        if ($a > 1) {
            $this->hasChild = true;
            $this->numChild = ($a - 1) / 2;
        }
        return $this;
    }

    function getData($name) {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        } else {
            return null;
        }
    }

    function getLevel() {
        return $this->level;
    }

    function getLeft() {
        return $this->left;
    }

    function getRight() {
        return $this->right;
    }

    function getPid() {
        return $this->pid;
    }

    function getId() {
        return $this->id;
    }

    /**
     * Return true if node have chield
     *
     * @return boolean
     */
    function isParent() {
        if ($this->right - $this->left > 1) {
            return true;
        } else {
            return false;
        }
    }
}

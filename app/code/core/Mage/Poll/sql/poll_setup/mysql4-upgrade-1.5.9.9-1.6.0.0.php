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
 * @package     Mage_Poll
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

/**
 * Drop foreign keys
 */
$installer->getConnection()->dropForeignKey(
    $installer->getTable('poll/poll'),
    'FK_POLL_STORE'
);

$installer->getConnection()->dropForeignKey(
    $installer->getTable('poll/poll_answer'),
    'FK_POLL_PARENT'
);

$installer->getConnection()->dropForeignKey(
    $installer->getTable('poll/poll_store'),
    'FK_POLL_STORE_POLL'
);

$installer->getConnection()->dropForeignKey(
    $installer->getTable('poll/poll_store'),
    'FK_POLL_STORE_STORE'
);

$installer->getConnection()->dropForeignKey(
    $installer->getTable('poll/poll_vote'),
    'FK_POLL_ANSWER'
);


/**
 * Drop indexes
 */
$installer->getConnection()->dropIndex(
    $installer->getTable('poll/poll'),
    'FK_POLL_STORE'
);

$installer->getConnection()->dropIndex(
    $installer->getTable('poll/poll_answer'),
    'FK_POLL_PARENT'
);

$installer->getConnection()->dropIndex(
    $installer->getTable('poll/poll_store'),
    'FK_POLL_STORE_STORE'
);

$installer->getConnection()->dropIndex(
    $installer->getTable('poll/poll_vote'),
    'FK_POLL_ANSWER'
);


/**
 * Change columns
 */
$tables = [
    $installer->getTable('poll/poll') => [
        'columns' => [
            'poll_id' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_INTEGER,
                'identity'  => true,
                'unsigned'  => true,
                'nullable'  => false,
                'primary'   => true,
                'comment'   => 'Poll Id'
            ],
            'poll_title' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
                'length'    => 255,
                'comment'   => 'Poll title'
            ],
            'votes_count' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_INTEGER,
                'unsigned'  => true,
                'nullable'  => false,
                'default'   => '0',
                'comment'   => 'Votes Count'
            ],
            'store_id' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_SMALLINT,
                'unsigned'  => true,
                'nullable'  => false,
                'default'   => '0',
                'comment'   => 'Store id'
            ],
            'date_posted' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
                'nullable'  => false,
                'comment'   => 'Date posted'
            ],
            'date_closed' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
                'nullable'  => true,
                'comment'   => 'Date closed'
            ],
            'active' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_SMALLINT,
                'nullable'  => false,
                'default'   => '1',
                'comment'   => 'Is active'
            ],
            'closed' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_SMALLINT,
                'nullable'  => false,
                'default'   => '0',
                'comment'   => 'Is closed'
            ],
            'answers_display' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_SMALLINT,
                'comment'   => 'Answers display'
            ]
        ],
        'comment' => 'Poll'
    ],
    $installer->getTable('poll/poll_answer') => [
        'columns' => [
            'answer_id' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_INTEGER,
                'identity'  => true,
                'unsigned'  => true,
                'nullable'  => false,
                'primary'   => true,
                'comment'   => 'Answer Id'
            ],
            'poll_id' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_INTEGER,
                'unsigned'  => true,
                'nullable'  => false,
                'default'   => '0',
                'comment'   => 'Poll Id'
            ],
            'answer_title' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
                'length'    => 255,
                'comment'   => 'Answer title'
            ],
            'votes_count' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_INTEGER,
                'unsigned'  => true,
                'nullable'  => false,
                'default'   => '0',
                'comment'   => 'Votes Count'
            ],
            'answer_order' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_SMALLINT,
                'nullable'  => false,
                'default'   => '0',
                'comment'   => 'Answers display'
            ]
        ],
        'comment' => 'Poll Answers'
    ],
    $installer->getTable('poll/poll_vote') => [
        'columns' => [
            'vote_id' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_INTEGER,
                'identity'  => true,
                'unsigned'  => true,
                'nullable'  => false,
                'primary'   => true,
                'comment'   => 'Vote Id'
            ],
            'poll_id' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_INTEGER,
                'unsigned'  => true,
                'nullable'  => false,
                'default'   => '0',
                'comment'   => 'Poll Id'
            ],
            'poll_answer_id' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_INTEGER,
                'unsigned'  => true,
                'nullable'  => false,
                'default'   => '0',
                'comment'   => 'Poll answer id'
            ],
            'ip_address' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_BIGINT,
                'comment'   => 'Poll answer id'
            ],
            'customer_id' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_INTEGER,
                'comment'   => 'Customer id'
            ],
            'vote_time' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
                'nullable'  => true,
                'comment'   => 'Date closed'
            ]
        ],
        'comment' => 'Poll Vote'
    ],
    $installer->getTable('poll/poll_store') => [
        'columns' => [
            'poll_id' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_INTEGER,
                'unsigned'  => true,
                'nullable'  => false,
                'primary'   => true,
                'default'   => '0',
                'comment'   => 'Poll Id'
            ],
            'store_id' => [
                'type'      => Varien_Db_Ddl_Table::TYPE_SMALLINT,
                'unsigned'  => true,
                'nullable'  => false,
                'primary'   => true,
                'default'   => '0',
                'comment'   => 'Store id'
            ]
        ],
        'comment' => 'Poll Store'
    ]
];

$installer->getConnection()->modifyTables($tables);


/**
 * Add indexes
 */
$installer->getConnection()->addIndex(
    $installer->getTable('poll/poll'),
    $installer->getIdxName('poll/poll', ['store_id']),
    ['store_id']
);

$installer->getConnection()->addIndex(
    $installer->getTable('poll/poll_answer'),
    $installer->getIdxName('poll/poll_answer', ['poll_id']),
    ['poll_id']
);

$installer->getConnection()->addIndex(
    $installer->getTable('poll/poll_store'),
    $installer->getIdxName('poll/poll_store', ['store_id']),
    ['store_id']
);

$installer->getConnection()->addIndex(
    $installer->getTable('poll/poll_vote'),
    $installer->getIdxName('poll/poll_vote', ['poll_answer_id']),
    ['poll_answer_id']
);


/**
 * Add foreign keys
 */
$installer->getConnection()->addForeignKey(
    $installer->getFkName('poll/poll', 'store_id', 'core/store', 'store_id'),
    $installer->getTable('poll/poll'),
    'store_id',
    $installer->getTable('core/store'),
    'store_id'
);

$installer->getConnection()->addForeignKey(
    $installer->getFkName('poll/poll_answer', 'poll_id', 'poll/poll', 'poll_id'),
    $installer->getTable('poll/poll_answer'),
    'poll_id',
    $installer->getTable('poll/poll'),
    'poll_id'
);

$installer->getConnection()->addForeignKey(
    $installer->getFkName('poll/poll_store', 'poll_id', 'poll/poll', 'poll_id'),
    $installer->getTable('poll/poll_store'),
    'poll_id',
    $installer->getTable('poll/poll'),
    'poll_id'
);

$installer->getConnection()->addForeignKey(
    $installer->getFkName('poll/poll_store', 'store_id', 'core/store', 'store_id'),
    $installer->getTable('poll/poll_store'),
    'store_id',
    $installer->getTable('core/store'),
    'store_id'
);

$installer->getConnection()->addForeignKey(
    $installer->getFkName('poll/poll_vote', 'poll_answer_id', 'poll/poll_answer', 'answer_id'),
    $installer->getTable('poll/poll_vote'),
    'poll_answer_id',
    $installer->getTable('poll/poll_answer'),
    'answer_id'
);

$installer->endSetup();

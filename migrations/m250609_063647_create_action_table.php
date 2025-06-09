<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%action}}`.
 */
class m250609_063647_create_action_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%action}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(250),
            'content' => $this->string(250),
            'body' => $this->string(250),
            'slug' => $this->string(250),
            'thumbnail' => $this->string(250),
            'sort' => $this->integer(),
            'visible' => $this->integer()->defaultValue(1)
        ]);

        $this->insert('{{%action}}', [
            'title' => 'Action 1',
            'content' => 'Content for action',
            'body' => 'Body for action',
            'slug' => 'action-1',
            'thumbnail' => '/images/1.jpg',
            'sort' => 0,
            'visible' => 1,
        ]);

        $this->insert('{{%action}}', [
            'title' => 'Action 2',
            'content' => 'Content for action',
            'body' => 'Body for action',
            'slug' => 'action-2',
            'thumbnail' => '/images/2.jpg',
            'sort' => 1,
            'visible' => 1,
        ]);

        $this->insert('{{%action}}', [
            'title' => 'Action 3',
            'content' => 'Content for action',
            'body' => 'Body for action',
            'slug' => 'action-3',
            'thumbnail' => '/images/3.jpg',
            'sort' => 2,
            'visible' => 1,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%action}}');
    }
}

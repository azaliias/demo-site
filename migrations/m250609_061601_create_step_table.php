<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%step}}`.
 */
class m250609_061601_create_step_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%step}}', [
            'id' => $this->primaryKey(),
            'sort' => $this->integer(),
            'step' => $this->integer(),
            'title' => $this->string(250),
            'content' => $this->text(),
            'visible' => $this->integer()->defaultValue(1),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
        ]);

        $this->insert('{{%step}}', [
            'title' => 'step 1',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae tristique augue. Donec blandit, lorem vel porttitor auctor, felis ipsum egestas nisi, eget porttitor sapien nisl eget purus.',
            'sort' => 0,
            'visible' => 1,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%step}}', [
            'title' => 'step 2',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae tristique augue. Donec blandit, lorem vel porttitor auctor, felis ipsum egestas nisi, eget porttitor sapien nisl eget purus.',
            'sort' => 1,
            'visible' => 1,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%step}}', [
            'title' => 'step 3',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae tristique augue. Donec blandit, lorem vel porttitor auctor, felis ipsum egestas nisi, eget porttitor sapien nisl eget purus.',
            'sort' => 2,
            'visible' => 1,
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%step}}');
    }
}

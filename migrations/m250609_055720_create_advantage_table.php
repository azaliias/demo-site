<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%advantage}}`.
 */
class m250609_055720_create_advantage_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%advantage}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(250),
            'content' => $this->text(),
            'thumbnail' => $this->string(250),
            'sort' => $this->integer(),
            'visible' => $this->integer()->defaultValue(1),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
        ]);

        $this->insert('{{%advantage}}', [
            'title' => 'Advantage 1',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae tristique augue. Donec blandit, lorem vel porttitor auctor, felis ipsum egestas nisi, eget porttitor sapien nisl eget purus.',
            'sort' => 0,
            'visible' => 1,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%advantage}}', [
            'title' => 'Advantage 2',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae tristique augue. Donec blandit, lorem vel porttitor auctor, felis ipsum egestas nisi, eget porttitor sapien nisl eget purus.',
            'sort' => 1,
            'visible' => 1,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%advantage}}', [
            'title' => 'Advantage 3',
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
        $this->dropTable('{{%advantage}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menu_item}}`.
 */
class m220622_095048_create_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%menu_item}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->null()->defaultValue(null),
            'title' => $this->string(255)->notNull(),
            'visible' => $this->boolean()->notNull()->defaultValue(1),
            'type' => $this->string(255)->null()->defaultValue(null),
            'slug' => $this->string(255)->null()->defaultValue(null),
            'link' => $this->string(255)->null()->defaultValue(null),
            'sort' => $this->integer(11)->notNull(),
        ]);

        $this->addForeignKey(
            'fk-menu_item-menu_item',
            '{{%menu_item}}',
            'parent_id',
            '{{%menu_item}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->insert('{{%menu_item}}', [
            'parent_id' => null,
            'title' => 'Dropdown',
            'visible' => 1,
            'type' => '',
            'slug' => null,
            'link' => '',
            'sort' => 0,
        ]);

        $this->insert('{{%menu_item}}', [
            'parent_id' => 1,
            'title' => 'Action',
            'visible' => 1,
            'type' => '',
            'slug' => null,
            'link' => 'https://ya.ru',
            'sort' => 1,
        ]);

        $this->insert('{{%menu_item}}', [
            'parent_id' => 1,
            'title' => 'Another action',
            'visible' => 1,
            'type' => '',
            'slug' => null,
            'link' => 'https://ya.ru',
            'sort' => 2,
        ]);

        $this->insert('{{%menu_item}}', [
            'parent_id' => null,
            'title' => 'Link',
            'visible' => 1,
            'type' => '',
            'slug' => null,
            'link' => 'https://ya.ru',
            'sort' => 3,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%menu_item}}');
    }
}

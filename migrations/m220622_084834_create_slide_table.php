<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%slide}}`.
 */
class m220622_084834_create_slide_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%slide}}',
            [
                'id' => $this->primaryKey(11),
                'title' => $this->string(250),
                'link' => $this->string(250),
                'content' => $this->text(),
                'thumbnail' => $this->string(250),
                'thumbnailM' => $this->string(250),
                'sort' => $this->integer(),
                'visible' => $this->integer()->defaultValue(1),
                'created_at' => $this->integer(11)->notNull(),
                'updated_at' => $this->integer(11)->notNull(),
            ], $tableOptions
        );

        $this->insert('{{%slide}}', [
            'title' => 'Title 1',
            'link' => 'https://ya.ru',
            'content' => 'Content text for slide',
            'thumbnail' => '/uploads/slide/1.jpg',
            'thumbnailM' => '',
            'sort' => 0,
            'visible' => 1,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%slide}}', [
            'title' => 'Title 2',
            'link' => 'https://ya.ru',
            'content' => 'Content text for slide',
            'thumbnail' => '/uploads/slide/2.jpg',
            'thumbnailM' => '',
            'sort' => 1,
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
        $this->dropTable('{{%slide}}');
    }
}

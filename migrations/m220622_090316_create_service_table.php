<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%service}}`.
 */
class m220622_090316_create_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%service}}',
            [
                'id' => $this->primaryKey(11),
                'title' => $this->string(),
                'slug' => $this->string(),
                'content' => $this->text(),
                'thumbnail' => $this->string(),
                'sort' => $this->integer(),
                'visible' => $this->integer()->defaultValue(1),
                'seo_title' => $this->string(),
                'seo_keywords' => $this->string(),
                'seo_description' => $this->string(),
            ], $tableOptions
        );

        $this->insert('{{%service}}', [
            'title' => 'Service 1',
            'slug' => 'service-1',
            'content' => 'Content text for service',
            'thumbnail' => '/images/1.jpg',
            'sort' => 0,
            'visible' => 1,
        ]);

        $this->insert('{{%service}}', [
            'title' => 'Service 2',
            'slug' => 'service-2',
            'content' => 'Content text for service',
            'thumbnail' => '/images/2.jpg',
            'sort' => 1,
            'visible' => 1,
        ]);

        $this->insert('{{%service}}', [
            'title' => 'Service 3',
            'slug' => 'service-3',
            'content' => 'Content text for service',
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
        $this->dropTable('{{%service}}');
    }
}

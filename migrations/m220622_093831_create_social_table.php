<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%social}}`.
 */
class m220622_093831_create_social_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%social}}',
            [
                'id' => $this->primaryKey(11),
                'title' => $this->string(),
                'url' => $this->string(),
                'type' => $this->string(),
                'sort' => $this->integer(),
                'visible' => $this->integer()->defaultValue(1),
                'created_at' => $this->integer(),
                'updated_at' => $this->integer(),
            ], $tableOptions
        );

        $this->insert('{{%social}}', [
            'title' => 'Facebook',
            'url' => 'https://facebook.com/',
            'type' => 'fb',
            'sort' => 0,
            'visible' => 1,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%social}}', [
            'title' => 'WhatsApp',
            'url' => 'https://web.whatsapp.com/',
            'type' => 'wp',
            'sort' => 1,
            'visible' => 1,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%social}}', [
            'title' => 'YouTube',
            'url' => 'https://www.youtube.com/',
            'type' => 'yb',
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
        $this->dropTable('{{%social}}');
    }
}

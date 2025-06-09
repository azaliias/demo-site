<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%photo}}`.
 */
class m250609_063233_create_photo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%photo}}', [
            'id' => $this->primaryKey(),
            'thumbnail' => $this->string(250),
            'sort' => $this->integer(),
            'visible' => $this->integer()->defaultValue(1)
        ]);

        $this->insert('{{%photo}}', [
            'thumbnail' => '/images/1.jpg',
            'sort' => 0,
            'visible' => 1,
        ]);

        $this->insert('{{%photo}}', [
            'thumbnail' => '/images/2.jpg',
            'sort' => 1,
            'visible' => 1,
        ]);

        $this->insert('{{%photo}}', [
            'thumbnail' => '/images/3.jpg',
            'sort' => 2,
            'visible' => 1,
        ]);

        $this->insert('{{%photo}}', [
            'thumbnail' => '/images/4.jpg',
            'sort' => 3,
            'visible' => 1,
        ]);

        $this->insert('{{%photo}}', [
            'thumbnail' => '/images/5.jpg',
            'sort' => 4,
            'visible' => 1,
        ]);

        $this->insert('{{%photo}}', [
            'thumbnail' => '/images/6.jpg',
            'sort' => 5,
            'visible' => 1,
        ]);

        $this->insert('{{%photo}}', [
            'thumbnail' => '/images/7.jpg',
            'sort' => 6,
            'visible' => 1,
        ]);

        $this->insert('{{%photo}}', [
            'thumbnail' => '/images/8.jpg',
            'sort' => 7,
            'visible' => 1,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%photo}}');
    }
}

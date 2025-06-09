<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page}}`.
 */
class m250609_053002_create_page_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'seo_title' => $this->string(),
            'seo_keywords' => $this->string(),
            'seo_description' => $this->string(),
            'slug' => $this->string(),
            'content' => $this->text(),
            'template' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->insert('{{%page}}', [
            'title' => 'Политика конфиденциальности',
            'slug' => 'politika-konfidencialnosti',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae tristique augue. Donec blandit, lorem vel porttitor auctor, felis ipsum egestas nisi, eget porttitor sapien nisl eget purus.',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%page}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%message}}`.
 */
class m250609_064504_create_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%message}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(250)->null()->defaultValue(null),
            'phone' => $this->string(250)->null()->defaultValue(null),
            'message' => $this->text()->null()->defaultValue(null),
            'created_at' => $this->integer(10)->unsigned()->notNull()->defaultValue(0),
            'updated_at' => $this->integer(10)->unsigned()->notNull()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%message}}');
    }
}

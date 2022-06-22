<?php

use yii\db\Migration;

/**
 * Handles the creation of table `setting`.
 */
class m210706_075454_create_setting_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%setting}}',
            [
                'id' => $this->primaryKey(11),
                'type' => $this->string(10)->notNull(),
                'section' => $this->string(255)->notNull(),
                'key' => $this->string(255)->notNull(),
                'value' => $this->text()->notNull(),
                'status' => $this->smallInteger(6)->notNull()->defaultValue(1),
                'description' => $this->string(255)->null()->defaultValue(null),
                'created_at' => $this->integer(11)->notNull(),
                'updated_at' => $this->integer(11)->notNull(),
            ], $tableOptions
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%setting}}');
    }
}

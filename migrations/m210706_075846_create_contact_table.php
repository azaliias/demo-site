<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contact`.
 */
class m210706_075846_create_contact_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%contact}}',
            [
                'id' => $this->primaryKey(11),
                'type' => $this->string(250)->null()->defaultValue(null),
                'name' => $this->string(250)->null()->defaultValue(null),
                'phone' => $this->string(250)->null()->defaultValue(null),
                'email' => $this->string(250)->null()->defaultValue(null),
                'message' => $this->text()->null()->defaultValue(null),
                'seen' => $this->boolean()->notNull()->defaultValue(0),
                'created_at' => $this->integer(10)->unsigned()->notNull()->defaultValue(0),
                'updated_at' => $this->integer(10)->unsigned()->notNull()->defaultValue(0),
            ], $tableOptions
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contact}}');
    }
}

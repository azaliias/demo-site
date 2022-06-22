<?php

use yii\db\Migration;

/**
 * Handles the creation of table `redirect`.
 */
class m210706_093611_create_redirect_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%redirect}}',
            [
                'id' => $this->primaryKey(11),
                'from' => $this->string(250)->notNull(),
                'to' => $this->string(250)->notNull(),
                'code' => $this->integer(11)->notNull(),
                'created_at' => $this->bigInteger(20)->unsigned()->notNull()->defaultValue('0'),
                'updated_at' => $this->bigInteger(20)->unsigned()->notNull()->defaultValue('0'),
            ], $tableOptions
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%redirect}}');
    }
}

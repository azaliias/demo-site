<?php

use yii\db\Migration;

/**
 * Handles the creation of table `log`.
 */
class m210706_093339_create_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%log}}',
            [
                'id' => $this->bigPrimaryKey(20),
                'level' => $this->integer(11)->null()->defaultValue(null),
                'category' => $this->string(255)->null()->defaultValue(null),
                'log_time' => $this->double()->null()->defaultValue(null),
                'prefix' => $this->text()->null()->defaultValue(null),
                'message' => $this->text()->null()->defaultValue(null),
            ], $tableOptions
        );
        $this->createIndex('idx_log_level', '{{%log}}', ['level'], false);
        $this->createIndex('idx_log_category', '{{%log}}', ['category'], false);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx_log_level', '{{%log}}');
        $this->dropIndex('idx_log_category', '{{%log}}');
        $this->dropTable('{{%log}}');
    }
}

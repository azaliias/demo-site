<?php

use yii\db\Migration;

/**
 * Class m220622_092631_insert_data_in_setting_table
 */
class m220622_092631_insert_data_in_setting_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%setting}}', [
            'type' => 'string',
            'section' => 'SiteSettings',
            'key' => 'phone',
            'value' => '+7 999 999 99 99',
            'status' => 1,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%setting}}', [
            'type' => 'string',
            'section' => 'SiteSettings',
            'key' => 'email',
            'value' => 'mail@mail.ru',
            'status' => 1,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%setting}}', [
            'type' => 'string',
            'section' => 'SiteSettings',
            'key' => 'address',
            'value' => 'г.Уфа, ул. Ленина, д.5',
            'status' => 1,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%setting}}', [
            'type' => 'string',
            'section' => 'SiteSettings',
            'key' => 'worktime',
            'value' => 'пн-пт: 9:00 - 18:00',
            'status' => 1,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%setting}}', [
            'type' => 'string',
            'section' => 'SiteSettings',
            'key' => 'geo',
            'value' => '[54.724100, 55.946124]',
            'status' => 1,
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220622_092631_insert_data_in_setting_table cannot be reverted.\n";

        return false;
    }

}

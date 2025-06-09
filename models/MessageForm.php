<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%message}}".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $message
 * @property string $created_at
 * @property string $updated_at
 */
class MessageForm extends Message
{
    public $check;
    public $name;
    public $phone;
    public $message;
    public $agree;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone'], 'required'],
            ['phone', 'string', 'min'=>18, 'max' => 18, 'tooLong'  => 'Номер телефона должен содержать 11 цифр.', 'tooShort' => 'Номер телефона должен содержать 11 цифр.'],
            [['name', 'phone'], 'string', 'max' => 255],
            [['message'], 'string'],
            [['check'], 'in', 'range' => [14]],
            [['check'], 'required'],
            [['agree'], 'required', 'requiredValue' => 1, 'message' => 'Для отправки сообщения нужно дать согласие на обработку данных'],

        ];
    }

}

<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%contact}}".
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $message
 * @property int $seen
 * @property string $created_at
 * @property string $updated_at
 */
class ContactFormModal extends Contact
{
    public $check;
    public $name;
    public $phone;
    public $message;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone'], 'required'],
            [['name', 'phone', 'email'], 'string', 'max' => 255],
            [['message'], 'string'],
            [['check'], 'in', 'range' => [14]],
            [['check'], 'required'],
        ];
    }

}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%redirect}}".
 *
 * @property int $id
 * @property string $from
 * @property string $to
 * @property int $code
 * @property string $created
 * @property string $modified
 */
class Redirect extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%redirect}}';
    }
    
    public function behaviors()
    {
        return [
            \yii\behaviors\TimestampBehavior::className(),
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from', 'to', 'code'], 'required'],
            [['code', 'created_at', 'updated_at'], 'integer'],
            [['from', 'to'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'from' => Yii::t('app', 'Redirect from'),
            'to' => Yii::t('app', 'Redirect to'),
            'code' => Yii::t('app', 'Redirect code'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
    
    public static function getHttpCodes()
    {
        return [
            '301' => '301 - перемещено навсегда',
            '302' => '302 - перемещено временно',
        ];
    }
}

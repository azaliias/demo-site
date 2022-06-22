<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%social}}".
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string $type
 * @property int $visible
 * @property int $sort
 * @property int $created_at
 * @property int $updated_at
 */
class Social extends GeneralModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%social}}';
    }

    public function behaviors()
    {
        return [
            \yii\behaviors\TimestampBehavior::className(),
            'sortable' => [
                'class' => \kotchuprik\sortable\behaviors\Sortable::className(),
                'query' => self::find(),
                'orderAttribute' => 'sort',
            ],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['visible', 'sort', 'created_at', 'updated_at'], 'integer'],
            [['title', 'type', 'url'], 'string', 'max' => 50],
            ['type', 'in', 'range' => array_keys(self::getTypeOptions())]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'url' => Yii::t('app', 'Url'),
            'type' => Yii::t('app', 'Type'),
            'visible' => Yii::t('app', 'Visible'),
            'sort' => Yii::t('app', 'Sort'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
    
    public static function getTypeOptions() {
            return [
                'fb' => 'Facebook',
                'wp' => 'WhatsApp',
                'ig' => 'Instagram',
                'yb' => 'YouTube',
                'vk' => 'VK'
            ];
    }
        
    public static function getVisibleOptions() {
        return [
            1 => 'Видимый',
            0 => 'Скрытый',
        ];
    }

    public function getIconUrl() {
        return '/images/icons/socials/' . $this->type . '.svg';
    }

    public function getWhiteIconUrl() {
        return '/images/icons/socials/' . $this->type . '-white.svg';
    }

    public static function getSocials() {
        return self::find()->where(['visible' => true])->orderBy('sort')->all();
    }
    
}

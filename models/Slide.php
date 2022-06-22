<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%slide}}".
 *
 * @property int $id
 * @property string $title
 * @property string $link
 * @property string $content
 * @property string $thumbnail
 * @property int $sort
 * @property int $visible
 * @property string $created_at
 * @property string $updated_at
 */
class Slide extends GeneralModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%slide}}';
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
            'saveFile' => [
                'class' => '\app\backend\components\FileSaveBehavior',
                'fields' => ['thumbnail', 'thumbnailM']
            ],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['sort', 'visible', 'created_at', 'updated_at'], 'integer'],
            [['title', 'link'], 'string', 'max' => 250],
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
            'link' => 'Ссылка',
            'content' => Yii::t('app', 'Content'),
            'thumbnail' => 'Слайд',
            'thumbnailM' => 'Слайд (моб. версия)',
            'sort' => Yii::t('app', 'Sort'),
            'visible' => Yii::t('app', 'Visible'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}

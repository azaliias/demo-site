<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%advantage}}".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $thumbnail
 * @property int $sort
 * @property int $visible
 * @property int $created_at
 * @property int $updated_at
 */
class Advantage extends \app\models\GeneralModel
{
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
    public static function tableName()
    {
        return '{{%advantage}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['sort', 'visible', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['content'], 'string', 'max' => 255],
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
            'content' => Yii::t('app', 'Content'),
            'thumbnail' => Yii::t('app', 'Thumbnail'),
            'sort' => Yii::t('app', 'Sort'),
            'visible' => Yii::t('app', 'Visible'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}

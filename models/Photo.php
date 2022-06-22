<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%photo}}".
 *
 * @property int $id
 * @property string $thumbnail
 * @property int $visible
 * @property int $sort
 */
class Photo extends \app\models\GeneralModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%photo}}';
    }

    public function behaviors()
    {
        return [
            'sortable' => [
                'class' => \kotchuprik\sortable\behaviors\Sortable::className(),
                'query' => self::find(),
                'orderAttribute' => 'sort',
            ],
            'saveFile' => [
                'class' => '\app\backend\components\FileSaveBehavior',
                'fields' => ['thumbnail']
            ],
            'slug' => [
                'class' => '\app\backend\components\SlugBehavior',
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['visible', 'sort'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'thumbnail' => Yii::t('app', 'Thumbnail'),
            'visible' => Yii::t('app', 'Visible'),
            'sort' => Yii::t('app', 'Sort'),
        ];
    }
}

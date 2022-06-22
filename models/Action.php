<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%action}}".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $body
 * @property string $thumbnail
 * @property int $visible
 * @property int $sort
 */
class Action extends \app\models\GeneralModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%action}}';
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
            [['title'], 'required'],
            [['visible', 'sort'], 'integer'],
            [['title', 'content', 'body', 'slug'], 'string', 'max' => 255],
            [['seo_title', 'seo_keywords', 'seo_description'], 'string', 'max' => 255],
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
            'slug' => Yii::t('app', 'Slug'),
            'content' => Yii::t('app', 'Content'),
            'body' => Yii::t('app', 'Body'),
            'thumbnail' => Yii::t('app', 'Thumbnail'),
            'visible' => Yii::t('app', 'Visible'),
            'sort' => Yii::t('app', 'Sort'),
            'seo_title' => Yii::t('app', 'Seo Title'),
            'seo_keywords' => Yii::t('app', 'Seo Keywords'),
            'seo_description' => Yii::t('app', 'Seo Description'),
        ];
    }
}
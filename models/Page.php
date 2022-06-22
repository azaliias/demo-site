<?php

namespace app\models;

use Yii;
use DirectoryIterator;

/**
 * This is the model class for table "{{%page}}".
 *
 * @property int $id
 * @property string $title
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property string $slug
 * @property string $content
 * @property string $template
 * @property string $created_at
 * @property string $updated_at
 */
class Page extends GeneralModel
{

    public function behaviors()
    {
        return [
            'slug' => [
                'class' => 'app\backend\components\SlugBehavior',
            ],
            \yii\behaviors\TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%page}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['title', 'seo_title', 'seo_keywords', 'seo_description', 'slug'], 'string', 'max' => 255],
            [['template'], 'string', 'max' => 255],
            [['slug'], 'unique'],
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
            'seo_title' => Yii::t('app', 'Seo Title'),
            'seo_keywords' => Yii::t('app', 'Seo Keywords'),
            'seo_description' => Yii::t('app', 'Seo Description'),
            'slug' => Yii::t('app', 'Slug'),
            'content' => Yii::t('app', 'Content'),
            'template' => Yii::t('app', 'Template'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public static function getSlugs()
    {
        $all = self::find()->all();
        return yii\helpers\BaseArrayHelper::map($all, 'slug', 'title');
    }

}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%step}}".
 *
 * @property int $id
 * @property int $sort
 * @property int $step
 * @property string $title
 * @property string $content
 * @property int $visible
 * @property int $created_at
 * @property int $updated_at
 */
class Step extends \app\models\GeneralModel
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
        return '{{%step}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['sort', 'step', 'visible', 'created_at', 'updated_at'], 'integer'],
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
            'sort' => Yii::t('app', 'Sort'),
            'step' => Yii::t('app', 'Step'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'visible' => Yii::t('app', 'Visible'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}

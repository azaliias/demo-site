<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%review}}".
 *
 * @property int $id
 * @property string $fio
 * @property string $company
 * @property string $thumbnail
 * @property string $company
 * @property int $visible
 * @property int $sort
 * @property int $created_at
 * @property int $updated_at
 */
class Review extends \app\models\GeneralModel
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
        return '{{%review}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio'], 'required'],
            [['sort', 'visible', 'created_at', 'updated_at'], 'integer'],
            [['company'], 'string', 'max' => 100],
            [['content'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fio' => Yii::t('app', 'FIO'),
            'company' => Yii::t('app', 'Company'),
            'thumbnail' => Yii::t('app', 'Thumbnail'), 
            'content' => Yii::t('app', 'Content'),
            'visible' => Yii::t('app', 'Visible'),
            'sort' => Yii::t('app', 'Sort'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}

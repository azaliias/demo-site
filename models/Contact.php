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
class Contact extends ActiveRecord
{
    
    public $date_from;
    public $date_to;
    public $check;

    public function behaviors()
    {
        return [
            \yii\behaviors\TimestampBehavior::className(),
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%contact}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seen', 'created_at', 'updated_at'], 'integer'],
            [['name', 'phone', 'email'], 'string', 'max' => 255],
            [['message'], 'string'],

            [['date_from', 'date_to'], 'string', 'max' => 255],
            [['check'], 'in', 'range' => [14]],
            [['check'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'message' => Yii::t('app', 'Message'),
            'seen' => Yii::t('app', 'Seen'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'dateFrom' => Yii::t('app', 'Date from'),
            'dateTo' => Yii::t('app', 'Date to'),
        ];
    }
    
    public function contact($email)
    {
        if ($this->validate() && $this->checkCacheKey()) {

            if ($email) {
                try {
                    Yii::$app->mailer->compose('contact', ['contact' => $this])
                        ->setTo(explode(',', $email))
                        ->setFrom([Yii::$app->settings->get('SiteSettings', 'fromEmail') => '?? ??????????'])
                        ->setSubject('?????????? ???????????????? ??????????')
                        ->send();
                } catch (\Exception $exc) {
                        $message = '???????????? ???????????????? ??????????????????' . "\n";
                        $message .= $this->name . "\n";
                        $message .= '??????: ' . $this->type . "\n";
                        $message .= '??????????????: ' . $this->phone . "\n";
                        $message .= 'Email: ' . $this->email . "\n";
                        $message .= '??????????????????: ' . $this->message . "\n";
                        Yii::error($exc);
                        Yii::error($message, 'email');
                }
            }

            return true;
        }
        return false;
    }
    
    private function checkCacheKey()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $cache = Yii::$app->cache;
        $cache_key = 'cache_key' . $ip;
        if ($cache->get($cache_key) == false) {
            $cache->set($cache_key, $ip, 5); //5 sec
            return true;
        } else {
            return false;
        }
    }
}

<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Настройки, хранящиеся в БД
 */
class SiteSettings extends Model {
    public $email;
	public $phone;
    public $address;
    public $worktime;
    public $geo;

    public $advantagesTitle;
    public $advantagesLogo;

    public $urlInst;

    public $bannersTitle;
    public $bannersText;
    public $bannersLogo;

    public $aboutTitle;
    public $aboutText;
    public $aboutMainLogo;
    public $aboutLogo;
    public $aboutSecLogo;    

    public $newsTitle;
    public $newsText;

    public $photosTitle;
    public $photosText;

    public $messagesTitle;
    public $messagesText;
    public $messagesLogo;

	public $homePageTitle;
	public $homePageKeywords;
	public $homePageDescription;

	public $sendEmailsTo;
	public $smtpHost;
	public $smtpPort;
	public $smtpAuth;
	public $smtpUsername;
	public $smtpPassword;
	public $smtpSecure;
	public $fromEmail;

    public $visible;

	public function rules()
	{
            return [
                [['email', 'phone', 'address', 'worktime', 'bannersText', 'messagesText', 'newsText', 'photosText'], 'string', 'max' => 255],
                [['aboutText'], 'string', 'max' => 2500],
                [['homePageTitle', 'homePageKeywords', 'homePageDescription', 'geo'], 'string', 'max' => 255],
                
                [['sendEmailsTo', 'urlInst', 'advantagesTitle', 'bannersTitle', 'messagesTitle', 'newsTitle', 'photosTitle', 'aboutTitle', 'smtpHost', 'smtpUsername', 'smtpPassword'], 'string'],
                [['smtpPort'], 'integer', 'min'=>1, 'max'=>65536],
                [['smtpAuth'], 'in', 'range'=>[0,1]],
                [['smtpSecure'], 'in', 'range'=>['ssl', 'tls']],
                [['fromEmail'], 'string', 'max' => 255],
                [['fromEmail'], 'email'],
            ];
	}
	
    public function attributeLabels()
    {
        return [
            'homePageTitle' => Yii::t('app', 'Home page title'),
            'homePageKeywords' => Yii::t('app', 'Home page keywords'),
            'homePageDescription' => Yii::t('app', 'Home page description'),
            'aboutTitle' => Yii::t('app', 'Заголовок'),
            'aboutText' => Yii::t('app', 'Текст'),
            'aboutMainLogo' => Yii::t('app', 'Основное лого'),
            'aboutLogo' => Yii::t('app', '1-ое лого'),
            'aboutSecLogo' => Yii::t('app', '2-ое лого'),
            'advantagesTitle' => Yii::t('app', 'Заголовок'),
            'bannersTitle' => Yii::t('app', 'Заголовок'),
            'bannersText' => Yii::t('app', 'Текст'),
            'newsTitle' => Yii::t('app', 'Заголовок'),
            'newsText' => Yii::t('app', 'Текст'),
            'photosTitle' => Yii::t('app', 'Заголовок'),
            'photosText' => Yii::t('app', 'Текст'),
            'urlInst' => Yii::t('app', 'Ссылка на инстаграм'),
            'messagesTitle' => Yii::t('app', 'Заголовок'),
            'messagesText' => Yii::t('app', 'Текст'),
            'sendEmailsTo' => Yii::t('app', 'Sends email to'),
            'smtpHost' => Yii::t('app', 'Host'),
            'smtpPort' => Yii::t('app', 'Port'),
            'smtpAuth' => Yii::t('app', 'Need authorization'),
            'smtpUsername' => Yii::t('app', 'Username'),
            'smtpPassword' => Yii::t('app', 'Password'),
            'smtpSecure' => Yii::t('app', 'Security'),
            'fromEmail' => Yii::t('app', 'From email'),
            
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'address' => Yii::t('app', 'Address'),
            'worktime' => Yii::t('app', 'Worktime'),
            'geo' => 'Геопозиция на карте',
        ];
    }

    /**
     * Сохранение файла на сервере
     */
    public function saveFile()
    {

        $web = Yii::getAlias('@webroot');

        $dir = '/uploads/settings/';
        \yii\helpers\BaseFileHelper::createDirectory($web . $dir);

        foreach ($this->attributes as $attr => $value) {

            $uploadFile = \yii\web\UploadedFile::getInstance($this, $attr);

            if (is_object($uploadFile)) {

                $name = $attr . date('m-Y_His');
                $ext = $uploadFile->getExtension();

                $filePath = $dir . $name . '.' . $ext;

                $uploadFile->saveAs($web . $filePath);
                $this->{$attr} = $filePath;
            }
        }
    }

}

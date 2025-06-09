<?php

namespace app\controllers;

use app\backend\components\TelegramBot;
use app\models\Message;
use Yii;
use app\backend\components\FrontController;
use yii\filters\VerbFilter;
use app\models\Contact;

class EmailController extends FrontController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new Contact();
        if ($model->load(Yii::$app->request->post(), 'ContactFormModal') && $model->contact(Yii::$app->settings->get('SiteSettings', 'sendEmailsTo'))) {
            if($model->save()){
                TelegramBot::sendMessage($model);
            }
            return $this->redirect('/success');
        }
        return $this->goHome();
    }

    public function actionMessage()
    {
        $model = new Message();
        if ($model->load(Yii::$app->request->post(), 'MessageForm') && $model->contact(Yii::$app->settings->get('SiteSettings', 'sendEmailsTo'))) {
            if($model->save()){
                TelegramBot::sendMessage($model);
            }
            return $this->redirect('/success');
        }
        return $this->goHome();
    }

}

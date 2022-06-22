<?php

namespace app\controllers;

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
            $model->save();
            return $this->redirect('/success');
        }
        return $this->goHome();
    }

}

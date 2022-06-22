<?php

namespace app\controllers;

use app\models\Category;
use app\models\GeneralModel;
use app\models\Markup;
use app\models\Page;
use app\models\Product;
use Yii;
use app\backend\components\FrontController;
use yii\helpers\ArrayHelper;

class SiteController extends FrontController
{
    public $layout = 'secondary';

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = 'main';
        return $this->render('index');
    }
    
    public function actionSuccess()
    {
        return $this->render('success');
    }
    
    public function actionError()
    {
        return $this->render('error');
    }

}

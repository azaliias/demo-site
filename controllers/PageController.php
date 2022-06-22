<?php

namespace app\controllers;

use app\models\Page;
use app\models\Product;
use Yii;
use app\backend\components\FrontController;

class PageController extends FrontController
{

    public $layout = 'secondary';

    
    public function actionView($slug)
    {
        $model = Page::findBySlug($slug);
        return $this->render('view', compact('model'));
    }
}

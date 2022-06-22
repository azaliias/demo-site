<?php

namespace app\controllers;

use yii\data\Pagination;
use app\models\Service;
use Yii;
use app\backend\components\FrontController;

class ServiceController extends FrontController
{

    public $layout = 'secondary';

    public function actionIndex()
    {
        $postsQuery = Service::find()->where(['visible' => 1])->orderBy('sort');
        $countQuery = clone $postsQuery;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 6]);
        $pages->pageSizeParam = false;
        $posts = $postsQuery->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index', compact('posts', 'pages'));
    }


    public function actionView($slug)
    {
        $model = Service::findBySlug($slug);
        return $this->render('view', compact('model'));
    }
}

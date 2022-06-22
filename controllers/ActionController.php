<?php

namespace app\controllers;

use yii\data\Pagination;
use app\models\Action;
use Yii;
use app\backend\components\FrontController;

class ActionController extends FrontController
{

    public $layout = 'secondary';

    public function actionIndex()
    {
        $actionsQuery = Action::find()->where(['visible' => 1])->orderBy('sort');
        $countQuery = clone $actionsQuery;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 6]);
        $pages->pageSizeParam = false;
        $actions = $actionsQuery->offset($pages->offset)
            ->limit($pages->limit)->all();
        return $this->render('index', compact('actions', 'pages'));
    }


    public function actionView($slug)
    {
        $model = Action::findBySlug($slug);
        return $this->render('view', compact('model'));
    }
}

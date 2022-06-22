<?php

namespace app\controllers;

use yii\data\Pagination;
use app\models\Post;
use Yii;
use app\backend\components\FrontController;

class PostController extends FrontController
{

    public $layout = 'secondary';

    public function actionIndex()
    {
        $postsQuery = Post::find()->where(['visible' => 1])->orderBy('sort');
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
        $model = Post::findBySlug($slug);
        return $this->render('view', compact('model'));
    }
}

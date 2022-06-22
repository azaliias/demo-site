<?php

namespace app\controllers;

use yii\data\Pagination;
use app\models\Photo;
use Yii;
use app\backend\components\FrontController;

class PhotoController extends FrontController
{

    public $layout = 'secondary';

    public function actionIndex()
    {
        //$photos = Photo::find()->where(['visible' => 1])->orderBy('sort')->limit(8)->all();
        $photosQuery = Photo::find()->where(['visible' => 1])->orderBy('sort');
        $countQuery = clone $photosQuery;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 7]);
        $pages->pageSizeParam = false;
        $photos = $photosQuery->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index', compact('photos', 'pages'));
    }


    public function actionView($slug)
    {
        $model = Photo::findBySlug($slug);
        return $this->render('view', compact('model'));
    }
}

<?php

namespace app\widgets;

use app\models\Action;
use yii\data\Pagination;
use Yii;
use app\backend\components\FrontController;

class Actions extends \yii\bootstrap\Widget
{
    public function run()
    {
        $actions = Action::find()->where([
            'visible' => true,
        ])->orderBy('sort')->limit(6)->all();
        // $actionsQuery = Action::find()->where(['visible' => 1])->orderBy('sort');
        // $countQuery = clone $actionsQuery;
        // $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 6]);
        // $pages->pageSizeParam = false;
        // $posts = $postsQuery->offset($pages->offset)
            // ->limit($pages->limit)
            // ->all();

        return $this->render('actions', compact('actions'));
    }
    // ['actions' => $actions]
}
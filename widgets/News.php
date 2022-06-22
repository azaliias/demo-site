<?php

namespace app\widgets;
use app\models\Post;

class News extends \yii\bootstrap\Widget
{
    public function run()
    {
        $news = Post::find()->where([
            'visible' => true,
        ])->orderBy('sort')->limit(4)->all();

        return $this->render('news', ['news' => $news]);
    }
}

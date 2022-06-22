<?php

namespace app\widgets;
use app\models\Review;

class Reviews extends \yii\bootstrap\Widget
{
    public function run()
    {
        $reviews = Review::find()->where([
            'visible' => true,
        ])->orderBy('sort')->limit(6)->all();

        return $this->render('reviews', ['reviews' => $reviews]);
    }
}

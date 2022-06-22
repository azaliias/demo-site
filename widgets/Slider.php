<?php

namespace app\widgets;
use app\models\Slide;

class Slider extends \yii\bootstrap\Widget
{
    public function run()
    {
        $slider = Slide::find()->where([
            'visible' => true
        ])->orderBy('sort')->all();

        return $this->render('slider', ['slider' => $slider]);
    }
}

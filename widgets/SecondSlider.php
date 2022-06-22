<?php

namespace app\widgets;
use app\models\SecondSlide;

class SecondSlider extends \yii\bootstrap\Widget
{
    public function run()
    {
        $secondslider = SecondSlide::find()->where([
            'visible' => true
        ])->orderBy('sort')->all();

        return $this->render('secondslider', ['secondslider' => $secondslider]);
    }
}

<?php

namespace app\widgets;
use app\models\Partner;

class Partners extends \yii\bootstrap\Widget
{
    public function run()
    {
        $partners = Partner::find()->where([
            'visible' => true
        ])->orderBy('sort')->all();

        return $this->render('partners', ['partners' => $partners]);
    }
}

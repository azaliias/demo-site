<?php

namespace app\widgets;
use app\models\Advantage;

class Advantages extends \yii\bootstrap\Widget
{
    public function run()
    {
        $advantages = Advantage::find()->where([
            'visible' => true,
        ])->orderBy('sort')->all();

        return $this->render('advantages', ['advantages' => $advantages]);
    }
}

<?php

namespace app\widgets;
use app\models\Step;

class Steps extends \yii\bootstrap\Widget
{
    public function run()
    {
        $steps = Step::find()->where([
            'visible' => true,
        ])->orderBy('sort')->limit(9)->all();

        return $this->render('steps', ['steps' => $steps]);
    }
}

<?php

namespace app\widgets;

class Services extends \yii\bootstrap\Widget
{
    public function run()
    {
        $services = \app\models\Service::find()->where([
            'visible' => true
        ])->orderBy('sort')->limit(6)->all();

        return $this->render('services', ['services' => $services]);
    }
}

<?php

namespace app\widgets;
use app\models\Photo;

class Photos extends \yii\bootstrap\Widget
{
    public function run()
    {
        $photos = Photo::find()->where([
            'visible' => true,
        ])->orderBy('sort')->limit(8)->all();

        return $this->render('photos', ['photos' => $photos]);
    }
}

<?php

namespace app\widgets;

class Messages extends \yii\bootstrap\Widget
{
    public function run()
    {
        $messages = \app\models\Message::find()->orderBy('created_at')->all();

        return $this->render('messages', ['messages' => $messages]);
    }
}

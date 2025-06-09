<?php

namespace app\backend\components;

use app\models\Contact;
use Yii;
use yii\httpclient\Client;

class TelegramBot
{
    public static function sendMessage($model) {
        try {
            $token = Yii::$app->params['tlg_token'] ?? false;
            $chat_id = Yii::$app->params['tlg_chat_id'] ?? false;

            if($token && $chat_id){
                /** @var $model Contact */
                $client = new Client(['baseUrl' => 'https://api.telegram.org']);
                $text = '*Новая заявка*'."%0A";
                if($model->type){
                    $text .= '*Тип:* '.$model->type."%0A";
                }
                if($model->name) {
                    $text .= '*Имя:* ' . $model->name . "%0A";
                }
                if($model->phone){
                    $text .= '*Телефон:* %2B' . str_replace([" ", '(', ')','-', '+'], '', $model->phone)."%0A";
                }
                if($model->email){
                    $text .= '*E-mail:* ' . $model->email."%0A";
                }
                if($model->message){
                    $text .= '*Сообщение:* '.$model->message."%0A";
                }
                $client->get('bot'.$token.'/sendMessage?chat_id='.$chat_id.'&parse_mode=markdown&text='.$text)->send();
            } else {
                Yii::error('not found tlg_token or tlg_chat_id in config/params', 'telegram_bot');
            }
        } catch (\Exception $e) {
            Yii::error($e->getMessage(), 'telegram_bot');
        }
    }

}
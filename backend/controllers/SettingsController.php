<?php

namespace app\backend\controllers;

use app\backend\components\AdminController;
use Yii;

/**
 * NewsController implements the CRUD actions for News model.
 */
class SettingsController extends AdminController
{
    
    function actions(){
        return [
            'index' => [
                'class' => \yii2mod\settings\actions\SettingsAction::class,
                'modelClass' => \app\models\SiteSettings::class,
                'successMessage' => 'Настройки успешно обновлены',
                'saveSettings' => function($model) {
                    $model->saveFile();
                    foreach ($model->toArray() as $key => $value) {
                        if ($value === '')
                            Yii::$app->settings->remove('SiteSettings', $key);
                        else
                            Yii::$app->settings->set('SiteSettings', $key, $value);
                    }
                }
            ],
        ];
    }
    
    /**
     * Сброс кэша на фронте
     */
    public function actionFlush()
    {
        Yii::$app->cache->flush();
        return $this->redirect(Yii::$app->request->referrer ? : ['index']);
    }

}

<?php

namespace app\backend\controllers;

use Yii;
use app\models\User;
use yii\web\Controller;
use app\backend\components\AdminController; 
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\backend\components\rbac\AccessRule;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends AdminController
{
    /**
     * Updates identity
     */
    public function actionUpdateProfile()
    {
        $model = Yii::$app->user->identity;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Информация успешно обновлена');
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Updates password
     */
    public function actionUpdatePassword()
    {
        $user = Yii::$app->user->identity;
        $model = new User();
        $model->scenario = User::SCENARIO_PASSWORD;
        if ($model->load(Yii::$app->request->post())) {
            if ($user->validatePassword($model->password_old)) {
                if ($user->load(Yii::$app->request->post()) && $user->save()) {
                    Yii::$app->session->setFlash('success', 'Пароль изменен успешно');
                    return $this->refresh();
                }
            } else {
                Yii::$app->session->setFlash('warning' , 'Старый пароль неверный');
            }
        }

        return $this->render('updatePassword', [
            'model' => $user,
        ]);
    }
}

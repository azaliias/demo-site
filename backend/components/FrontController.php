<?php

namespace app\backend\components;

use Yii;
use yii\web\Controller;
use app\models\Redirect;

class FrontController extends Controller {

    function beforeAction($action) {
        $path = "/" . Yii::$app->request->getPathInfo();

        if($redirect = Redirect::find()->where(['from' => $path])->one()) {
            return $this->redirect($redirect->to, $redirect->code)->send();
        }
        
        return parent::beforeAction($action);
    }
    
}
<?php
namespace app\backend\components;

use Yii;
use yii\web\Controller;
use \yii\filters\AccessControl;
use app\backend\components\rbac\AccessRule;
use app\models\User;
use yii\filters\VerbFilter;

class AdminController extends Controller
{
    
    public $layout = 'main';
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'denyCallback' => function ($rule, $action) {
                    if(Yii::$app->user->isGuest) {
                        return $this->redirect('/admin-login');
                    }else {
                        Yii::$app->session->setFlash('warning', 'У вас нет прав на исполнение данных действий');
                        return $this->redirect(Yii::$app->request->referrer ? : ['index']);
                    }
                },
                //применять фильтр только к этим действиям
                //'only' => ['create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_MODERATOR
                        ],
                    ],
                    [
                        'allow' => true,
                        'roles' => [
                            User::ROLE_ADMIN
                        ],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
}
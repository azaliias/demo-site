<?php

namespace app\backend\controllers;

use Yii;
use app\models\SecondSlide;
use app\models\search\SslideSearch;
use app\backend\components\AdminController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SslideController implements the CRUD actions for SecondSlide model.
 */
class SslideController extends AdminController
{
    
    public function actions()
    {
        return [
            'sorting' => [
                'class' => \kotchuprik\sortable\actions\Sorting::className(),
                'query' => SecondSlide::find(),
                'orderAttribute' => 'sort',
            ],
        ];
    }

    /**
     * Lists all SecondSlide models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SslideSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Creates a new SecondSlide model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SecondSlide();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Record create success'));
            if (isset($_POST['apply']))
                return $this->redirect(['update', 'id' => $model->id]);
            elseif(isset($_POST['new']))
                return $this->redirect(['create']);
            else
                return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SecondSlide model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Record update success'));
            if (isset($_POST['apply']))
                return $this->redirect(['update', 'id' => $model->id]);
            elseif(isset($_POST['new']))
                return $this->redirect(['create']);
            else
                return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SecondSlide model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', Yii::t('app', 'Record delete success'));
        return $this->redirect(Yii::$app->request->referrer ? : ['index']);
    }

    /**
     * Finds the SecondSlide model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SecondSlide the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SecondSlide::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

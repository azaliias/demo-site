<?php

namespace app\backend\controllers;

use Yii;
use app\models\Redirect;
use app\models\search\RedirectSearch;
use app\backend\components\AdminController;
use yii\web\NotFoundHttpException;


/**
 * RedirectController implements the CRUD actions for Redirect model.
 */
class RedirectController extends AdminController
{

    /**
     * Lists all Redirect models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RedirectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Redirect model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Redirect();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
     * Updates an existing Redirect model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
     * Deletes an existing Redirect model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(Yii::$app->request->referrer ? : '/admin');
        
//        $searchModel = new RedirectSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->renderAjax('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
    }

    /**
     * Finds the Redirect model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Redirect the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Redirect::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

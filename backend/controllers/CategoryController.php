<?php

namespace app\backend\controllers;

use Yii;
use app\models\Category;
use app\models\search\CategorySearch;
use app\backend\components\AdminController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends AdminController
{
    
    public function actions()
    {
        return [
            'sorting' => [
                'class' => \kotchuprik\sortable\actions\Sorting::className(),
                'query' => Category::find(),
                'orderAttribute' => 'sort',
            ],
        ];
    }

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->searchParent(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->searchChildren($id);
        
        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->parent_id) {
                $parent = Category::findOne(['id' => $model->parent_id]);
                $model->appendTo($parent);
            }
            else {
                if (!$model->isRoot()) {
                        $model->makeRoot();
                }
            }
            $model->save();
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
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if ($model->load(Yii::$app->request->post())) {
            if ($model->parent_id) {
                $parent = Category::findOne(['id' => $model->parent_id]);
                $model->appendTo($parent);
            }
            else {
                if (!$model->isRoot()) {
                        $model->makeRoot();
                }
            }
            $model->save();
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
     * Deletes an existing Category model.
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
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

<?php

namespace app\backend\controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Yii;
use app\models\Contact;
use app\models\search\ContactSearch;
use app\backend\components\AdminController;
use yii\web\NotFoundHttpException;

/**
 * ContactController implements the CRUD actions for Contact model.
 */
class ContactController extends AdminController
{

    /**
     * Lists all Contact models.
     * @return mixed
     */
    public function actionIndex()
    {

        $id = Yii::$app->request->post('id');
        if ($id) {
            $model = Contact::findOne(['id' => $id]);
            $model->seen = (int)!$model->seen;
            $model->updateAttributes(['seen']);
        }
        
        $searchModel = new ContactSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Contact model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Deletes an existing Contact model.
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
     * Finds the Contact model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Contact the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Contact::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionReportSave()
    {
        try {
            $params = null;
            $query_params = Yii::$app->request->queryParams;
            $post = Yii::$app->request->post();
            if(isset($query_params['1']) && isset($query_params['1']['ContactSearch'])){
                $params = $query_params['1']['ContactSearch'];
            }

            $search = new ContactSearch($params);
            $keys = [
                'id' => 'ID',
                'name' => 'Имя',
                'phone' => 'Телефон',
                'email' => 'Email',
                'message' => 'Сообщение',
                'created_at' => 'Создано',
                'updated_at' => 'Обновлено'
            ];

            if($search){
                $dataProvider = $search->search($params, true);
                $columns = $post['columns'];
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setTitle('Заказы');
                $col = 'A';
                foreach ($columns as $key => $value) {
                    $ccol = $col++;
                    $sheet->setCellValue($ccol.'1', $keys[$key]);
                    $sheet->getStyle($ccol.'1')->getFont()->setBold(true);
                }

                $row = 2;
                foreach ($dataProvider->query->each() as $model){
                    $col = 'A';
                    foreach ($columns as $key => $value) {
                        if($key == 'created_at'){
                            $sheet->getCell($col++.$row)->setValue(date('d.m.Y', $model['created_at']));
                        } elseif ($key == 'updated_at') {
                            $sheet->getCell($col++.$row)->setValue(date('d.m.Y', $model['updated_at']));
                        } else {
                            $sheet->setCellValue($col++.$row, $model[$key]);
                        }
                    }
                    $row++;
                }

                $col = 'A';
                foreach ($columns as $key => $value) {
                    $sheet->getColumnDimension($col++)->setAutoSize(true);
                }

                $sheet->setAutoFilter($sheet->calculateWorksheetDimension());
                $writer = new Xlsx($spreadsheet);
                if(($params['date_from'] ?? false) && ($params['date_to'] ?? false)){
                    $name = Yii::getAlias('@webroot/uploads/report'. $params['date_from'] . '-' . $params['date_to'] . '.xlsx');
                } else {
                    $name = Yii::getAlias('@webroot/uploads/report.xlsx');
                }
                $writer->save($name);

                header('Content-Description: File Transfer');
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment; filename=' . basename($name));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($name));
                if ($fd = fopen($name, 'rb')) {
                    while (!feof($fd)) {
                        print fread($fd, 1024);
                    }
                    fclose($fd);
                }
                unlink($name);
                exit;
            }
        } catch (\Exception $e){
            Yii::$app->session->setFlash('info', 'Не удалось загрузить файл');
            Yii::error('Ошибка при создании отчета: ' . $e->getMessage() . PHP_EOL .
                "POST: " . json_encode($post, JSON_UNESCAPED_UNICODE) . PHP_EOL .
                "Params: " . json_encode($query_params, JSON_UNESCAPED_UNICODE), 'report');
            return $this->redirect(['index']);
        }
        Yii::$app->session->setFlash('info', 'Не удалось загрузить файл');
        Yii::error('Ошибка при создании отчета.' . PHP_EOL .
            "POST: " . json_encode($post, JSON_UNESCAPED_UNICODE) . PHP_EOL .
            "Params: " . json_encode($query_params, JSON_UNESCAPED_UNICODE), 'report');
        return $this->redirect(['index']);
    }
}

<?php
//$this->registerCssFile('@web/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.css', ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
//$this->registerJsFile('@web/vendor/bootstrap-datetimepicker/moment.js',['depends' => [\yii\web\JqueryAsset::className()]]);
//$this->registerJsFile('@web/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);
//$this->registerJsFile('@web/vendor/bootstrap-datetimepicker/ru.js',['depends' => [\yii\web\JqueryAsset::className()]]);

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $model app\models\search\LogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>
    
    <div class="row row-xs">
        <div class="col-xs-6">
            <?php echo $form->field($model, 'date_from')->widget(DateTimePicker::className(),[
                //'name' => 'dp_1',
                'type' => DateTimePicker::TYPE_INPUT,
                'options' => ['placeholder' => Yii::t('app', 'Date from')],
                'convertFormat' => true,
                //'value'=> date("d.m.Y h:i",(integer) $model->addtime),
                'pluginOptions' => [
                    'format' => 'dd.MM.yyyy',
                    'autoclose'=>true,
                    'weekStart'=>1, //неделя начинается с понедельника
                    'startDate' => '01.01.2019', //самая ранняя возможная дата
                    'minView' => 2,
                    'todayBtn'=>true, //снизу кнопка "сегодня"
                ],
                'pluginEvents' => [
                    'changeDate' => 'function(e) {console.log(e)}'
                ],
            ]); ?>
        </div>
        <div class="col-xs-6">
    <?php echo $form->field($model, 'date_to')->widget(DateTimePicker::className(),[
        //'name' => 'dp_1',
        'type' => DateTimePicker::TYPE_INPUT,
        'options' => ['placeholder' => Yii::t('app', 'Date to')],
        'convertFormat' => true,
        //'value'=> date("d.m.Y h:i",(integer) $model->addtime),
        'pluginOptions' => [
            'format' => 'dd.MM.yyyy',
            'autoclose'=>true,
            'weekStart'=>1, //неделя начинается с понедельника
            'startDate' => '01.01.2019', //самая ранняя возможная дата
            'minView' => 2,
            'todayBtn'=>true, //снизу кнопка "сегодня"
        ],
    ]); ?>
        </div>
    </div>

    <?= $form->field($model, 'category')->textInput(['placeholder' => Yii::t('app', 'Category')]) ?>
    
    <?php
//    echo $form->field($model, 'date_from')->widget(DateRangePicker::className(),[
//
//    'model'=>$model,
//    'attribute'=>'date_to',
//    //'useWithAddon'=>true,
//    'convertFormat'=>true,
//    'presetDropdown'=>true,
//    'hideInput'=>true,
////    'startAttribute'=>'datetime_min',
////    'endAttribute'=>'datetime_max',
//    'pluginOptions'=>[
////        'timePicker'=>true,
////        'timePickerIncrement'=>30,
//        'locale'=>[
//            'format'=>'d.m.Y'
//        ]
//    ]
//]);
    ?>


    <?php //echo $form->field($model, 'category') ?>

    <div class="form-group">
        <?= Html::submitButton('<span class="btn-label"><i class="ti-search"></i></span>' . Yii::t('app', 'Search'), ['class' => 'label-left btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Reset'), 'index', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
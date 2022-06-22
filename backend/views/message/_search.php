<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\search\ContactSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-search">

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
                'name' => 'dp_1',
                'type' => DateTimePicker::TYPE_INPUT,
                'options' => ['placeholder' => Yii::t('app', 'Date from')],
                'convertFormat' => true,
                'pluginOptions' => [
                    'format' => 'dd.MM.yyyy',
                    'autoclose'=>true,
                    'weekStart'=>1, //неделя начинается с понедельника
                    'startDate' => '01.01.2019', //самая ранняя возможная дата
                    'minView' => 2,
                    'todayBtn'=>true, //снизу кнопка "сегодня"
                ],
                'pluginEvents' => [
                    'changeDate' => 'function(e) {
                        //var datetoId = $("#contactsearch-date_to").data("krajee-datetimepicker");
                        //window[datetoId].startDate = "03.06.2019";
                    }'
                ],
            ]); ?>
        </div>
        <div class="col-xs-6">
    <?php echo $form->field($model, 'date_to')->widget(DateTimePicker::className(),[
        'name' => 'dp_2',
        'type' => DateTimePicker::TYPE_INPUT,
        'options' => ['placeholder' => Yii::t('app', 'Date to')],
        'convertFormat' => true,
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


    <?= $form->field($model, 'name')->textInput(['placeholder' => Yii::t('app', 'Name')]) ?>

    <?= $form->field($model, 'phone')->textInput(['placeholder' => Yii::t('app', 'Phone')]) ?>

    <div class="form-group">
        <?= Html::submitButton('<span class="btn-label"><i class="ti-search"></i></span>' . Yii::t('app', 'Search'), ['class' => 'label-left btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Reset'), 'index', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

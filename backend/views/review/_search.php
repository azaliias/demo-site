<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Review;

/* @var $this yii\web\View */
/* @var $model app\models\search\ReviewSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slide-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'company')->textInput(['placeholder' => Yii::t('app', 'Company')]) ?>


    <?= $form->field($model, 'visible')->dropDownList(Review::getVisibleOptions(), ['prompt' => 'Видимый/Скрытый']) ?>


    <div class="form-group">
        <?= Html::submitButton('<span class="btn-label"><i class="ti-search"></i></span>' . Yii::t('app', 'Search'), ['class' => 'label-left btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Reset'), 'index', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
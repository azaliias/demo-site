<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Redirect */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="redirect-form">

    <?php $form = ActiveForm::begin([
      'layout' => 'horizontal',
        'fieldConfig' => [
             'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-lg-2',
                'wrapper' => 'col-lg-10',
                'error' => '',
                'hint' => '',
            ],
        ],
  ]); ?>

    <?= $form->field($model, 'from')->textInput(['maxlength' => true])->hint('Относительный путь, начинающийся со знака "/". Например - "/page_old"') ?>

    <?= $form->field($model, 'to')->textInput(['maxlength' => true])->hint('Относительный путь, начинающийся со знака "/". Например - "/page_new"') ?>

    <?= $form->field($model, 'code')->dropDownList(
            app\models\Redirect::getHttpCodes()
        ) ?>

    <?= $this->render('/layouts/_formBtns') ?>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Social;

/* @var $this yii\web\View */
/* @var $model app\models\Social */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="social-form">

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

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Title')]); ?>

    <?= $form->field($model, 'type')->dropDownList(Social::getTypeOptions()); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Url')]); ?>
    <?= $form->field($model, 'visible')->dropDownList(Social::getVisibleOptions()); ?>

    <?=  $this->render('/layouts/_formBtns'); ?>

    <?php ActiveForm::end(); ?>

</div>

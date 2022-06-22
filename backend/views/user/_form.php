<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\User;

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

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Username')]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Email')]) ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <div class="pull-md-left">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary m-r-10', 'name' => '']) ?>
            </div>
            <div class="pull-md-right">
                <?= Html::a(Yii::t('app', 'Cancel'), ['index'], ['class' => 'btn btn-warning']) ?>
                    </div>
            </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

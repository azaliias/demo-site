<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Step;
use vova07\imperavi\Widget;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\Step */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="step-form">

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


    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Title')]) ?>

    <?= $form->field($model, 'content')->widget(\vova07\imperavi\Widget::className(), [
                                'settings' => [
                                    'lang' => 'ru',
                                    'minHeight' => 200,
                                    'imageUpload' => \yii\helpers\Url::to(['/admin/ajax/image-upload']),
                                    'plugins' => [
                                        'counter',
                                        'table',
                                        'video',
                                        'fontsize',
                                        'fontcolor',
                                        'fontfamily',
                                        'imagemanager',
                                        'fullscreen',
                                    ],
                                ],

                            ]); ?>


   <?= $form->field($model, 'visible')->dropDownList(
         Step::getVisibleOptions()
    ) ?>

    <?=  $this->render('/layouts/_formBtns') ?>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use vova07\imperavi\Widget;
use kartik\file\FileInput;
use app\models\Partner;

/* @var $this yii\web\View */
/* @var $model app\models\Partner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slide-form">

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
  
    <?= $form->field($model, 'link')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Link')]) ?>
    
    <?= $form->field($model, 'thumbnail')->widget(FileInput::classname(), [
            'options' => [
                        'accept' => 'image/*',
                        //'readonly' => true,
                ],
            'pluginOptions' => [
                        'showCaption' => false,
                        'showUpload' => false,
                        'showClose' => false,
                        'deleteUrl' => \yii\helpers\Url::toRoute(['/admin/ajax/delete-image?model=Partner&field=thumbnail']),
                        //'initialPreview' => ($model->thumbnail) ? Yii::getAlias('@webroot') . $model->thumbnail : false,// версия для сервера
                        'initialPreview' => ($model->thumbnail) ? : false,
                        'initialPreviewConfig' => [['key' => $model->thumbnail]],
                        'initialPreviewAsData' => true,
                        'showCancel' => false,
            ],

        ]);
    ?>

    <?= $form->field($model, 'visible')->dropDownList(
        Partner::getVisibleOptions()
    ) ?>

    <?=  $this->render('/layouts/_formBtns') ?>

    <?php ActiveForm::end(); ?>

</div>

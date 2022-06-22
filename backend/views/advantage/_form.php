<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Advantage;
use vova07\imperavi\Widget;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\Advantage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advantage-form">

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

    <?php //$form->field($model, 'content')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Content')]) ?>


    <?php /* $form->field($model, 'thumbnail')->widget(FileInput::classname(), [
            'options' => [
                        'accept' => 'image/*',
                        //'readonly' => true,
                ],
            'pluginOptions' => [
                        'showCaption' => false,
                        'showUpload' => false,
                        'showClose' => false,
                        'deleteUrl' => \yii\helpers\Url::toRoute(['/admin/ajax/delete-image?model=Slide&field=thumbnail']),
                        //'initialPreview' => ($model->thumbnail) ? Yii::getAlias('@webroot') . $model->thumbnail : false,// версия для сервера
                        'initialPreview' => ($model->thumbnail) ? : false,
                        'initialPreviewConfig' => [['key' => $model->thumbnail]],
                        'initialPreviewAsData' => true,
            ],

        ]);
     */ ?>


   <?= $form->field($model, 'visible')->dropDownList(
         Advantage::getVisibleOptions()
    ) ?>

    <?=  $this->render('/layouts/_formBtns') ?>

    <?php ActiveForm::end(); ?>

</div>

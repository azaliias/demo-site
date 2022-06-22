<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Photo;

/* @var $this yii\web\View */
/* @var $model app\models\Photo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="photos-form">

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

    <?//= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?=

    $form->field($model, 'thumbnail')->widget(\kartik\file\FileInput::classname(), [
        'options' => [
            'accept' => 'image/*',
            //'readonly' => true,
        ],
        'pluginOptions' => [
            'showCaption' => false,
            'showUpload' => false,
            'showClose' => false,
            'deleteUrl' => \yii\helpers\Url::toRoute(['/admin/ajax/delete-image?model=Photo&field=thumbnail']),
            'initialPreview' => ($model->thumbnail) ?: false,
            'initialPreviewConfig' => [['key' => $model->thumbnail]],
            'initialPreviewAsData' => true,
        ],

    ]);

    ?>

    <?= $form->field($model, 'visible')->dropDownList(\app\models\GeneralModel::getVisibleOptions()) ?>


    <?= $this->render('/layouts/_formBtns') ?>

    <?php ActiveForm::end(); ?>

</div>

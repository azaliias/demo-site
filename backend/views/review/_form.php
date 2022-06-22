<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Services;

/* @var $this yii\web\View */
/* @var $model app\models\Services */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="services-form">

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

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

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
            'deleteUrl' => \yii\helpers\Url::toRoute(['/admin/ajax/delete-image?model=Services&field=thumbnail']),
            'initialPreview' => ($model->thumbnail) ?: false,
            'initialPreviewConfig' => [['key' => $model->thumbnail]],
            'initialPreviewAsData' => true,
        ],

    ]);

    ?>

    <?= $form->field($model, 'visible')->dropDownList(\app\models\GeneralModel::getVisibleOptions()) ?>

    <hr>

    <?= $this->render('/layouts/_formBtns') ?>

    <?php ActiveForm::end(); ?>

</div>

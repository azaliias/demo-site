<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Service;

/* @var $this yii\web\View */
/* @var $model app\models\Service */
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

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true])->hint('Поле изменит ссылку, по которой сейчас находится данный объект') ?>

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

    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <a class="link link-1" onclick="$('.seo-fields').slideToggle('slow');" href="javascript://"><?php echo Yii::t('app', 'SEO fields show'); ?></a>
        </div>
    </div>

    <div class="seo-fields" style="display: none;">
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <div class="label label-danger"><?php echo Yii::t('app', 'SEO fields'); ?></div>
            </div>
        </div>

        <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'seo_keywords')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'seo_description')->textInput(['maxlength' => true]) ?>

    </div>

    <?= $this->render('/layouts/_formBtns') ?>

    <?php ActiveForm::end(); ?>

</div>

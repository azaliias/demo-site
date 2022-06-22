<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
    ]); ?>
    
        <?= $form->field($model, 'username', [
            'template' => '<div class="input-group"><span class="input-group-addon"><i class="ti-user"></i></span>{input}</div>{error}{hint}'
        ])->textInput(['autofocus' => true, 'class' => 'input-lg form-control', 'placeholder' => 'Логин']) ?>
    
        <?= $form->field($model, 'password', [
            'template' => '<div class="input-group"><span class="input-group-addon"><i class="ti-key"></i></span>{input}</div>{error}{hint}'
        ])->passwordInput(['class' => 'input-lg form-control', 'placeholder' => 'Пароль']) ?>

        <div class="form-group">
            <?= Html::submitButton('<i class="ti-unlock"></i>' . Yii::t('app', 'Login'), [
                'class' => 'btn btn-danger btn-block', 'name' => 'login-button'
                ]) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>

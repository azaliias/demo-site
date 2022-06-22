<?php

use yii\bootstrap\ActiveForm;
use app\models\User;
use yii\helpers\Html;

$this->title = 'Обновить пароль';
$this->params['breadcrumbs'][] = 'Обновить пароль';
?>
<div class="m-b-15">
	<h3 class="font-weight-bold">
		<?= $this->title ?>
	</h3>
</div>
<div class="panel panel-default">
    <div class="panel-body">

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
            <div class="hidden">
            <?php echo  $form->field($model, 'username')->hiddenInput() ?>
            </div>
            
            <?php echo  $form->field($model, 'password_old')->passwordInput(['value' => '', 'maxlength' => true, 'placeholder' => Yii::t('app', 'Old password')]) ?>
            
            <?php echo  $form->field($model, 'password')->passwordInput(['value' => '', 'maxlength' => true, 'placeholder' => Yii::t('app', 'Password')]) ?>

            <?php echo $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Repeat password')]) ?>

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

    </div>
</div>


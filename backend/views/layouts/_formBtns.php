<?php
use yii\helpers\Html;
?>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        <div class="pull-md-left">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary m-r-10', 'name' => '']) ?>
            <?= Html::submitButton(Yii::t('app', 'Apply'), ['class' => 'btn btn-success m-r-10', 'name' => 'apply']) ?>
            <?= Html::submitButton(Yii::t('app', 'Create new'), ['class' => 'btn btn-default m-r-10', 'name' => 'new']) ?>
        </div>
        <div class="pull-md-right">
            <?= Html::a(Yii::t('app', 'Cancel'), ['index'], ['class' => 'btn btn-warning']) ?>
		</div>
	</div>
</div>
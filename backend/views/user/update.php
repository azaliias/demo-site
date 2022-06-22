<?php

/* @var $this yii\web\View */
/* @var $model app\models\Redirect */

$this->title = Yii::t('app', 'Update {elem}', ['elem' => Yii::t('app', 'User')]);
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="m-b-15">
	<h3 class="font-weight-bold">
		<?= $this->title ?>
	</h3>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>


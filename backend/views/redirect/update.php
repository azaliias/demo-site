<?php

/* @var $this yii\web\View */
/* @var $model app\models\Redirect */

$this->title = Yii::t('app', 'Update {elem}', ['elem' => Yii::t('app', 'Redirect')]);
//$this->title = Yii::t('app', 'Update Redirect: ' . $model->id, [
//    'nameAttribute' => '' . $model->id,
//]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Redirects'), 'url' => ['index']];
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


<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Social */

$this->title = Yii::t('app', 'Update {elem}', ['elem' => Yii::t('app', 'Social')]);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Socials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="m-b-15">
	<h3 class="font-weight-bold">
		<?= Html::encode($this->title) ?>
	</h3>
</div>
<div class="panel panel-default">
    <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>

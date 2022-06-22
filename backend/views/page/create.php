<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Page */

$this->title = Yii::t('app', 'Create {elem}', ['elem' => Yii::t('app', 'Page')]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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

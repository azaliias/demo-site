<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Contact */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-view">

<div class="m-b-15">
    <h3 class="font-weight-bold">
        <?= Html::encode($this->title) ?>
    </h3>
</div>
    <?php

    $attributes = [
        'id',
        'name',
        'phone',
        'email',
        'message:ntext',
        'created_at:datetime',
        'updated_at:datetime',
    ];

    echo DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
    ]) ?>

</div>

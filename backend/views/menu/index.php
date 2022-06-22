<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\MenuItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Menu Items');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="m-b-15">
	<div class="row">
		<div class="col-md-6">
			<h3 class="font-weight-bold m-b-10 m-md-b-0"><?= Html::encode($this->title) ?></h3>
		</div>
		<div class="col-md-6 text-lg-right">
                    			<button class="btn btn-primary label-left toggle-search m-r-10 hidden-md hidden-lg" type="button">
				<span class="btn-label"><i class="ti-arrow-down"></i></span> <?=  Yii::t('app', 'Search') ?>
			</button>
                                            <p>
                        <?= Html::a('<span class="btn-label"><i class="ti-plus"></i></span>' . Yii::t('app', 'Create'), ['create'], ['class' => 'label-left btn btn-success']) ?>
                        </p>
		</div>
	</div>
</div>

<div class="row">
        <?php Pjax::begin(['timeout' => 3000]); ?>
    
	<div class="col-md-3 col-md-push-9">
            		<div class="hidden-xs hidden-sm" id="search-form">
			<div class="panel panel-success">
				<div class="panel-heading">Поиск</div>
				<div class="panel-body no-labels">
                                    <?=  $this->render('_search', ['model' => $searchModel]); ?>
				</div>
			</div>
		</div>
            	</div>
        <div class="col-md-9 col-md-pull-3">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout'=>"{items}\n{pager}\n{summary}",
        'rowOptions' => function ($model, $key, $index, $grid) {
            return ['data-sortable-id' => $model->id];
        },
        'columns' => [
            [
                'class' => \kotchuprik\sortable\grid\Column::className(),
                'useCdn' => true
            ],
            [
                'attribute' => 'parent_id',
                'value' => function ($model) {
                    return $model->parent ? $model->parent->title : '';
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'title',
                'value' => function ($model) {
                    return $model->children ? Html::a($model->title, Url::to(['view', 'id' => $model->id])) : $model->title;
                },
                'format' => 'raw',
            ],
            'visible:boolean',
            'link',
            [
               'class' => 'yii\grid\ActionColumn',
               'header'=>'Редакт.', 
               'contentOptions' => ['class' => 'button-column'],
               'buttonOptions' => ['class' => 'btn btn-primary btn-xs',],
               'template' => '{update}',
           ],
            [
               'class' => 'yii\grid\ActionColumn',
               'header'=>'Удалить', 
               'contentOptions' => ['class' => 'button-column'],
               'buttonOptions' => ['class' => 'btn btn-danger btn-xs',],
               'template' => '{delete}',
           ],
        ],
        'options' => [

            'data' => [
                'sortable-widget' => 1,
                'sortable-url' => \yii\helpers\Url::toRoute(['sorting']),
            ]
        ],
    ]); ?>
        </div>
    <?php Pjax::end(); ?>
</div>

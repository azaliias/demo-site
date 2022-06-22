<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Logs');
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
                        <?= Html::a('<span class="btn-label"><i class="ti-trash"></i></span>' . Yii::t('app', 'Delete all'), ['delete'], [
                            'class' => 'label-left btn btn-danger',
                            'data' => [
                                'confirm' => 'Вы уверены, что хотите удалить все записи?',
                                'method' => 'post',
                            ],
                        ]) ?>
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

        'columns' => [


            //'id',
            'level',
            'category',
            'log_time:datetime',
            //'prefix:ntext',
            //'message:ntext',
            [
                'attribute' => 'message',
                'value' => function ($model) {
                   return substr($model->message, 0, 100);
               }
            ],
            [
               'class' => 'yii\grid\ActionColumn',
               'header'=>'Просм.', 
               'contentOptions' => ['class' => 'button-column'],
               'buttonOptions' => ['class' => 'btn btn-primary btn-xs',],
               'template' => '{view}',
           ],

        ],
    ]); ?>
        </div>
    <?php Pjax::end(); ?>
</div>

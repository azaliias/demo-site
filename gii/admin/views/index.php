<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use yii\helpers\Html;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;
<?= $generator->enablePjax ? 'use yii\widgets\Pjax;' : '' ?>

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="m-b-15">
	<div class="row">
		<div class="col-md-6">
			<h3 class="font-weight-bold m-b-10 m-md-b-0"><?= "<?= " ?>Html::encode($this->title) ?></h3>
		</div>
		<div class="col-md-6 text-lg-right">
                    <?php if(!empty($generator->searchModelClass)): ?>
			<button class="btn btn-primary label-left toggle-search m-r-10 hidden-md hidden-lg" type="button">
				<span class="btn-label"><i class="ti-arrow-down"></i></span> <?= "<?= " ?> Yii::t('app', 'Search') ?>
			</button>
                    <?php endif; ?>
                        <p>
                        <?= "<?= " ?>Html::a('<span class="btn-label"><i class="ti-plus"></i></span>' . Yii::t('app', 'Create'), ['create'], ['class' => 'label-left btn btn-success']) ?>
                        </p>
		</div>
	</div>
</div>

<div class="row">
    <?= $generator->enablePjax ? "    <?php Pjax::begin(['timeout' => 3000]); ?>\n" : '' ?>
    
	<div class="col-md-3 col-md-push-9">
            <?php if(!empty($generator->searchModelClass)): ?>
		<div class="hidden-xs hidden-sm" id="search-form">
			<div class="panel panel-success">
				<div class="panel-heading">Поиск</div>
				<div class="panel-body no-labels">
                                    <?= "<?= " ?> $this->render('_search', ['model' => $searchModel]); ?>
				</div>
			</div>
		</div>
            <?php endif; ?>
	</div>
        <div class="col-md-9 col-md-pull-3">
<?php if ($generator->indexWidgetType === 'grid'): ?>
    <?= "<?= " ?>GridView::widget([
        'dataProvider' => $dataProvider,
        'layout'=>"{items}\n{pager}\n{summary}",
        'rowOptions' => function ($model, $key, $index, $grid) {
            return ['data-sortable-id' => $model->id];
        },
        <?= "'columns' => [\n"; ?>
            [
                'class' => \kotchuprik\sortable\grid\Column::className(),
                'useCdn' => false
            ],

<?php
$count = 0;
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        if (++$count < 6) {
            echo "            '" . $name . "',\n";
        } else {
            echo "            //'" . $name . "',\n";
        }
    }
} else {
    foreach ($tableSchema->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        if (++$count < 6) {
            echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        } else {
            echo "            //'" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        }
    }
}
?>
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
<?php else: ?>
    <?= "<?= " ?>ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
        },
    ]) ?>
<?php endif; ?>
        </div>
<?= $generator->enablePjax ? "    <?php Pjax::end(); ?>\n" : '' ?>
</div>

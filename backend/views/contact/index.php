<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contacts');
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    'id' => 'ID',
    'name' => 'Имя',
    'phone' => 'Телефон',
    'email' => 'Email',
    'message' => 'Сообщение',
    'created_at' => 'Создано',
    'updated_at' => 'Обновлено'
];
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

            </div>
        </div>
    </div>

    <div class="row">
        <?php Pjax::begin([
            'timeout' => 5000,
        ]); ?>

        <div class="col-md-3 col-md-push-9">
            <div class="btn-group m-b-15">
            <?php ActiveForm::begin([
                'method' => 'post',
                'action' => Url::to(['/admin/contact/report-save', Yii::$app->request->queryParams])
            ]); ?>
            <div class="btn-group">
                <button type="button" class="label-left btn btn-default dropdown-toggle" data-toggle="dropdown" title="Выбрать колонки"><span class="btn-label"><i class="ti-menu"></i><i class="caret"></i></span>
                    Колонки</button>
                <ul class="dropdown-menu kv-checkbox-list" role="menu" style="min-width: 200px;max-height: 400px;overflow-y: scroll;">
                    <?php foreach ($columns as $name => $column): ?>
                        <li>
                            <div class="checkbox">
                                <label class="" for="col<?=$name?>">
                                    <input id="col<?=$name?>" type="checkbox" class="" name="columns[<?=$name?>]" value="1" checked="" data-key="0"><?=$column?>
                                </label>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <button type="submit" class="label-left btn btn-warning" title="Скачать">
                <span class="btn-label"><i class="ti-save"></i></span>
                Скачать
            </button>
            <?php ActiveForm::end()?>
        </div>
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
                'rowOptions' => function($model, $key, $index){
                    return [
                        'class' => ($model->seen) ? '' : 'info'
                    ];
                },
                'columns' => [
                    [
                        'attribute' => 'seen',
                        'value' => function ($model) {
                            $s = Html::beginForm(Url::base(), 'post', ['data-pjax' => 1]);
                            $s .= Html::hiddenInput('id', $model->id);
                            $s .= $model->seen ? Html::submitButton('<i class="glyphicon glyphicon-ok"></i>', ['class' => 'seen-remove btn btn-default btn-xs view']) :
                                Html::submitButton('<i class="glyphicon glyphicon-unchecked"></i>', ['class' => 'seen-add btn btn-default btn-xs view']);
                            $s .= Html::endForm();
                            return $s;
                        },
                        'format' => 'raw',
                    ],
                    'name',
                    'phone',
                    'email',
                    'message:ntext',
                    'created_at:datetime',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header'=>'Просм.',
                        'contentOptions' => ['class' => 'button-column'],
                        'buttonOptions' => ['class' => 'btn btn-primary btn-xs',],
                        'template' => '{view}',
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header'=>'Удалить',
                        'contentOptions' => ['class' => 'button-column'],
                        'buttonOptions' => ['class' => 'btn btn-danger btn-xs',],
                        'template' => '{delete}',
                    ],
                ],
            ]); ?>
        </div>
        <?php Pjax::end(); ?>
    </div>

<?php

$script = <<< JS
//        $(document).on("click", ".seen-add", function () {
//                $("#w1").addClass("grid-view-loading");
//                var url = "' . Yii::app()->createUrl("admin/contact/seenAdd") . '?id=" + $(this).attr("data-id");
//                $.ajax({
//                        url: url,
//                        success:function(response){
//                                $("#contact-grid").yiiGridView("update");
//                        }
//                });
//
//                return false;
//        });
//
//        $(document).on("click", ".seen-remove", function () {
//                $("#w1").addClass("grid-view-loading");
//                var url = "' . Yii::app()->createUrl("admin/contact/seenRemove") . '?id=" + $(this).attr("data-id");
//                $.ajax({
//                        url: url,
//                        success:function(response){
//                                $("#contact-grid").yiiGridView("update");
//                        }
//                });
//
//                return false;
//        });
JS;

$this->registerJs($script, yii\web\View::POS_READY);

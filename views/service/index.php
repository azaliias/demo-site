<?php
use yii\widgets\LinkPager;
$this->title = 'Услуги';
?>

<!-- Breadcrumb-block -->
<div class="breadcrumb-block m-t-30 m-md-t-60 m-n-b-30 m-m-md-b-60">
    <div class="container">
        <ul class="breadcrumb">
            <li>
                <a href="/">Главная</a>
            </li>
            <li>
                Услуги
            </li>
        </ul>
    </div>
</div>

<!-- Services -->
<div class="services block-margin">
    <div class="container">
        <div class="text-center m-b-30 m-md-b-50">
            <h1 class="s-title title-1">Услуги</h1>
            <div class="s-sub-title title-4 text-clr font-w m-t-20 m-md-t-20">Разнообразный и богатый опыт начало повседневной работы по формированию</div>
        </div>
        <div class="f-row m-n-b-30">
            <?php foreach($posts as $item): ?>
            <div class="f-col-md-6 m-b-30 d-flex">
                <a href="<?=\yii\helpers\Url::toRoute(['service/view', 'slug' => $item->slug])?>" data-toggle="modal" class="s-item link flex-grow w-100">
                    <div class="si-img object-fit flex-grow m-r-20 m-b-20 m-sm-b-0 m-md-b-30 m-lg-b-0">
                        <?php $img = \app\models\GeneralModel::resize(500, 500, $item->thumbnail); ?>
                        <img src="<?=$img ?>" alt="">
                    </div>
                    <div class="si-content d-flex flex-grow w-100 flex-column justify-content-start">
                        <div class="sic-title title-2 w-100 m-b-10"><?=$item->title?></div>
                        <div class="sic-text flex-grow w-100"><?=$item->content?></div>
                        <div class="btn btn-lg btn-primary m-t-20 m-md-t-30 m-sm-r-auto">Подробнее</div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php if ($pages->getPageCount() > 1) : ?>
<!-- Pagination -->
<div class="pagination-block block-margin m-n-t-30 m-n-md-t-50">
    <div class="container">
        <?php echo LinkPager::widget([
            'pagination' => $pages,
            'options' => [
                'class' => 'pagination d-flex justify-content-center',
            ],
            'disabledListItemSubTagOptions' => ['tag' => 'a', 'href' => '#'],
        ]);
        ?>
    </div>
</div>
<?php endif; ?>
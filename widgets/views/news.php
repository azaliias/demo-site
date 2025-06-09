<?php
use yii\helpers\Url;
?>

<!-- News -->
<?php if($news):?>
<div class="services block-margin">
    <div class="container">
        <div class="text-center m-b-30 m-md-b-50">
            <div class="d-flex flex-column flex-sm-row flex-wrap align-items-center justify-content-center m-n-r-20">
                <div class="s-title title-1 m-r-20"><?=Yii::$app->settings->get('SiteSettings','newsTitle') ?></div>
                <a href="<?=Url::toRoute(['post/index'])?>" class="link link-all m-t-5 m-r-20">Смотреть все</a>
            </div>
            <div class="s-sub-title title-4 text-clr font-w m-t-15 m-md-t-20"><?= Yii::$app->settings->get('SiteSettings','newsText') ?></div>
        </div>
        <div class="f-row m-n-b-30">
          <?php foreach($news as $item): ?>
          <div class="f-col-md-6 m-b-30 d-flex">
          <?php  $img = \app\models\GeneralModel::resize(255, 200, $item->thumbnail); ?>
            <a href="<?=Url::toRoute(['post/view', 'slug' => $item->slug])?>" data-toggle="modal" class="s-item link flex-grow w-100">
                <div class="si-img object-fit flex-grow m-r-20 m-b-20 m-sm-b-0 m-md-b-30 m-lg-b-0">
                    <img src="<?=$img?>" alt="">
                </div>
                <div class="si-content d-flex flex-grow w-100 flex-column justify-content-start">
                    <div class="sic-title title-2 w-100 m-b-10"><?=$item->title?></div>
                    <div class="sic-text flex-grow w-100"><?=$item->content?> </div>
                    <div class="btn btn-lg btn-primary m-t-20 m-md-t-30 m-sm-r-auto">Подробнее</div>
                </div>
            </a>
          </div>
          <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif;?>
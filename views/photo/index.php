<?php
use yii\widgets\LinkPager;
$this->title = 'Фотогалерея';
?>

<!-- Breadcrumb-block -->
<div class="breadcrumb-block m-t-30 m-md-t-60 m-n-b-30 m-m-md-b-60">
    <div class="container">
        <ul class="breadcrumb">
            <li>
                <a href="/">Главная</a>
            </li>
            <li>
                <?=Yii::$app->settings->get('SiteSettings','photosTitle') ?>
            </li>
        </ul>
    </div>
</div>

  <!-- Photogallery -->
  <div class="photogallery block-margin">
    <div class="container">
      <div class="text-center m-b-30 m-md-b-50">
        <h1 class="p-title title-1"><?=Yii::$app->settings->get('SiteSettings','photosTitle') ?></h1>
        <div class="s-sub-title title-4 text-clr font-w m-t-20 m-md-t-20"><?= Yii::$app->settings->get('SiteSettings','photosText') ?></div>
      </div>
      <div class="f-row m-n-b-15 m-n-md-b-30">
        <?php foreach($photos as $item): ?>
        <div class="f-col-6 f-col-md-4 f-col-lg-3 m-b-15 m-md-b-30 d-flex">
          <a href="<?=$item->thumbnail?>" data-fancybox="gallery" class="p-item object-fit flex-grow w-100">
            <img src="<?=$item->thumbnail?>" alt="">
          </a>
        </div>
        <?php endforeach; ?>

<!-- Instagram -->
        <div class="f-col-6 f-col-md-4 f-col-lg-3 m-b-15 m-md-b-30 d-flex">
          <a href="<?=\Yii::$app->settings->get('SiteSettings', 'urlInst')?>" class="p-item p-item-link d-flex flex-column justify-content-center align-items-center w-100">
            <div class="pi-img bg-img-contain m-b-15 m-sm-b-20 m-r-auto" style="background-image: url(/images/icons/socials/ig-white.svg)"></div>
            <div class="pi-title title-5">
              Еще больше фото в Instagram
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

    
    <!-- Pagination -->
    <?php if ($pages->getPageCount() > 1) : ?>
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


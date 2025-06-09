<?php
use yii\helpers\Url;
?>

  <!-- Photogallery -->
<?php if (!empty($photos)) :?>
<div class="photogallery block-margin">
    <div class="container">
      <div class="text-center m-b-30 m-md-b-50">
        <div class="d-flex flex-column flex-sm-row flex-wrap align-items-center justify-content-center m-n-r-20">
          <div class="p-title title-1 m-r-20"><?=Yii::$app->settings->get('SiteSettings','photosTitle') ?? 'Photos'?></div>
          <a href="<?=Url::toRoute(['photo/index'])?>" class="link link-all m-t-5 m-r-20">Смотреть все</a>
        </div>
        <div class="p-sub-title title-4 text-clr font-w m-t-15 m-md-t-20"><?= Yii::$app->settings->get('SiteSettings','photosText') ?></div>
      </div>
      <div class="f-row m-n-b-15 m-n-md-b-30">
        <?php $urlInst = \Yii::$app->settings->get('SiteSettings', 'urlInst');?>
        <?php $i = 0; ?>
        <?php $c = count($photos); ?>
        <?//php echo $c; ?>
        <?php if (!empty($urlInst)): ?>
          <?php while ($i < $c) { ?>
          <?php foreach($photos as $item): ?>
          
          <div class="f-col-6 f-col-md-4 f-col-lg-3 m-b-15 m-md-b-30">
            <a href="<?=$item->thumbnail?>" data-fancybox="gallery" class="p-item object-fit w-100">
              <img src="<?=$item->thumbnail?>" alt="">
            </a>
          </div>
          <?php $i++ ?>
          <?php if ($i == 7) {
            break 2;
          } ?>
          <?php endforeach; ?>
          <?php } ?>

        <!-- Instagram -->  
        <div class="f-col-6 f-col-md-4 f-col-lg-3 m-b-15 m-md-b-30">
          <a href="<?=\Yii::$app->settings->get('SiteSettings', 'urlInst')?>" class="p-item p-item-link d-flex flex-column justify-content-center align-items-center w-100">
            <div class="pi-img bg-img-contain m-b-15 m-sm-b-20 m-r-auto" style="background-image: url(/images/icons/socials/ig-white.svg)"></div>
            <div class="pi-title title-5">
              Еще больше фото в Instagram
            </div>
          </a>
        </div>
        <?php elseif (empty($urlInst)): ?>
            <?php while ($i < $c) { ?>
          <?php foreach($photos as $item): ?>
          
          <div class="f-col-6 f-col-md-4 f-col-lg-3 m-b-15 m-md-b-30">
            <a href="<?=$item->thumbnail?>" data-fancybox="gallery" class="p-item object-fit w-100">
              <img src="<?=$item->thumbnail?>" alt="">
            </a>
          </div>

          <?php $i++ ?>
          <?php if ($i == 8) {
            break;
          } ?>
          <?php endforeach; ?>
          <?php } ?>

        <?php endif; ?>
      </div>
    </div>
  </div>
<?php endif;?>

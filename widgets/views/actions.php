<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>


<!-- Actions -->
  <div class="actions block-padding bg-clr-main">
    <div class="container">
      <div class="d-flex flex-column flex-sm-row flex-wrap align-items-center justify-content-center text-center m-n-r-20 m-b-30 m-md-b-50">
        <div class="a-title title-1 m-r-20">Акции</div>
        <a href="<?=Url::toRoute(['action/index'])?>" class="link link-all text-clr m-t-5 m-r-20">Смотреть все</a>
      </div>
      <div class="a-slider">
        <div class="overflow-hidden">
          <div class="slick-slider-alt slider-visibility slick-static">
            <?php foreach($actions as $item): ?>
              <?php  $img = \app\models\GeneralModel::resize(255, 200, $item->thumbnail); ?>
            <a href="<?=Url::to(['action/view', 'slug' => $item->slug])?>" class="a-item ss-item link">
              <div class="ai-img object-fit flex-static w-100 m-b-20">
                <img src="<?=$img?>" alt="<?=$item->title?>">
              </div>
              <div class="ai-content w-100">
                <div class="aic-title title-5"><?=$item->title?></div>
              </div>
            </a>
         <?php endforeach ?>
          </div>
        </div>
        <div class="a-controls m-t-20 m-md-t-40" style="display: none">
          <div class="slick-switches">
            <div class="d-flex justify-content-center w-100">
              <div class="ss-switch small flex-static prev"></div>
              <div class="ss-dots"></div>
              <div class="ss-switch small flex-static next"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

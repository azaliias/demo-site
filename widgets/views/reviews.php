<?php if (!empty($reviews)) :?>
  <!-- Reviews -->
  <div class="reviews block-padding bg-clr-main-transparent">
    <div class="container">
      <div class="d-flex flex-column flex-sm-row flex-wrap align-items-center justify-content-center text-center m-n-r-20 m-b-30 m-md-b-50">
        <div class="r-title title-1 m-r-20">Отзывы о нас</div>
        <a href="#" class="link link-all m-t-5 m-r-20">Смотреть все</a>
      </div>
      <div class="r-slider">
        <div class="overflow-hidden">
          <div class="slick-slider-alt slider-visibility slick-static">
            <?php foreach($reviews as $item): ?>
            <div class="r-item ss-item flex-img">
              <div class="w-100">
                <div class="f-row justify-content-center">
                  <div class="f-col-md-10 f-col-lg-8">
                    <div class="ri-img m-x-auto object-fit m-b-20 m-md-b-30">
                      <img src="<?=$item->thumbnail?>" alt="">
                    </div>
                    <div class="ri-title title-2 m-b-10"><?=$item->fio?></div>
                    <div class="ri-sub-title title-6"><?=$item->company?></div>
                    <hr class="ri-breaker">
                    <div class="ri-text">
                      <?=$item->content?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="r-controls m-t-20 m-md-t-40" style="display: none">
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
<?php endif;?>


 
  <!-- Partners -->
  <div class="partners block-padding bg-clr-secondary-transparent">
    <div class="container">
      <div class="text-center m-b-30 m-md-b-50">
        <div class="p-title title-1">Наши партнеры</div>
        <div class="p-sub-title title-4 text-clr font-w m-t-15 m-md-t-20">Разнообразный и богатый опыт начало повседневной<br> работы по формированию</div>
      </div>
      <div class="p-slider">
        <div class="overflow-hidden">
          <div class="slick-slider-alt slider-visibility slick-static">
            <?php foreach($partners as $item): ?>
            <div class="p-item ss-item flex-img">
              <img src="<?=$item->thumbnail?>" alt="">
            </div>
          <?php endforeach; ?>
          </div>
        </div>
        <div class="p-controls m-t-20 m-md-t-40" style="display: none">
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
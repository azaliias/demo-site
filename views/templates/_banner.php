  <!-- Banners -->
  <div class="banner bg-img-cover d-flex align-items-center" style="background-image: url(<?=Yii::$app->settings->get('SiteSettings', 'bannersLogo') ?? '/images/3.jpg'?>">
    <div class="container w-100">
      <div class="f-row">
        <div class="f-col-10 f-col-md-8 f-col-lg-6">
          <div class="b-title title-2 m-b-10"><?=\Yii::$app->settings->get('SiteSettings', 'bannersTitle') ?? 'Banner Title'?></div>
          <div class="b-text"><?=\Yii::$app->settings->get('SiteSettings', 'bannersText') ?? 'Content text for banner'?></div>
        </div>
      </div>
    </div>
  </div>
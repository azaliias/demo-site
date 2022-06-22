  <!-- About -->
  <?php $about = Yii::$app->settings->get('SiteSettings', 'aboutText') ?>
  <?php if (!empty($about)) :?>
  <div class="about block-margin">
    <div class="container">
      <div class="a-title title-1 text-center m-b-30 m-md-b-50"><?=Yii::$app->settings->get('SiteSettings', 'aboutTitle')?></div>
      <div class="f-row">
        <div class="f-col-lg-7">
          <div class="a-text">
            <?=Yii::$app->settings->get('SiteSettings', 'aboutText')?>
          </div>
        </div>
        <div class="f-col-lg-5 m-t-20 m-sm-t-30 m-lg-t-0">
          <div class="f-row">
            <div class="f-col-12 m-b-15 m-md-b-30">
              <div class="a-img big object-fit">
                <img src="<?=Yii::$app->settings->get('SiteSettings', 'aboutMainLogo')?>" alt="">
              </div>
            </div>
            <div class="f-col-6">
              <div class="a-img object-fit">
                <img src="<?=Yii::$app->settings->get('SiteSettings', 'aboutLogo')?>" alt="">
              </div>
            </div>
            <div class="f-col-6">
              <div class="a-img object-fit">
                <img src="<?=Yii::$app->settings->get('SiteSettings', 'aboutSecLogo')?>" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif;?>
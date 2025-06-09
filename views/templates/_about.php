  <!-- About -->
  <div class="about block-margin">
    <div class="container">
      <div class="a-title title-1 text-center m-b-30 m-md-b-50"><?=Yii::$app->settings->get('SiteSettings', 'aboutTitle') ?? 'About Title'?></div>
      <div class="f-row">
        <div class="f-col-lg-7">
          <div class="a-text">
            <?=Yii::$app->settings->get('SiteSettings', 'aboutText') ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae tristique augue. Donec blandit, lorem vel porttitor auctor, felis ipsum egestas nisi, eget porttitor sapien nisl eget purus.'?>
          </div>
        </div>
        <div class="f-col-lg-5 m-t-20 m-sm-t-30 m-lg-t-0">
          <div class="f-row">
            <div class="f-col-12 m-b-15 m-md-b-30">
              <div class="a-img big object-fit">
                <img src="<?=Yii::$app->settings->get('SiteSettings', 'aboutMainLogo') ?? '/images/8.jpg'?>" alt="">
              </div>
            </div>
            <div class="f-col-6">
              <div class="a-img object-fit">
                <img src="<?=Yii::$app->settings->get('SiteSettings', 'aboutLogo') ?? '/images/2.jpg'?>" alt="">
              </div>
            </div>
            <div class="f-col-6">
              <div class="a-img object-fit">
                <img src="<?=Yii::$app->settings->get('SiteSettings', 'aboutSecLogo') ?? '/images/3.jpg'?>" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
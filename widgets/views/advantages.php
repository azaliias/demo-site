<!-- Advantages -->
<?php if($advantages):?>
<div class="advantages block-padding bg-clr-secondary-transparent">
    <div class="container">
        <div class="a-title title-1 text-center m-b-30 m-md-b-50"><?=Yii::$app->settings->get('SiteSettings', 'advantagesTitle')?></div>
        <div class="f-row">
            <div class="f-col-md-6 d-flex">
                <ul class="a-list m-n-b-20 m-n-xl-b-30">
                    <?php foreach($advantages as $item): ?>
                    <li class="al-item m-b-20 m-xl-b-30">
                        <div class="ali-name title-2 m-b-10"><?=$item->title?></div>
                        <div class="ali-value"><?=$item->content?></div>
                    </li>
                   <?php endforeach; ?>
                </ul>
            </div>
            <div class="f-col-md-6 d-flex f-order-first f-order-md-0 m-b-20 m-md-b-0">
                <div class="a-img bg-img-cover w-100" style="background-image: url(<?=Yii::$app->settings->get('SiteSettings', 'advantagesLogo') ?? '/images/6.jpg'?>"></div>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
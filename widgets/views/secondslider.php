<!-- Second slider -->
<div class="main-slider">
    <div class="slick-slider slider-visibility">
        <?php foreach($secondslider as $item): ?>
        <?php $imgDesktop = \app\models\GeneralModel::resize(1920, 500, $item->thumbnail); ?>
        <div class="ms-slide">
            <div class="min-height-fix d-flex flex-column w-100 justify-content-center">
                <div class="mss-bg flex-static bg-img-cover dark" style="background-image: url(<?=$imgDesktop?>)"></div>
                <div class="container w-100">
                    <div class="f-row">
                        <div class="f-col-md-10 f-offset-md-1 f-col-lg-8 f-offset-lg-2">
                            <div class="mss-content">
                                <div class="mssc-title title-slide m-b-20 m-md-b-30"><?=$item->title?></div>
                                <div class="mssc-text"><?=$item->content?></div>
                                <?php if($item->link): ?>
                                <div class="m-t-30 m-md-t-60">
                                    <a href="<?=$item->link?>" data-toggle="modal" class="mssc-btn btn btn-lg btn-primary">Подробнее</a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="ms-controls" style="display: none">
        <div class="slick-switches hidden-xl-down">
            <div class="container w-100">
                <div class="d-flex justify-content-between">
                    <div class="ss-switch white prev"></div>
                    <div class="ss-switch white next"></div>
                </div>
            </div>
        </div>
        <div class="slick-switches dots w-100 d-flex justify-content-center">
            <div class="ss-dots white"></div>
        </div>
    </div>
</div>
<?php
use yii\bootstrap\Nav;
use app\models\MenuItem;
?>
<div id="top">
    <header>
        <!-- Page header -->
        <div class="page-header">
            <div class="ph-contact-info bg-clr-grey-darkest p-y-10 hidden-md-down">
                <div class="container">
                    <div class="d-flex">
                        <div class="contacts d-flex flex-wrap flex-grow m-n-b-10 w-100">
                            <div class="c-item m-r-30 m-b-10 m-xl-r-50">
                                <div class="small-icon">
                                    <div class="si-img" style="background-image: url(/images/icons/contacts/pin.svg);"></div>
                                    <div class="si-text"><?= Yii::$app->settings->get('SiteSettings', 'address'); ?></div>
                                </div>
                            </div>
                            <div class="c-item m-r-30 m-b-10 m-xl-r-50">
                                <div class="small-icon">
                                    <div class="si-img" style="background-image: url(/images/icons/contacts/mail.svg);"></div>
                                    <div class="si-text"><?= Yii::$app->settings->get('SiteSettings', 'email'); ?></div>
                                </div>
                            </div>
                            <div class="c-item m-r-30 m-b-10 m-xl-r-50">
                                <div class="small-icon">
                                    <div class="si-img" style="background-image: url(/images/icons/contacts/clock.svg);"></div>
                                    <div class="si-text"><?= Yii::$app->settings->get('SiteSettings', 'worktime'); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="socials d-flex justify-content-end flex-wrap flex-static m-n-b-10 m-n-r-20 m-n-lg-r-30">
                            <?= \app\widgets\Social::widget(['white' => true]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ph-top"></div>
            <div class="ph-bottom p-y-15 p-md-t-30 p-md-b-20">
                <div class="container">
                    <div class="d-flex align-items-center position-relative">
                        <div class="ph-logo flex-static">
                            <a href="/" class="ph-light flex-img h-100 w-100">
                                <img src="/images/logo.png" alt="">
                            </a>
                            <a href="/" class="ph-dark flex-img h-100 w-100">
                                <img src="/images/logo-dark.png" alt="">
                            </a>
                        </div>
                        <div class="d-flex align-items-center m-l-auto">
                            <div class="contacts d-flex flex-static justify-content-between justify-content-sm-end align-items-center m-md-l-30 m-lg-l-60">
                                <div class="d-flex flex-column flex-sm-row">
                                    <?php if(\Yii::$app->settings->get('SiteSettings', 'phone')):?>
                                        <div class="c-item">
                                            <a href="tel: <?= Yii::$app->settings->get('SiteSettings', 'phone'); ?>"><?= Yii::$app->settings->get('SiteSettings', 'phone'); ?></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <a href="#contact" data-toggle="modal" class="ph-call btn btn-sm btn-default m-l-20 m-lg-l-30 m-xl-l-40">Заказать звонок</a>
                            </div>
                        </div>
                        <div class="m-l-auto flex-static hidden-md-up">
                            <div class="navbar">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-block" aria-expanded="false"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main navbar -->
            <div class="main-navbar flex-lg-grow m-l-auto m-lg-l-0">
                <div class="container">
                    <nav class="navbar">
                        <div class="navbar-collapse collapse" id="main-navbar-block" aria-expanded="false">
                            <div class="navbar-block">
                                <div class="p-y-20 p-x-10 border-bottom hidden-md-up">
                                    <div class="contacts flex-grow m-n-b-10">
                                        <div class="c-item m-b-10">
                                            <div class="small-icon">
                                                <div class="si-img" style="background-image: url(/images/icons/contacts/pin.svg);"></div>
                                                <div class="si-text"><?= Yii::$app->settings->get('SiteSettings', 'address'); ?></div>
                                            </div>
                                        </div>
                                        <div class="c-item m-b-10">
                                            <div class="small-icon">
                                                <div class="si-img" style="background-image: url(/images/icons/contacts/mail.svg);"></div>
                                                <div class="si-text"><?= Yii::$app->settings->get('SiteSettings', 'email'); ?></div>
                                            </div>
                                        </div>
                                        <div class="c-item m-b-10">
                                            <div class="small-icon">
                                                <div class="si-img" style="background-image: url(/images/icons/contacts/clock.svg);"></div>
                                                <div class="si-text"><?= Yii::$app->settings->get('SiteSettings', 'worktime'); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php echo Nav::widget([
                                    'options' => ['class' => 'nav navbar-nav'],
                                    'items' => MenuItem::getMenu(true),
                                ]); ?>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

    </header>
</div>
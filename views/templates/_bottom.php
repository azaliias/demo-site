<div id="bottom">
    <!-- Contact-info -->
    <div class="contact-info type-one block-padding bg-clr-secondary-transparent">
        <div class="container">
            <div class="f-row">
                <div class="f-col-lg-8 f-order-last f-order-lg-0 d-flex">
                    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
                    <script type="text/javascript">
                        function myfunc() {
                            var placemarks = {};
                            ymaps.ready(init);
                            function init () {
                                var myMap = new ymaps.Map('map', {
                                    center: <?=\Yii::$app->settings->get('SiteSettings', 'geo')?>,
                                    zoom: 13
                                });
                                var coords = <?=\Yii::$app->settings->get('SiteSettings', 'geo')?>;
                                var baloon = new ymaps.Placemark(coords, {
                                    iconContent: 'Internet-shop',
                                    hintContent: 'Офис',
                                    balloonContent: `
                                        <div class="balloon">
                                            <div class="balloon__body">
                                                <div class="balloon__image">
                                                    <img class="m-b-10" src="/images/favicon.png" alt="">
                                                    <div>Офис продаж</div>
                                                </div>
                                                <div class="balloon-dot"></div>
                                            </div>
                                        </div>
                                    `,
                                },{
                                    iconLayout : 'default#image',
                                    iconImageHref: '/images/icons/map-marker.svg',
                                    iconImageSize: [60, 60],
                                    iconImageOffset: [-30, -60],
                                });
                                myMap.controls
                                    .remove('geolocationControl')
                                    .remove('searchControl')
                                    .remove('trafficControl')
                                    .remove('geolocation')
                                    .remove('rulerControl')
                                    .remove('zoomControl')
                                    .remove('typeSelector');
                                placemarks[coords] = baloon;
                                myMap.controls.add(new ymaps.control.ZoomControl({options: { position: { right: 10, top: 50 }}}));
                                myMap.behaviors.disable('scrollZoom');
                                myMap.geoObjects.add(baloon);

                                // Закрыть балун по клику вне области
                                myMap.events.add('click', closeBalloon);
                                function closeBalloon() {
                                    Object.values(placemarks).forEach(el => {
                                        el.balloon.close();
                                    });
                                }
                            }
                        }
                        setTimeout(myfunc, 1000);
                    </script>
                    <div id="map" class="flex-grow w-100"></div>
                </div>
                <div class="f-col-lg-4 d-flex m-b-30 m-md-b-40 m-lg-b-0">
                    <div class="ci-block flex-grow w-100">
                        <div class="ci-title title-1 m-b-30">Контакты</div>
                        <div class="overflow-hidden m-b-30">
                            <!-- Contacts -->
                            <div class="contacts m-n-r-15 m-n-md-r-30 m-n-b-20">
                                <?php if(\Yii::$app->settings->get('SiteSettings', 'phone')):?>
                                <div class="c-item m-r-15 m-md-r-30 m-b-20">
                                    <div class="small-icon">
                                        <div class="si-img" style="background-image: url(/images/icons/contacts/phone.svg);"></div>
                                        <div class="si-text"><a href="tel: <?=\Yii::$app->settings->get('SiteSettings', 'phone')?>"><?=\Yii::$app->settings->get('SiteSettings', 'phone')?></a></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if(\Yii::$app->settings->get('SiteSettings', 'address')):?>
                                <div class="c-item m-r-15 m-md-r-30 m-b-20">
                                    <div class="small-icon">
                                        <div class="si-img" style="background-image: url(/images/icons/contacts/pin.svg);"></div>
                                        <div class="si-text"><?=\Yii::$app->settings->get('SiteSettings', 'address')?></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if(\Yii::$app->settings->get('SiteSettings', 'email')):?>
                                <div class="c-item m-r-15 m-md-r-30 m-b-20">
                                    <div class="small-icon">
                                        <div class="si-img" style="background-image: url(/images/icons/contacts/mail.svg);"></div>
                                        <div class="si-text"><?=\Yii::$app->settings->get('SiteSettings', 'email')?></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if(\Yii::$app->settings->get('SiteSettings', 'worktime')):?>
                                <div class="c-item m-r-15 m-md-r-30 m-b-20">
                                    <div class="small-icon">
                                        <div class="si-img" style="background-image: url(/images/icons/contacts/clock.svg);"></div>
                                        <div class="si-text"><?=\Yii::$app->settings->get('SiteSettings', 'worktime')?></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="overflow-hidden m-b-30">
                            <a href="#contact" class="btn btn-default" data-toggle="modal">Заказать звонок</a>
                        </div>
                        <div class="overflow-hidden">
                            <!-- Socials -->
                            <div class="socials d-flex flex-wrap m-n-b-10 m-n-r-20 m-n-lg-r-30">
                                <?= \app\widgets\Social::widget(['white' => true]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact-info -->
    <div class="contact-info type-two p-y-20 p-md-y-40">
        <div class="container">
            <div class="f-row">
                <div class="f-col-md-8 f-col-xl-9">
                    <!-- Contacts -->
                    <div class="contacts d-flex flex-column flex-xl-row flex-wrap">
                        <div class="f-row m-n-b-15 flex-grow">
                            <div class="f-col-lg-4">
                                <?php if(\Yii::$app->settings->get('SiteSettings', 'phone')):?>
                                <div class="c-item m-b-15">
                                    <div class="small-icon">
                                        <div class="si-img" style="background-image: url(/images/icons/contacts/phone.svg);"></div>
                                        <div class="si-text"><a href="tel: <?=\Yii::$app->settings->get('SiteSettings', 'phone')?>"><?=\Yii::$app->settings->get('SiteSettings', 'phone')?></a></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="f-col-lg-5">
                                <?php if(\Yii::$app->settings->get('SiteSettings', 'address')):?>
                                <div class="c-item m-b-15">
                                    <div class="small-icon">
                                        <div class="si-img" style="background-image: url(/images/icons/contacts/pin.svg);"></div>
                                        <div class="si-text"><?=\Yii::$app->settings->get('SiteSettings', 'address')?></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if(\Yii::$app->settings->get('SiteSettings', 'email')):?>
                                <div class="c-item m-b-15">
                                    <div class="small-icon">
                                        <div class="si-img" style="background-image: url(/images/icons/contacts/mail.svg);"></div>
                                        <div class="si-text"><?=\Yii::$app->settings->get('SiteSettings', 'email')?></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="f-col-lg-3">
                                <?php if(\Yii::$app->settings->get('SiteSettings', 'worktime')):?>
                                <div class="c-item m-b-15">
                                    <div class="small-icon">
                                        <div class="si-img" style="background-image: url(/images/icons/contacts/clock.svg);"></div>
                                        <div class="si-text"><?=\Yii::$app->settings->get('SiteSettings', 'worktime')?></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="f-col-md-4 f-col-xl-3">
                    <hr class="ci-breaker hidden-md-up">
                    <!-- Socials -->
                    <div class="socials d-flex flex-wrap justify-content-md-end m-n-b-10 m-n-r-20 m-n-lg-r-30">
                        <?= \app\widgets\Social::widget(['white' => true]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page footer -->
    <footer class="page-footer">
        <div class="container">
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                <div class="pf-item p-y-15 p-md-y-20 m-sm-r-15">© <?=Date('Y')?> <?= str_replace(['http://', 'https://'], '', Yii::$app->request->hostInfo) ?></div>
            </div>
        </div>
    </footer>
    <!-- Scroll up button -->
    <div class="scroll-btn-block">
        <a href="#" id="back-to-top" class="show"></a>
    </div>
</div>

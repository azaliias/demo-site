<?php

use yii\bootstrap\Nav;
use yii\helpers\Html;

$controllerId = Yii::$app->controller->id;
$method = Yii::$app->controller->action->id;

?>

<div class="site-header">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <a class="collapse-button navbar-item pull-left hidden-lg hidden-md"><i class="ti-menu"></i></a>
            <a class="navbar-brand" href="/admin-login"><span
                        class="hidden-xs"><?php echo Yii::$app->name; ?></span></a>
            <div class="visible-lg visible-md">
                <?php
                echo Nav::widget([
                    'options' => ['class' => 'nav navbar-nav'],
                    'items' => [
                        [
                            'label' => Yii::t('app', 'Contacts'), 
                            'url' => '/admin/contact', 
                            'active' => ($controllerId == 'contact')
                        ],
                        [
                            'label' => 'Модули',
                            'items' => [
                                ['label' => Yii::t('app', 'Slides'), 'url' => '/admin/slide', 'active' => ($controllerId == 'slide')],
                                ['label' => Yii::t('app', 'Partners'), 'url' => '/admin/partner', 'active' => ($controllerId == 'partner')],
                                ['label' => Yii::t('app', 'Advantage'), 'url' => '/admin/advantage', 'active' => ($controllerId == 'advantage')],
                                ['label' => Yii::t('app', 'Services'), 'url' => '/admin/service', 'active' => ($controllerId == 'service')],
                                ['label' => Yii::t('app', 'Steps'), 'url' => '/admin/step', 'active' => ($controllerId == 'step')],
                                ['label' => Yii::t('app', 'Posts'), 'url' => '/admin/post', 'active' => ($controllerId == 'post')],
                                ['label' => Yii::t('app', 'Actions'), 'url' => '/admin/action', 'active' => ($controllerId == 'action')],
                                ['label' => Yii::t('app', 'Photos'), 'url' => '/admin/photo', 'active' => ($controllerId == 'photo')],
                                ['label' => Yii::t('app', 'Reviews'), 'url' => '/admin/review', 'active' => ($controllerId == 'review')],
                                ['label' => 'Социальные сети', 'url' => '/admin/social', 'active' => ($controllerId == 'social')]
                            ],
                            'active' => in_array($controllerId, [
                                'slide', 'partner', 'advantage', 'service', 'step', 'social', 'post', 'photo', 'review',
                            ])
                        ],
						['label' => Yii::t('app', 'Pages'), 'url' => '/admin/page', 'active' => ($controllerId == 'page')],
                        ['label' => Yii::t('app', 'Menu'), 'url' => '/admin/menu', 'active' => ($controllerId == 'menu')],
                    ],
                ]);
                ?>
            </div>
            <?php

            echo Nav::widget([
                'options' => ['class' => 'navbar-right nav navbar-nav'],
                'encodeLabels' => false,

                'items' => [
                    [
                        'label' => '<i class="ti-settings"></i>',
                        'active' => in_array($controllerId, ['settings', 'redirect', 'user-log', 'log']),
                        'items' => [
                            [
                                'label' => Yii::t('app', 'Settings'),
                                'url' => '/admin/settings',
                                'active' => ($controllerId == 'settings' && $method == 'index'),
                            ],
                            [
                                'label' => Yii::t('app', 'Redirects'),
                                'url' => '/admin/redirect',
                                'active' => ($controllerId == 'redirect'),
                            ],
                            '<li class="divider"></li>',
                            [
                                'label' => Yii::t('app', 'Logs'),
                                'url' => '/admin/log',
                                'active' => ($controllerId == 'log'),
                            ],
                        ]
                    ],
                    [
                        'label' => '<i class="ti-new-window"></i>',
                        'url' => Yii::$app->homeUrl,
                        'linkOptions' => array(
                            'target' => '_blank',
                            'data-toggle' => 'tooltip',
                            'data-placement' => 'bottom',
                            'data-title' => Yii::t('app', 'Go to website')
                        ),
                    ],
                    [
                        'label' => '<span class="hidden-sm hidden-xs">' . Yii::$app->user->identity->username . '</span><span class="hidden-md hidden-lg"><i class="ti-user"></i></span>',
                        'url' => '#',
                        'active' => in_array($method, array('update-profile', 'update-password')),
                        'items' => array(
                            array(
                                'label' => Yii::t('app', 'Editing profile'),
                                'url' => '/admin/user/update-profile',
                                'active' => $method === 'update-profile',
                            ),
                            array(
                                'label' => Yii::t('app', 'Changing password'),
                                'url' => '/admin/user/update-password',
                                'active' => $method === 'update-password',
                            ),
                            '<li class="divider"></li>',
                            '<li>'
                            . Html::beginForm('/user/logout', 'post', ['class' => 'logout'])
                            . Html::submitButton(
                                'Выйти',
                                ['class' => 'btn btn-link']
                            )
                            . Html::endForm()
                            . '</li>',
                        ),
                    ],
                ],
            ]);
            ?>
        </div>
    </nav>
</div>
<?php
        use yii\widgets\Menu;
	    $controllerId = Yii::$app->controller->id;
        $method = Yii::$app->controller->action->id;
?>

<div class="site-sidebar custom-scroll custom-scroll-dark">
    <?php
    echo Menu::widget([
        'options' => ['class' => 'sidebar-menu'],
        'submenuTemplate' => '<ul>{items}</ul>'."\n",
        'items' => [
            ['label' => Yii::t('app', 'Contacts'), 'url' => '/admin/contact', 'active' => ($controllerId == 'contact')],
            ['label' => Yii::t('app', 'Модули'),
                'items' => [
                    ['label' => Yii::t('app', 'Slides'), 'url' => '/admin/slide', 'active' => ($controllerId == 'slide')],
                    ['label' => Yii::t('app', 'Partners'), 'url' => '/admin/partner', 'active' => ($controllerId == 'partner')],
                    ['label' => Yii::t('app', 'Advantage'), 'url' => '/admin/advantage', 'active' => ($controllerId == 'advantage')],
                    ['label' => Yii::t('app', 'Services'), 'url' => '/admin/service', 'active' => ($controllerId == 'service')],
                    ['label' => Yii::t('app', 'Steps'), 'url' => '/admin/step', 'active' => ($controllerId == 'step')],
                    ['label' => Yii::t('app', 'News'), 'url' => '/admin/post', 'active' => ($controllerId == 'post')],
                    ['label' => Yii::t('app', 'Actions'), 'url' => '/admin/action', 'active' => ($controllerId == 'action')],
                    ['label' => Yii::t('app', 'Photos'), 'url' => '/admin/photo', 'active' => ($controllerId == 'photo')],
                    ['label' => Yii::t('app', 'Reviews'), 'url' => '/admin/review', 'active' => ($controllerId == 'review')],
                ],
                'options' => ['class'=>'with-sub'],
                'template' => '<span>{label}</span>',
            ],
			['label' => Yii::t('app', 'Pages'), 'url' => '/admin/page', 'active' => ($controllerId == 'page')],
            ['label' => Yii::t('app', 'Menu'), 'url' => '/admin/menu', 'active' => ($controllerId == 'menu')],
        ],
    ]);
    ?>

</div>
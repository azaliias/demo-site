<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use kartik\file\FileInput;

?>

<?php
$this->title = Yii::t('app', 'Settings');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="m-b-15">
    <h3 class="font-weight-bold">
        <?php echo Yii::t('app', 'Settings'); ?>
    </h3>
</div>

<div class="form">
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'id' => 'site-settings-form',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-lg-3',
                'wrapper' => 'col-lg-9',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#first" data-toggle="tab">Главная</a></li>
                <li><a href="#third" data-toggle="tab">SEO</a></li>
                <li><a href="#fourth" data-toggle="tab">SMTP</a></li>
                <li><a href="#fifth" data-toggle="tab">О компании</a></li> 
                <li><a href="#flush" data-toggle="tab">Сброс кэша</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="first">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Контактные данные
                        </div>
                        <div class="panel-body">
                            <?php
                            echo $form->field($model, 'email');
                            echo $form->field($model, 'phone');
                            echo $form->field($model, 'address');
                            echo $form->field($model, 'worktime');
                            echo $form->field($model, 'geo')->hint('Например: [54.724100, 55.946124]');
                            ?>
                        </div>
                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Почта
                        </div>
                        <div class="panel-body">
                            <?php
                            echo $form->field($model, 'sendEmailsTo')->textInput()->hint('Через запятую (без пробела), если email адресов несколько');
                            ?>
                        </div>
                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                           Преимущества
                        </div>
                        <div class="panel-body">
                            <?php
                            echo $form->field($model, 'advantagesTitle')->textInput();
                            ?>
                        </div>
                        <div class="panel-body">
                            <?= $form->field($model, 'advantagesLogo')->widget(FileInput::classname(), [
                                'options' => [
                                    'accept' => 'image/*',
                                    //'readonly' => true,
                                ],
                                'pluginOptions' => [
                                    'showCaption' => false,
                                    'showUpload' => false,
                                    'showClose' => false,
                                    'deleteUrl' => \yii\helpers\Url::toRoute(['/admin/ajax/delete-file-setting?model=SiteSettings&field=advantagesLogo']),
                                    'initialPreview' => ($model->advantagesLogo) ? : false,
                                    'initialPreviewConfig' => [['key' => $model->advantagesLogo]],
                                    'initialPreviewAsData' => true,
                                ],

                            ])->label('Преимущества');
                            ?>
                        </div>
                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                           Баннер
                        </div>
                        <div class="panel-body">
                            <?php
                            echo $form->field($model, 'bannersTitle')->textInput();
                            ?>
                        </div>
                        <div class="panel-body">
                            <?= $form->field($model, 'bannersText')->widget(\vova07\imperavi\Widget::className(), [
                                'settings' => [
                                    'lang' => 'ru',
                                    'minHeight' => 200,
                                    'imageUpload' => \yii\helpers\Url::to(['/admin/ajax/image-upload']),
                                    'plugins' => [
                                        'counter',
                                        'table',
                                        'video',
                                        'fontsize',
                                        'fontcolor',
                                        'fontfamily',
                                        'imagemanager',
                                        'fullscreen',
                                    ],
                                ],

                            ]); ?>
                        </div>                         
                        <div class="panel-body">
                            <?= $form->field($model, 'bannersLogo')->widget(FileInput::classname(), [
                                'options' => [
                                    'accept' => 'image/*',
                                    //'readonly' => true,
                                ],
                                'pluginOptions' => [
                                    'showCaption' => false,
                                    'showUpload' => false,
                                    'showClose' => false,
                                    'deleteUrl' => \yii\helpers\Url::toRoute(['/admin/ajax/delete-file-setting?model=SiteSettings&field=bannersLogo']),
                                    'initialPreview' => ($model->bannersLogo) ? : false,
                                    'initialPreviewConfig' => [['key' => $model->bannersLogo]],
                                    'initialPreviewAsData' => true,
                                ],

                            ])->label('Изображение');
                            ?>
                        </div>
                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                           Новости
                        </div>
                        <div class="panel-body">
                            <?php
                            echo $form->field($model, 'newsTitle')->textInput();
                            ?>
                        </div>
                        <div class="panel-body">
                            <?= $form->field($model, 'newsText')->widget(\vova07\imperavi\Widget::className(), [
                                'settings' => [
                                    'lang' => 'ru',
                                    'minHeight' => 200,
                                    'imageUpload' => \yii\helpers\Url::to(['/admin/ajax/image-upload']),
                                    'plugins' => [
                                        'counter',
                                        'table',
                                        'video',
                                        'fontsize',
                                        'fontcolor',
                                        'fontfamily',
                                        'imagemanager',
                                        'fullscreen',
                                    ],
                                ],

                            ]); ?>
                        </div>                         
                    </div> 

                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Фотогалерея
                        </div>
                        <div class="panel-body">
                            <?php
                            echo $form->field($model, 'photosTitle')->textInput();
                            ?>
                        </div>
                        <div class="panel-body">
                            <?= $form->field($model, 'photosText')->widget(\vova07\imperavi\Widget::className(), [
                                'settings' => [
                                    'lang' => 'ru',
                                    'minHeight' => 200,
                                    'imageUpload' => \yii\helpers\Url::to(['/admin/ajax/image-upload']),
                                    'plugins' => [
                                        'counter',
                                        'table',
                                        'video',
                                        'fontsize',
                                        'fontcolor',
                                        'fontfamily',
                                        'imagemanager',
                                        'fullscreen',
                                    ],
                                ],

                            ]); ?>
                        </div>                         
                        <div class="panel-body">
                            <?php
                            echo $form->field($model, 'urlInst')->textInput()->hint('Ссылка на Instagram');
                            ?>
                        </div>
                    </div>

                        <div class="panel panel-success">
                        <div class="panel-heading">
                           Форма обратной связи
                        </div>
                        <div class="panel-body">
                            <?php
                            echo $form->field($model, 'messagesTitle')->textInput();
                            ?>
                        </div>
                        <div class="panel-body">
                            <?= $form->field($model, 'messagesText')->widget(\vova07\imperavi\Widget::className(), [
                                'settings' => [
                                    'lang' => 'ru',
                                    'minHeight' => 200,
                                    'imageUpload' => \yii\helpers\Url::to(['/admin/ajax/image-upload']),
                                    'plugins' => [
                                        'counter',
                                        'table',
                                        'video',
                                        'fontsize',
                                        'fontcolor',
                                        'fontfamily',
                                        'imagemanager',
                                        'fullscreen',
                                    ],
                                ],

                            ]); ?>
                        </div>    
                        <div class="panel-body">
                            <?= $form->field($model, 'messagesLogo')->widget(FileInput::classname(), [
                                'options' => [
                                    'accept' => 'image/*',
                                    //'readonly' => true,
                                ],
                                'pluginOptions' => [
                                    'showCaption' => false,
                                    'showUpload' => false,
                                    'showClose' => false,
                                    'deleteUrl' => \yii\helpers\Url::toRoute(['/admin/ajax/delete-file-setting?model=SiteSettings&field=messagesLogo']),
                                    'initialPreview' => ($model->messagesLogo) ? : false,
                                    'initialPreviewConfig' => [['key' => $model->messagesLogo]],
                                    'initialPreviewAsData' => true,
                                ],

                            ])->label('Изображение');
                            ?>
                        </div>
                    </div>                     
                </div>


                <div role="tabpanel" class="tab-pane" id="third">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Главная страница
                        </div>
                        <div class="panel-body">
                            <?php
                            echo $form->field($model, 'homePageTitle');
                            echo $form->field($model, 'homePageKeywords');
                            echo $form->field($model, 'homePageDescription');
                            ?>
                        </div>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="fourth">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Отправка почты
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-9 col-lg-offset-3">
                                    <div class="alert alert-danger">
                                        Любые изменения могут повлечь сбой при отправке сообщений через обратную связь!
                                    </div>
                                </div>
                            </div>
                            <?php

                            echo $form->field($model, 'smtpHost');
                            echo $form->field($model, 'smtpPort')->textInput([
                                'type' => 'number'
                            ]);
                            echo $form->field($model, 'smtpUsername');
                            echo $form->field($model, 'smtpPassword')->passwordInput();
                            echo $form->field($model, 'smtpSecure')->dropDownList([
                                'ssl' => 'SSL',
                                'tls' => 'TLS'
                            ]);
                            echo $form->field($model, 'fromEmail');

                            ?>
                        </div>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="fifth">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            О компании
                        </div>
                        <div class="panel-body">
                            <?php
                            echo $form->field($model, 'aboutTitle')->textInput()
                            ?>
                            <?= $form->field($model, 'aboutText')->widget(\vova07\imperavi\Widget::className(), [
                                'settings' => [
                                    'lang' => 'ru',
                                    'minHeight' => 200,
                                    'imageUpload' => \yii\helpers\Url::to(['/admin/ajax/image-upload']),
                                    'plugins' => [
                                        'counter',
                                        'table',
                                        'video',
                                        'fontsize',
                                        'fontcolor',
                                        'fontfamily',
                                        'imagemanager',
                                        'fullscreen',
                                    ],
                                ],

                            ]); ?>
                            <div class="panel-body">
                            <?= $form->field($model, 'aboutMainLogo')->widget(FileInput::classname(), [
                                'options' => [
                                    'accept' => 'image/*',
                                    //'readonly' => true,
                                ],
                                'pluginOptions' => [
                                    'showCaption' => false,
                                    'showUpload' => false,
                                    'showClose' => false,
                                    'deleteUrl' => \yii\helpers\Url::toRoute(['/admin/ajax/delete-file-setting?model=SiteSettings&field=aboutMainLogo']),
                                    'initialPreview' => ($model->aboutMainLogo) ? : false,
                                    'initialPreviewConfig' => [['key' => $model->aboutMainLogo]],
                                    'initialPreviewAsData' => true,
                                ],

                            ])->label('Основное лого');
                            ?>
                            <?= $form->field($model, 'aboutLogo')->widget(FileInput::classname(), [
                                'options' => [
                                    'accept' => 'image/*',
                                    //'readonly' => true,
                                ],
                                'pluginOptions' => [
                                    'showCaption' => false,
                                    'showUpload' => false,
                                    'showClose' => false,
                                    'deleteUrl' => \yii\helpers\Url::toRoute(['/admin/ajax/delete-file-setting?model=SiteSettings&field=aboutLogo']),
                                    'initialPreview' => ($model->aboutLogo) ? : false,
                                    'initialPreviewConfig' => [['key' => $model->aboutLogo]],
                                    'initialPreviewAsData' => true,
                                ],

                            ])->label('1-ое лого');
                            ?>
                            <?= $form->field($model, 'aboutSecLogo')->widget(FileInput::classname(), [
                                'options' => [
                                    'accept' => 'image/*',
                                    //'readonly' => true,
                                ],
                                'pluginOptions' => [
                                    'showCaption' => false,
                                    'showUpload' => false,
                                    'showClose' => false,
                                    'deleteUrl' => \yii\helpers\Url::toRoute(['/admin/ajax/delete-file-setting?model=SiteSettings&field=aboutSecLogo']),
                                    'initialPreview' => ($model->aboutSecLogo) ? : false,
                                    'initialPreviewConfig' => [['key' => $model->aboutSecLogo]],
                                    'initialPreviewAsData' => true,
                                ],

                            ])->label('2-ое лого');
                            ?>
                        </div>
                        </div>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="flush">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Сброс кэша
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-9 col-lg-offset-3">
                                    <div class="alert alert-danger">
                                            Сброс кэша может повлиять на скорость работы сайта и отображение закэшированных элементов
                                    </div>
                                    <?= Html::a('Сбросить кэш', ['flush'], ['class' => 'btn btn-warning']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
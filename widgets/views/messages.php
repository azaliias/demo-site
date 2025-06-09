<?php

use yii\widgets\ActiveForm;
$model = new app\models\MessageForm();
?>
<!-- Contact form -->
  <div class="contact-form block-margin">
    <div class="container">
      <div class="f-row">
        <div class="f-col-lg-6">
          <div class="m-b-30 m-md-b-50">
            <div class="cf-title title-2 text-center m-b-10"><?=Yii::$app->settings->get('SiteSettings', 'messagesTitle')?></div>
            <div class="cf-text"><?=Yii::$app->settings->get('SiteSettings', 'messagesText')?></div>
          </div>
            <?php $form = ActiveForm::begin([
                'id' => 'message-form',
                'action' => '/email/message',
                'class' => 'no-labels'
            ]); ?>
            <div class="f-row">
                <div class="f-col-md-6">
                <?= $form->field($model, 'name')->textInput(['placeholder' => 'Введите ваше имя'])->label('Ваше имя') ?>
                </div>
              <div class="f-col-md-6">
                  <?= $form->field($model, 'phone', ['options' => ['class' => 'form-group phone-mask-label']])
                      ->textInput(['placeholder' => '+7 (___) ___-__-__', 'class' => 'form-control phone-mask'])->label('Ваш телефон') ?>

              </div>
              <div class="f-col-12">
                  <?= $form->field($model, 'message')->textarea(['placeholder' => 'Ваше сообщение'])->label('Ваше сообщение') ?>
              </div>
              <div class="f-col-sm-8">
                  <?= $form->field($model, 'agree', [
                      'options' => ['class' => 'form-group m-sm-b-0',],
                      'template' => '<div class="custom-checkbox d-flex w-100 m-sm-t-10">
                                    {input}
                                    <label class="box-label form-note" for="messageform-agree">
                                    Нажимая кнопку «Оставить заявку», Вы принимаете условия <object><a href="/page/politika-konfidencialnosti">политики конфиденциальности</a></object>
                                    </label>
                                    {error}
                                    </div>',
                      'inputOptions' => ['type' => 'checkbox'],
                  ])->checkbox([], false)->label(false); ?>
              </div>
              <div class="f-col-sm-4">
                <div class="form-group m-b-0">
                  <button type="submit" class="btn btn-lg btn-primary submit-btn w-100 p-x-20">Оставить заявку</button>
                </div>
              </div>
            </div>
          <?php ActiveForm::end(); ?>
        </div>
        <div class="f-col-lg-6 m-t-20 m-sm-t-30 m-lg-t-0">
          <div class="cf-img bg-img-cover" style="background-image: url(<?=Yii::$app->settings->get('SiteSettings', 'messagesLogo')?>"></div>
        </div>
      </div>
    </div>
  </div>
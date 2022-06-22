<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    
//    $model = new app\models\Contact();
    $model = new app\models\ContactFormModal();
?>

<!-- Contact form button -->
<a href="#contact" data-toggle="modal" class="contact-form-button"></a>

<!-- Modal contact -->
<div class="modal fade" id="contact" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span><i class="ion-ios-close-empty"></i></span></button>
        <div class="title-2 text-center" id="contactLabel">Оставьте заявку на обратный звонок</div>
      </div>
      <div class="modal-body no-labels">
        <?php $form = ActiveForm::begin([
                'id' => 'contact-form-modal',
                'action' => '/email/index',
            ]); ?>
          
            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Введите ваше имя']) ?>

            <?= $form->field($model, 'phone', ['options' => ['class' => 'form-group phone-mask-label']])
                    ->textInput(['placeholder' => '+7 (   )', 'class' => 'form-control phone-mask',]) ?>

            <?= $form->field($model, 'message')->textarea(['placeholder' => 'Оставьте ваше сообщение']) ?>
            
            <?= $form->field($model, 'check', ['options' => ['class' => 'hidden']]) ?>
            
          <div class="form-group m-b-30">
            <div class="modal-note">Нажимая «Отправить», Вы принимаете условия <a href="/page/politika-konfidencialnosti">политики конфиденциальности</a></div>
          </div>
          <div class="text-center modal-submit">
            <?php echo Html::submitButton('<span>Отправить</span>', ['class' => 'btn btn-default']) ?>
          </div>
        <?php ActiveForm::end(); ?>
      </div>
    </div>
  </div>
</div>

<?php
$script = <<< JS
    $("#contactformmodal-check").val('14');
JS;
$this->registerJs($script);
?>
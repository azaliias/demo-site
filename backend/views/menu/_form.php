<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\MenuItem;

/* @var $this yii\web\View */
/* @var $model app\models\MenuItem */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="menu-item-form">

        <?php
        $types = MenuItem::getTypes();
        $typeItems = [];
        foreach ($types as $key => $one) {
            $typeItems[$key] = $one['title'];
        }
        ?>

        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                'horizontalCssClasses' => [
                    'label' => 'col-lg-2',
                    'wrapper' => 'col-lg-10',
                    'error' => '',
                    'hint' => '',
                ],
            ],
        ]); ?>

        <?= $form->field($model, 'parent_id')->dropDownList($model->getItemsListWithoutMe(), ['prompt' => 'Выберите родительский элемент']) ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Title')]) ?>

        <?= $form->field($model, 'type')->dropDownList($typeItems) ?>

        <?php foreach ($types as $key => $one) : ?>
            <?php if ($one['values']) : ?>
                <div class="form-group" style="display:none;" id="menu-<?= $key; ?>">
                    <div class="col-lg-10 col-lg-offset-2">
                        <?php echo Html::listBox('slug', NULL, $one['values'], ['class' => 'form-control select-links']); ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

        <?= $form->field($model, 'visible')->dropDownList(MenuItem::getVisibleOptions()) ?>


        <?= $form->field($model, 'link')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Link')]) ?>

        <?= $this->render('/layouts/_formBtns') ?>

        <?php ActiveForm::end(); ?>

    </div>

<?php

$script = <<< JS
    $('#menuitem-type').change(function(){
        
        $('[id^="menu-"]').each(function(){
            $(this).hide();
            $(this).find('select option').prop("selected", false);
        })
        
        var blockName = '#menu-' + $(this).val();
        var block = $(blockName);
        if (block.length) {
            block.show();
        }else {
            $('#menuitem-link').val('/' + $(this).val());
        }
    });
        
    $('.select-links').change(function(){
        $('#menuitem-link').val('/' + $('#menuitem-type').val() + '/' + $(this).val());
   });
        
    $('#menuitem-type').change(function(){
        if ($(this).val()) {
            $('#menuitem-link').prop('readonly', true);
        }else {
            $('#menuitem-link').prop('readonly', false);
        }
   });
JS;

$this->registerJs($script, yii\web\View::POS_READY);

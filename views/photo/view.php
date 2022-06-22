<?php
$this->title = $model->seo_title ? $model->seo_title : $model->title;
if ($model->seo_keywords) $this->registerMetaTag(['name' => 'keywords', 'content' => $model->seo_keywords]);
if ($model->seo_description) $this->registerMetaTag(['name' => 'description', 'content' => $model->seo_description]);
?>

<!-- Breadcrumb-block -->
<div class="breadcrumb-block m-t-30 m-md-t-60 m-n-b-30 m-m-md-b-60">
    <div class="container">
        <ul class="breadcrumb">
            <li>
                <a href="/">Главная</a>
            </li>
            <li>
              <a href="<?=\yii\helpers\Url::toRoute(['photo/index'])?>">Фотогалерея</a>
            </li>
            <li><?=$model->title?></li>
        </ul>
    </div>
</div>

<!-- Text block -->
<div class="text-block p-y-30 p-sm-y-60">
    <div class="container">
        <h1 class="tb-title title-1 m-b-30"><?= $model->title; ?></h1>
        <div class="tb-content">
            <?= $model->body; ?>
        </div>
    </div>
</div>


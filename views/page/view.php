<?php
$this->title = $model->seo_title ? $model->seo_title : $model->title;
if ($model->seo_keywords) $this->registerMetaTag(['name' => 'keywords', 'content' => $model->seo_keywords]);
if ($model->seo_description) $this->registerMetaTag(['name' => 'description', 'content' => $model->seo_description]);
?>

<!-- Text block -->
<div class="text-block p-y-30 p-sm-y-60">
    <div class="container">
        <h1 class="tb-title title-1 m-b-30"><?= $model->title; ?></h1>
        <div class="tb-content">
            <?= $model->content; ?>
        </div>
    </div>
</div>

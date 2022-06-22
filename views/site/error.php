<?php
use yii\helpers\Html;

$this->title = $name;
?>

<!-- Error -->
<div class="text-block m-y-30 m-md-y-60">
    <div class="container">
        <h1 class="tb-title title-1 m-b-20 m-md-b-30">Ошибка <?php echo $exception->statusCode ?></h1>
        <div class="tb-content">
            <p><?php echo Html::encode($message); ?>.</p>
            <div class="m-t-20 m-md-t-30">
                <a href="/" class="btn btn-primary">Перейти на главную</a>
            </div>
        </div>
    </div>
</div>
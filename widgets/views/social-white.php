<?php
if ($social) {
    foreach ($social as $item) {
        ?>
        <a target="_blank" href="<?= $item->url ?>" class="s-item m-r-20 m-lg-r-30 m-b-10"
           style="background-image: url(<?= $item->getWhiteIconUrl() ?>)"></a>
        <?php
    }
}
?>


<!-- Steps -->
<?php if (!empty($steps)) :?>
<div class="steps block-margin">
    <div class="container">
      <div class="a-title title-1 text-center m-b-30 m-md-b-50">Как мы работаем</div>

      <div class="f-row m-n-b-20 m-n-md-b-30">
        <?php $i = 1; ?>
        <?php foreach($steps as $item): ?>
        <div class="f-col-sm-6 f-col-lg-4 m-b-20 m-md-b-30">
          <div class="s-item d-flex flex-column flex-md-row">
            <div class="si-number flex-static m-r-15 m-ms-r-20">0<?=$i?></div>
            <div class="si-content flex-grow w-100">
              <div class="sic-title title-2 m-b-10"><?=$item->title?></div>
              <div class="sic-text"><?=$item->content?></div>
            </div>
          </div>
        </div>
        <?php $i++ ?>
        <?php endforeach; ?>
      </div>
    </div>
</div>
<?php endif;?>


 
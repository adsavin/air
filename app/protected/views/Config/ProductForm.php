<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-info" style="margin: 10px">
  <div class="panel-heading"><?php echo Yii::t('lang', 'product'); ?></div>
  <div class="panel-body">

    <ul class="nav nav-tabs" role="tablist">
      <?php if (!empty($_GET['id'])): ?>
      <li class="active">
        <a href="#productInfo" role="tab" data-toggle="tab"><?php echo Yii::t('lang', 'product_info'); ?></a>
      </li>
      <li><a href="#profile" role="tab" data-toggle="tab"><?php echo Yii::t('lang', 'price'); ?></a></li>
      <li><a href="#priceByBarCode" role="tab" data-toggle="tab"><?php echo Yii::t('lang', 'price_discrimination_based_on_barcodes'); ?></a></li>
      <li><a href="#printBarCode" role="tab" data-toggle="tab"><?php echo Yii::t('lang', 'barcode_printing'); ?></a></li>
      <li><a href="#messages" role="tab" data-toggle="tab"><?php echo Yii::t('lang', 'product_images'); ?></a></li>
      <?php endif; ?>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="productInfo">
        <?php 
        $this->renderPartial("//Config/_ProductInfo", array(
          "model" => $model,
          "default_product_expire" => $default_product_expire,
          "default_product_sale_condition" => $default_product_sale_condition,
          "default_product_return" => $default_product_return
        )); ?>
      </div>

      <?php if (!empty($_GET['id'])): ?>
      <div class="tab-pane" id="profile">
        <?php $this->renderPartial("//Config/_ProductPrice"); ?>
      </div>
      <div class="tab-pane" id="messages">...</div>
      <div class="tab-pane" id="priceByBarCode">
        <?php $this->renderPartial("//Config/_ProductPriceByBarCode", array(
          'barcodePrices' => $barcodePrices
        )); ?>
      </div>
      <div class="tab-pane" id="printBarCode">
        <?php $this->renderPartial('//Config/_ProductBarcode'); ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 850px">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo Yii::t('lang', 'category'); ?></h4>
      </div>
      <div class="modal-body" id="dialogGroupProduct">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">
          <i class="glyphicon glyphicon-remove"></i>
          Close
        </button>
      </div>
    </div>
  </div>
</div>

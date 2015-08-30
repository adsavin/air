<?php $this->renderPartial('//Config/SetLanguage'); ?>

<script>
  function saveProductPriceBarcode() {
    $("#ProductPriceByBarCode_code").val($("#Product_product_code").val());
    var barcode_fk = $("#ProductPriceByBarCode_code").val();

    if (barcode_fk != "") {
      $.ajax({
        url: 'index.php?r=Config/SaveProductPriceBarCode',
        type: 'POST',
        data: $("#formPriceBarCode").serialize(),
        success: function(data) {
          if (data == 'success') {
            alert("บันทึกรายการแล้ว");
            window.location.href = 'index.php?r=Config/ProductForm'
          }
        }
      });
    } else {
      alert("<?php echo Yii::t('lang', 'please_set_the_barcode_goods'); ?>");
    }
  }
</script>

<div class="alert alert-danger" style="margin-top: 10px">
  <div><i class="glyphicon glyphicon-question-sign"></i> <?php echo Yii::t('lang', 'in_the_case_of_multi_level_sellers'); ?></div>
  <div><i class="glyphicon glyphicon-question-sign"></i> <?php echo Yii::t('lang', 'starting_from_pac_code_onwards'); ?></div>
</div>

<form id="formPriceBarCode">
  <input type="hidden" id="ProductPriceByBarCode_code" name="product_code" />

  <table style="margin-top: 10px" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th width="50px"><?php echo Yii::t('lang', 'sequence'); ?></th>
        <th width="150px"><?php echo Yii::t('lang', 'barcode'); ?></th>
        <th width="120px"><?php echo Yii::t('lang', 'cost_price'); ?></th>
        <th width="120px"><?php echo Yii::t('lang', 'price'); ?></th>
        <th width="180px"><?php echo Yii::t('lang', 'nickname_crates_packages_dozen'); ?></th>
        <th><?php echo Yii::t('lang', 'the_amount_to_be_cut_with_the_sec'); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($barcodePrices)): ?>
        <?php for ($i = 0; $i < 20; $i++): ?>
        <tr>
          <td><?php echo $i + 1; ?></td>
          <td><input type="text" name="barcode[]" class="form-control" /></td>
          <td><input type="text" name="price_before[]" class="form-control" /></td>
          <td><input type="text" name="price[]" class="form-control" style="width: 100px; text-align: right" /></td>
          <td><input type="text" name="name[]" class="form-control" style="width: 180px" /></td>
          <td><input type="text" name="qty[]" class="form-control" style="width: 100px; text-align: right" /></td>
        </tr>
        <?php endfor; ?>
      <?php else: ?>
        <?php $i = 1; ?>
        <?php foreach ($barcodePrices as $barcodePrice): ?>
        <tr>
          <td><?php echo $i++; ?></td>
          <td><input type="text" name="barcode[]" value="<?php echo $barcodePrice->barcode; ?>" class="form-control" /></td>
          <td><input type="text" name="price_before[]" value="<?php echo $barcodePrice->price_before; ?>" class="form-control" />
          <td><input type="text" name="price[]" value="<?php echo $barcodePrice->price; ?>" class="form-control" style="width: 100px; text-align: right" /></td>
          <td><input type="text" name="name[]" value="<?php echo $barcodePrice->name; ?>" class="form-control" style="width: 180px" /></td>
          <td><input type="text" name="qty[]" value="<?php echo $barcodePrice->qty_sub_stock; ?>" class="form-control" style="width: 100px; text-align: right" /></td>
        </tr>
        <?php endforeach; ?>

        <!-- Add empty row -->
        <?php $size = count($barcodePrices); ?>
        <?php for ($i = $size + 1; $i <= 20; $i++): ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><input type="text" name="barcode[]" class="form-control" /></td>
          <td><input type="text" name="price_before[]" class="form-control" style="width: 100px" /></td>
          <td><input type="text" name="price[]" class="form-control" style="width: 100px; text-align: right" /></td>
          <td><input type="text" name="name[]" class="form-control" style="width: 180px" /></td>
          <td><input type="text" name="qty[]" class="form-control" style="width: 100px; text-align: right" /></td>
        </tr>
        <?php endfor; ?>
      <?php endif; ?>
    </tbody>
  </table>
</form>

<a href="#" onclick="saveProductPriceBarcode()" class="btn btn-info">
  <b class="glyphicon glyphicon-floppy-disk"></b>
  <?php echo Yii::t('lang', 'save'); ?>
</a>
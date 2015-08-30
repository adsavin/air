<?php $this->renderPartial('//Config/SetLanguage'); ?>

<script>
  function arPay(bill_sale_id) {
    if (confirm('<?php echo Yii::t("lang", "confirm_save"); ?>')) {
      $.ajax({
        url: 'index.php?r=Report/ArPay',
        data: {
          bill_sale_id: bill_sale_id
        },
        success: function(data) {
          if (data == 'success') {
            alert('<?php echo Yii::t("lang", "save_list"); ?>');
            location.reload();
          }
        }
      });
    }
  }
</script>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th width="45px" style="text-align: right"><?php echo Yii::t('lang', 'sequence'); ?></th>
      <th><?php echo Yii::t('lang', 'list'); ?></th>
      <th width="100px" style="text-align: right"><?php echo Yii::t('lang', 'number'); ?></th>
      <th width="100px" style="text-align: right"><?php echo Yii::t('lang', 'price'); ?></th>
      <th width="120px" style="text-align: right"><?php echo Yii::t('lang', 'total'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($billSaleDetails as $billSaleDetail): ?>
    <?php 
    $sum_row = ($billSaleDetail->bill_sale_detail_qty * $billSaleDetail->bill_sale_detail_price); 
    $sum += $sum_row;
    ?>
    <tr>
      <td style="text-align: right"><?php echo $n++; ?></td>
      <td><?php echo $billSaleDetail->product->product_name; ?></td>
      <td style="text-align: right">
        <?php echo number_format($billSaleDetail->bill_sale_detail_qty, 2); ?>
      </td>
      <td style="text-align: right">
        <?php echo number_format($billSaleDetail->bill_sale_detail_price, 2); ?>
      </td>
      <td style="text-align: right">
        <?php echo number_format($sum_row, 2); ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="4">รวม</td>
      <td style="text-align: right">
        <?php echo number_format($sum, 2); ?>
      </td>
    </tr>
  </tfoot>
</table>

<center>
  <a href="javascript:void(0)" class="btn btn-info" onclick="arPay(<?php echo $bill_sale_id; ?>)">
    <i class="glyphicon glyphicon-ok"></i>
    <?php echo Yii::t('lang', 'paid'); ?>
  </a>
</center>
<br />
<br />
<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-info" style="margin: 10px">
  <div class="panel-heading"><?php echo Yii::t('lang', 'sales_report'); ?></div>
  <div class="panel-body">
    <form class="form-inline">
      <div>
        <label><?php echo Yii::t('lang', 'member_code'); ?></label>
        <input type="text" value="<?php echo $member->member_code; ?>" class="form-control disabled" disabled="disabled" style="width: 100px" />
      
        <label style="width: 50px"><?php echo Yii::t('lang', 'name'); ?></label>
        <input type="text" value="<?php echo $member->member_name; ?>" class="form-control disabled" disabled="disabled" style="width: 300px" />

        <label style="width: 50px"><?php echo Yii::t('lang', 'year'); ?></label>
        <input type="text" value="<?php echo $year ?>" class="form-control disabled" disabled="disabled" style="width: 100px" />
      </div>
    </form>

    <table style="margin-top: 10px" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th width="40px" style="text-align: right">#</th>
          <th width="200px"><?php echo Yii::t('lang', 'product_code'); ?></th>
          <th><?php echo Yii::t('lang', 'list'); ?></th>
          <th width="90px" style="text-align: right"><?php echo Yii::t('lang', 'price'); ?></th>
          <th width="80px" style="text-align: right"><?php echo Yii::t('lang', 'number'); ?></th>
          <th width="100px" style="text-align: right"><?php echo Yii::t('lang', 'sum'); ?></th>
          <th width="140px" style="text-align: center"><?php echo Yii::t('lang', 'date'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($billSaleDetails as $billSaleDetail): ?>
        <?php
        $sum_row = $billSaleDetail['bill_sale_detail_price'] * $billSaleDetail['bill_sale_detail_qty'];
        $sum += $sum_row;
        $sumQty += $billSaleDetail['bill_sale_detail_qty'];
        ?>
        <tr>
          <td style="text-align: right"><?php echo $n++; ?></td>
          <td><?php echo $billSaleDetail['bill_sale_detail_barcode']; ?></td>
          <td><?php echo $billSaleDetail['product_name']; ?></td>
          <td style="text-align: right"><?php echo number_format($billSaleDetail['bill_sale_detail_price'], 2); ?></td>
          <td style="text-align: right"><?php echo number_format($billSaleDetail['bill_sale_detail_qty'], 2); ?></td>
          <td style="text-align: right"><?php echo number_format($sum_row, 2); ?></td>
          <td style="text-align: center"><?php echo Util::mysqlToThaiDate($billSaleDetail['bill_sale_pay_date']); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4"><strong><?php echo Yii::t('lang', 'sum'); ?></strong></td>
          <td style="text-align: right">
            <?php echo number_format($sumQty, 2); ?>
          </td>
          <td style="text-align: right">
            <?php echo number_format($sum, 2); ?>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-info" style="margin: 10px">
  <div class="panel-heading"><?php echo Yii::t('lang', 'reported_earnings_loss'); ?></div>
  <div class="panel-body">
    <div class="pull-left">
      <!-- form -->
      <form style="margin-bottom: 10px" method="post" name="formReportIncome">
        <label style="width: 50px"><?php echo Yii::t('lang', 'by_date'); ?></label>
        <input type="text" name="from" value="<?php echo $from; ?>" class="form-control datepicker" style="width: 100px" />

        <label style="width: 50px"><?php echo Yii::t('lang', 'up_to_date'); ?></label>
        <input type="text" name="to" value="<?php echo $to; ?>" class="form-control datepicker" style="width: 100px" />

        <a href="#" onclick="document.formReportIncome.submit()" class="btn btn-info">
          <?php echo Yii::t('lang', 'show_report'); ?>
        </a>
      </form>
    </div>
    <div class="pull-right">
      <strong style="font-size: 16px"><?php echo Yii::t('lang', 'income'); ?></strong>
      <span class="label label-primary" id="lblIncome" style="font-size: 16px">0.00</span>

      <strong style="margin-left: 20px; font-size: 16px"><?php echo Yii::t('lang', 'expenses'); ?></strong>
      <span class="label label-danger" id="lblPay" style="font-size: 16px">0.00</span>

      <strong style="margin-left: 20px; font-size: 16px" id="lblBonusText"><?php echo Yii::t('lang', 'profit'); ?></strong>
      <span class="label label-success" id="lblBonus" style="font-size: 16px">0.00</span>
    </div>
    <div class="clearfix"></div>

    <!-- รายได้ -->
    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-success">
          <div class="panel-heading">
            <i class="glyphicon glyphicon-plus"></i>
            <?php echo Yii::t('lang', 'income'); ?>
          </div>
          <div class="">
            <?php if (!empty($billSaleDetails)): ?>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="40px" style="text-align: right">#</th>
                  <th><?php echo Yii::t('lang', 'list'); ?></th>
                  <th width="130px" style="text-align: center"><?php echo Yii::t('lang', 'date'); ?></th>
                  <th width="70px" style="text-align: right"><?php echo Yii::t('lang', 'price'); ?></th>
                  <th width="80px" style="text-align: right"><?php echo Yii::t('lang', 'sum'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($billSaleDetails as $billSaleDetail): ?>
                <?php
                $price = $billSaleDetail['bill_sale_detail_price'];
                $qty = $billSaleDetail['bill_sale_detail_qty'];
                $total_price_in_row = ($price * $qty);
                $sumInput += $total_price_in_row;
                ?>
                <tr>
                  <td style="text-align: right">
                    <?php echo $n++; ?>
                  </td>
                  <td>
                    <?php 
                    $barcodePrice = BarcodePrice::model()->findByAttributes(array(
                      'barcode' => $billSaleDetail['bill_sale_detail_barcode']
                    ));

                    if (!empty($barcodePrice)) {
                      $product_name = $barcodePrice->product->product_name.' - '.$barcodePrice->name.' ('.$barcodePrice->qty_sub_stock.')';
                    } else {
                      $product_name = $billSaleDetail['product_name'];
                    }
                    ?>
                    <?php echo $product_name; ?>
                  </td>
                  <td style="text-align: center">
                    <?php echo Util::mysqlToThaiDate($billSaleDetail['bill_sale_pay_date']); ?>
                  </td>
                  <td style="text-align: right">
                    <?php echo $price; ?>
                    x
                    <?php echo $qty; ?>
                  </td>
                  <td style="text-align: right">
                    <?php echo number_format($total_price_in_row, 2); ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="4"><strong>รวม</strong></td>
                  <td style="text-align: right">
                    <?php echo number_format($sumInput, 2); ?>
                  </td>
                </tr>
              </tfoot>
            </table>
            <?php else: ?>
            <div style="padding: 20px">
              <h4><?php echo Yii::t('lang', 'no_information'); ?></h4>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- ค่าใช้จ่าย -->
      <div class="col-md-6">
        <div class="panel panel-danger">
          <div class="panel-heading">
            <i class="glyphicon glyphicon-minus"></i>
            <?php echo Yii::t('lang', 'expenses'); ?>
          </div>
          <div class="">
            <?php if (!empty($pays)): ?>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="40px" style="text-align: right">#</th>
                  <th><?php echo Yii::t('lang', 'list'); ?></th>
                  <th width="100px" style="text-align: center"><?php echo Yii::t('lang', 'date'); ?></th>
                  <th width="80px" style="text-align: right"><?php echo Yii::t('lang', 'amount_of_money'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($pays as $pay): ?>
                <tr>
                  <td style="text-align: right"><?php echo $nPay++; ?></td>
                  <td><?php echo $pay['name']; ?></td>
                  <td style="text-align: center">
                    <?php echo Util::mysqlToThaiDate($pay['created_at']); ?>
                  </td>
                  <td style="text-align: right">
                    <?php echo number_format($pay['price'], 2); ?>
                  </td>
                </tr>
                <?php $sumPay += $pay['price']; ?>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="3"><strong>รวม</strong></td>
                  <td style="text-align: right">
                    <?php echo number_format($sumPay, 2); ?>
                  </td>
                </tr>
              </tfoot>
            </table>
            <?php else: ?>
            <div style="padding: 20px">
              <h4><?php echo Yii::t('lang', 'no_information'); ?></h4>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $bonus = ($sumInput - $sumPay); ?>

<script>
  $(function() {
    $('#lblIncome').text('<?php echo number_format($sumInput, 2); ?>');
    $('#lblPay').text('<?php echo number_format($sumPay, 2); ?>');
    $('#lblBonus').text('<?php echo number_format($bonus, 2); ?>');

    <?php if ($bonus < 0): ?>
    $('#lblBonusText').text('<?php echo Yii::t("lang", "loss"); ?>');
    $('#lblBonus').removeClass('label-success').addClass('label-danger');
    <?php else: ?>
    $('#lblBonusText').text('<?php echo Yii::t("lang", "profit"); ?>');
    $('#lblBonus').removeClass('label-danger').addClass('label-success');
    <?php endif; ?>
  });
</script>
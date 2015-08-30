<?php $this->renderPartial('//Config/SetLanguage'); ?>

<script>
  function printSlip(bill_sale_id) {
    var input = $("#hidden_input").val();
    var return_money = $("#hidden_return_money").val();
    var bill_id = $("#hidden_last_bill_id").val();

    if (bill_sale_id != 0) {
      bill_id = bill_sale_id;
    }

    var uri = "index.php?r=Dialog/DialogPrintSlip&bill_id=" + bill_id + "&input=" + input + "&return_money=" + return_money;
    var options = "width=360px; height=550px";
    var w = window.open(uri, null, options);
  }

  function printBillSendProduct(bill_sale_id) {
    var uri = "index.php?r=Dialog/DialogBillSendProduct&bill_sale_id=" + bill_sale_id;
    var options = "width=800px; height=650px";
    var w = window.open(uri, null, options);
  }

  function printBillTax(bill_sale_id) {
    var uri = "index.php?r=Dialog/DialogBillAddVat&bill_sale_id=" + bill_sale_id;
    var options = "width=800px; height=650px";
    var w = window.open(uri, null, options);
  }

  function printBill(bill_sale_id) {
    var uri = "index.php?r=Dialog/DialogBillSendProduct&bill_type=sale&bill_sale_id=" + bill_sale_id;
    var options = "width=800px; height=650px";
    var w = window.open(uri, null, options);
  }

  function printBillTaxLittle(bill_sale_id) {
    var uri = "index.php?r=Report/BillTaxLittle&bill_sale_id=" + bill_sale_id;
    var options = "width=360px; height=550px";
    var w = window.open(uri, null, options);
  }
</script>

<div class="panel panel-info" style="margin: 10px;">
    <div class="panel-heading"><?php echo Yii::t('lang', 'list_of_Bills'); ?> / <?php echo $modelBillSale->bill_sale_id; ?></div>
    <div class="panel-body">
        <div>
            <a href="#" class="btn btn-info" onclick="printBillSendProduct(<?php echo $modelBillSale->bill_sale_id; ?>)">
              <i class="glyphicon glyphicon-file"></i>
              <?php echo Yii::t('lang', 'invoice'); ?>
            </a>
            <a href="#" class="btn btn-info" onclick="printBillTax(<?php echo $modelBillSale->bill_sale_id; ?>)">
              <i class="glyphicon glyphicon-file"></i>
              <?php echo Yii::t('lang', 'tax_invoice'); ?>
            </a>
            <a href="#" class="btn btn-info" onclick="printBillTaxLittle(<?php echo $modelBillSale->bill_sale_id; ?>)">
              <i class="glyphicon glyphicon-file"></i>
              <?php echo Yii::t('lang', 'invoice_summary'); ?>
            </a>
            <a href="#" class="btn btn-info" onclick="printSlip(<?php echo $modelBillSale->bill_sale_id; ?>)">
              <i class="glyphicon glyphicon-file"></i>
              <?php echo Yii::t('lang', 'slip'); ?>
            </a>
            <a href="#" class="btn btn-info" onclick="printBill(<?php echo $modelBillSale->bill_sale_id; ?>)">
              <i class="glyphicon glyphicon-file"></i>
              <?php echo Yii::t('lang', 'receipt'); ?>
            </a>
        </div>

  		<?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider' => $dataProvider,
            'itemsCssClass' => 'table table-bordered table-striped',
            "pagerCssClass" => "pagination",
            "pager" => array(
              "selectedPageCssClass" => "active",
              "firstPageCssClass" => "previous",
              "lastPageCssClass" => "next",
              "hiddenPageCssClass" => "disabled",
              "header" => "",
              "htmlOptions" => array(
                "class" => "pagination"
              )
            ),
            'columns' => array(
                array(
                    'name' => 'bill_sale_detail_id',
                    'htmlOptions' => array(
                        'width' => '50px',
                        'align' => 'center'
                    )
                ),
                array(
                    'name' => 'bill_sale_detail_barcode',
                    'htmlOptions' => array(
                        'width' => '150px',
                        'align' => 'center'
                    )
                ),
                array(
                    'header' => Yii::t('lang', 'list'),
                    'value' => '@$data->product->product_name'
                ),
                array(
                    'name' => 'bill_sale_detail_price',
                    'htmlOptions' => array(
                        'width' => '80px',
                        'align' => 'right'
                    )
                ),
                array(
                    'name' => 'bill_sale_detail_qty',
                    'htmlOptions' => array(
                        'width' => '50px',
                        'align' => 'right'
                    )
                ),
                array(
                    'header' => Yii::t('lang', 'sum'),
                    'value' => 'number_format($data->bill_sale_detail_price * $data->bill_sale_detail_qty)',
                    'htmlOptions' => array(
                        'width' => '80px',
                        'align' => 'right'
                    )
                ),
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{edit} {del}',
                    'buttons' => array(
                        'edit' => array(
                            'label' => '
															<span class="btn btn-success">
																<b class="glyphicon glyphicon-pencil"></b>
															</span>',
                            'url' => 'Yii::app()->createUrl("Basic/BillSaleDetailEdit", array(
															"bill_sale_detail_id" => $data->bill_sale_detail_id 
														))'
                        ),
                        'del' => array(
                            'label' => '
															<span class="btn btn-danger">
																<b class="glyphicon glyphicon-trash"></b>
															</span>
														',
                            'url' => 'Yii::app()->createUrl("Basic/BillSaleDetailDelete", array(
															"bill_sale_detail_id" => $data->bill_sale_detail_id
														))',
                            'options' => array(
                                'onclick' => 'return confirm("'.Yii::t('lang', 'confirm_delete').'")'
                            )
                        )
                    ),
                    'htmlOptions' => array(
                        'width' => '110px',
                        'align' => 'center'
                    )
                )
            )
        ));
        ?>
    </div>
</div>


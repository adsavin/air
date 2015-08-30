<?php $this->renderPartial('//Config/SetLanguage'); ?>
<script>
  function showBillDetail(bill_sale_id) {
    $.ajax({
      url: 'index.php?r=Report/ArDetail',
      data: {
        bill_sale_id: bill_sale_id
      },
      success: function(data) {
        $("#gridBillSaleDetail").html(data);
        $("#bill_sale_id").text(bill_sale_id);
      }
    });

    return false;
  }
</script>

<div class="panel panel-info" style="margin: 10px">
    <div class="panel-heading"><?php echo Yii::t('lang', 'debtor_reports'); ?></div>
    <div class="panel-body">
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider' => $billSales,
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
            'itemsCssClass' => 'table table-bordered table-striped',
            'columns' => array(
                array(
                  'header' => Yii::t('lang', 'code_bill'),
                  'type' => 'raw',
                  'value' => 'CHtml::link($data->bill_sale_id, "#", array(
                    "data-toggle" => "modal",
                    "data-target" => "#myModal",
                    "onclick" => "return showBillDetail($data->bill_sale_id)"
                  ))',
                  'htmlOptions' => array(
                    'width' => '80px',
                    'style' => 'text-align: center'
                  )
                ),
                array(
                  'header' => Yii::t('lang', 'date_of_transaction'),
                  'value' => 'Util::mysqlToThaiDate($data->bill_sale_created_date)',
                  'htmlOptions' => array(
                    'width' => '130px',
                    'style' => 'text-align: center'
                  )
                ),
                'member.member_name',
                array(
                  'header' => Yii::t('lang', 'sales_person'),
                  'value' => '@$data->user->user_name',
                  'htmlOptions' => array(
                    'width' => '250px'
                  )
                ),
                array(
                  'header' => Yii::t('lang', 'amount_of_money'),
                  'value' => '$data->getSum()',
                  'htmlOptions' => array(
                    'width' => '100px',
                    'style' => 'text-align: right'
                  )
                )
            )
        ));
        ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 850px">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo Yii::t('lang', 'ordering_information_of_the_debtor'); ?> Bill : <span style="color: red" id="bill_sale_id"></span></h4>
      </div>
      <div class="modal-body" id="gridBillSaleDetail">

      </div>
    </div>
  </div>
</div>
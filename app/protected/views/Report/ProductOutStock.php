<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-info" style="margin: 10px">
  <div class="panel-heading"><?php echo Yii::t('lang', 'out_of_the_sec_report'); ?></div>
  <div class="panel-body">
    <!--
    <div class="pull-right" style="margin-bottom: 10px">
      <a href="" class="btn btn-primary">
        <i class="glyphicon glyphicon-print"></i>
        พิมพ์รายงาน
      </a>
      <a href="" class="btn btn-primary">
        <i class="glyphicon glyphicon-upload"></i>
        ส่งออกเป็น Excel
      </a>  
    </div>
    <div class="clearfix"></div>
    -->

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width="200px"><?php echo Yii::t('lang', 'product_code'); ?></th>
          <th><?php echo Yii::t('lang', 'product_name'); ?></th>
          <th width="110px"><?php echo Yii::t('lang', 'remaining_number'); ?></th>
          <th width="110px"><?php echo Yii::t('lang', 'number_of_packages'); ?></th>
          <th width="150px"><?php echo Yii::t('lang', 'remaining_number_pack'); ?></th>
          <th width="80px"><?php echo Yii::t('lang', 'retail_price'); ?></th>
          <th width="80px"><?php echo Yii::t('lang', 'wholesale_price'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $product): ?>
        <tr>
          <td><?php echo $product->product_code; ?></td>
          <td><?php echo $product->product_name; ?></td>
          <td><?php echo $product->product_quantity; ?></td>
          <td><?php echo $product->product_total_per_pack; ?></td>
          <td><?php echo $product->product_quantity_of_pack; ?></td>
          <td><?php echo $product->product_price; ?></td>
          <td><?php echo $product->product_price_send; ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
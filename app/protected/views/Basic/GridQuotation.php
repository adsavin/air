<?php $this->renderPartial('//Config/SetLanguage'); ?>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th width="50px"><?php echo Yii::t('lang', 'sequence'); ?></th>
      <th width="100px"><?php echo Yii::t('lang', 'date'); ?></th>
      <th width="50px"><?php echo Yii::t('lang', 'number'); ?></th>
      <th><?php echo Yii::t('lang', 'customers'); ?></th>
      <th><?php echo Yii::t('lang', 'phone_number'); ?></th>
      <th width="80px"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($quotations as $quotation): ?>
      <tr>
        <td style="text-align: right"><?php echo $n++; ?></td>
        <td><?php echo Util::mysqlToThaiDate($quotation->created_at); ?></td>
        <td style="text-align: right"><?php echo $quotation->id; ?></td>
        <td><?php echo $quotation->customer_name; ?></td>
        <td><?php echo $quotation->customer_tel; ?></td>
        <td>
          <a href="#" onclick="return chooseQuotation(<?php echo $quotation->id; ?>)" class="btn btn-primary" data-dismiss="modal">
            <i class="glyphicon glyphicon-ok"></i>
            <?php echo Yii::t('lang', 'viewing'); ?>
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

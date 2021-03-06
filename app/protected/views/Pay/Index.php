<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-info" style="margin: 10px">
  <div class="panel-heading"><?php echo Yii::t('lang', 'expenditure'); ?></div>
  <div class="panel-body">
    <a href="index.php?r=Pay/Form" class="btn btn-info">
      <i class="glyphicon glyphicon-plus"></i>
      <?php echo Yii::t('lang', 'add'); ?>
    </a>

    <table style="margin-top: 10px" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width="50px" style="text-align: right">#</th>
          <th><?php echo Yii::t('lang', 'list'); ?></th>
          <th><?php echo Yii::t('lang', 'notes'); ?></th>
          <th><?php echo Yii::t('lang', 'type'); ?></th>
          <th width="180px" align="center"><?php echo Yii::t('lang', 'date'); ?></th>
          <th width="100px" style="text-align: right"><?php echo Yii::t('lang', 'amount_of_money'); ?></th>
          <th width="110px"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($pays as $pay): ?>
        <tr>
          <td style="text-align: right"><?php echo $n++; ?></td>
          <td><?php echo $pay->name; ?></td>
          <td><?php echo $pay->remark; ?></td>
          <td><?php echo @$pay->PayType->name; ?></td>
          <td align="center"><?php echo $pay->created_at; ?></td>
          <td style="text-align: right"><?php echo number_format($pay->price, 2); ?></td>
          <td style="text-align: center">
            <a href="index.php?r=Pay/Edit&id=<?php echo $pay->id; ?>" class="btn btn-info">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="index.php?r=Pay/Delete&id=<?php echo $pay->id; ?>" class="btn btn-danger" onclick="return confirm('<?php echo Yii::t("lang", "confirm_delete"); ?>')">
              <i class="glyphicon glyphicon-remove"></i>
            </a>
          </td>
        </tr>
        <?php $sum += $pay->price; ?>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="5">รวม</td>
          <td style="text-align: right">
            <?php echo number_format($sum, 2); ?>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
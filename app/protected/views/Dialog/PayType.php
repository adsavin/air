<?php $this->renderPartial('//Config/SetLanguage'); ?>

<table style="margin-top: 10px" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th width="130px">&nbsp;</th>
      <th width="80px"><?php echo Yii::t('lang', 'code'); ?></th>
      <th><?php echo Yii::t('lang', 'name_type'); ?></th>
      <th><?php echo Yii::t('lang', 'notes'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($payTypes as $payType): ?>
    <tr>
      <td align="center">
        <a href="#" class="btn btn-success btnChoosePayType" 
          id="<?php echo $payType->id; ?>"
          name="<?php echo $payType->name; ?>">
          <i class="glyphicon glyphicon-ok"></i>
          <?php echo Yii::t('lang', 'choose_list'); ?>
        </a>
      </td>
      <td><?php echo $payType->id; ?></td>
      <td><?php echo $payType->name; ?></td>
      <td><?php echo $payType->remark; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
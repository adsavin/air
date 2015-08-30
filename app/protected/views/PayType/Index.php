<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-info" style="margin: 10px">
  <div class="panel-heading"><?php echo Yii::t('lang', 'distribution_of_income'); ?></div>
  <div class="panel-body">
    <a href="index.php?r=PayType/Form" class="btn btn-info">
      <i class="glyphicon glyphicon-plus"></i>
      <?php echo Yii::t('lang', 'add'); ?>
    </a>

    <table style="margin-top: 10px" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th><?php echo Yii::t('lang', 'name_type'); ?></th>
          <th><?php echo Yii::t('lang', 'notes'); ?></th>
          <th width="40px"><?php echo Yii::t('lang', 'edit'); ?></th>
          <th width="40px"><?php echo Yii::t('lang', 'delete'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($payTypes as $payType): ?>
        <tr>
          <td><?php echo $payType->name; ?></td>
          <td><?php echo $payType->remark; ?></td>
          <td>
            <a href="index.php?r=PayType/Edit&id=<?php echo $payType->id; ?>" class="btn btn-info">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
          </td>
          <td>
            <a href="index.php?r=PayType/Delete&id=<?php echo $payType->id; ?>" onclick="return confirm('<?php echo Yii::t("lang", "confirmation_list"); ?>')" class="btn btn-danger">
              <i class="glyphicon glyphicon-remove"></i>
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
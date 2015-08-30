<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-info" style="margin: 10px">
  <div class="panel-heading"><?php echo Yii::t('lang', 'connection_settings_cash_drawer'); ?></div>
  <div class="panel-body">
    <?php if (Yii::app()->user->hasFlash('message')): ?>
    <div class="alert alert-success">
      <i class="glyphicon glyphicon-ok"></i>
      <?php echo Yii::app()->user->getFlash('message'); ?>
    </div>
    <?php endif; ?>

    <form action="" method="post" class="form-inline">
      COM PORT: 
      <input type="text" name="serial_port" style="width: 100px" value="<?php echo @$configSoftware->serial_port; ?>" class="form-control" />
      <input type="submit" class="btn btn-info" value="บันทึก" />
    </form>

    <div style="margin-top: 10px; color: red">
      * <?php echo Yii::t('lang', 'test_from_com1_com2_com3_COM4'); ?>
    </div>
  </div>
</div>
<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-info" style="margin: 10px">
  <div class="panel-heading"><?php echo Yii::t('lang', 'set_points'); ?></div>
  <div class="panel-body">
    <form method="post" class="form-inline">
      <label style="width: 170px"><?php echo Yii::t('lang', 'x_amount_of_thb_point'); ?></label>
      <input type="text" name="score" value="<?php echo $configSoftware->score; ?>" class="form-control" style="width: 100px" />
      <input type="submit" class="btn btn-info" value="<?php echo Yii::t('lang', 'save'); ?>" />
    </form>
  </div>
</div>
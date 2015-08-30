<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-info" style="margin: 10px">
  <div class="panel-heading"><?php echo Yii::t('lang', 'time_settings'); ?></div>
  <div class="panel-body">
    <div class="alert alert-danger">
      <i class="glyphicon glyphicon-remove"></i> 
      <?php echo Yii::t('lang', 'should_case_time_in_billings_not_only_with_the_times'); ?>
    </div>
    
    <form class="form-inline" name="formConfigTime" method="post" action="index.php?r=Config/ConfigTime">
      <div>
        <label><?php echo Yii::t('lang', 'set_hours'); ?></label>
        +
        <input type="text" name="hour" value="<?php echo $configSoftware->count_hour; ?>" class="form-control" style="width: 50px; text-align: right" placeholder="0" />
        <a href="javascript:void(0)" onclick="document.formConfigTime.submit()" class="btn btn-info">
          <?php echo Yii::t('lang', 'save'); ?>
        </a>
      </div>
    </form>
  </div>
</div>
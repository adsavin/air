<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-primary" style="margin: 10px">
  <div class="panel-heading"><?php echo Yii::t('lang', 'confirm_the_update_software'); ?></div>
  <div class="panel-body">
    <?php if (Yii::app()->user->hasFlash("message") != null): ?>
    <div class="alert alert-success">
      <i class="glyphicon glyphicon-ok"></i>
      <?php echo Yii::app()->user->getFlash("message"); ?>
    </div>
    <?php endif; ?>

    <a href="index.php?r=Help/UpdateSoftwareNow" class="btn btn-primary btn-lg">
      <i class="glyphicon glyphicon-ok"></i>
      <?php echo Yii::t('lang', 'confirm_the_update_software'); ?>
    </a>
    <br />
    <br />

  </div>
</div>
<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-info" style="margin: 10px">
  <div class="panel-heading"><?php echo Yii::t('lang', 'add_expense_category'); ?></div>
  <div class="panel-body">
    <?php 
    $f = $this->beginWidget('CActiveForm', array(
      'action' => 'index.php?r=PayType/Form'
    ));
    echo $f->errorSummary($payType); 
    ?>
    <div>
      <label><?php echo Yii::t('lang', 'name_type'); ?> *</label>
      <?php echo $f->textField($payType, 'name', array(
        'class' => 'form-control',
        'style' => 'width: 250px'
      )); ?>
    </div>
    <div>
      <label><?php echo Yii::t('lang', 'notes'); ?></label>
      <?php echo $f->textField($payType, 'remark', array(
        'class' => 'form-control',
        'style' => 'width: 400px'
      )); ?>
    </div>
    <div>
      <label></label>
      <input type="submit" class="btn btn-info" value="<?php echo Yii::t('lang', 'save'); ?>">
    </div>
    <?php echo $f->hiddenField($payType, 'id'); ?>
    <?php $this->endWidget(); ?>
  </div>
</div>
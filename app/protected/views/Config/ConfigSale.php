<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-info" style="margin: 10px">
  <div class="panel-heading"><?php echo Yii::t('lang', 'set_conditions_of_Sale'); ?></div>
  <div class="panel-body">
    <?php if (Yii::app()->user->hasFlash('message')): ?>
    <div class="alert alert-success">
      <i class="glyphicon glyphicon-ok"></i>
      <?php echo Yii::app()->user->getFlash('message'); ?>
    </div>
    <?php endif; ?>

    <form method="post" class="form-inline">
      <input type="hidden" name="test" value="test" />
      <table class="table table-bordered table-striped">
        <tbody>
          <tr>
            <td width="300px"><?php echo Yii::t('lang', 'employees_can_fix_prices'); ?> </td>
            <td><input type="checkbox" name="ConfigSoftware[sale_can_edit_price]" value="yes" 
              <?php 
              if ($configSoftware->sale_can_edit_price == 'yes') {
                echo 'checked';
              }
              ?> 
              />
            </td>
          </tr>
          <tr>
            <td width="300px"><?php echo Yii::t('lang', 'the_salesperson_representing_a_discount'); ?> </td>
            <td><input type="checkbox" name="ConfigSoftware[sale_can_add_sub_price]" value="yes"
              <?php 
              if ($configSoftware->sale_can_add_sub_price == 'yes') {
                echo 'checked';
              }
              ?> 
             /></td>
          </tr>
          <tr>
            <td width="300px"><?php echo Yii::t('lang', 'stock_is_sold_out'); ?> </td>
            <td><input type="checkbox" name="ConfigSoftware[sale_out_of_stock]" value="yes"
              <?php 
              if ($configSoftware->sale_out_of_stock == 'yes') {
                echo 'checked';
              }
              ?> 
             /></td>
          </tr>
        </tbody>
      </table>
      
      <input type="submit" class="btn btn-info" value="<?php echo Yii::t('lang', 'save'); ?>" />
    </form>
  </div>  
</div>
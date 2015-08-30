<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-info" style="margin: 10px">
  <div class="panel-heading"><?php echo Yii::t('lang', 'bill_and_its_minimum_setting'); ?></div>
  <div class="panel-body">
    <?php if (Yii::app()->user->hasFlash('message')): ?>
    <div class="alert alert-success">
      <?php echo Yii::app()->user->getFlash('message'); ?>
    </div>
    <?php endif; ?>

    <form class="form-inline" method="post">
      <div>
        <label><?php echo Yii::t('lang', 'the_minimum_posthumously'); ?></label>
        <input type="text" name="alert_min_stock" value="<?php echo @$configSoftware->alert_min_stock; ?>" class="form-control" style="width: 100px" />
      </div>
      <div>
        <label><?php echo Yii::t('lang', 'slip_the_bill'); ?></label>
        <input type="text" name="bill_slip_title" value="<?php echo @$configSoftware->bill_slip_title; ?>" class="form-control" style="width: 300px" />

        <label style="width: 200px"><?php echo Yii::t('lang', 'note_the_bill_slip'); ?></label>
        <input type="text" name="bill_slip_footer" value="<?php echo @$configSoftware->bill_slip_footer; ?>" class="form-control" style="width: 400px" />
      </div>
      <div>
        <label><?php echo Yii::t('lang', 'the_bill_delivery'); ?></label>
        <input type="text" name="bill_send_title" value="<?php echo @$configSoftware->bill_send_title; ?>" class="form-control" style="width: 300px" />

        <label style="width: 200px"><?php echo Yii::t('lang', 'note_the_shipping_bill'); ?></label>
        <input type="text" name="bill_send_footer" value="<?php echo @$configSoftware->bill_send_footer; ?>" class="form-control" style="width: 400px" />
      </div>
      <div>
        <label><?php echo Yii::t('lang', 'the_head_tax_bill'); ?></label>
        <input type="text" name="bill_vat_title" value="<?php echo @$configSoftware->bill_vat_title; ?>" class="form-control" style="width: 300px" />
      
        <label style="width: 200px"><?php echo Yii::t('lang', 'the_final_tax_bill'); ?></label>
        <input type="text" name="bill_vat_footer" value="<?php echo @$configSoftware->bill_vat_footer; ?>" class="form-control" style="width: 400px" />
      </div>
      <div>
        <label><?php echo Yii::t('lang', 'bill_heads_receipts'); ?></label>
        <input type="text" name="bill_sale_title" value="<?php echo @$configSoftware->bill_sale_title; ?>" class="form-control" style="width: 300px" />

        <label style="width: 200px"><?php echo Yii::t('lang', 'note_the_bill_receipt'); ?></label>
        <input type="text" name="bill_sale_footer" value="<?php echo @$configSoftware->bill_sale_footer; ?>" class="form-control" style="width: 400px" />
      </div>
      <div>
        <label><?php echo Yii::t('lang', 'head_billing_bill'); ?></label>
        <input type="text" name="bill_drop_title" value="<?php echo @$configSoftware->bill_drop_title; ?>" class="form-control" style="width: 300px" />
      
        <label style="width: 200px"><?php echo Yii::t('lang', 'note_the_billing_bill'); ?></label>
        <input type="text" name="bill_drop_footer" value="<?php echo @$configSoftware->bill_drop_footer; ?>" class="form-control" style="width: 400px" />
      </div>
      <div>
        <label><?php echo Yii::t('lang', 'number_of_items_per_page'); ?></label>
        <input type="text" name="items_per_page" value="<?php echo @$configSoftware->items_per_page; ?>" class="form-control" style="width: 100px" />
      </div>
      <div>
        <label></label>
        <input type="submit" class="btn btn-info" value="บันทึก" />
      </div>
    </form>
  </div>
</div>
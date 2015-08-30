<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel">
    <?php echo Yii::t('lang', 'repair_information_product_number'); ?>: 
    <?php echo $productSerial["serial_no"]; ?>

    <div class="panel_body">
        <!-- expire product -->
        <?php if (ProductSerial::getExpireStatus($productSerial['product_expire_date'])): ?>
            <div class="alert alert-danger">
                <i class="icon icon-out"></i>
                <strong><?php echo Yii::t('lang', 'this_product_is_out_insurance'); ?></strong>
            </div>
        <?php else: ?>
            <div class="alert alert-success">
                <i class="icon icon-ok"></i>
                <strong><?php echo Yii::t('lang', 'insurance_products_are_also_in'); ?></strong>
            </div>
        <?php endif; ?>

        <div>
            <i class="icon icon-file"></i>
            <b><?php echo Yii::t('lang', 'product_info'); ?></b>
        </div>
        <form>
            <div class="well well-small">  
                <table>
                    <tr>
                        <td><label><?php echo Yii::t('lang', 'product_code'); ?></label></td>
                        <td><input type="text" value="<?php echo $productSerial['product_code']; ?>" disabled class="disabled" /></td>
                        <td><label><?php echo Yii::t('lang', 'product_name'); ?></label></td>
                        <td colspan="4"><input type="text" value="<?php echo $productSerial['product_name']; ?>" disabled class="disabled span7" /></td>
                    </tr>
                    <tr>
                        <td><label><?php echo Yii::t('lang', 'sale_date'); ?></label></td>
                        <td><input type="text" value="<?php echo Util::mysqlToThaiDate($productSerial['bill_sale_created_date']); ?>" disabled class="disabled span2" /></td>
                        <td><label><?php echo Yii::t('lang', 'date_insurance'); ?></label></td>
                        <td><input type="text" value="<?php echo Util::mysqlToThaiDate($productSerial['product_start_date']); ?>" disabled class="disabled span2" /></td>
                        <td align="right"><label><?php echo Yii::t('lang', 'day_out_insurance'); ?></label></td>
                        <td><input type="text" value="<?php echo Util::mysqlToThaiDate($productSerial['product_expire_date']); ?>" disabled class="disabled span2" /></td>
                    </tr>
                </table>
            </div>
        </form>
        
        <div>
            <i class="icon icon-file"></i>
            <b><?php echo Yii::t('lang', 'repair_information'); ?></b>
        </div>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'action' => array('Basic/StartRepairSave'),
            'htmlOptions' => array(
                'name' => 'formRepair'
                )));
        ?>
        <table>
            <tr>
                <td><?php echo $form->labelEx($repair, 'user_id'); ?></td>
                <td>
                    <div class="input-append">
                        <input type="text" name="user_id" class="span1" value="<?php echo @$repair->user_id; ?>" disabled="disabled" class="disabled" />
                        <input type="text" name="user_name" value="<?php echo @$repair->user->user_name; ?>" disabled class="disabled" />
                    </div>
                </td>

                <td><?php echo $form->labelEx($repair, 'repair_created_date'); ?></td>
                <td><input type="text" name="repair_created_date" class="span2 disabled" disabled="disabled" value="<?php echo Util::nowThai(); ?>" /></td>

                <td><?php echo $form->labelEx($repair, 'branch_id', array('style' => 'width: 90px')); ?></td>
                <td>
                    <div class="input-append">
                        <input type="hidden" id="hidden_branch_id" name="hidden_branch_id" value="<?php echo @$repair->branch_id; ?>" />
                        <input type="text" name="branch_name" value="<?php echo @$repair->branch->branch_name; ?>" disabled class="disabled" />
                    </div>
                </td>
            </tr>
            <tr>
                <?php
                $repair_date = Util::nowThai();
                
                if ($repair->repair_date != '0000-00-00') {
                    $repair_date = Util::mysqlToThaiDate($repair->repair_date);
                }
                ?>
                <td><?php echo $form->labelEx($repair, 'repair_date'); ?></td>
                <td><?php echo $form->textField($repair, 'repair_date', array(
                    'class' => 'span2 disabled', 
                    'value' => $repair_date,
                    'disabled' => 'disabled'));
                ?>
                </td>
                <td><?php echo $form->labelEx($repair, 'repair_problem'); ?></td>
                <td colspan="4"><?php echo $form->textField($repair, 'repair_problem', array('class' => 'span7 disabled', 'disabled' => 'disabled')); ?></td>
            </tr>
            <tr>
                <?php
                $repair_price = 0;
                
                if (!empty($repair->repair_price)) {
                    $repair_price = $repair->repair_price;
                }
                ?>
                <td><?php echo $form->labelEx($repair, 'repair_price'); ?></td>
                <td><?php echo $form->textField($repair, 'repair_price', array('value' => $repair_price, 'disabled' => 'disabled', 'class' => 'disabled')); ?></td>
                <td><?php echo $form->labelEx($repair, 'repair_detail'); ?></td>
                <td colspan="3"><?php echo $form->textField($repair, 'repair_detail', array('class' => 'span7 disabled', 'disabled' => 'disabled')); ?></td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($repair, 'repair_original'); ?></td>
                <td colspan="5">
                    <?php echo $form->textField($repair, 'repair_original', array('style' => 'width: 100%', 'disabled' => 'disabled', 'class' => 'disabled')); ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($repair, 'repair_type'); ?></td>
                <td>
                    <input type="text" value="<?php echo $repair->getRepairType(); ?>" disabled="disabled" class="disabled" />
                </td>

                <td><?php echo $form->labelEx($repair, 'repair_status'); ?></td>
                <td colspan="4">
                    <input type="text" value="<?php echo $repair->getStatus(); ?>" disabled="disabled" class="disabled" />
                </td>
            </tr>
        </table>        
        <?php $this->endWidget(); ?>
    </div>
</div>
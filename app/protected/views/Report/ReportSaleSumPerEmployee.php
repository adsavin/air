<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-info" style="margin: 10px">
    <div class="panel-heading"><?php echo Yii::t('lang', 'sales_staff_report'); ?></div>
    <div class="panel-body">
        <?php echo CHtml::form(Yii::app()->controller->createUrl('//Report/SaleSumPerEmployee'), 'post', array('name' => 'form1')); ?>
            <label style="width: 80px"><?php echo Yii::t('lang', 'select_month'); ?></label>
            <?php echo CHtml::dropDownList("m", $m, $monthList, array(
                    'class' => 'form-control',
                    'style' => 'width: 120px'
            )); ?>

            <label style="width: 80px"><?php echo Yii::t('lang', 'select_year'); ?></label>
            <?php echo CHtml::dropDownList("y", $y, $yearList, array(
                    'class' => 'form-control',
                    'style' => 'width: 100px'
            )); ?>

            <a href="#" class="btn btn-info" onclick="document.form1.submit();">
                <i class="glyphicon glyphicon-ok"></i>
                <?php echo Yii::t('lang', 'show_report'); ?>
            </a>
        </div>
        <?php echo CHtml::endForm(); ?>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="50px" style="text-align: right"><?php echo Yii::t('lang', 'sequence'); ?></th>
                    <th width="400px"><?php echo Yii::t('lang', 'sales_person'); ?></th>
                    <th width="300px"><?php echo Yii::t('lang', 'branch'); ?></th>
                    <th style="text-align: right"><?php echo Yii::t('lang', 'amount_of_money'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <?php
                $total = $billSale->getSumPriceByMonthYearUserId($m, $y, $user->user_id);
                $sum += $total;
                ?>
                <tr>
                    <td style="text-align: right;"><?php echo $n++; ?></td>
                    <td><?php echo $user->user_name; ?></td>
                    <td><?php echo $user->Branch->branch_name; ?></td>
                    <td style="text-align: right">
                        <?php echo number_format($total, 2); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <strong><?php echo Yii::t('lang', 'the_entire_balance'); ?> : </strong>
                    </td>
                    <td style="text-align: right">
                        <?php echo number_format($sum, 2); ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-info" style="margin: 10px">
    <div class="panel-heading"><?php echo Yii::t('lang', 'monthly_sales_Report'); ?></div>
    <div class="panel-body">
        <?php echo CHtml::form(Yii::app()->controller->createUrl('//Report/SaleSumPerMonth'), 'post', array('name' => 'form1')); ?>
        <div>
            <label style="width: 80px"><?php echo Yii::t('lang', 'select_year'); ?></label>
            <?php
                echo CHtml::dropDownList("year_find", $year, $yearList, array(
                	'style' => 'width: 200px',
                	'class' => 'form-control'
                ));
            ?>
  
            <a href="#" class="btn btn-info" onclick="document.form1.submit();">
                <i class="glyphicon glyphicon-ok"></i>
                <?php echo Yii::t('lang', 'show_report'); ?>
            </a>
        </div>
        <?php echo CHtml::endForm(); ?>

    <!-- report show -->
    <table style="margin-top: 20px" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="200px"><?php echo Yii::t('lang', 'month'); ?></th>
                <th style="text-align: right"><?php echo Yii::t('lang', 'amount_of_money'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 1; $i <= 12; $i++): ?>
            <?php $total = $billSale->getSumPriceByMonthYear($i, $year); ?>
            <?php $sum += $total; ?>
            <tr>
                <td><?php echo $monthRange[$i]; ?></td>
                <td style="text-align: right">
                    <?php echo number_format($total, 2); ?>
                </td>
            </tr>
            <?php endfor; ?>
        </tbody>
        <tfoot>
            <tr>
                <td><strong><?php echo Yii::t('lang', 'sum'); ?></strong></td>
                <td style="text-align: right">
                    <?php echo number_format($sum, 2); ?>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
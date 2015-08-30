<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-info" style="margin: 10px">
    <div class="panel-heading"><?php echo Yii::t('lang', 'daily_sales_report'); ?></div>
    <div class="panel-body">
        <form name="form1" action="index.php?r=Report/SaleSumPerDay" method="post">
        <div>
            <label><?php echo Yii::t('lang', 'select_month'); ?></label>
            <?php echo CHtml::dropDownList("month", $month, Util::monthRange(), array(
            		'class' => 'form-control',
            		'style' => 'width: 200px'
            )); ?>
            <label><?php echo Yii::t('lang', 'select_year'); ?></label>
            <?php echo CHtml::dropDownList("year", $year, Util::yearRange(), array(
            		'class' => 'form-control',
            		'style' => 'width: 200px'
            )); ?>
        </div>
        <div>
            <label></label>
            <a href="#" class="btn btn-info" onclick="document.form1.submit();">
                <i class="glyphicon glyphicon-ok"></i>
                <?php echo Yii::t('lang', 'show_report'); ?>
            </a>
        </div>
        <form>

        <table style="margin-top: 20px" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="50px"><?php echo Yii::t('lang', 'date'); ?></th>
                    <th style="text-align: right"><?php echo Yii::t('lang', 'amount_of_money'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 1; $i <= $total_day; $i++): ?>
                <?php 
                $total = $billSale->getSumPriceByDayMonthYear($i, $month, $year);
                $sum += $total;
                ?>
                    <tr>
                        <td style="text-align: right;"><?php echo $i; ?></td>
                        <td style="text-align: right;">
                            <?php echo number_format($total, 2); ?>
                        </td>
                    </tr>
                <?php endfor; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td style="text-align: right"><strong><?php echo Yii::t('lang', 'sum'); ?></strong></td>
                    <td style="text-align: right">
                        <?php echo number_format($sum, 2); ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
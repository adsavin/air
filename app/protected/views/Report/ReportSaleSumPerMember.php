<?php $this->renderPartial('//Config/SetLanguage'); ?>
<div class="panel panel-info" style="margin: 10px">
    <div class="panel-heading"><?php echo Yii::t('lang', 'sales_reports_by_member'); ?></div>
    <div class="panel-body">
        <?php echo CHtml::form(Yii::app()->controller->createUrl('//Report/SaleSumPerMember'), 'post', array('name' => 'form1')); ?>
        
        <div>
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

            <table style="margin-top: 5px;" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="50px" style="text-align: right"><?php echo Yii::t('lang', 'sequence'); ?></th>
                        <th><?php echo Yii::t('lang', 'members'); ?></th>
                        <th width="150px" style="text-align: right"><?php echo Yii::t('lang', 'circulation'); ?></th>
                        <th width="150px" style="text-align: right"><?php echo Yii::t('lang', 'point'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($members as $member): ?>
                    <?php $price = $billSale->getSumPriceByYearAndMemberId($y, $member->member_id); ?>
                    <tr>
                        <td style="text-align: right"><?php echo $n++; ?></td>
                        <td><?php echo $member->member_name; ?></td>
                        <td style="text-align: right">
                            <a href="index.php?r=Report/SaleSumPerMemberDetail&member_id=<?php echo $member->member_id; ?>&year=<?php echo $y; ?>">
                                <?php echo number_format($price, 2); ?></td>
                            </a>

                        <?php if ($configSoftware->score > 0): ?>
                            <td style="text-align: right"><?php echo number_format($price / $configSoftware->score); ?></td>
                        <?php else: ?>
                            <td style="text-align: right">-</td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>
</div>
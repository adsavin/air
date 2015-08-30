<?php $this->renderPartial('//Config/SetLanguage'); ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
    body, table {
        font-family: Tahoma;
        font-size: 15px;
    }
    table {
        border-collapse: collapse;
    }
    table tr th, td {
        border: #999 solid 1px;
        padding: 5px;
    }
    table tr th{
        background-color: #ddd;
    }
</style>

<script type="text/javascript">
    function printReport() {
	    var url = 'index.php?r=Dialog/ReportSalePerDayPdf';
	    var options = 'dialogWidth=750px; dialogHeight=600px';
	    
	    window.open(url, null, options);
    }

    function exportReport() {
        $.ajax({
            url: 'index.php?r=Dialog/ReportSalePerDayExcel',
            success: function(data) {
                window.open('report-sale-per-day.csv');
            }
        });
    }
</script>

<div class="panel panel-info" style="margin: 10px">
    <div class="panel-heading"><?php echo Yii::t('lang', 'daily_sales_report'); ?></div>
    <div class="panel-body">
    	<form name="form1" method="post">
        <?php  
        $date_find = Util::nowThai();
        
        if (!empty($_POST)) {
	        $date_find = $_POST['date_find'];
        }
        ?>
        <div>
        	<label style="width: 80px"><?php echo Yii::t('lang', 'select_store'); ?></label>
        	<?php echo CHtml::dropdownList('branch_id', @$branch_id, Branch::getOptions(), array(
        		'class' => 'form-control',
        		'style' => 'width: 200px'
        	)); ?>
        </div>
        <div>
            <label style="width: 80px"><?php echo Yii::t('lang', 'choose_the_date'); ?></label>
            <input type="text" name="date_find" class="form-control datepicker" style="width: 200px" value="<?php echo $date_find; ?>" />
            ถึง
            <input type="text" name="date_end" class="form-control datepicker" style="width: 200px" value="<?php echo $date_end; ?>" />

            <span class="alert alert-success" style="padding: 7px">
            	<input type="checkbox" 
            		name="sale_condition_cash" 
            		value="cash" 
            		<?php echo $checked_cash; ?> /> 
            	<span style="margin-right: 20px"><?php echo Yii::t('lang', 'cash'); ?></span>
            		
            	<input type="checkbox" 
            		name="sale_condition_credit" 
            		value="credit" 
            		<?php echo $checked_credit; ?> /> 
            	<span><?php echo Yii::t('lang', 'credit'); ?></span>
            </span>
            
            <span class="alert alert-success" style="padding: 7px; margin-left: 5px">
            	<input type="checkbox" name="has_bonus_yes" value="yes" <?php echo $checked_bonus_yes; ?> />
            	<span style="padding-right: 20px"><?php echo Yii::t('lang', 'discount'); ?></span>
            	
            	<input type="checkbox" name="has_bonus_no" value="no" <?php echo $checked_bonus_no; ?> />
            	<span><?php echo Yii::t('lang', 'no_discounts'); ?></span>
            </span>
        </div>
        <div>
            <label style="width: 80px"></label>

            <a href="#" class="btn btn-info" onclick="document.form1.submit();">
                <i class="glyphicon glyphicon-ok"></i>
                <?php echo Yii::t('lang', 'show_report'); ?>
            </a>
        </div>
    	</form>

		<?php if (!empty($_POST)) : ?>
        	<div style="text-align: right; padding-bottom: 5px;">
        		<a href="#" class="btn btn-info" onclick="printReport()">
        			<span class="glyphicon glyphicon-print"></span>
        			<?php echo Yii::t('lang', 'print_report'); ?>
        		</a>
                <a href="#" class="btn btn-info" onclick="exportReport()">
                    <span class="glyphicon glyphicon-open"></span>
                    <?php echo Yii::t('lang', 'export_to_excel'); ?>
                </a>
        	</div>
        	
            <table border="1" width="100%">
            	<thead>
	                <tr>
	                    <th width="30px" style="text-align: right">#</th>
                        <th width="140px" style="text-align: center"><?php echo Yii::t('lang', 'date'); ?></th>
	                    <th width="60px" style="text-align: center"><?php echo Yii::t('lang', 'bill_no'); ?></th>
	                    <th width="100px" style="text-align: center"><?php echo Yii::t('lang', 'product_code'); ?></th>
	                    <th><?php echo Yii::t('lang', 'catalog'); ?></th>
                        <th width="80px" style="text-align: center"><?php echo Yii::t('lang', 'sales_person'); ?></th>
	                    <th width="80px" style="text-align: right"><?php echo Yii::t('lang', 'price'); ?></th>
	                    <th width="95px" style="text-align: right"><?php echo Yii::t('lang', 'actual_distribution'); ?></th>
                        <th width="50px" style="text-align: right"><?php echo Yii::t('lang', 'fund'); ?></th>
                        <th width="95px" style="text-align: right"><?php echo Yii::t('lang', 'earnings_per_piece'); ?></th>
                        <th width="50px" style="text-align: right"><?php echo Yii::t('lang', 'number'); ?></th>
                        <th width="80px" style="text-align: right"><?php echo Yii::t('lang', 'total_profit'); ?></th>
	                    <th width="90px" style="text-align: right"><?php echo Yii::t('lang', 'amount_of_money'); ?></th>
	                </tr>
            	</thead>
                
                <tbody>
                <?php
                $i = 1;
                $sum = 0;
                $sum_bill_sale_detail_qty = 0;
                $sum_bonus = 0;
                $sum_footer_bonus_per_unit = 0;
                $sum_qty = 0;

                /*
                 * clear in temp
                 */
                TempSalePerDay::model()->deleteAll();
                
                foreach ($result as $value) :
                    // ค้นหาราคาทุนสินค้า
                    $barcodePrice = BarcodePrice::model()->findByAttributes(array(
                        'barcode' => $value['bill_sale_detail_barcode']
                    ));

                    $price_old = 0; // ราคาทุน

                    if (!empty($barcodePrice)) {
                        // price old from barcode price
                        $price_old = $barcodePrice->price_before;

                        $product = Product::model()->findByAttributes(array(
                            'product_code' => $barcodePrice->barcode_fk
                        ));

                        if (!empty($product)) {
                            $value['product_name'] = $product->product_name.' ('.$barcodePrice->name.')';
                        }
                    } else {
                        // old price from product
                        if (empty($value['old_price'])) {
                            $pk = $value['bill_sale_detail_barcode'];
                            $product = Product::model()->findByAttributes(array(
                                'product_code' => $pk
                            ));

                            if (!empty($product)) {
                                $price_old = $product->product_price_buy;
                            }
                        }
                    }

                    if (!empty($value['old_price'])) {
                        if ($value['old_price'] > 0) {
                            $price_old = $value['old_price'];
                        }
                    }

                    $sum += $value['bill_sale_detail_price'] * $value['bill_sale_detail_qty'];

                    // คำนวนกำไรต่อชิ้น
                    $bonus_per_unit = ($value['bill_sale_detail_price'] - $price_old);
                    $bonus_per_unit_sum = ($value['bill_sale_detail_qty'] * $bonus_per_unit);

                    // sum
                    $sum_footer_bonus_per_unit += $bonus_per_unit_sum;
                    $sum_qty += $value['bill_sale_detail_qty'];

                    // pay text
                    $label_bill_status = "";

                    if ($value['bill_sale_status'] == 'pay') {
                        $label_bill_status = Yii::t('lang', 'cash');
                        $bill_status_text = '<font color="green">'.Yii::t('lang', 'cash').'</font>';
                    } else {
                        $label_bill_status = Yii::t('lang', 'credit');
                        $bill_status_text = '<font color="red">'.Yii::t('lang', 'credit').'</font>';
                    }
                    ?>
                    <tr style="background-color: #fafafa;">
                        <td style="text-align: right;">
                        	<?php echo $i++; ?>
                        </td>
                        <td style="text-align: center">
                            <?php echo Util::mysqlToThaiDate($value['bill_sale_pay_date']); ?>
                        </td>
                        <td style="text-align: center;">
                            <?php echo $value['bill_sale_id']; ?>
                        </td>                        
                        <td style="text-align: center">
                        	<?php echo $value['bill_sale_detail_barcode']; ?>
                        </td>
                        <td>
                            <?php echo $value['product_name']; ?>
                        </td>
                        <td style="text-align: center;">
                            <?php echo $bill_status_text; ?>
                        </td>
                        <td style="text-align: right">
                        	<?php echo number_format($value['product_price'], 2); ?>
                        </td>
                        <td style="text-align: right">
                        	<?php echo number_format($value['bill_sale_detail_price'], 2); ?>
                        </td>
                        <td style="text-align: right">
                            <?php echo number_format($price_old, 2); ?>
                        </td>
                        <td style="text-align: right">
                            <?php echo number_format($bonus_per_unit, 2); ?>
                        </td>
                        <td style="text-align: right">
                            <?php echo number_format($value['bill_sale_detail_qty']); ?>
                        </td>
                        <td style="text-align: right">
                            <?php echo number_format($bonus_per_unit_sum, 2); ?>
                        </td>
                        <td style="text-align: right;">
                            <?php echo number_format($value['bill_sale_detail_price'] * $value['bill_sale_detail_qty'], 2); ?>
                        </td>
                    </tr>
                    <?php
                    $sum_bill_sale_detail_qty += $value['bill_sale_detail_qty'];
                    $sum_bonus += ($value['bill_sale_detail_price'] - $value['product_price_buy']);

                    /* 
                     * add to temp
                     */
                    $tempSalePerDay = new TempSalePerDay();
                    $tempSalePerDay->no = ($i - 1);
                    $tempSalePerDay->sale_date = Util::mysqlToThaiDate($value['bill_sale_created_date']);
                    $tempSalePerDay->bill_id = $value['bill_sale_id'];
                    $tempSalePerDay->barcode = $value['bill_sale_detail_barcode'];
                    $tempSalePerDay->name = $value['product_name'];
                    $tempSalePerDay->bill_status = $label_bill_status;
                    $tempSalePerDay->price = $value['product_price'];
                    $tempSalePerDay->sale_price = $value['bill_sale_detail_price'];
                    $tempSalePerDay->price_old = $price_old;
                    $tempSalePerDay->bonus_per_unit = $bonus_per_unit;
                    $tempSalePerDay->qty = $value['bill_sale_detail_qty'];
                    $tempSalePerDay->total_bonus = $bonus_per_unit_sum;
                    $tempSalePerDay->total_income = $value['bill_sale_detail_price'] * $value['bill_sale_detail_qty'];
                    $tempSalePerDay->save();
                    ?>
                <?php endforeach; ?>
				</tbody>
                
                <tfoot>
	                <tr style="background-color: #ddd;">
	                    <td colspan="9" style="text-align: left; padding-right: 10px;">
	                        <span style="font-weight: bold; font-size: 13px;"><?php echo Yii::t('lang', 'sum'); ?> : </span>
	                    </td>
                        <td style="text-align: right"></td>
                        <td style="text-align: right"><?php echo number_format($sum_qty); ?></td>
                        <td style="text-align: right"><?php echo number_format($sum_footer_bonus_per_unit, 2); ?></td>
	                    <td style="text-align: right; background-color: yellow;">
	                        <?php echo number_format($sum, 2); ?>
	                    </td>
	                </tr>
                </tfoot>
            </table>
        </div>

        <div class="alert alert-info" style="margin-left: 15px; margin-right: 15px; margin-bottom: 15px">
            <strong><?php echo Yii::t('lang', 'today_the_money_in_the_drawer'); ?>: </strong>
            <input type="text" disabled="disabled" value="<?php echo @number_format($drawcash->draw_price, 2); ?>" class="form-control" style="width: 100px; text-align: right" />
            
            <label style="width: 120px"><?php echo Yii::t('lang', 'sales_today'); ?>: </label>
            <input type="text" disabled="disabled" value="<?php echo number_format($sum, 2); ?>" class="form-control" style="width: 100px; text-align: right" />

            <label style="width: 100px"><?php echo Yii::t('lang', 'profit_today'); ?>: </label>
            <input type="text" disabled="disabled" value="<?php echo number_format($sum_footer_bonus_per_unit, 2); ?>" class="form-control" style="width: 100px; text-align: right" />

            <label style="width: 150px"><?php echo Yii::t('lang', 'total_cash_drawer'); ?>: </label>
            <input type="text" disabled="disabled" value="<?php echo @number_format($sum + $drawcash->draw_price, 2); ?>" class="form-control" style="width: 100px; text-align: right" />
        </div>
        <br />
    <?php endif; ?>
</div>
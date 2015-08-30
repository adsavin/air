<?php $this->renderPartial('//Config/SetLanguage'); ?>

<?php 
if (empty($result)) {
	echo "<div><strong>".Yii::t('lang', 'no_data_in_the_report_show')."</strong></div>";
} else {
	include_once '../mpdf60/mpdf.php';
	
	// condition
	if ($sale_condition_cash == 'cash') {
		$sale_condition_cash = Yii::t('lang', 'cash');
	}
	if ($sale_condition_credit == 'credit') {
		$sale_condition_credit = Yii::t('lang', 'credit');
	}
	
	$branch_name = $branch->branch_name;
	
	// html text
	$html = "
		<style>
			* {
				font-size: 10px;
			}
			.cell-header {
				text-align: center;
				font-weight: bold;
				border-bottom: #808080 3px double;
			}
			.cell {
				padding: 5px;
				border-bottom: #cccccc 1px solid;
			}
			.footer {
				border-bottom: #cccccc 3px double;
				padding: 5px;
			}
		</style>
	
		<div>".Yii::t('lang', 'daily_sales_report')." : {$date_find}</div>
		<div>".Yii::t('lang', 'branch').": {$branch_name}</div>
		<div>".Yii::t('lang', 'conditions_of_sale').": {$sale_condition_cash} {$sale_condition_credit}</div>
		<br />
	
		<table border='1px'>
			<thead>
				<tr>
					<th width='50px' class='cell-header' style='text-align: right'>".Yii::t('lang', 'sequence')."</th>
					<td width='100px' class='cell-header' style='text-align: center'>".Yii::t('lang', 'date')."</th>
					<th width='80px' class='cell-header' style='text-align: center'>".Yii::t('lang', 'bill_no')."</th>
					<th width='100px' class='cell-header' style='text-align: left'>".Yii::t('lang', 'product_code')."</th>
					<th width='400px' class='cell-header' style='text-align: left'>".Yii::t('lang', 'catalog')."</th>
					<th width='80px' class='cell-header' style='text-align: left'>".Yii::t('lang', 'sales_person')."</th>
					<th width='50px' class='cell-header' style='text-align: right'>".Yii::t('lang', 'price')."</th>
					<th width='100px' class='cell-header' style='text-align: right'>".Yii::t('lang', 'actual_distribution')."</th>
					<td width='80px' class='cell-header' style='text-align: right'>".Yii::t('lang', 'fund')."</th>
					<th width='100px' class='cell-header' style='text-align: right'>".Yii::t('lang', 'earnings_per_piece')."</th>
					<th width='50px' class='cell-header' style='text-align: right'>".Yii::t('lang', 'number')."</th>
					<th width='80px' class='cell-header' style='text-align: right'>".Yii::t('lang', 'total_profit')."</th>
					<th width='100px' class='cell-header' style='text-align: right'>".Yii::t('lang', 'amount_of_money')."</th>
				</tr>
			</thead>

			<tbody>
	";
	
	$html .= "
		</tbody>
	";
	
	$sum = 0;
	$sum_qty = 0;
	$sum_bonus = 0;
	
	// Data
	foreach ($result as $row) {
		$html .= "
			<tr>
				<td class='cell' style='text-align: right'>{$row->no}</td>
				<td class='cell'>{$row->sale_date}</td>
				<td class='cell' style='text-align: center'>{$row->bill_id}</td>
				<td class='cell' style='text-align: left'>{$row->barcode}</td>
        <td class='cell' style='text-align: left'>{$row->name}</td>
        <td class='cell'>{$row->bill_status}</td>
        <td class='cell' style='text-align: right'>{$row->price}</td>
        <td class='cell' style='text-align: right'>{$row->sale_price}</td>
        <td class='cell' style='text-align: right'>{$row->price_old}</td>
        <td class='cell' style='text-align: right'>{$row->bonus_per_unit}</td>
        <td class='cell' style='text-align: right'>{$row->qty}</td>
        <td class='cell' style='text-align: right;'>{$row->total_bonus}</td>
        <td class='cell' style='text-align: right'>{$row->total_income}</td>
			</tr>";

		$sum_qty += $row->qty;
		$sum_bonus += $row->total_bonus;
		$sum += $row->total_income;
	}
	
	$sum_qty = number_format($sum_qty);
	$sum_bonus = number_format($sum_bonus, 2);
	$sum = number_format($sum, 2);

	$html .= "
		<tfoot>
			<tr>
				<td colspan='9'>".Yii::t('lang', 'sum')."</td>
				<td class='footer' style='text-align: right'></td>
				<td class='footer' style='text-align: right'>{$sum_qty}</td>
				<td class='footer' style='text-align: right'>{$sum_bonus}</td>
				<td class='footer' style='text-align: right'>{$sum}</td>
			</tr>	
		</tfoot>
	</table>
	";
	
	// Generate PDF
	$mpdf = new mPDF('th', 'A4-L', 0, 0, 5, 5, 5, 5);
	$mpdf->WriteHTML($html);
	$mpdf->Output();
}
?>

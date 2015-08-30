<?php $this->renderPartial('//Config/SetLanguage'); ?>

<?php

date_default_timezone_set('Asia/Vientiane');
@ini_alter('date.timezone', 'Asia/Vientiane');

include_once '../mpdf60/mpdf.php';

$billSaleId = $billSale->bill_sale_id;
$billSale = BillSale::model()->findByPk($billSaleId);

$billConfig = BillConfig::model()->find();
$fontSize = $billConfig->slip_font_size;

$configSoftware = ConfigSoftware::model()->find();
$bill_slip_title = $configSoftware->bill_slip_title;

// header bill
$td_logo = '';

if ($org->org_logo_show_on_bill == 'yes') {
    $td_logo = "
		<td>
			<img src='upload/{$org->org_logo}' width='45px' />
		</td>
	";
}

$html = "
	<table width='100%'>
		<tr>
			$td_logo
			<td>
                <div>{$bill_slip_title}</div>
				<div style='font-size: {$fontSize}px; text-align: center;'>
					{$org->org_name}
				</div>
				<div style='font-size: {$fontSize}px; text-align: center;'>
					<div>TAX: {$org->org_tax_code}</div>
					<div>" . Yii::t('lang', 'phone_number') . ".{$org->org_tel}</div>
				</div>
				<div style='font-size: {$fontSize}px; text-align: center;'>
					Bill NO: {$billSaleId}
				</div>
			</td>
		</tr>
	</table>
	<br />
    ";

// body bill
$sum = 0;
$sum_qty = 0;

$html .= "<table width='100%'>";
$n = 1;

foreach ($billSaleDetail as $r) {
    $product_code = $r->bill_sale_detail_barcode;
    $product_name = $r->product->product_name;
    $product_price = $r->bill_sale_detail_price;
    $product_qty = $r->bill_sale_detail_qty;

    $price_per_row = ($product_qty * $product_price);

    $sum += $price_per_row;
    $sum_qty += $product_qty;

    $product_price = number_format($product_price);
    $price_per_row = number_format($price_per_row);

    // find name of product
    if (empty($product_name)) {
        $productPrice = BarcodePrice::model()->findByPk($product_code);
        $fk = $productPrice->barcode_fk;
        $productRelate = Product::model()->findByAttributes(array(
            'product_code' => $fk
        ));

        $product_name = $productRelate->product_name . " ({$productPrice->name})";
    }

    $html .= "
    	<tr>
        <td>
          <div style='font-size: {$fontSize}px; padding-top: 1px; padding-bottom: 1px;'> 
    		    {$n}) {$product_name} {$product_qty} x {$product_price} = {$price_per_row}
    	   </div>
        </td>
      </tr>";

    $n++;
}

$html .= "</table>";
$html .= "<br />";

// footer
$vat = number_format(($sum * .07), 2);
$sum = number_format($sum, 2);
$input = number_format($billSale->input_money, 2);
$change = number_format($billSale->return_money, 2);
$bonus = number_format($billSale->bonus_price, 2);
$vat_type = $billSale->vat_type;

$total = $billSale->total_money;

$date_time = $billSale->bill_sale_pay_date;
$date_time = explode(' ', $date_time);

$t = $date_time[1];
$full_time = explode(':', $date_time[1]);

$h = $full_time[0];
$i = $full_time[1];
$s = $full_time[2];

$h += $configSoftware->count_hour;
$t = "{$h}:{$i}:{$s}";

$date_time = explode('-', $date_time[0]);
$y = $date_time[0];
$m = $date_time[1];
$d = $date_time[2];

$date_time = "{$d}/{$m}/{$y} {$t}";

$sum_text = ($total - $vat);
$sum_text = number_format($sum_text, 2);
$total_text = number_format($total, 2);

$html .= "<div style='font-size: {$fontSize}px;'>" . Yii::t('lang', 'total') . ": $sum_qty";

if ($billSale->bill_sale_vat == 'vat') {
    $html .= "&nbsp;&nbsp; VAT: $vat";
}

$html .= "
	</div>
    <div style='font-size: ${fontSize}px;'>" . Yii::t('lang', 'sum') . ": $total_text</div>
    <div style='font-size: {$fontSize}px;'>" . Yii::t('lang', 'receive_money') . ": $input</div>
    <div style='font-size: {$fontSize}px;'>" . Yii::t('lang', 'discount') . ": $bonus</div>
    <div style='font-size: {$fontSize}px;'>" . Yii::t('lang', 'refund') . ": $change</div>
    <br />

    ";

if ($billSale->bill_sale_vat == 'vat') {
    $html .= "<div style='font-size: {$fontSize}px;'>" . Yii::t('lang', 'type_vat') . ": $vat_type</div>";
}

$html .= "<br /><div style='font-size: {$fontSize}px'>$date_time</div>";

if (!empty($configSoftware->bill_slip_footer)) {
    $fontSizeFooter = $fontSize - 2;
    $html .= "<div style='margin-top: 5px; font-size: {$fontSizeFooter}px'>* {$configSoftware->bill_slip_footer}</div>";
}

$w = $billConfig->slip_width > 0 ? $billConfig->slip_width : 100;
$h = $billConfig->slip_height > 0 ? $billConfig->slip_height : 160;
$mpdf = new mPDF(Yii::app()->language, array($w, $h), 0, 0, 5, 5, 5, 5);
//$mpdf = new mPDF(Yii::app()->language, 'A6', 0, 0, 5, 5, 5, 5);
$mpdf->WriteHTML($html);
$mpdf->Output();

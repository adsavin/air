<?php

$this->renderPartial('//Config/SetLanguage');

include_once '../mpdf60/mpdf.php';

$nowThai = Util::nowThai();
$configSoftware = ConfigSoftware::model()->find();
$billConfig = BillConfig::model()->find();

// style
$style = "
	<style>
		.text {
			font-size: 13px;
		}
		.bold {
			font-weight: bold;
		}
		.red {
			font-color: #FF0000;
		}
		.cell {
			padding: 5px;
			font-size: 13px;
";

if ($billConfig->bill_add_show_line == 'yes') {
    $style .= "border-bottom: #cccccc 1px solid;";
}

$style .= "
		}
		.cell-header {
			text-align: center;
			background: #cccccc;
		}
		.right {
			text-align: right;
		}
		.center {
			text-align: center;
		}
		.cell-footer {
			font-size: 13px;
		}
	</style>
";

// header text
$header_text = "
	<div>
		<div class='center bold'>
			" . Yii::t('lang', 'tax_invoice') . "
		</div>
	</div>
	<div>
		<span class='text'>
			" . Yii::t('lang', 'bill_no') . ": <span class='bold'>{$billSale->bill_sale_id}</span>
			" . Yii::t('lang', 'date') . ": <span class='bold red'>{$nowThai}</span>
		</span>
	</div>
	<div>
		<span class='text'>
			<span class='bold red'>{$org->org_name}</span>
		</span>
		<span class='text'>
			" . Yii::t('lang', 'branch') . ":
			<span class='bold red'>{$billSale->branch->branch_name}</span>
		</span>
	</div>
	<div>
		<span class='text'>
			<div>{$org->org_address_1}</div>
			<div>{$org->org_address_2}</div>
			<div>{$org->org_address_3}</div>
			<div>{$org->org_address_4}</div>
			<div>
				<span style='padding-right: 40px'>
					" . Yii::t('lang', 'tax_identification_number') . ": {$org->org_tax_code}
				</span>
				
				<span style='padding-right: 40px'>
					" . Yii::t('lang', 'phone') . ": {$org->org_tel}				
				</span>
				
				<span>
					" . Yii::t('lang', 'fax') . ": {$org->org_fax}
				</span>
			</div>	
		</span>
	</div>

";

if ($billSale->member_id != 0) {
    $header_text .= "
	<div>
		<span class='text'>
			<div class=''>
				<strong>" . Yii::t('lang', 'customers') . "</strong>
				<span>
					{$billSale->member->member_code} 
					{$billSale->member->member_name}
				</span>

				<strong>" . Yii::t('lang', 'contact') . ": </strong>
				<span>{$billSale->member->member_tel}</span>

				<strong>" . Yii::t('lang', 'tax_identification_number') . ": </strong>
				<span>{$billSale->member->tax_code}</span>
			</div>
			<div>{$billSale->member->member_address}</div>
		</span>
	</div>
";
}

if (!empty($billSale->customer_name)) {
    $header_text .= "
	<div>
		<span class='text'>
			<div class=''>
				<strong>" . Yii::t('lang', 'customers') . "</strong>
				<span>
					{$billSale->customer_name}
				</span>

				<strong>" . Yii::t('lang', 'contact') . ": </strong>
				<span>{$billSale->customer_tel}</span>

				<strong>" . Yii::t('lang', 'tax_identification_number') . ": </strong>
				<span>{$billSale->customer_tax}</span>
			</div>
			<div>{$billSale->customer_address}</div>
		</span>
	</div>
";
}

// body
$body_text = "
	<table width='100%'>
		<thead>
			<tr>
				<td class='cell cell-header' width='40px'>" . Yii::t('lang', 'sequence') . "</td>
				<td class='cell cell-header' width='100px'>" . Yii::t('lang', 'product_code') . "</td>
				<td class='cell cell-header'>" . Yii::t('lang', 'list') . "</td>
				<td class='cell cell-header' width='50px'>" . Yii::t('lang', 'number') . "</td>
				<td class='cell cell-header' width='110px'>" . Yii::t('lang', 'unit_price') . "</td>
				<td class='cell cell-header' width='70px'>" . Yii::t('lang', 'total_price') . "</td>
			</tr>
		</thead>
";

$n = 1;
$sumPrice = 0;

$criteria = new CDbCriteria();
$criteria->compare('bill_id', $billSale->bill_sale_id);

$billSaleDetails = BillSaleDetail::model()->findAll($criteria);

foreach ($billSaleDetails as $billSaleDetail) {
    $qty = $billSaleDetail->bill_sale_detail_qty;
    $price = $billSaleDetail->bill_sale_detail_price;
    $totalPricePerRow = ($qty * $price);

    $sumPrice += $totalPricePerRow;
    $totalPricePerRowOutput = number_format($totalPricePerRow);
    $product_name = $billSaleDetail->product->product_name;
    $product_code = $billSaleDetail->bill_sale_detail_barcode;

    // find name of product
    if (empty($product_name)) {
        $productPrice = BarcodePrice::model()->findByPk($product_code);
        $fk = $productPrice->barcode_fk;
        $productRelate = Product::model()->findByAttributes(array(
            'product_code' => $fk
        ));

        $product_name = $productRelate->product_name . " ({$productPrice->name})";
    }

    $body_text .= "
		<tr>
			<td class='cell right'>{$n}</td>
			<td class='cell center'>{$product_code}</td>
			<td class='cell'>{$product_name}</td>
			<td class='cell right'>{$qty}</td>
			<td class='cell right'>{$price}</td>
			<td class='cell right'>{$totalPricePerRowOutput}</td>
		</tr>
	";
    $n++;
}
$body_text .= "</table>";

// Footer
$vat = 0.00;

if ($billSale->bill_sale_vat == 'vat') {
    $vat = (0.07 * $sumPrice);
}

$vatText = number_format($vat, 2);
$sumPriceText = number_format($sumPrice, 2);
$beforeSumPrice = number_format($sumPrice - $vat, 2);

$vat_type = $billSale->vat_type;

if ($vat_type == 'out') {
    $beforeSumPrice = $billSale->total_money - $billSale->out_vat;
    $sumPriceText = $billSale->total_money;
}

$style_border = "";

if ($billConfig->bill_add_show_line == 'yes') {
    $style_border = "style='border-bottom: 3px double #000000'";
}

$footer_text = "
<br />
<table width='100%'>
	<tr>
		<td class='cell-footer right'>" . Yii::t('lang', 'type_vat') . "</td>
		<td class='cell-footer right' width='50px'>{$vat_type}</td>
	</tr>
	<tr>
		<td class='cell-footer right'>" . Yii::t('lang', 'before_that_summit') . " vat</td>
		<td class='cell-footer right'>{$beforeSumPrice}</td>
	</tr>
	<tr>
		<td class='cell-footer right'>" . Yii::t('lang', 'value_added_tax_vat') . "</td>
		<td class='cell-footer right'>{$vatText}</td>
	</tr>
	<tr>
		<td class='cell-footer red right'>" . Yii::t('lang', 'net_balance') . "</td>
		<td class='cell-footer right'>
			<font $style_border>{$sumPriceText}</font>
		</td>
	</tr>
</table>

<br />
<br />
<table>
	<tr>
		<td style='text-align: center'>" . Yii::t('lang', 'reciever') . "</td>
		<td style='text-align: center'>" . Yii::t('lang', 'forwarder') . "</td>
		<td style='text-align: center'>" . Yii::t('lang', 'inspector') . "</td>
	</tr>
	<tr>
		<td style='padding-top: 50px'>......................................................</td>
		<td style='padding-top: 50px'>......................................................</td>
		<td style='padding-top: 50px'>......................................................</td>
	</tr>
	<tr>
		<td>" . Yii::t('lang', 'date') . "</td>
		<td>" . Yii::t('lang', 'date') . "</td>
		<td>" . Yii::t('lang', 'date') . "</td>
	</tr>
</table>
";

// HTML
$html = "
	$style
	$header_text
	$body_text
	$footer_text
";

if (!empty($configSoftware->bill_vat_footer)) {
    $html .= "<div style='margin-top: 5px; font-size: 10px'>* {$configSoftware->bill_vat_footer}</div>";
}

// paper size
$w = $billConfig->bill_add_tax_width;
$h = $billConfig->bill_add_tax_height;

if ($w == 0 && $h == 0) {
    // paper
    $paper = $billConfig->bill_add_tax_paper;
    $position = $billConfig->bill_add_tax_position;

    if ($position != 'horizontal') {
        $position = "-L";
    } else {
        $position = "";
    }

    $paper = "{$paper}{$position}";
} else {
    // custom size
    $paper = array($w, $h);
}

// MPDF Render
$mpdf = new mPDF(Yii::app()->language, $paper, 0, 0, 5, 5, 5, 5);
$mpdf->WriteHTML($html);
$mpdf->Output();
?>



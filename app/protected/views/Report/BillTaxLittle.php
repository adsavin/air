<?php $this->renderPartial('//Config/SetLanguage'); ?>

<?php

include_once '../mpdf60/mpdf.php';

$w = $billConfig->slip_width;
$h = $billConfig->slip_height;
$font_size = $billConfig->slip_font_size;

$pdf = new mPDF(Yii::app()->language, array($w, $h), 0, 0, 5, 5, 5, 5);

/*
 * Logo
 */
$org = Organization::model()->find();
$logo = $org->org_logo;

$img = '';

if (!empty($logo)) {
  $img = "<tr><td align='center'><img src='upload/{$logo}' width='35px' height='30px' /></td></tr>";
}

/*
 * Document
 */
$html = '';
$html .= "
  <table>
    {$img}
    <tr>
      <td align='center' style='font-size: {$font_size}px'>
        <strong>".Yii::t('lang', 'invoice_summary')." #{$billSale->bill_sale_id}</strong>
      </td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td align='center' style='font-size: {$font_size}px'>
        {$org->org_name}
        ".Yii::t('lang', 'branch')."
        {$billSale->branch->branch_name}
      </td>
    </tr>
    <tr>
      <td align='center' style='font-size: {$font_size}px'>
        {$org->org_address_1}
      </td>
    </tr>
    <tr>
      <td align='center' style='font-size: {$font_size}px'>
        {$org->org_address_2}
      </td>
    </tr>
    <tr>
      <td align='center' style='font-size: {$font_size}px'>
        ".Yii::t('lang', 'phone_number').": {$org->org_tel},
      </td>
    </tr>
    <tr>
      <td align='center' style='font-size: {$font_size}px'>
        ".Yii::t('lang', 'no_taxpayers').": {$org->org_tax_code}
      </td>
    </tr>
  </table>
  <hr />";

/*
 * Items
 */
$i = 1;
$sumQty = 0;
$sumTotal = 0;

$html .= "
<table width='100%'>
  <tbody>
  ";

  foreach ($billSaleDetails as $billSaleDetail) {
    $total = ($billSaleDetail->bill_sale_detail_price * $billSaleDetail->bill_sale_detail_qty);

    $html .= "
    <tr>
      <td style='font-size: {$font_size}px'>{$i}.</td>
      <td style='font-size: {$font_size}px'>{$billSaleDetail->product->product_name}</td>
      <td style='font-size: {$font_size}px' align='right'>{$billSaleDetail->bill_sale_detail_price} x {$billSaleDetail->bill_sale_detail_qty} = {$total}</td>
    </tr>
    ";

    $i++;
    $sumTotal += $total;
    $sumQty += $billSaleDetail->bill_sale_detail_qty;
  }

  $html .= "
  </tbody>
</table>
";

/*
 * Summary
 */
$vat_type = '';
$sumTotalVatText = '';
$sumTotalPrice = 0;
$sumTotalPriceText = '';
$sumTotalText = '';

if ($billSale->bill_sale_vat == 'vat') {
  if ($billSale->vat_type == 'in') {
    $vat_type = '#Included Vat';

    /*
     * Total Vat
    */
    $sumTotalVat = 0;

    foreach ($billSaleDetails as $billSaleDetail) {
      $sumTotalVat += $billSaleDetail->bill_sale_detail_price_vat;
    }

    $sumTotal -= $sumTotalVat;

    $sumTotalPrice = ($sumTotal + $sumTotalVat);
  } else {
    // External Vat
    foreach ($billSaleDetails as $billSaleDetail) {
      $sumTotalVat += $billSaleDetail->bill_sale_detail_price_vat;
    }

    $sumTotalPrice = ($sumTotal + $sumTotalVat);
  }

  $sumTotalVatText = number_format($sumTotalVat, 2);
  $sumTotalPriceText = number_format($sumTotalPrice, 2);
  $sumTotalText = number_format($sumTotal, 2);
}

$bill_footer = '';

if (!empty($configSoftware->bill_vat_footer)) {
  $bill_footer = "<div style='font-size: {$font_size}px'>{$configSoftware->bill_vat_footer}</div>";
}

$html .= "
  <hr />
  <table>
    <tr>
      <td style='font-size: {$font_size}px' align='right'>".Yii::t('lang', 'sum').":</td>
      <td style='font-size: {$font_size}px' align='right'>{$sumTotalText}</td>
    </tr>
    <tr>
      <td style='font-size: {$font_size}px' align='right'>Vat:</td>
      <td style='font-size: {$font_size}px' align='right'>{$sumTotalVatText}</td>
    </tr>
    <tr>
      <td style='font-size: {$font_size}px' align='right'>".Yii::t('lang', 'total').":</td>
      <td style='font-size: {$font_size}px' align='right'>{$sumTotalPriceText}</td>
    </tr>
    <tr>
      <td align='cener' colspan='2' style='font-size: {$font_size}px'>
        <br />
        {$vat_type}
      </td>
    </tr>
  </table>

  {$bill_footer}
";

/*
 * Output
 */
$pdf->WriteHTML($html);
$pdf->Output();
?>
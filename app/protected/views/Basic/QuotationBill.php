<?php

include_once '../mpdf60/mpdf.php';

$this->renderPartial('//Config/SetLanguage');

$pdf = new mPDF("th");

$created_at = Util::DateThai($quotation->created_at);

// style
$html = "
<style>
  .cell-header {
    border-top: #808080 1px solid;
    border-bottom: #808080 3px double;
  }
  .cell-body {
    border-bottom: #808080 1px solid;
  }
  .cell-footer {
    border-bottom: #808080 1px solid;
  }
  .cell {
    border: #808080 1px solid;
    padding: 10px;
  }
</style>
";

$html .= "<div style='text-align: center; font-weight: bold;'>".Yii::t('lang', 'quotation')."</div>";
$html .= "<div style='margin-top: 10px; text-align: right'>".Yii::t('lang', 'number').": {$quotation->id}</div>";
$html .= "<div style='text-align: right'>".Yii::t('lang', 'date').": {$created_at}</div>";
$html .= "<div style='margin-top: 2px;'>".Yii::t('lang', 'dear')." {$quotation->customer_name}</div>";
$html .= "
  <div style='margin-top: 10px;'>
  &nbsp;&nbsp;&nbsp;&nbsp;
  ".Yii::t('lang', 'address')." {$quotation->customer_address} ".Yii::t('lang', 'tax_identification_number')." {$quotation->customer_tax}
  ".Yii::t('lang', 'i_am')." {$org->org_name} ".Yii::t('lang', 'address')." {$org->org_address_1} {$org->org_address_2} {$org_address_3} {$org_address_4} ".Yii::t('lang', 'phone')." {$org->org_tel} ".Yii::t('lang', 'tax_identification_number')." {$org->org_tax_code} ".Yii::t('lang', 'i_offer_the_following_list_of_parcels')."
  </div>";
$html .= "
  <table style='margin-top: 15px' width='100%' cellpadding='5px' cellspacing='0px'>
    <thead>
      <tr>
        <th class='cell-header'>".Yii::t('lang', 'sequence')."</th>
        <th class='cell-header' style='text-align: left'>".Yii::t('lang', 'list')."</th>
        <th class='cell-header'>".Yii::t('lang', 'number')."</th>
        <th class='cell-header'>".Yii::t('lang', 'per_unit')."</th>
        <th class='cell-header'>".Yii::t('lang', 'discount')."</th>
        <th class='cell-header'>".Yii::t('lang', 'balance')."</th>
      </tr>
    </thead>
    <tbody>";
    $n = 1;
    $sum = 0;
    $sumSub = 0;
    $sumOldPrice = 0;
    $sumSalePrice = 0;

    foreach ($quotationDetails as $quotationDetail) {
      $qty = number_format($quotationDetail->qty);
      $oldPrice = number_format($quotationDetail->old_price);
      $sub = number_format($quotationDetail->sub);
      $salePrice = number_format($quotationDetail->sale_price);

      $sum += ($quotationDetail->qty * $quotationDetail->sale_price);
      $sumSub += $quotationDetail->sub;
      $sumOldPrice += $quotationDetail->old_price;
      $sumSalePrice += $quotationDetail->sale_price;

      $html .= "
      <tr>
        <td class='cell-body' style='width: 50px; text-align: right'>{$n}</td>
        <td class='cell-body'>{$quotationDetail->getProduct()->product_name}</td>
        <td class='cell-body' style='width: 50px; text-align: right'>{$qty}</td>
        <td class='cell-body' style='width: 70px; text-align: right'>{$oldPrice}</td>
        <td class='cell-body' style='width: 70px; text-align: right'>{$sub}</td>
        <td class='cell-body' style='width: 70px; text-align: right'>{$salePrice}</td>
      </tr>
      ";

      $n++;
    }

$sumSalePrice = ($sumSalePrice + $sumSub);
$sumOldPrice = ($sumSalePrice - $sumSub);

$sumSubText = number_format($sumSub, 2);
$sumSalePriceText = number_format($sumSalePrice, 2);


// compute vat
$sumPrice = ($sumSalePrice - $sumSub);
$sumPrice = ($sumPrice * $quotation->vat) / 100;
$sumPriceText = number_format($sumPrice, 2);

$sumSalePriceText = number_format($sumSalePrice, 2);
$sumOldPriceText = number_format($sumSalePrice - $sumSub, 2);

// add vat
$sumSalePriceTotal = ($sumOldPrice + $sumPrice);
$sumSalePriceTotalText = number_format($sumSalePriceTotal, 2);

// thai money
$thaiMoney = Util::convertNumberToText(number_format($sumSalePriceTotal, 2));

$html .= "
    </tbody>
    <tfoot>
      <tr>
        <td colspan='3'></td>
        <td colspan='2'>".Yii::t('lang', 'sum')."</td>
        <td class='cell-footer' style='text-align: right'>{$sumSalePriceText}</td>
      </tr>
      <tr>
        <td colspan='3'></td>
        <td colspan='2'>".Yii::t('lang', 'discount')."</td>
        <td class='cell-footer' style='text-align: right'>{$sumSubText}</td>
      </tr>
      <tr>
        <td colspan='3'></td>
        <td colspan='2'>".Yii::t('lang', 'product_value')."</td>
        <td class='cell-footer' style='text-align: right'>{$sumOldPriceText}</td>
      </tr>
      <tr>
        <td colspan='3'></td>
        <td colspan='2'>".Yii::t('lang', 'vat_percent')."</td>
        <td class='cell-footer' style='text-align: right'>{$quotation->vat}</td>
      </tr>
      <tr>
        <td colspan='3'></td>
        <td colspan='2'>".Yii::t('lang', 'tax')."</td>
        <td class='cell-footer' style='text-align: right'>{$sumPriceText}</td>
      </tr>
      <tr>
        <td colspan='3'></td>
        <td colspan='2'>".Yii::t('lang', 'net')."</td>
        <td class='cell-footer' style='text-align: right; border-bottom: #808080 3px double'>{$sumSalePriceTotalText}</td>
      </tr>
      <tr>
        <td colspan='6'>".Yii::t('lang', 'totaling')." {$thaiMoney}</td>
      </tr>
    </tfoot>
  </table>";

if (empty($quotation->quotation_pay)) {
  $quotation->quotation_pay = Yii::t('lang', 'cash');
} else {
  if ($quotation->quotation_pay != "cash") {
    $quotation->quotation_pay = Yii::t('lang', 'credit');
  } else {
    $quotation->quotation_pay = Yii::t('lang', 'cash');
  }
}

// ชื่อผู้เสนอราคา
$user_id = Yii::app()->request->cookies['user_id']->value;
$user = User::model()->findByPk($user_id);
$user_name = $user->user_name;

$html .= "
  <table width='100%'>
    <tr>
      <td class='cell' style='width: 200px;'>".Yii::t('lang', 'standing')." {$quotation->quotation_day} ".Yii::t('lang', 'day')."</td>
      <td class='cell'>".Yii::t('lang', 'customers')."</td>
      <td class='cell'>".Yii::t('lang', 'bidder')."</td>
    </tr>
    <tr valign='top'>
      <td class='cell'>
        <div>".Yii::t('lang', 'due_within')." {$quotation->quotation_send_day} ".Yii::t('lang', 'day')."</div>
        <div>".Yii::t('lang', 'since_the_signing_of_the_contract')."</div>
      </td>
      <td class='cell' rowspan='2'>
        <div>".Yii::t('lang', 'sign')."</div>
        <div style='text-align: center; display: inline-block;'>
          <br />
          <br />
          <br />
          <br />
          <div>(..............................................)</div>
          <br />
          <div>".Yii::t('lang', 'the_agreed_price')."</div>
        </div>
      </td>
      <td class='cell' rowspan='2'>
        <div>".Yii::t('lang', 'sign')."</div>
        <divstyle='text-align: center; display: inline-block;'>
          <br />
          <br />
          <br />
          <br />
          <div>(..............................................)</div>
          <br />
          ".Yii::t('lang', 'bidder')."
        </div>
      </td>
    </tr>
    <tr>
      <td class='cell'>".Yii::t('lang', 'term_of_payment')." {$quotation->quotation_pay}</td>
    </tr>
  </table>
";

$pdf->WriteHTML($html);
$pdf->Output();

?>

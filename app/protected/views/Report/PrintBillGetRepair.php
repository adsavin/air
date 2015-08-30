<?php $this->renderPartial('//Config/SetLanguage'); ?>

<?php

include_once '../mpdf60/mpdf.php';

$html = "
  <style>
    .label {
      text-align: right;
      font-weight: bold;
    }
  </style>

  <div style='text-align: center; font-weight: bold; font-size: 16px'>".Yii::t('lang', 'repair_bill')." {$org->org_name}</div>
  <div style='text-align: center'>
    <div>{$org->org_address_1} {$org->org_address_2} {$org->org_address_3} {$org->org_address_4} </div>
    <div>".Yii::t('lang', 'phone_number').": {$org->org_tel} Fax: {$org->org_fax}</div>
    <div>".Yii::t('lang', 'tax_identification_number').": {$org->org_tax_code}</div>
  </div>
  <table width='100%' style='margin-top: 20px'>
    <tr>
      <td width='120px' class='label'>".Yii::t('lang', 'no_leaves_repair')."</td>
      <td>{$repair->repair_id}</td>
    </tr>
    <tr>
      <td width='140px' class='label'>".Yii::t('lang', 'product_code')."</td>
      <td>{$repair->product_code}</td>

      <td width='100px' class='label'>".Yii::t('lang', 'product_name')."</td>
      <td>{$repair->repair_product_name}</td>
    </tr>
    <tr>
      <td width='120px' class='label'>".Yii::t('lang', 'customers')."</td>
      <td>{$repair->repair_name}</td>

      <td width='100px' class='label'>".Yii::t('lang', 'contact')."</td>
      <td>{$repair->repair_tel}</td>
    </tr>
    <tr>
      <td width='120px' class='label'>".Yii::t('lang', 'the_recipient')."</td>
      <td>รหัส {$repair->user_id} : {$repair->user->user_name}</td>

      <td width='100px' class='label'>".Yii::t('lang', 'date_of_transaction')."</td>
      <td>{$repair->repair_created_date}</td>
    </tr>
    <tr>
      <td width='120px' class='label'>".Yii::t('lang', 'date_repair')."</td>
      <td>{$repair->repair_date}</td>

      <td width='100px' class='label'>".Yii::t('lang', 'problem_symptoms')."</td>
      <td>{$repair->repair_problem}</td>
    </tr>
    <tr>
      <td width='120px' class='label'>".Yii::t('lang', 'service_fees')."</td>
      <td>{$repair->repair_price}</td>

      <td width='100px' class='label'>".Yii::t('lang', 'operations')."</td>
      <td>{$repair->repair_detail}</td>
    </tr>
    <tr>
      <td width='120px' class='label'>".Yii::t('lang', 'the_cause_symptoms')."</td>
      <td>{$repair->repair_original}</td>
    </tr>
    <tr>
      <td width='120px' class='label'>".Yii::t('lang', 'type_repair')."</td>
      <td>{$repair->getRepairType()}</td>

      <td width='100px' class='label'>".Yii::t('lang', 'Status')."</td>
      <td>{$repair->getStatus()}</td>
    </tr>
  </table>
";

$mpdf = new mPDF('th');
$mpdf->WriteHTML($html);
$mpdf->Output();

?>
<?php 

include_once '../mpdf60/mpdf.php';

$w = $data['barcode_width'];
$h = $data['barcode_height'];
$rows = $data['rows'];
$cols = $data['columns'];
$font_size = $data['font_size'];
$text_align = $data['text_alignment'];

$html = '';

$html .= "
<style>
  .barcode {
    margin-bottom: 2px;
  }
</style>
";

// render table
$html .= "<table>";

for ($i = 0; $i < $rows; $i++) {
  // start row
  $html .= "<tr>";

  // render cell
  for ($j = 0; $j < $cols; $j++) {
    // start cell
    $html .= "<td align='{$text_align}'>";

    // product name
    $html .= "<div style='font-size: {$font_size}px'>".$product->product_name."</div>";

    // product price
    $html .= "<div style='font-size: {$font_size}px; margin-bottom: 10px'>".$product->product_price;

    if ($data['show_product_price_send'] == 'show') {
      $html .= " / {$product->product_price_send}";
    }

    $html .= ".-</div>";

    // barcode
    $code = $product->product_code;
    $html .= "
        <div><barcode size='".$w."' height='".$h."' code='{$code}' type='I25' /></div>
        <div style='font-size: {$font_size}px'>{$code}</div>";
    
    // end cell
    $html .= "</td>";
  }

  // end row
  $html .= "</tr>";
}

$html .= "</table>";

$pdf = new mPDF('th', 'A4', '','' , 0 , 0 , 2 , 0 , 0 , 0); 
$pdf->WriteHTML($html);
$pdf->SetDisplayMode('fullpage');
$pdf->Output();

?>
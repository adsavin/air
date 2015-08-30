<?php $this->renderPartial('//Config/SetLanguage'); ?>

<script>
  function browseFile() {
    $("#excel_file").trigger("click");
    $("#formUpload").change(function() {
      var f = $("#excelFile");
      
      if (f != null) {
        document.formUpload.submit();
      }
    });
  }
</script>

<form name="formProductExcel" action="" style="display: none">
  <input type="hidden" name="excelFile" id="excelFile" />
</form>

<div class="panel panel-info" style="margin: 10px">
  <div class="panel-heading"><?php echo Yii::t('lang', 'select_the_file_from_excel'); ?></div>
  <div class="panel-body">
    <div class="alert alert-danger">
      * <?php echo Yii::t('lang', 'the_exact_information_will_be_sorted_below'); ?>
    </div>

    <h4><?php echo Yii::t('lang', 'for_example_data_in_excel_example_product_csv_do_not_need_a_top_but_the_only_information'); ?></h4>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width="50px"><?php echo Yii::t('lang', 'sequence'); ?></th>
          <th width="200px"><?php echo Yii::t('lang', 'product_code'); ?></th>
          <th><?php echo Yii::t('lang', 'product_name'); ?></th>
          <th width="100px"><?php echo Yii::t('lang', 'cost_price'); ?></th>
          <th width="100px"><?php echo Yii::t('lang', 'selling_price'); ?></th>
          <th width="120px"><?php echo Yii::t('lang', 'remaining_number'); ?></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>8850127044003</td>
          <td>ไมโลแอดทิฟ-บี 35กรัม/ซอง</td>
          <td>3</td>
          <td>8</td>
          <td>26</td>
        </tr>
        <tr>
          <td>2</td>
          <td>8850157400916</td>
          <td>เบนโตะ</td>
          <td>4</td>
          <td>50</td>
          <td>37</td>
        </tr>
        <tr>
          <td>3</td>
          <td>8851123212205</td>
          <td>M SPORT/หีบ</td>
          <td>0</td>
          <td>210</td>
          <td>94</td>
        </tr>
      </tbody>
    </table>

    <a href="#" class="btn btn-info btn-lg" onclick="browseFile()">
      <i class="glyphicon glyphicon-download"></i>
      <?php echo Yii::t('lang', 'select_a_file_to_import_click_here_file_extension_csv_only'); ?>
    </a>

    <form id="formUpload" name="formUpload" method="post" action="index.php?r=Config/ProductImportFromExcelFile" enctype="multipart/form-data" style="display: none">
      <input type="file" id="excel_file" name="excel_file" />
    </form>
  </div>
</div>
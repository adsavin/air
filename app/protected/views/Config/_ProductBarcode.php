<?php $this->renderPartial('//Config/SetLanguage'); ?>

<form method="post" action="index.php?r=Config/GenBarcode" name="formGenBarcode" class="form-inline" target="_blank">
  <div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width="40px"><?php echo Yii::t('lang', 'Choose'); ?></th>
          <th width="200px"><?php echo Yii::t('lang', 'list'); ?></th>
          <th><?php echo Yii::t('lang', 'value'); ?></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td></td>
          <td><?php echo Yii::t('lang', 'size'); ?></td>
          <td><input type="text" class="form-control" name="barcode_width" style="width: 100px; text-align: right" value="0.5"> cm.</td>
        </tr>
        <tr>
          <td></td>
          <td><?php echo Yii::t('lang', 'height'); ?></td>
          <td><input type="text" class="form-control" name="barcode_height" style="width: 100px; text-align: right" value="1.0"> cm.</td>
        </tr>
        <tr>
          <td></td>
          <td><?php echo Yii::t('lang', 'columns'); ?></td>
          <td><input type="text" class="form-control" name="columns" style="width: 100px; text-align: right" value="10" /></td>
        </tr>
        <tr>
          <td></td>
          <td><?php echo Yii::t('lang', 'rows'); ?></td>
          <td><input type="text" class="form-control" name="rows" style="width: 100px; text-align: right" value="10" /></td>
        </tr>
        <tr>
          <td></td>
          <td><?php echo Yii::t('lang', 'text_size_px'); ?></td>
          <td><input type="text" class="form-control" name="font_size" style="width: 100px; text-align: right" value="9" /> px</td>
        </tr>
        <tr>
          <td></td>
          <td><?php echo Yii::t('lang', 'alignment'); ?></td>
          <td>
            <input type="radio" name="text_alignment" value="left" /> <?php echo Yii::t('lang', 'left'); ?>
            <span style="margin-left: 10px; margin-right: 10px"><input type="radio" name="text_alignment" value="center" checked /> <?php echo Yii::t('lang', 'center'); ?></span>
            <input type="radio" name="text_alignment" value="right" /> <?php echo Yii::t('lang', 'right'); ?>
          </td>
        </tr>
        <tr>
          <td style="text-align: center">
            <input type="checkbox" checked name="show_product_name" value="show" />
          </td>
          <td><?php echo Yii::t('lang', 'show_product_name'); ?></td>
          <td></td>
        </tr>
        <tr>
          <td width="40px" style="text-align: center">
            <input type="checkbox" checked name="show_product_price" value="show" />
          </td>
          <td><?php echo Yii::t('lang', 'show_product_price'); ?></td>
          <td></td>
        </tr>
        <tr>
          <td width="40px" style="text-align: center">
            <input type="checkbox" checked name="show_product_price_send" value="show" />
          </td>
          <td><?php echo Yii::t('lang', 'show_wholesale_price'); ?></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>

  <center>
    <a href="javascript:void(0)" class="btn btn-info btn-lg" onclick="document.formGenBarcode.submit()">
      <i class="glyphicon glyphicon-barcode"></i>
      <?php echo Yii::t('lang', 'create_barcode'); ?>
    </a>
  </center>

  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />

</form>
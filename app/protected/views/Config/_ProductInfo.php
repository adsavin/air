<?php $this->renderPartial('//Config/SetLanguage'); ?>

<script>
  function chooseGroupProduct() {
    $.ajax({
      url: 'index.php?r=Dialog/DialogGroupProduct',
      success: function(data) {
        $("#dialogGroupProduct").html(data);
      }
    });

    return false;
  }

  function genProductCode() {
    $.ajax({
      url: 'index.php?r=Ajax/genProductCode',
      cache: false,
      success: function(data) {
        $("#Product_product_code").val(data);
      }
    });
  }

  function printBarCode() {
    var barcode = $("#Product_product_code").val();
    var url = 'index.php?r=Ajax/PrintBarCode&barcode=' + barcode;
    var left = window.innerWidth / 2;
    var top = window.innerHeight / 2;
    var opt = 'width=300, height=100, left=' + left + ', top=' + top + ', toolbar=no, location=no, menubar=no, titlebar=no';

    window.open(url, null, opt);
  }

  function getGroupProductName() {
    var group_product_code = $("#Product_group_product_id").val();

    $.ajax({
      url: 'index.php?r=Ajax/GetGroupProductInfo',
      dataType: 'json',
      cache: false,
      data: {
        group_product_code: group_product_code
      },
      success: function(data) {
        if (data != null) {
          $("#Product_group_name").val(data.group_product_name);
        }
      }
    });
  }

  $(function() {
    /*$("#tablist").tabs();
    $("#Product_product_code").keydown(function(e) {
      if (e.keyCode == 13 || e.keyCode == 9) {
        isProduct();
      }
    });*/

    <?php if (!empty($model)): ?>
    getGroupProductName();
    <?php endif; ?>
  });

  /*
  function isProduct(e) {
      var code = $("#Product_product_code").val();

      $.ajax({
        url: 'index.php?r=Ajax/GetProductInfo',
        data: {
          product_code: code
        },
        dataType: 'json',
        success: function(data) {
          if (data != null) {
            if (!confirm('<?php echo Yii::t("lang", "complete_list"); ?>') {
              window.location.href = 'index.php?r=Config/ProductForm&id=' + data.product_id;
            } else {
              $("#Product_product_code").val("");
            }
          }
        }
      });
  }
  */
</script>

<div class="pull-left">
      <?php
      $form = $this->beginWidget("CActiveForm", array(
          'htmlOptions' => array(
              'name' => 'formProduct',
              'class' => 'form-inline',
              'enctype' => 'multipart/form-data'
          ),
          'focus' => array($model, 'product_code')
      ));

      echo $form->errorSummary($model);
      ?>
      <div>
        <div class="">
          <label><?php echo Yii::t('lang', 'product_code'); ?></label>
          <?php
          echo $form->textField($model, "product_code", array(
              'class' => 'form-control',
              'style' => 'width: 200px'
          ));
          ?>
          <a href="#" class="btn btn-info" onclick="genProductCode()">
            <i class="glyphicon glyphicon-export"></i>
            <?php echo Yii::t('lang', 'atomatic_code generation'); ?>
          </a>
        </div>
      </div>

      <div>
        <label><?php echo Yii::t('lang', 'product_name'); ?></label>
        <?php
        echo $form->textField($model, "product_name", array(
            'class' => 'form-control',
            'style' => 'width: 400px'
        ));
        ?>
      </div>

      <div>
        <div class="">
          <label for=""><?php echo Yii::t('lang', 'category'); ?></label>
          <?php
          echo $form->textField($model, "group_product_id", array(
              'class' => 'form-control',
              'style' => 'width: 100px',
              'onblur' => 'getGroupProductName()',
              'value' => @$model->group_product->group_product_code
          ));
          ?>
          <?php
          echo $form->textField($model, "group_product_id", array(
              'disabled' => 'disabled',
              'class' => 'form-control',
              'id' => 'Product_group_name',
              'value' => @$model->group_product->group_product_name,
              'style' => 'width: 400px'
          ));
          ?>
          <a href="#" class="btn btn-info" onclick="return chooseGroupProduct()" data-toggle="modal" data-target="#myModal">
            <i class="glyphicon glyphicon-search"></i>
          </a>
        </div>
      </div>

      <div>
        <label for=""><?php echo Yii::t('lang', 'retail_price'); ?></label>
        <?php
        echo $form->textField($model, 'product_price', array(
            'class' => 'form-control',
            'style' => 'width: 100px'
        ));
        ?>

        <label for=""><?php echo Yii::t('lang', 'wholesale_price'); ?></label>
        <?php
        echo $form->textField($model, 'product_price_send', array(
            'class' => 'form-control',
            'style' => 'width: 100px'
        ));
        ?>

      </div>

      <div>
        <label for=""><?php echo Yii::t('lang', 'cost_average'); ?></label>
        <?php
        echo $form->textField($model, 'product_price_buy', array(
            'class' => 'form-control',
            'style' => 'width: 100px'
        ));
        ?>

        <label><?php echo Yii::t('lang', 'often_sellers'); ?></label>
        <input type="checkbox" name="product_tag"
          <?php
          try {
            if (@$model->product_tag == 1) {
              echo "checked";
            }
          } catch (Exception $e) {

          }
          ?> value="1" />

        <label style="margin-left: 38px"><?php echo Yii::t('lang', 'weight_g'); ?></label>
        <input type="text" name="weight" value="<?php echo $model->weight; ?>" class="form-control" style="width: 100px" />
      </div>

      <div>
        <label for=""><?php echo Yii::t('lang', 'more_details'); ?></label>
        <?php
        echo $form->textField($model, "product_detail", array(
            'class' => 'form-control',
            'style' => 'width: 500px'
        ));
        ?>
      </div>

      <div>
        <label><?php echo Yii::t('lang', 'product_images'); ?></label>
        <span>
          <input type="file" name="product_pic" class="form-control" style="width: 300px" />
          * <?php echo Yii::t('lang', 'supported_file_formats_Jpg_png_only'); ?>
        </span>
      </div>

      <div>
        <label for=""><?php echo Yii::t('lang', 'remaining_number'); ?></label>
        <?php
        echo $form->textField($model, "product_quantity", array(
            'class' => 'form-control',
            'style' => 'width: 100px'
        ));
        ?>
      </div>

      <div style="margin-top: 7px; margin-bottom: 2px;">
        <?php echo $form->labelEx($model, "product_expire"); ?>
        <span class="alert alert-info" style="padding: 9px;">
          <?php
          echo $form->radioButton($model, "product_expire", array(
              'value' => 'expire',
              'checked' => ($default_product_expire == 'expire')
          ));
          ?> <?php echo Yii::t('lang', 'fresh_notproducts'); ?>
          <?php
          echo $form->radioButton($model, "product_expire", array(
              'value' => 'fresh',
              'checked' => ($default_product_expire == 'fresh')
          ));
          ?> <?php echo Yii::t('lang', 'fresh_products'); ?>
        </span>
      </div>
      <div>
        <?php echo $form->labelEx($model, "product_sale_condition"); ?>
        <span class="alert alert-info" style="padding: 9px">
          <?php
          echo $form->radioButton($model, "product_sale_condition", array(
              'value' => 'sale',
              'checked' => ($default_product_sale_condition == 'sale')
          ));
          ?> <?php echo Yii::t('lang', 'sales_immediately'); ?>
          <?php
          echo $form->radioButton($model, "product_sale_condition", array(
              'value' => 'prompt',
              'checked' => ($default_product_sale_condition == 'prompt')
          ));
          ?> <?php echo Yii::t('lang', 'determine_the_number_of_first_time'); ?>
        </span>

        <?php echo $form->labelEx($model, "product_expire_date"); ?>
        <?php
        echo $form->textField($model, "product_expire_date", array(
            'class' => 'form-control datepicker',
            'style' => 'width: 100px'
        ));
        ?>
      </div>
      <div style="margin-top: 8px; margin-bottom: 8px">
        <?php echo $form->labelEx($model, "product_return"); ?>
        <span class="alert alert-info" style="padding: 9px">
          <?php
          echo $form->radioButton($model, "product_return", array(
              'value' => 'in',
              'checked' => ($default_product_return == 'in')
          ));
          ?> <?php echo Yii::t('lang', 'our_products'); ?>
          <?php
          echo $form->radioButton($model, "product_return", array(
              'value' => 'out',
              'checked' => ($default_product_return == 'out')
          ));
          ?> <?php echo Yii::t('lang', 'consignment'); ?>
        </span>
      </div>

      <div>
        <label></label>
        <a href="#" onclick="formProduct.submit()" class="btn btn-info">
          <b class="glyphicon glyphicon-floppy-disk"></b>
          Save
        </a>
      </div>
      <?php echo $form->hiddenField($model, "product_id"); ?>
      <?php $this->endWidget(); ?>
    </div>
    <div class="pull-right">
      <?php if (!empty($model->product_pic)): ?>
        <img src="upload/<?php echo $model->product_pic; ?>" width="250px" />
      <?php endif; ?>
    </div>
    <div class="clearfix"></div>
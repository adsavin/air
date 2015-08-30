<?php $this->renderPartial('//Config/SetLanguage'); ?>

<script>
  function computeSubPriceAndSave() {
    var sub_price = $("input[name=sub_price]").val();

    if (sub_price != "") {
      document.formSubPrice.submit();
    } else {
      alert("<?php echo Yii::t('lang', 'please_enter_data'); ?>");
    }
  }
</script>

<div class="panel panel-info" style="margin: 10px">
  <div class="panel-heading"><?php echo Yii::t('lang', 'discount'); ?></div>
  <div class="navbar-primary mynav">
    <div>
      <ul class="nav navbar-nav">
        <li>
          <a href="#" onclick="return computeSubPriceAndSave()">
            <i class="glyphicon glyphicon-ok"></i> 
            <?php echo Yii::t('lang', 'calculate_and_record_discounts'); ?>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="panel-body">
    
    <?php if (Yii::app()->user->hasFlash("message") != null): ?>
    <div class="alert alert-success">
      <i class="glyphicon glyphicon-ok"></i>
      <?php echo Yii::app()->user->getFlash("message"); ?>
    </div>
    <?php endif; ?>
    
    <form method="post" name="formSubPrice" class="form-inline">
      <div>
        <label><?php echo Yii::t('lang', 'discounted_prices_down_again'); ?></label>
        <input type="text" name="sub_price" class="form-control" style="width: 100px" />

        <label style="width: 120px"><?php echo Yii::t('lang', 'discount_formats'); ?></label>
        <span class="alert alert-info" style="padding: 10px">
          <input type="radio" name="sub_type" value="baht" checked /> <?php echo Yii::t('lang', 'baht'); ?>
          <input type="radio" name="sub_type" value="percen" /> %
        </span>

        <label style="width: 120px"><?php echo Yii::t('lang', 'the_idea_discounts'); ?></label>
        <span class="alert alert-info" style="padding: 10px">
          <input type="radio" name="sub_price_position" value="all" checked /> <?php echo Yii::t('lang', 'both'); ?>
          <input type="radio" name="sub_price_position" value="price" /> <?php echo Yii::t('lang', 'retail_price'); ?>
          <input type="radio" name="sub_price_position" value="send" /> <?php echo Yii::t('lang', 'wholesale_price'); ?>
        </span>
      </div>
    </form>

    <?php $this->widget("zii.widgets.grid.CGridView", array(
      "dataProvider" => $products,
      "pagerCssClass" => "pagination",
        "pager" => array(
          "selectedPageCssClass" => "active",
          "firstPageCssClass" => "previous",
          "lastPageCssClass" => "next",
          "hiddenPageCssClass" => "disabled",
          "header" => "",
          "htmlOptions" => array(
            "class" => "pagination"
          )
        ),
        'itemsCssClass' => 'table table-bordered table-striped',
      "columns" => array(
        array(
          "name" => "product_code",
          "htmlOptions" => array(
            "width" => "200px"
          )
        ),
        "product_name",
        array(
          "name" => "product_price",
          "value" => 'number_format($data->product_price)',
          "htmlOptions" => array(
            "width" => "100px",
            "align" => "right"
          )
        ),
        array(
          "name" => "product_price_send",
          "value" => 'number_format($data->product_price_send)',
          "htmlOptions" => array(
            "width" => "100px",
            "align" => "right"
          )
        ),
        array(
          "name" => "product_price_buy",
          "value" => 'number_format($data->product_price_buy)',
          "htmlOptions" => array(
            "width" => "140px",
            "align" => "right"
          )
        )
      )
    )); ?>
  </div>
</div>
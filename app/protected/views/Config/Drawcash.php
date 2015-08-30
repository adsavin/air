<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-info" style="margin: 10px">
  <div class="panel-heading"><?php echo Yii::t('lang', 'today_the_money_in_the_drawer'); ?></div>
  <div class="panel-body">
    <form name="formDrawcash" method="post" class="form-inline">
      <strong><?php echo Yii::t('lang', 'the_amount_of_today'); ?></strong>
      <input type="text" name="draw_price" class="form-control" style="width: 100px" />
      <a href="#" class="btn btn-info" onclick="document.formDrawcash.submit()">
        <i class="glyphicon glyphicon-ok"></i>
        <?php echo Yii::t('lang', 'save'); ?>
      </a>
    </form>

    <?php $this->widget('zii.widgets.grid.CGridView', array(
      'dataProvider' => $drawCashs,
      'itemsCssClass' => 'table table-bordered table-striped',
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
        'columns' => array(
        array(
          'name' => 'draw_date',
          'header' => Yii::t('lang', 'date'),
          'value' => 'Util::mySqlToThaiDate($data->draw_date)'
        ),
        array(
          'name' => 'draw_price',
          'header' => Yii::t('lang', 'amount_of_money'),
          'value' => 'number_format($data->draw_price, 2)',
          'htmlOptions' => array(
            'width' => '200px',
            'align' => 'right'
          )
        ),
        array(
          'header' => '',
          'type' => 'raw',
          'value' => '
            CHtml::link("<i class=\"glyphicon glyphicon-remove\"></i>", array("Config/DrawcashDelete", "id" => $data->id), array(
              "class" => "btn btn-danger",
              "onclick" => "return confirm(\"'.Yii::t('lang', 'confirm_delete').'\")"
            ))
          ',
          'htmlOptions' => array(
            'width' => '55px',
            'align' => 'center'
          )
        )
      )
    )); ?>
  </div>
</div>
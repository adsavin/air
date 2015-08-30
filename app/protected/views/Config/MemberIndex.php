<?php $this->renderPartial('//Config/SetLanguage'); ?>


<div class="panel panel-info" style="margin: 10px">
  <div class="panel-heading"><?php echo Yii::t('lang', 'store_information'); ?></div>
  <div class="panel-body">
    <a href="index.php?r=Config/MemberForm" class="btn btn-info">
      <b class="glyphicon glyphicon-plus"></b>
      <?php echo Yii::t('lang', 'add'); ?>
    </a>
    
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $model,
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
        'columns' => array(
            'member_code',
            'tax_code',
            'member_name',
            'member_tel',
            'member_address',
            'member_created_date',
            'Branch.branch_name',
            array(
                'class' => 'CButtonColumn',
                'template' => '{edit} {del}',
                'buttons' => array(
                    'edit' => array(
                        'label' => '
                          <span class="btn btn-info">
                            <b class="glyphicon glyphicon-pencil"></b>
                          </span>',
                        'url' => 'Yii::app()->createUrl("Config/MemberForm", array(
													"id" => $data->member_id
												))'
                    ),
                    'del' => array(
                        'label' => '
                          <span class="btn btn-danger">
                            <b class="glyphicon glyphicon-remove"></b>
                          </span>',
                        'url' => 'Yii::app()->createUrl("Config/MemberDelete", array(
													
												"id" => $data->member_id))',
                        'options' => array(
                            'onclick' => 'return confirm("'.Yii::t('lang', 'confirm_delete').'")'
                        )
                    )
                ),
                'htmlOptions' => array(
                    'align' => 'center',
                    'width' => '110px'
                )
            )
        )
    ));
    ?>
  </div>
</div>



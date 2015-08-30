<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-info" style="margin: 10px">
    <div class="panel-heading"><?php echo Yii::t('lang', 'user_information_system'); ?></div>
    <div class="panel-body">
			<a href="index.php?r=Config/UserForm" class="btn btn-info">
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
                'user_name',
                'user_tel',
                'user_level',
                'user_username',
                'user_created_date',
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
                            'url' => 'Yii::app()->createUrl("Config/UserForm", array(
															"id" => $data->user_id
														))'
                        ),
                        'del' => array(
                            'label' => '
																<span class="btn btn-danger">
																	<b class="glyphicon glyphicon-remove"></b>
																</span>
														',
                            'url' => 'Yii::app()->createUrl("Config/UserDelete", array(
															"id" => $data->user_id
														))',
                            'options' => array(
                                'onclick' => 'return confirm("'.Yii::t('lang', 'confirm_delete').'")'
                            )
                        )
                    ),
                    'htmlOptions' => array(
                        'width' => '110px',
                        'align' => 'center'
                    )
                )
            )
        ));
        ?>
    </div>
</div>
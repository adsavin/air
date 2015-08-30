<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-info" style="margin: 10px">
    <div class="panel-heading"><?php echo Yii::t('lang', 'get_product'); ?></div>
    <div class="panel-body">
        <?php
				$form = $this->beginWidget('CActiveForm', array(
					'htmlOptions' => array(
						'name' => 'formBillImport'
					)
				));
				
				echo $form->errorSummary($model);
				?>
				
				<div>
					<!-- bill_import_code -->
					<label><?php echo Yii::t('lang', 'code_bill'); ?></label>
					<?php echo $form->textField($model, 'bill_import_code', array(
						'class' => 'form-control',
						'style' => 'width: 200px'
					)); ?>
				
					<!-- bill_import_created_date -->
					<label for=""><?php echo Yii::t('lang', 'date_received'); ?></label>
					<?php echo $form->textField($model, 'bill_import_created_date', array(
						'class' => 'form-control datepicker',
						'style' => 'width: 200px'
					)); ?>
				</div>
				
				<div>
					<?php $branchOptions = Branch::getOptions(); ?>
					
					<!-- branch_id -->
					<label for=""><?php echo Yii::t('lang', 'get_into_the_field'); ?></label>
					<?php echo $form->dropdownList($model, 'branch_id', $branchOptions, array(
						'class' => 'form-control',
						'style' => 'width: 200px'
					)); ?>
					
					<!-- from_branch_id -->
					<label for=""><?php echo Yii::t('lang', 'input_from_the_field'); ?></label>
					<?php echo $form->dropdownList($model, 'from_branch_id', $branchOptions, array(
					'class' => 'form-control',
					'style' => 'width: 200px'
					)); ?>
				</div>
				
				<div>
					<!-- farmer_id -->
					<label for=""><?php echo Yii::t('lang', 'purchased_from'); ?></label>
					<?php echo $form->dropdownList($model, 'farmer_id', Farmer::getOptions(), array(
					'class' => 'form-control',
					'style' => 'width: 400px'
					)); ?>
				</div>
				
				<div>
					<?php
					$importPay = BillImport::getImportPay();
					$payStatus = BillImport::getPayStatus();
					?>
					
					<!-- bill_import_pay -->
					<label for=""><?php echo Yii::t('lang', 'payment'); ?></label>
					<?php echo $form->dropdownList($model, 'bill_import_pay', $importPay, array(
						'class' => 'form-control',
						'style' => 'width: 200px'
					)); ?>
					
					<!-- bill_import_pay_status -->
					<label for=""><?php echo Yii::t('lang', 'status'); ?></label>
					<?php echo $form->dropdownList($model, 'bill_import_pay_status', $payStatus, array(
						'class' => 'form-control',
						'style' => 'width: 200px'
					)); ?>
				</div>
				
				<!-- bill_import_pay_date -->
				<div>
					<label for=""><?php echo Yii::t('lang', 'payment_date'); ?></label>
					<?php echo $form->textField($model, 'bill_import_pay_date', array(
						'class' => 'form-control datepicker',
						'style' => 'width: 200px'
					)); ?>
				</div>
				
				<!-- bill_import_remark -->
				<div>
					<label for=""><?php echo Yii::t('lang', 'notes'); ?></label>
					<?php echo $form->textField($model, 'bill_import_remark', array(
						'class' => 'form-control',
						'style' => 'width: 560px'
					)); ?>
				</div>
				
				<!-- BUTTON -->
				<div>
					<label></label>
					<a href="#" class="btn btn-info" onclick="formBillImport.submit()">
						<b class="glyphicon glyphicon-floppy-disk"></b>
						SAVE
					</a>
				</div>
				
				<?php	$this->endWidget(); ?>

				<?php
        // Grid
        $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider' => $modelForGrid,
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
                array(
                    'name' => 'bill_import_code',
                    'type' => 'html',
                    'value' => array($model, 'buttonImportProduct'),
										'htmlOptions' => array(
											'style' => 'text-align: center'
										)
                ),
                array(
                    'name' => 'bill_import_created_date',
										'value' => 'Util::mySQLToThaiDate($data->bill_import_created_date)',
                    'htmlOptions' => array(
                        'width' => '100px',
												'style' => 'text-align: center'
                    )
                ),
                array(
                    'name' => 'branch_id',
                    'value' => '@$data->branch->branch_name'
                ),
                array(
                    'name' => 'from_branch_id',
                    'value' => '@$data->from_branch->branch_name'
                ),
                array(
                    'name' => 'farmer_id',
                    'value' => '@$data->farmer->farmer_name'
                ),
                array(
									'name' => 'bill_import_pay',
									'value' => '$data->getImportPayName($data->bill_import_pay)',
									'htmlOptions' => array(
										'style' => 'text-align: center',
										'width' => '100px'
									)
								),
                array(
									'name' => 'bill_import_pay_status',
									'value' => '$data->getPayStatusName($data->bill_import_pay_status)',
									'htmlOptions' => array(
										'style' => 'text-align: center',
										'width: 100px'
									)
								),
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{edit} {del}',
                    'buttons' => array(
                        'edit' => array(
                            'label' => '
															<span class="btn btn-info">
																<b class="glyphicon glyphicon-pencil"></b>
															</span>',
                            'url' => 'Yii::app()->createUrl("Basic/BillImport", array(
															"id" => $data->bill_import_code
														))'
                        ),
                        'del' => array(
                            'label' => '
															<span class="btn btn-danger">
																<b class="glyphicon glyphicon-trash"></b>
															</span>',
                            'url' => 'Yii::app()->createUrl("Basic/BillImportDelete", array(
															"id" => $data->bill_import_code
														))',
                            'options' => array(
                                'onclick' => 'return confirm("ยืนยันการลบ")'
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


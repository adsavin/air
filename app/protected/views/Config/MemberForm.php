<?php $this->renderPartial('//Config/SetLanguage'); ?>

<script>
	function genMemberCode() {
		$.ajax({
			url: 'index.php?r=Ajax/genMemberCode',
			success: function(data) {
				$('#Member_member_code').val(data);
			}
		});
	}
</script>

<div class="panel panel-info" style="margin: 10px">
    <div class="panel-heading"><?php echo Yii::t('lang', 'record_store_information'); ?></div>
    <div class="panel-body">
      
      <?php $form = $this->beginWidget('CActiveForm', array(
				'htmlOptions' => array(
					'name' => 'formMember'
				)
      )); 
			
			echo $form->errorSummary($model);
			?>
			
			<div>
				<?php echo $form->labelEx($model, 'member_code'); ?>
				<?php echo $form->textField($model, 'member_code', array(
				'class' => 'form-control',
				'style' => 'width: 200px'
				)); ?>
				<a href="javascript:void(0)" class="btn btn-info" onclick="genMemberCode()">
					<i class="glyphicon glyphicon-th"></i>
					<?php echo Yii::t('lang', 'code_generation'); ?>
				</a>
			</div>

			<div>
				<?php echo $form->labelEx($model, 'tax_code'); ?>
				<?php echo $form->textField($model, 'tax_code', array(
				'class' => 'form-control',
				'style' => 'width: 200px',
				'maxLength' => '13'
				)); ?>
			</div>
			
			<div>
				<?php echo $form->labelEx($model, 'member_name'); ?>
				<?php echo $form->textField($model, 'member_name', array(
				'class' => 'form-control',
				'style' => 'width: 400px'
				)); ?>
			</div>
			
			<div>
				<?php echo $form->labelEx($model, 'member_tel'); ?>
				<?php echo $form->textField($model, 'member_tel', array(
				'class' => 'form-control',
				'style' => 'width: 200px'
				)); ?>
			</div>
			
			<div>
				<?php echo $form->labelEx($model, 'member_address'); ?>
				<?php echo $form->textField($model, 'member_address', array(
				'class' => 'form-control',
				'style' => 'width: 700px'
				)); ?>
			</div>
			
			<div>
				<?php echo $form->labelEx($model, 'branch_id'); ?>
				<?php echo $form->dropdownList($model, 'branch_id', Branch::getOptions(true), array(
				'class' => 'form-control',
				'style' => 'width: 300px'
				)); ?>
				
				<font color="red"> * <?php echo Yii::t('lang', 'if_your_branch_is_based_on_the_employee_s_login_id_field'); ?></font>
			</div>

			<div>
				<label><?php echo Yii::t('lang', 'more_details'); ?></label>
				<?php echo $form->textField($model, 'remark', array(
					'class' => 'form-control',
					'style' => 'width: 500px'
				)); ?>
			</div>
			
      <div>
				<label></label>
				<a href="#" class="btn btn-info" onclick="formMember.submit()">
					<b class="glyphicon glyphicon-floppy-disk"></b>
					Save
				</a>
			</div>
			
			<?php echo $form->hiddenField($model, 'member_id'); ?>
			<?php $this->endWidget(); ?>
    </div>
</div>
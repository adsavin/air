<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-primary" style="margin: 10px">
    <div class="panel-heading"><?php echo Yii::t('lang', 'selling_amendment_bill'); ?>: <?php echo $model->bill_id; ?></div>
    <div class="panel-body">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'htmlOptions' => array(
                'name' => 'form1'
            )
        ));
        ?>
        <div>
            <?php echo $form->labelEx($model, 'bill_sale_detail_id'); ?>
            <?php
            echo $form->textField($model, 'bill_sale_detail_id', array(
                'disabled' => 'disabled',
                'class' => 'form-control',
                'style' => 'width: 100px'
            ));
            ?>
        </div>
        <div>
            <?php echo $form->labelEx($model, 'bill_sale_detail_barcode'); ?>
            <?php
            echo $form->textField($model, 'bill_sale_detail_barcode', array(
                'disabled' => 'disabled',
                'class' => 'form-control',
                'style' => 'width: 200px'
            ));
            ?>
        </div>
        <div>
            <label><?php echo Yii::t('lang', 'product_name'); ?></label>
            <?php
            echo $form->textField($model, 'bill_sale_detail_barcode', array(
                'disabled' => 'disabled',
                'class' => 'form-control',
                'style' => 'width: 400px',
                'value' => $model->product->product_name
            ));
            ?>
        </div>
        <div>
            <?php echo $form->labelEx($model, 'bill_sale_detail_price'); ?>
            <?php echo $form->textField($model, 'bill_sale_detail_price', array(
                'disabled' => 'disabled',
                'class' => 'form-control',
                'style' => 'text-align: right; width: 100px'
            )); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model, 'bill_sale_detail_qty'); ?>
            <?php echo $form->textField($model, 'bill_sale_detail_qty', array(
                'class' => 'form-control',
                'style' => 'text-align: right; width: 100px'
            )); ?>
        </div>
        <div>
            <label></label>
            <a href="#" onclick="form1.submit()" class="btn btn-primary">
                <b class="glyphicon glyphicon-ok"></b>
            	<?php echo Yii::t('lang', 'save'); ?>
            </a>
        </div>
        <?php echo CHtml::hiddenField('old_qty', $model->bill_sale_detail_qty); ?>
		<?php $this->endWidget(); ?>
    </div>
</div>
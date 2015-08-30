<?php $this->renderPartial('//Config/SetLanguage'); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $productSerials,
    'columns' => array(
        array(
            'header' => 'serial code',
            'type' => 'raw',
            'value' => '
                CHtml::link($data->serial_no." ", 
                "#", 
                array(
                    "onclick" => "chooseSerial($data->serial_no)", 
                    "class" => "btn btn-primary",
                    "data-dismiss" => "modal"
                ))'
        ),
        array(
            'header' => Yii::t('lang', 'product_code'),
            'name' => 'product_code'
        ),
        array(
            'header' => Yii::t('lang', 'product_name'),
            'name' => 'product_name',
            'htmlOptions' => array(
                'width' => '400px'
            )
        ),
        array(
            'header' => Yii::t('lang', 'day_out_insurance'),
            'name' => 'product_expire_date'
        ),
        array(
            'header' => Yii::t('lang', 'code_bill'),
            'name' => 'bill_sale_id'
        )
    )
)); ?>
<?php $this->renderPartial('//Config/SetLanguage'); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
  'dataProvider' => $repairs,
  'columns' => array(
    array(
      'header' => Yii::t('lang', 'choose_list'),
      'type' => 'raw',
      'value' => 'CHtml::link("<i class=\"glyphicon glyphicon-ok\"></i> เลือก", "#", array(
        "class" => "btn btn-primary cmdChooseRepair",
        "repair_id" => $data->repair_id
      ))',
      'htmlOptions' => array(
        'width' => '100px'
      )
    ),
    array(
      'name' => 'product_code',
      'header' => Yii::t('lang', 'product_code')
    ),
    array(
      'name' => 'repair_product_name',
      'header' => Yii::t('lang', 'product')
    ),
    array(
      'name' => 'repair_name',
      'header' => Yii::t('lang', 'customers')
    ),
    array(
      'name' => 'repair_tel',
      'header' => Yii::t('lang', 'phone_number')
    )
  )
)); ?>
<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="panel panel-info" style="margin: 10px;">
  <div class="panel-heading"><?php echo Yii::t('lang', 'data_store_company'); ?></div>
  <div class="panel-body">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'htmlOptions' => array(
            'name' => 'myForm',
            'enctype' => 'multipart/form-data'
        )
    ));

    echo $form->errorSummary($model);
    ?>

    <div class="pull-left">
      <!-- left -->
      <div>
        <?php echo $form->labelEx($model, 'org_name'); ?>
        <?php
        echo $form->textField($model, 'org_name', array(
            'class' => 'form-control',
            'style' => 'width: 500px'
        ));
        ?>
      </div>

      <div>
        <?php echo $form->labelEx($model, 'org_name_eng'); ?>
        <?php
        echo $form->textField($model, 'org_name_eng', array(
            'class' => 'form-control',
            'style' => 'width: 500px'
        ));
        ?>
      </div>

      <div>
        <?php echo $form->labelEx($model, 'org_logo'); ?>
        <?php
        echo $form->fileField($model, 'org_logo', array(
            'class' => 'form-control',
            'style' => 'width: 500px; display: inline-block;'
        ));
        ?>
      </div>      

    <div>
      <?php echo $form->labelEx($model, 'org_address_1'); ?>
      <?php
      echo $form->textField($model, 'org_address_1', array(
          'class' => 'form-control',
          'style' => 'width: 500px'
      ));
      ?>
    </div>

    <div>
      <?php echo $form->labelEx($model, 'org_address_2'); ?>
      <?php
      echo $form->textField($model, 'org_address_2', array(
          'class' => 'form-control',
          'style' => 'width: 500px'
      ));
      ?>
    </div>

    <div>
      <?php echo $form->labelEx($model, 'org_address_3'); ?>
      <?php
      echo $form->textField($model, 'org_address_3', array(
          'class' => 'form-control',
          'style' => 'width: 500px'
      ));
      ?>
    </div>

    <div>
      <?php echo $form->labelEx($model, 'org_address_4'); ?>
      <?php
      echo $form->textField($model, 'org_address_4', array(
          'class' => 'form-control',
          'style' => 'width: 500px'
      ));
      ?>
    </div>

    <div>
      <?php echo $form->labelEx($model, 'org_tel'); ?>
      <?php
      echo $form->textField($model, 'org_tel', array(
          'class' => 'form-control',
          'style' => 'width: 300px'
      ));
      ?>
    </div>

    <div>
      <?php echo $form->labelEx($model, 'org_fax'); ?>
      <?php
      echo $form->textField($model, 'org_fax', array(
          'class' => 'form-control',
          'style' => 'width: 300px'
      ));
      ?>
    </div>

    <div>
      <?php echo $form->labelEx($model, 'org_tax_code'); ?>
      <?php
      echo $form->textField($model, 'org_tax_code', array(
          'class' => 'form-control',
          'style' => 'width: 300px'
      ));
      ?>
    </div>

    <div>
      <label></label>
      <a href="#" class="btn btn-info" onclick="document.myForm.submit()">
        <?php echo Yii::t('lang', 'add'); ?>
      </a>
    </div>
    </div>
    <div class="pull-right">
      <!-- right -->
      <?php if (!empty($model->org_logo)): ?>
        <div>
          <?php
          echo CHtml::image('upload/' . $model->org_logo, null, array(
              'width' => '200px'
          ));
          ?>
        </div>
      <?php endif; ?>

      <table class="table table-bordered table-striped">
        <tbody>
          <tr>
            <td width="40px" style="text-align: center">
              <?php
              $checked = 'checked';

              if ($model->org_logo_show_on_bill == 'no') {
                $checked = '';
              }
              ?>

              <input type="checkbox" value="1" <?php echo $checked; ?> name="org_logo_show_on_bill" />
            </td>
            <td><?php echo Yii::t('lang', 'show_logo_on_the_bill'); ?> </td>
          </tr>
          <tr>
            <td style="text-align: center">
              <?php
              $checked = 'checked';

              if (!empty($model->logo_show_on_header)) {
                if ($model->logo_show_on_header == 'no') {
                  $checked = '';
                }
              }
              ?>
              <input type="checkbox" value="yes" <?php echo $checked; ?> name="logo_show_on_header" />
            </td>
            <td><?php echo Yii::t('lang', 'logo_on_the_header'); ?></td>
          </tr>
          <tr>
            <td style="text-align: center">
              <?php
              $checked = 'checked';

              if (!empty($model->logo_show_on_header_bg)) {
                if ($model->logo_show_on_header_bg == 'no') {
                  $checked = '';
                }
              }
              ?>
              <input type="checkbox" value="yes" <?php echo $checked; ?> name="logo_show_on_header_bg" />
            </td>
            <td><?php echo Yii::t('lang', 'background_color_on_the_head'); ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="clearfix"></div>

    <?php $this->endWidget(); ?>
  </div>

</div>


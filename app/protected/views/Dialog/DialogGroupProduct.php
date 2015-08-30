<?php $this->renderPartial('//Config/SetLanguage'); ?>

<script>
  function chooseGroupProduct(code, name) {
    $("#Product_group_product_id").val(code);
    $("#Product_group_name").val(name);

    return false;
  }
</script>

    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th width="50px"></th>
          <th width="100px"><?php echo Yii::t('lang', 'category_code'); ?></th>
          <th width="300px"><?php echo Yii::t('lang', 'name_category'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($model as $r): ?>
          <tr>
            <td style="text-align: center">
              <a style="color: white" href="#"
                 class="btn btn-info"
                 data-dismiss="modal"
                 onclick="return chooseGroupProduct(
              '<?php echo $r->group_product_code; ?>',
              '<?php echo $r->group_product_name; ?>'
              )">
                <i class="icon-ok icon-white"></i>
                <?php echo Yii::t('lang', 'Choose'); ?>
              </a>
            </td>
            <td><?php echo $r->group_product_code; ?></td>
            <td><?php echo $r->group_product_name; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

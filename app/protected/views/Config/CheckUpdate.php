<?php $this->renderPartial('//Config/SetLanguage'); ?>

<?php

$version = Yii::app()->session['version'];

$current_version = $version;

try {
  $_url = 'http://www.pingpongsoft.com/pos-current-version.json?rand='.rand(1, 100000);
  $data = @file_get_contents($_url);
  $json = @json_decode($data);

  if (!empty($json)) {
    $current_version = $json->current_version;
  }
} catch (Exception $e) {
}
?>

<?php if ($current_version != $version): ?>
  <div id="my-alert" style="margin: 10px" class="alert alert-success">
    <h4 style="text-align: center"><?php echo Yii::t('lang', 'now_with_the_new_version_is_already_up'); ?> <font color="red"><?php echo $current_version; ?></font></h4>
    <div style="text-align: center">
      <a href="#" onclick="return upToNewVersion()" class="btn btn-info btn-lg">
        <i class="glyphicon glyphicon-open"></i>
        <?php echo Yii::t('lang', 'click_here_to_update'); ?>
      </a>
    </div>
  </div>
<?php endif; ?>
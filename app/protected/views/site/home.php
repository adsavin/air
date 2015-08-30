<?php
$this->renderPartial('//Config/SetLanguage');

function showShortcut($r, $image, $label) {
    echo '<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                <a href="index.php?r=' . $r . '" >
                    <img class="img-responsive img-thumbnail" src="images/' . $image . '.png" />
                    <center class="hidden-xs">' . Yii::t("app", $label) . '</center>
                </a>
            </div>';
}
?>
<div class="panel panel-success">
    <div class="panel-heading"><i class="glyphicon glyphicon-heart-empty"></i> <?=  Yii::t("app", "Diary")?></div>
    <div class="panel-body">
        <div class="row">
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?> <!-- 1 -->
            <?=  showShortcut("basic/sale", "basicons/png/refresh57", "Returns")?> <!-- 2 -->
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?> <!-- 3 -->
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?> <!-- 4 -->
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?> <!-- 5 -->
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?> <!-- 6 -->
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?> <!-- 7 -->
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?> <!-- 8 -->
            <?=  showShortcut("basic/sale", "productivity/png/checking1", "Check Stock")?> <!-- 9 -->
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?> <!-- 10 -->
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?> <!-- 11 -->
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?> <!-- 12 -->
        </div>
    </div>
</div>

<div class="panel panel-warning">
    <div class="panel-heading"><i class="glyphicon glyphicon-list-alt"></i> <?=  Yii::t("app", "Report")?></div>
    <div class="panel-body">
        <div class="row">
            <?=  showShortcut("basic/sale", "money-and-finances/png/circular271", "Earnings - Loss")?>
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?>
            <?=  showShortcut("basic/sale", "basicons/png/calendar159", "The Sales by date")?>
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?>
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?>
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?>
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?>
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?>
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?>
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?>
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?>
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?>
        </div>
    </div>
</div>

<div class="panel panel-danger">
    <div class="panel-heading"><i class="glyphicon glyphicon-cog"></i> <?=  Yii::t("app", "Setting")?></div>
    <div class="panel-body">
        <div class="row">
            <?=  showShortcut("basic/sale", "basicons/png/info22", "Store Information")?>
            <?=  showShortcut("basic/sale", "office-set/png/office42", "Warehouse / store")?>
            <?=  showShortcut("basic/sale", "money-and-finances/png/archive34", "Category")?>
            <?=  showShortcut("basic/sale", "money-and-finances/png/barscode3", "Product")?>
            <?=  showShortcut("basic/sale", "money-and-finances/png/businessman228", "Agent")?>
            <?=  showShortcut("basic/sale", "money-and-finances/png/businessmen34", "Member")?>
            <?=  showShortcut("basic/sale", "cloud-computing/png/cloud228", "User Login")?>
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?>
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?>
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?>
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?>
            <?=  showShortcut("basic/sale", "shops/png/sale21", "Sale")?>
        </div>
    </div>
</div>
function initCalendar() {
    $(".datepicker").datepicker({
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,
        dayNamesMin: [
            '<?php echo Yii::t("lang", "su"); ?>',
            '<?php echo Yii::t("lang", "mo"); ?>',
            '<?php echo Yii::t("lang", "tu"); ?>',
            '<?php echo Yii::t("lang", "we"); ?>',
            '<?php echo Yii::t("lang", "th"); ?>',
            '<?php echo Yii::t("lang", "fr"); ?>',
            '<?php echo Yii::t("lang", "sa"); ?>'
        ],
        monthNamesShort: [
            '<?php echo Yii::t("lang", "january"); ?>',
            '<?php echo Yii::t("lang", "february"); ?>',
            '<?php echo Yii::t("lang", "march"); ?>',
            '<?php echo Yii::t("lang", "april"); ?>',
            '<?php echo Yii::t("lang", "may"); ?>',
            '<?php echo Yii::t("lang", "june"); ?>',
            '<?php echo Yii::t("lang", "july"); ?>',
            '<?php echo Yii::t("lang", "august"); ?>',
            '<?php echo Yii::t("lang", "september"); ?>',
            '<?php echo Yii::t("lang", "october"); ?>',
            '<?php echo Yii::t("lang", "november"); ?>',
            '<?php echo Yii::t("lang", "december"); ?>'
        ]
    });

    checkMinProductStock();
}

function checkMinProductStock() {
    $.ajax({
        url: 'index.php?r=Ajax/MinProductStock',
        dataType: 'json',
        type: 'get',
        success: function (data) {
            if (data != '') {
                $("#totalAlertStock").text(data);
                $("#divAlertStock").show();
            }
        }
    });
}

function changeLanguage(language) {
    $.ajax({
        url: 'index.php?r=Basic/ChangeLanguage',
        data: {
            language: language
        },
        type: 'post',
        success: function (data) {
            if (data === 'success') {
                location.reload();
            }
        }
    });
}
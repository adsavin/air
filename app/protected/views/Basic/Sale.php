<?php $this->renderPartial('//Config/SetLanguage'); ?>

<style>
    #textSum {
        background-color: #656D78;
        color: #A0D468;
        font-size: 50px;
        font-weight: bold;
        border: #000000 1px solid;
        text-align: right;
        padding-right: 5px;
        padding-top: 2px;
        padding-bottom: 2px;
        display: inline-block;
        width: 300px;
    }

    .mynav {
        border-bottom: #cccccc 1px solid;
        padding: 0px;
        display: inline-block;
        width: 100%;
        background: #f2f5f6;
    }

    .mynav ul li a {
        padding: 10px;
    }

    .mynav ul li {
        padding: 0px;
    }

    .toolbar {
        background: #CFCFCF;
    }

    .toolbar a {
        padding-left: 5px;
        padding-right: 7px;
        color: #656D78;
    }

    .toolbar a:hover {
        color: #000;
    }
</style>

<script type="text/javascript">

    var is_vat = false;

    function sale() {
        var sale_condition = $("input[name=sale_condition]:checked").val();

        $.ajax({
            url: 'index.php?r=Ajax/Sale',
            type: 'POST',
            data: {
                branch_id: $("#BillSale_branch_id").val(),
                member_code: $("#member_code").val(),
                product_code: $("#product_code").val(),
                qty: $("input[name=product_qty]").val(),
                serial: $("input[name=product_serial_no]").val(),
                expire_date: $("input[name=product_expire_date]").val(),
                sale_condition: sale_condition
            },
            success: function (data) {
                if (data == 'success') {
                    $("#product_code").val("").focus();

                    loadData();
                } else {
                    alert(data);
                }
            }
        });
    }

    function sumPrice() {
        var sum = $("#lblSumPrice").text();
        $("#textSum").text(sum);
    }

    function removeRowSale(pk_temp) {
        $.ajax({
            url: 'index.php?r=Ajax/RemoveRowSale',
            data: {pk_temp: pk_temp},
            success: function (data) {
                if (data == 'success') {
                    loadData();
                }
            }
        });
    }

    function clearRowSale() {
        $.ajax({
            url: 'index.php?r=Ajax/ClearRowSale',
            data: {
                branch_id: $("#BillSale_branch_id").val()
            },
            type: 'POST',
            success: function (data) {
                if (data == 'success') {
                    location.reload();
                }
            }
        });
    }

    function loadData() {
        $.ajax({
            url: 'index.php?r=Ajax/RowSale',
            success: function (data) {
                $("#rowSale").html(data);
                sumPrice();
                computeSum();
            }
        });
    }

    function browseProduct() {
        $("#myModalLabel").text("<?php echo Yii::t('lang', 'product_selection'); ?>");
        $("#modalContent").html("");

        $.ajax({
            url: 'index.php?r=Dialog/DialogProduct',
            success: function (data) {
                $("#modalContent").html(data);
            }
        });

        return false;
    }

    function browseMember() {
        $("#myModalLabel").text("<?php echo Yii::t('lang', 'select_members'); ?>");
        $("#modalContent").html("");

        $.ajax({
            url: 'index.php?r=Dialog/DialogMember',
            success: function (data) {
                $("#modalContent").html(data);
            }
        });

        return false;
    }

    function chooseMember(code, name) {
        $("input[name=member_code]").val(code);
        $("input[name=txt_member_name]").val(name);

        $("#member_code").val(code);
        $("#member_name").val(name);

        $("#modalContent").html("");
        $("#btnCloseModal").trigger('click');

        clearModalContent();
    }

    function endSale() {
        $.ajax({
            url: 'index.php?r=Basic/EndSale',
            type: 'POST',
            dataType: 'json',
            data: $("#formSale").serialize(),
            success: function (data) {
                if (data.message == 'success') {
                    $("#hidden_last_bill_id").val(data.last_bill_id);
                    clearRowSale();

                    var print_bill = $("#hidden_print_bill").val();

                    if (print_bill != '') {
                        if (print_bill == 'slip') {
                            printSlip(0);
                        } else if (print_bill = 'bill') {
                            printBill(0);
                        }
                    }

                    //location.reload();
                }
            }
        });
    }

    function clearModalContent() {
        $("#modalContent").html("");
    }

    function dialogEndSale() {
        var sale_status = $("input[name=sale_status][value=credit]");
        var checked = sale_status.prop("checked");

        if (!checked) {
            $("#myModalLabel").text("<?php echo Yii::t('lang', 'complete_sale'); ?>");
            $("#modalContent").html("");

            $.ajax({
                url: 'index.php?r=Dialog/DialogEndSale',
                success: function (data) {
                    $('#modalContent').html('');
                    $("#modalContent").html(data);

                    var txtSum = $("#textSum").text();
                    var totalMoney = $("#totalMoney");

                    totalMoney.val(txtSum);

                    if (sale_can_add_sub_price == 'no') {
                        $('#bonusPrice').attr('readonly', 'readonly');
                    }

                    $('input[name=out_vat]').val($('#priceVat').val());
                    $('input[name=vat_type]').val($('input[name=vat_type]:checked').val());
                }
            });
        } else {
            var member_code = $("#member_code").val();

            if (member_code == "") {
                alert("<?php echo Yii::t('lang', 'please_select_clients_to_save_the_debtors'); ?>");
            } else {
                alert("<?php echo Yii::t('lang', 'final_sales_are_not_paid_in_cash_completed'); ?>");

                endSale();
            }
        }

        return false;
    }

    function printSlip(bill_sale_id) {
        var input = $("#hidden_input").val();
        var return_money = $("#hidden_return_money").val();
        var bill_id = $("#hidden_last_bill_id").val();

        if (bill_sale_id != 0) {
            bill_id = bill_sale_id;
        }

        var uri = "index.php?r=Dialog/DialogPrintSlip&bill_id=" + bill_id + "&input=" + input + "&return_money=" + return_money;
        var options = "width=360px; height=550px";
        var w = window.open(uri, null, options);
    }

    function printBillSendProduct(bill_sale_id) {
        var uri = "index.php?r=Dialog/DialogBillSendProduct&bill_sale_id=" + bill_sale_id;
        var options = "width=800px; height=650px";
        var w = window.open(uri, null, options);
    }

    function printBillTax(bill_sale_id) {
        var uri = "index.php?r=Dialog/DialogBillAddVat&bill_sale_id=" + bill_sale_id;
        var options = "width=800px; height=650px";
        var w = window.open(uri, null, options);
    }

    function findMemberName() {
        var member_code = $("#member_code").val();

        if (member_code != "") {
            $.ajax({
                url: 'index.php?r=Ajax/SearchMemberByMemberCode',
                data: {
                    member_code: member_code
                },
                dataType: 'json',
                success: function (data) {
                    $("#member_name").val(data.member_name);
                    $("input[name=member_code]").val(data.member_code);
                    $("input[name=member_name]").val(data.member_name);
                }
            });
        }
    }

    function log(output) {
        $("#log").append(output);
    }

    function convertCharToBarcode(str) {
        var output = "";

        for (var i = 0; i < str.length; i++) {
            var c = str.charAt(i);

            switch (c) {
                case 'จ':
                    output += "0";
                    break;
                case 'ๅ':
                    output += "1";
                    break;
                case '/':
                    output += "2";
                    break;
                case '_':
                    output += "3";
                    break;
                case 'ภ':
                    output += "4";
                    break;
                case 'ถ':
                    output += "5";
                    break;
                case 'ุ':
                    output += "6";
                    break;
                case 'ึ':
                    output += "7";
                    break;
                case 'ค':
                    output += "8";
                    break;
                case 'ต':
                    output += "9";
                    break;
                case '๗':
                    output += "0";
                    break;
                case '+':
                    output += "1";
                    break;
                case '๑':
                    output += "2";
                    break;
                case '๒':
                    output += "3";
                    break;
                case '๓':
                    output += "4";
                    break;
                case '๔':
                    output += "5";
                    break;
                case 'ู':
                    output += "6";
                    break;
                case '฿':
                    output += "7";
                    break;
                case '๕':
                    output += "8";
                    break;
                case '๖':
                    output += "9";
                    break;
                case ')':
                    output += "0";
                    break;
                case '!':
                    output += "1";
                    break;
                case '@':
                    output += "2";
                    break;
                case '#':
                    output += "3";
                    break;
                case '$':
                    output += "4";
                    break;
                case '%':
                    output += "5";
                    break;
                case '^':
                    output += "6";
                    break;
                case '&':
                    output += "7";
                    break;
                case '*':
                    output += "8";
                    break;
                case '(':
                    output += "9";
                    break;
            }
        }

        // not found
        if (output == '') {
            output = str;
        }

        $("#product_code").val(output);
    }

    $(function () {
        renderGrid();
        initCalendar();
        findMemberName();
        loadData();
        readConfigSoftware();

        $("#product_code").focus();

        $("#product_code").keydown(function (e) {
            if (e.keyCode == 17) {
                // Control
                var sale_status = $("input[name=sale_status][value=credit]");
                var checked = sale_status.prop("checked");

                if (!checked) {
                    $("#myModal").modal("show");
                    dialogEndSale();
                }
            } else if (e.keyCode == 13) {
                // ENTER
                if ($(this).val().length > 0) {
                    var barcode = $(this).val();
                    convertCharToBarcode(barcode);

                    sale();
                }
            } else if (e.keyCode == 9) {
                // TAB
                if ($(this).val().length > 0) {
                    var barcode = $(this).val();
                    convertCharToBarcode(barcode);

                    sale();
                }
            }
        });

        $("#member_code").keydown(function (e) {
            if (e.keyCode == 9 || e.keyCode == 13) {
                var member_code = $(this).val();

                $.ajax({
                    url: 'index.php?r=Ajax/SearchMemberByMemberCode',
                    data: {
                        member_code: member_code
                    },
                    dataType: 'json',
                    success: function (data) {
                        $("#member_name").val(data.member_name);
                        $("input[name=member_code]").val(data.member_code);
                        $("input[name=member_name]").val(data.member_name);

                        $("#product_code").focus();
                    }
                });
            }
        });
    });

    function renderGrid() {
        $(".table").removeClass("table-striped");
        $(".table thead tr th")
                .css("background", "#000000")
                .css("font-weight", "normal")
                .css("color", "#f9f8f7");
        $(".table tbody tr:odd").css('background', '#cfcfcf');
        $(".table tbody tr:even").css('background-color', '#afafaf');
    }

    function computePrice(id_price, id_qty, id_output, pk_temp) {
        var output = $("#" + id_output);
        var price = $("#" + id_price);
        var qty = $("#" + id_qty);

        // compute row
        price = price.val().replace(",", "");
        qty = qty.val().replace(",", "");

        price = parseFloat(price);
        qty = parseFloat(qty);

        var totalPrice = (price * qty);

        var varOutput = numeral(totalPrice).format('0,0.00');
        output.text(varOutput);

        // compute sum
        computeSum();

        // save 
        saveDataOnGrid(pk_temp, price, qty);
    }

    function saveDataOnGrid(pk_temp, price, qty) {
        $.ajax({
            url: 'index.php?r=Ajax/SaveDataOnGrid',
            data: {
                pk_temp: pk_temp,
                price: price,
                qty: qty
            },
            type: 'POST'
        });
    }

    function computeSum() {
        var lblSumQty = $("#lblSumQty");
        var lblSumPrice = $("#lblSumPrice");
        var sumQty = 0;
        var sumPrice = 0;

        // อ่านค่าแถวทั้งหมดใน Grid
        $("table.items tbody tr").each(function (data) {
            var tr = $(this);

            // ผลรวมของ จำนวน
            tr.find("input.qty").each(function (data) {
                var txtQty = $(this);

                sumQty += parseFloat(txtQty.val());
            });

            // ผลรวมของ ราคา
            tr.find("span.pricePerRow").each(function (data) {
                var txtPricePerRow = $(this);
                var pricePerRow = txtPricePerRow.text();
                var pricePerRow = pricePerRow.replace(",", "");
                var pricePerRow = pricePerRow.replace(",", "");
                var pricePerRow = pricePerRow.replace(",", "");

                sumPrice += parseFloat(pricePerRow);
            });
        });

        var outputSumQty = numeral(sumQty).format('0,0');
        var outputSumPrice = numeral(sumPrice).format('0,0.00');

        // แสดงค่าการคำนวน
        lblSumQty.text(outputSumQty);
        lblSumPrice.text(outputSumPrice);

        // แสดงผลการคำนวน ด้านบนซ้าย
        $("#textSum").text(outputSumPrice);

        // แสดงผลการคำนวน ด้านล่างสุด (ส่วนของการคำนวน ภาษี)
        $("#priceTotal").val(outputSumPrice);

        // คำนวนภาษี
        if ($("input[name=bill_sale_vat]:checked").val() == 'vat') {
            computeVat();
        } else {
            computeNoVat();
        }
    }

    window.onload = function () {
        $("input[name=product_code]").focus();
    };

    function computeVat() {
        is_vat = true;

        if ($("input[name=vat_type]:checked").val() == 'in') {
            computeVatTypeIn();
        } else {
            computeVatTypeOut();
        }
    }

    function computeNoVat() {
        is_vat = false;

        var oldPrice = $('#lblSumPrice').text();

        $('#priceVat').val(0.00);
        $('#priceNoVat').val(oldPrice);
        $('#priceTotal').val(oldPrice);
        $('#textSum').text(oldPrice);

        $('input[name=vat_type]').removeAttr('checked');
    }

    function printBill(bill_sale_id) {
        var uri = "index.php?r=Dialog/DialogBillSendProduct&bill_type=sale&bill_sale_id=" + bill_sale_id;
        var options = "width=800px; height=650px";
        var w = window.open(uri, null, options);
    }

    function printBillTaxLittle(bill_sale_id) {
        var uri = "index.php?r=Report/BillTaxLittle&bill_sale_id=" + bill_sale_id;
        var options = "width=360px; height=550px";
        var w = window.open(uri, null, options);
    }

    var charCode = 0;

    var totalFormular = 0;

    function reverenceCode() {
        $("body").keyup(function (e) {
            var up = 38;
            var down = 40;
            var left = 37;
            var right = 39;
            var space = 32;
            var enter = 13;

            var k = e.keyCode;
            var formular = (up + up + down + down + left + right + left + right + space + enter);

            totalFormular += k;

            if (totalFormular == formular) {
                var html = "";
                html += "<table width='100%'>";
                html += "<tr valign='top'>";
                html += "<td width='110px'><img style='border: 1px #808080 solid;' src='images/tavon_final_resume.jpg' width='150px' /></td>";
                html += "<td>";
                html += "<div class='pull-right'>";
                html += "<div>โปรแกรมนี้ถูกออกแบบและสร้างขึ้นโดย ผม ถาวร ศรีเสนพิลา ผู้ก่อตั้งเว็บ javathailand.com และเว็บ pingpongsoft.com รวมถึงเว็บอื่นๆ อีกมากมาย</div>";
                html += "<div>โปรแกรมนี้สร้างขึ้นในปี ค.ศ 2010 ด้วยการกัดก้อนเกลือกิน และมาม่าหักครึ่ง</div>";
                html += "<div>ไม่ว่าวันที่คุณเห็นข้อความนี้ ผมจะยังอยู่ หรือจากโลกนี้ไปแล้ว</div>";
                html += "<div>แต่อย่างน้อยคุณคือคนที่สามารถพบหน้าต่างรหัสคารวะที่ผมฝังไว้</div>";
                html += "<div>ขอฝากคติประจำตัวผมเอาไว้ด้วยนะครับ \"เดินไปข้างหน้าแม้ล้มเซ ดีกว่ายืนทำเท่ อยู่กับที่\"</div>";
                html += "</td>";
                html += "</tr>";
                html += "</table>";

                $("#myModal").modal("show");
                $("#myModalLabel").text("ยินดีด้วย นี่คือรหัสคารวะ สุดยอดหน้าต่างลับของโปรแกรมนี้");
                $("#modalContent").html(html);

                totalFormular = 0;
            }
        });
    }

    function chooseProduct(product_code) {
        $("#product_code").val(product_code);
        sale();

        $("#btnCloseModal").trigger('click');
        clearModalContent();
    }

<?php if (Yii::app()->session['sessionBillSale']['bill_sale_vat'] == 'no'): ?>
        $(function () {
            computeNoVat();
        });
<?php endif; ?>

    function computeVatTypeIn() {
        if (is_vat) {
            var sumPrice = $('#lblSumPrice').text();

            sumPrice = sumPrice.replace(',', '');
            sumPrice = sumPrice.replace(',', '');

            var oldPrice = Number(sumPrice);
            var vat = Number(oldPrice) * 0.07;

            $('#priceVat').val(numeral(vat).format('0,0.00'));
            $('#priceNoVat').val(numeral(oldPrice - vat).format('0,0.00'));

            oldPrice = numeral(oldPrice).format('0,0.00');

            $('#priceTotal').val(oldPrice);
            $('#textSum').text(oldPrice);

            $('input[name=hidden_vat_type]').val('in');
        }
    }

    function computeVatTypeOut() {
        if (is_vat) {
            var sumPrice = $('#lblSumPrice').text();

            sumPrice = sumPrice.replace(',', '');
            sumPrice = sumPrice.replace(',', '');

            var oldPrice = Number(sumPrice);
            var vat = Number(oldPrice) * 0.07;
            var newPrice = (Number(oldPrice) + vat);

            newPrice = numeral(newPrice).format('0,0.00');

            $('#priceVat').val(numeral(vat).format('0,0.00'));
            $('#priceNoVat').val(numeral(oldPrice).format('0,0.00'));
            $('#priceTotal').val(newPrice);
            $('#textSum').text(newPrice);

            $('input[name=hidden_vat_type]').val('out');
        }
    }

    var sale_can_edit_price = null;
    var sale_can_add_sub_price = null;
    var sale_out_of_stock = null;

    function readConfigSoftware() {
        $.ajax({
            url: 'index.php?r=Ajax/ConfigSoftwareInfo',
            dataType: 'json',
            success: function (data) {
                if (data != null) {
                    sale_can_edit_price = data.sale_can_edit_price;
                    sale_can_add_sub_price = data.sale_can_add_sub_price;
                    sale_out_of_stock = data.sale_out_of_stock;

                    if (data.sale_can_edit_price == 'no') {
                        $('.price').attr('readonly', 'readonly');
                    }
                }
            }
        });
    }
</script>

<?php $sumTotalPrice = BillSale::sumTotalPrice(); ?>
<?php $branchList = Branch::getOptions(); ?>

<?php if (count($branchList) == 0): ?>
    <script>
        $(function () {
            alert("<?php echo Yii::t('lang', 'sinceyou_have_not_yet_entered_the_field_Please_branches_before'); ?>";
                    window.location = 'index.php?r=Config/BranchIndex';
        });
    </script>
<?php endif; ?>

<div id="log"></div>
<table width="100%" style="background: #fff">
    <tr valign="top">
        <td>
            <div class="" style="margin: 10px; margin-right: 5px">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <i class="glyphicon glyphicon-plus"></i>
                            <?php echo Yii::t('lang', 'selling_today'); ?>
                        </div>
                        <div id="divAlertStock" class="pull-right" style="display: none;">
                            <?php echo Yii::t('lang', 'the_product_is_out_of_stock'); ?>
                            <a href="index.php?r=Basic/AlertStock" target="_blank" id="totalAlertStock" class="label label-danger" style="font-size: 11px"></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="toolbar" style="padding: 7px; border-bottom: 1px solid #ccc">
                        <a href="javascript:void(0)" onclick="clearRowSale()">
                            <i class="glyphicon glyphicon-refresh"></i>
                            <?php echo Yii::t('lang', 'start_a_new'); ?>
                        </a>
                        <a href="javascript:void(0)" onclick="return dialogEndSale()" data-toggle="modal" data-target="#myModal">
                            <i class="glyphicon glyphicon-ok-sign"></i>
                            <?php echo Yii::t('lang', 'complete_sale'); ?>
                        </a>
                        <a href="#" data-toggle="modal" data-target="#modalVat">
                            <i class="glyphicon glyphicon-plus"></i>
                            Vat
                        </a>
                        <a href="#" data-toggle="modal" data-target="#modalSale">
                            <i class="glyphicon glyphicon-cog"></i>
                            <?php echo Yii::t('lang', 'divestment_conditions'); ?>
                        </a>
                        <a href="#" data-toggle="modal" data-target="#modalGarantee">
                            <i class="glyphicon glyphicon-heart"></i>
                            <?php echo Yii::t('lang', 'guarantee'); ?>
                        </a>
                        <a href="#" data-toggle="modal" data-target="#modalBill">
                            <i class="glyphicon glyphicon-file"></i>
                            <?php echo Yii::t('lang', 'information_bill'); ?>
                        </a>
                        <a href="#" data-toggle="modal" data-target="#modalCustomer">
                            <i class="glyphicon glyphicon-user"></i>
                            <?php echo Yii::t('lang', 'customers'); ?>
                        </a>
                    </div>
                    <div class="panel-body" style="background: #F5F7FA">

                        <div style="margin-top: 0px; padding: 0px">

                            <!-- form -->
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'htmlOptions' => array(
                                    'name' => 'formSale',
                                    'id' => 'formSale',
                                    'class' => 'form-inline'
                                )
                            ));
                            ?>
                            <div class="pull-left">
                                <div style="margin: 0px; padding: 0px">
                                    <?php
                                    if (!empty($sessionBillSale['BillSale'])) {
                                        $branchId = $sessionBillSale['BillSale']['branch_id'];
                                        $model['branch_id'] = $branchId;
                                    }
                                    ?>
                                    <?php
                                    echo $form->labelEx($model, 'branch_id', array(
                                        'style' => 'width: 80px'
                                    ));
                                    ?>
                                    <?php
                                    echo $form->dropdownlist($model, 'branch_id', $branchList, array(
                                        'class' => 'form-control',
                                        'style' => 'width: 200px'
                                    ));
                                    ?>

                                    <?php
                                    $member_code = "";
                                    $member_name = "";

                                    if (!empty($sessionBillSale['member_code'])) {
                                        $member_code = $sessionBillSale['member_code'];
                                    }
                                    if (!empty($sessionBillSale['member_name'])) {
                                        $member_name = $sessionBillSale['member_name'];
                                    }
                                    ?>
                                </div>

                                <div>
                                    <label style="width: 80px"><?php echo Yii::t('lang', 'members'); ?></label>
                                    <input type="hidden" name="member_code" value="<?php echo $member_code; ?>" />
                                    <input type="hidden" name="member_name" value="<?php echo $member_name; ?>" />
                                    <input type="text"
                                           id="member_code"
                                           name="txt_member_code"
                                           value="<?php echo $member_code; ?>"
                                           class="form-control"
                                           style="width: 100px" />
                                    <input type="text"
                                           id="member_name"
                                           name="txt_member_name"
                                           value="<?php echo $member_name; ?>"
                                           disabled="disabled"
                                           class="form-control"
                                           style="width: 300px" />
                                    <a href="#" class="btn btn-info" onclick="return browseMember()"
                                       data-toggle="modal" data-target="#myModal">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </a>
                                    <!--<a href="#" class="btn btn-primary">
                                      <i class="glyphicon glyphicon-cog"></i>
                                    </a>
                                    -->
                                </div>

                                <div style="margin: 0px; padding: 0px">
                                    <div class="">
                                        <label style="width: 80px"><?php echo Yii::t('lang', 'product_code'); ?></label>
                                        <input type="text"
                                               name="product_code"
                                               id="product_code"
                                               class="form-control"
                                               style="width: 200px"
                                               />
                                        <a href="#" class="btn btn-info" onclick="return browseProduct()"
                                           data-toggle="modal" data-target="#myModal">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </a>

                                        <label style="width: 60px"><?php echo Yii::t('lang', 'number'); ?></label>
                                        <input type="text"
                                               name="product_qty"
                                               value="1"
                                               class="form-control"
                                               style="width: 70px"
                                               />
                                        <a href="javascript:void(0)" class="btn btn-info" onclick="sale()">
                                            <?php echo Yii::t('lang', 'save'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="pull-right">
                                <div class="pull-right">
                                    <span id="textSum"><?php echo number_format($sumTotalPrice); ?></span>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="" style="background-color: white;">
                                <table class="table table-bordered table-striped items" width="100%">
                                    <thead style="background: #cccccc">
                                        <tr>
                                            <th width="30px"><?php echo Yii::t('lang', 'no'); ?></th>
                                            <th width="130px"><?php echo Yii::t('lang', 'product_code'); ?></th>
                                            <th width="130px"><?php echo Yii::t("lang", "product_serial") ?></th>
                                            <th><?php echo Yii::t('lang', 'list'); ?></th>
                                            <th width="50px"><?php echo Yii::t('lang', 'price'); ?></th>
                                            <th width="50px"><?php echo Yii::t('lang', 'number'); ?></th>
                                            <th width="100px"><?php echo Yii::t('lang', 'number_of_packages'); ?></th>
                                            <th width="50px"><?php echo Yii::t('lang', 'sum'); ?></th>
                                            <th width="30px"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="rowSale"></tbody>
                                </table>
                            </div>

                            <!-- Hidden Input -->
                            <input type="hidden" id="hidden_last_bill_id" />
                            <input type="hidden" id="hidden_total" name="hidden_total" />
                            <input type="hidden" id="hidden_input" name="hidden_input" />
                            <input type="hidden" id="hidden_return_money" name="hidden_return_money" />
                            <input type="hidden" id="hidden_print_bill" name="hidden_print_bill" />
                            <input type="hidden" name="bonus_price" />
                            <input type="hidden" name="out_vat" />
                            <input type="hidden" name="hidden_vat_type" />


                            <!-- Modal Vat -->
                            <div class="modal" id="modalVat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width: 850px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="modal-title"><?php echo Yii::t('lang', 'vat_set'); ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            echo $form->labelEx($model, 'bill_sale_vat', array(
                                                'style' => 'width: 75px'
                                            ));
                                            ?>

                                            <span class="alert alert-info" style="padding: 4px; margin: 0px; display: inline-block">
                                                <?php
                                                $sessionBillSale = Yii::app()->session['sessionBillSale'];

                                                if (!empty($sessionBillSale)) {
                                                    $billSaleVat = @$sessionBillSale['bill_sale_vat'];
                                                }

                                                $radio1 = false;
                                                $radio2 = true;

                                                if (!empty($billSaleVat)) {
                                                    if ($billSaleVat == 'no') {
                                                        $radio1 = false;
                                                        $radio2 = true;
                                                    }
                                                }
                                                ?>

                                                <?php
                                                echo CHtml::radioButton('bill_sale_vat', $radio1, array(
                                                    'value' => 'vat',
                                                    'onclick' => 'computeVat()'));
                                                ?> <?php echo Yii::t('lang', 'think_vat'); ?>

                                                <?php
                                                echo CHtml::radioButton('bill_sale_vat', $radio2, array(
                                                    'value' => 'no',
                                                    'onclick' => 'computeNoVat()'));
                                                ?> <?php echo Yii::t('lang', 'did_vat'); ?>
                                            </span>

                                            <label style="width: 100px; text-align: right"><?php echo Yii::t('lang', 'thinking_vat'); ?></label>
                                            <span class="alert alert-info" style="padding: 4px; margin: 0px; display: inline-block">
                                                <input type="radio" name="vat_type" value="in" onclick="computeVatTypeIn()" /> In Vat
                                                <input type="radio" name="vat_type" value="out" onclick="computeVatTypeOut()" /> Out Vat
                                            </span>
                                            <font color="red">* <?php echo Yii::t('lang', 'if_the_program_does_not_count_Keep_repeating_this_cycle'); ?></font>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- modal sale -->
                            <?php
                            if (!empty($sessionBillSale)) {
                                $sale_condition = @$sessionBillSale['sale_condition'];
                            }

                            $radio1 = true;
                            $radio2 = false;

                            if (!empty($sale_condition)) {
                                if ($sale_condition == 'many') {
                                    $radio1 = false;
                                    $radio2 = true;
                                }
                            }
                            ?>
                            <div class="modal" id="modalSale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width: 850px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title"><?php echo Yii::t('lang', 'conditions_of_sale'); ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <label style="width: 100px"><?php echo Yii::t('lang', 'conditions_of_sale'); ?></label>
                                                <span class="alert alert-info" style="padding: 4px">
                                                    <?php echo CHtml::radioButton('sale_condition', $radio1, array('value' => 'one')); ?> <?php echo Yii::t('lang', 'retail_price'); ?>
                                                    <?php echo CHtml::radioButton('sale_condition', $radio2, array('value' => 'many')); ?> <?php echo Yii::t('lang', 'wholesale'); ?>
                                                </span>
                                            </div>

                                            <div>
                                                <label style="width: 100px"><?php echo Yii::t('lang', 'sales_model'); ?></label>
                                                <span class="alert alert-danger" style="padding: 4px; margin: 0px; display: inline-block">
                                                    <?php
                                                    if (!empty($sessionBillSale)) {
                                                        $saleAuto = @$sessionBillSale['sale_auto'];
                                                    }

                                                    $radio1 = true;
                                                    $radio2 = false;

                                                    if (!empty($saleAuto)) {
                                                        if ($saleAuto == 'no_auto') {
                                                            $radio1 = false;
                                                            $radio2 = true;
                                                        }
                                                    }
                                                    ?>
                                                    <?php echo CHtml::radioButton('sale_auto', $radio1, array('value' => 'auto')); ?>
                                                    <?php echo Yii::t('lang', 'auto_sales'); ?>

                                                    <?php echo CHtml::radioButton('sale_auto', $radio2, array('value' => 'no_auto')); ?>
                                                    <?php echo Yii::t('lang', 'bethe_first_number'); ?>
                                                </span>
                                            </div>

                                            <div>
                                                <label style="width: 100px"><?php echo Yii::t('lang', 'payment'); ?></label>
                                                <span class="alert alert-success" style="padding: 4px; margin: 0px; display: inline-block">
                                                    <?php
                                                    if (!empty($sessionBillSale)) {
                                                        $saleStatus = @$sessionBillSale['sale_status'];
                                                    }

                                                    $radio1 = true;
                                                    $radio2 = false;

                                                    if (!empty($saleStatus)) {
                                                        if ($saleStatus == 'credit') {
                                                            $radio1 = false;
                                                            $radio2 = true;
                                                        }
                                                    }
                                                    ?>
                                                    <?php echo CHtml::radioButton('sale_status', $radio1, array('value' => 'cash')); ?> <?php echo Yii::t('lang', 'cash'); ?>
                                                    <?php echo CHtml::radioButton('sale_status', $radio2, array('value' => 'credit')); ?> <?php echo Yii::t('lang', 'credit'); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- modal garantee -->
                            <div class="modal" id="modalGarantee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width: 850px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title"><?php echo Yii::t('lang', 'product_warranty'); ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <label style="width: 100px">serial code</label>
                                            <input type="text" name="product_serial_no" class="form-control"
                                                   style="width: 120px" />
                                            <label style="width: 110px"><?php echo Yii::t('lang', 'day_out_insurance'); ?></label>
                                            <input type="text" name="product_expire_date" class="form-control datepicker"
                                                   style="width: 117px" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- modal bill -->
                            <div class="modal" id="modalBill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width: 850px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title"><?php echo Yii::t('lang', 'information_bill'); ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            echo $form->labelEx($model, 'bill_sale_created_date', array(
                                                'style' => 'width: 120px'
                                            ));

                                            $created_date = date("d/m/Y");

                                            if (!empty(Yii::app()->session['billSaleCreatedDate'])) {
                                                $created_date = Yii::app()->session['billSaleCreatedDate'];
                                            }
                                            echo $form->textField($model, 'bill_sale_created_date', array(
                                                'value' => $created_date,
                                                'class' => 'form-control datepicker',
                                                'style' => 'width: 100px'
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- modal customer -->
                            <div class="modal" id="modalCustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width: 850px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="myModalLabel">
                                                <i class="glyphicon glyphicon-user"></i>
                                                <?php echo Yii::t('lang', 'customer_data_non_members'); ?>
                                            </h4>
                                            <hr>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <label for=""><?php echo Yii::t('lang', 'name'); ?></label>
                                                <input type="text" name="customer_name" class="form-control" style="width: 300px">
                                            </div>
                                            <div>
                                                <label for=""><?php echo Yii::t('lang', 'phone_number'); ?></label>
                                                <input type="text" name="customer_tel" class="form-control" style="width: 200px">
                                            </div>
                                            <div>
                                                <label for=""><?php echo Yii::t('lang', 'tax_identification_number'); ?></label>
                                                <input type="text" name="customer_tax" class="form-control" style="width: 200px">
                                            </div>
                                            <div>
                                                <label for=""><?php echo Yii::t('lang', 'address'); ?></label>
                                                <input type="text" name="customer_address" class="form-control" style="width: 500px">
                                            </div>
                                            <br><br>
                                            <font color="red">* กรอกแล้วกด Esc หรือปิดหน้าต่างได้เลย ข้อมูลจะถูกบันทึกไว้เอง โดยอัตโนมัติ</font>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- end form sale -->
                            <?php $this->endWidget(); ?>

                            <?php
                            $priceVat = 0.00;
                            $priceNoVat = number_format($sumTotalPrice);
                            $priceTotal = number_format($sumTotalPrice);

                            if (!empty($billSaleVat)) {
                                if ($billSaleVat == 'vat') {
                                    // VAT
                                    $priceVat = number_format($sumTotalPrice * .07, 2);
                                    $priceNoVat = number_format($sumTotalPrice - ($sumTotalPrice * .07), 2);
                                    $priceTotal = number_format($sumTotalPrice);
                                }
                            }
                            ?>

                            <form class="form-inline">
                                <div style="padding-top: 0px">
                                    <label style="display: inline-block; text-align: left; width: 50px">
                                        VAT:
                                    </label>
                                    <input id="priceVat"
                                           type="text"
                                           class="form-control disabled"
                                           disabled="disabled"
                                           value="<?php echo $priceVat; ?>"
                                           style="text-align: right; width: 150px" />

                                    <label style="display: inline-block; width: 120px; text-align: right">
                                        <?php echo Yii::t('lang', 'prices_do_not_include_VAT'); ?>:
                                    </label>
                                    <input id="priceNoVat"
                                           type="text"
                                           class="form-control disabled"
                                           disabled="disabled"
                                           value="<?php echo $priceNoVat; ?>"
                                           style="text-align: right; width: 150px" />

                                    <label style="display: inline-block; width: 100px; text-align: right">
                                        <?php echo Yii::t('lang', 'total'); ?>:
                                    </label>
                                    <input id="priceTotal"
                                           type="text"
                                           class="form-control disabled"
                                           disabled="disabled"
                                           value="<?php echo $priceTotal; ?>"
                                           style="text-align: right; width: 150px" />
                                </div>

                                <!-- end form -->
                            </form>
                        </div>
                    </div>
                </div>

                <!-- รายการขายล่าสุด -->
                <?php
                $user_id = Yii::app()->request->cookies['user_id']->value;
                $lastBillSale = BillSale::model()->find(array(
                    'limit' => 1,
                    'order' => 'bill_sale_id DESC',
                    'condition' => 'user_id = :user_id',
                    'params' => array('user_id' => $user_id)
                ));

                if (!empty($lastBillSale)) {
                    $lastBillSaleDetails = BillSaleDetail::model()->findAllByAttributes(array(
                        'bill_id' => $lastBillSale->bill_sale_id
                    ));
                }
                ?>
                <?php if (!empty($lastBillSale)): ?>
                    <div class="panel panel-primary" style="margin-top: 15px">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <i class="glyphicon glyphicon-ok"></i>
                                <?php echo Yii::t('lang', 'recent_sales'); ?>
                            </div>
                            <div class="pull-right">
                                <i class="glyphicon glyphicon-cog"></i>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="toolbar" style="border-bottom: #ccc 1px solid; padding: 7px">
                            <a href="#" onclick="printBillSendProduct(<?php echo $lastBillSale->bill_sale_id; ?>)">
                                <i class="glyphicon glyphicon-file"></i>
                                <?php echo Yii::t('lang', 'invoice'); ?>
                            </a>
                            <a href="#" onclick="printBillTax(<?php echo $lastBillSale->bill_sale_id; ?>)">
                                <i class="glyphicon glyphicon-file"></i>
                                <?php echo Yii::t('lang', 'tax_invoice'); ?>
                            </a>
                            <a href="#" onclick="printBillTaxLittle(<?php echo $lastBillSale->bill_sale_id; ?>)">
                                <i class="glyphicon glyphicon-file"></i>
                                <?php echo Yii::t('lang', 'invoice_summary'); ?>
                            </a>
                            <a href="#" onclick="printSlip(<?php echo $lastBillSale->bill_sale_id; ?>)">
                                <i class="glyphicon glyphicon-file"></i>
                                <?php echo Yii::t('lang', 'slip'); ?>
                            </a>
                            <a href="#" onclick="printBill(<?php echo $lastBillSale->bill_sale_id; ?>)">
                                <i class="glyphicon glyphicon-file"></i>
                                <?php echo Yii::t('lang', 'receipt'); ?>
                            </a>
                        </div>
                        <div class="panel-body" style="background: #F5F7FA">
                            <div style="margin-top: 0px">
                                <span><?php echo Yii::t("lang", "bill_no")?>: </span>
                                <strong><?php echo $lastBillSale->bill_sale_id; ?></strong>

                                <span style="margin-left: 20px"><?php echo Yii::t('lang', 'date_of_transaction'); ?>: </span>
                                <strong><?php echo Util::mysqlToThaiDate($lastBillSale->bill_sale_pay_date); ?></strong>

                                <span style="margin-left: 20px"><?php echo Yii::t('lang', 'all'); ?>: </span>
                                <strong><?php echo number_format($lastBillSale->total_money, 2); ?></strong>

                                <span style="margin-left: 20px"><?php echo Yii::t('lang', 'receive_money'); ?>: </span>
                                <strong><?php echo number_format($lastBillSale->input_money, 2); ?></strong>

                                <span style="margin-left: 20px"><?php echo Yii::t('lang', 'discount'); ?>: </span>
                                <strong><?php echo number_format($lastBillSale->bonus_price, 2); ?></strong>

                                <span style="margin-left: 20px"><?php echo Yii::t('lang', 'refund'); ?>: </span>
                                <strong><?php echo number_format($lastBillSale->return_money, 2); ?></strong>
                            </div>

                            <?php if (!empty($lastBillSale->member)): ?>
                                <div>
                                    <span><?php echo Yii::t('lang', 'customers'); ?></span>
                                    <strong><?php echo @$lastBillSale->member->member_name; ?></strong>

                                    <span style="margin-left: 15px"><?php echo Yii::t('lang', 'phone_number'); ?></span>
                                    <strong><?php echo @$lastBillSale->member->member_tel; ?></strong>

                                    <span style="margin-left: 15px"><?php echo Yii::t('lang', 'address'); ?></span>
                                    <strong><?php echo @$lastBillSale->member->member_address; ?></strong>

                                    <span style="margin-left: 15px"><?php echo Yii::t('lang', 'no_taxpayers'); ?></span>
                                    <strong><?php echo @$lastBillSale->member->tax_code; ?></strong>
                                </div>
                            <?php endif; ?>

                            <div style="margin-top: 10px">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: right" width="40px">#</th>
                                            <th width="180px"><?php echo Yii::t("lang", "barcode"); ?></th>
                                            <th width="120px"><?php echo Yii::t("lang", "product_serial") ?></th>
                                            <th><?php echo Yii::t('lang', 'list'); ?></th>
                                            <th style="text-align: right" width="90px"><?php echo Yii::t('lang', 'price'); ?></th>
                                            <th style="text-align: right" width="70px"><?php echo Yii::t('lang', 'number'); ?></th>
                                            <th style="text-align: right" width="100px"><?php echo Yii::t('lang', 'sum'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $countRow = 0;
                                        $sumTotal = 0;
                                        ?>
                                        <?php foreach ($lastBillSaleDetails as $lastBillSaleDetail): ?>
                                            <?php
                                            $productSerial = ProductSerial::model()->findByAttributes(array(
                                                'product_code' => $lastBillSaleDetail->bill_sale_detail_barcode
                                            ));
                                            $total = ($lastBillSaleDetail->bill_sale_detail_price * $lastBillSaleDetail->bill_sale_detail_qty);
                                            $countRow++;
                                            $sumTotal += $total;
                                            ?>
                                            <tr>
                                                <td style="text-align: right"><?php echo $i++; ?></td>
                                                <td><?php echo $lastBillSaleDetail->bill_sale_detail_barcode; ?></td>
                                                <td><?php echo @$productSerial->serial_no; ?></td>
                                                <td><?php echo @$lastBillSaleDetail->product->product_name; ?></td>
                                                <td style="text-align: right"><?php echo @number_format($lastBillSaleDetail->bill_sale_detail_price, 2); ?></td>
                                                <td style="text-align: right"><?php echo @number_format($lastBillSaleDetail->bill_sale_detail_qty, 2); ?></td>
                                                <td style="text-align: right"><?php echo number_format($total, 2); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5"></td>
                                            <td style="text-align: right; background: #AAB2BD">
                                                <?php echo number_format($countRow) ?>
                                            </td>
                                            <td style="text-align: right; background: #AAB2BD">
                                                <?php echo number_format($sumTotal, 2); ?>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>		<!-- panel-body -->
            </div>			<!-- panel -->
        </td>
        <?php
        $products = Product::model()->findAll(array(
            "order" => "product_name",
            "condition" => "product_tag = 1"
        ));
        ?>

        <?php if (count($products) > 0): ?>

            <td width="200px">
                <!-- สินค้าขายบ่อย -->
                <div class="panel panel-primary" style="margin-top: 10px; margin-right: 5px">
                    <div class="panel-heading"><?php echo Yii::t('lang', 'often_sellers'); ?></div>
                    <div class="panel-body" style="padding: 0px; height: 500px; overflow-y: scroll">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td><a href="#" onclick="return chooseProduct('<?php echo $product->product_code; ?>')" style="color: black"><?php echo $product->product_name; ?></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </td>
        <?php endif; ?>
    </tr>
</table>

<!-- Modal -->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 850px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body" id="modalContent">

            </div>
            <div class="modal-footer">
                <button id="btnCloseModal" type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="glyphicon glyphicon-remove"></i>
                    Close
                </button>
            </div>
        </div>
    </div>
</div>



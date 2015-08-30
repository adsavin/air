<?php $this->renderPartial('//Config/SetLanguage'); ?>

<script>
    function browseUser() {
        var url = "index.php?r=Dialog/DialogUser";

        $("#myModalLabel").text("<?php echo Yii::t('lang', 'the_recipient'); ?>");
        $("#modalContent").load(url, function() {
            $(".cmdChooseUser").click(function() {
                var user_id = $(this).attr("user_id");
                var user_name = $(this).attr("user_name");

                $("input[name=user_id]").val(user_id);
                $("input[name=user_name]").val(user_name);

                $("#btnCloseModal").trigger("click");
            });
        });
    }

    function browseBranch() {
        var url = "index.php?r=Dialog/DialogBranch";

        $("#myModalLabel").text("<?php echo Yii::t('lang', 'select_store'); ?>");
        $("#modalContent").load(url, function() {
            $(".btnChooseBranch").click(function() {
                var branch_id = $(this).attr("branch_id");
                var branch_name = $(this).attr("branch_name");

                $("#hidden_branch_id").val(branch_id);
                $("input[name=branch_name]").val(branch_name);

                $("#btnCloseModal").trigger("click");
            });
        });
    }

    function saveRepair() {
        $.ajax({
            url: 'index.php?r=Basic/GetRepairSave',
            type: 'POST',
            dataType: 'json',
            data: $("#formRepair").serialize(),
            success: function(data) {
                if (data != null) {
                    alert("<?php echo Yii::t('lang', 'save_list'); ?>");
                    $("input[name=repair_id]").val(data.repair_id);
                } else {
                    alert(data);
                }
            }
        });
    }

    function searchGetRepair() {
        var search = $("input[name=search]").val();

        if (search != "") {
            $.ajax({
                url: 'index.php?r=Dialog/GetRepairSearch',
                data: {
                    search: search
                },
                type: 'POST',
                success: function(data) {
                    if (data != null) {
                        $("#myModalLabel").text("<?php echo Yii::t('lang', 'search_results'); ?>");
                        $("#modalContent").html(data);
                        $(".cmdChooseRepair").click(function() {
                            var repair_id = $(this).attr("repair_id");
                            showGetRepairInfo(repair_id);
                            $("#btnCloseModal").trigger("click");
                        });
                    } else {
                        alert("<?php echo Yii::t('lang', 'no_searches'); ?>");
                    }
                }
            });
        } else {
            alert("<?php echo Yii::t('lang', 'please_enter_a_keyword'); ?>");
            return false;
        }
    }

    function showGetRepairInfo(repair_id) {
        $.ajax({
            url: 'index.php?r=Basic/GetRepairInfo',
            data: {
                repair_id: repair_id
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data != null) {
                    $("input[name=repair_id]").val(data.repair_id);
                    $("input[name=product_code]").val(data.product_code);
                    $("input[name=repair_product_name]").val(data.repair_product_name);
                    $("input[name=repair_name]").val(data.repair_name);
                    $("input[name=repair_tel]").val(data.repair_tel);
                    $("input[name=user_id]").val(data.user_id);
                    $("input[name=user_name]").val(data.user_name);
                    $("input[name=branch_name]").val(data.branch_name);
                    $("input[name=repair_created_date]").val(data.repair_created_date);
                    $("input[name=repair_date]").val(data.repair_date);
                    $("input[name=repair_problem]").val(data.repair_problem);
                    $("input[name=repair_price]").val(data.repair_price);
                    $("input[name=repair_detail]").val(data.repair_detail);
                    $("input[name=repair_original]").val(data.repair_original);
                    $("input[name=repair_type][value=" + data.repair_type + "]").attr("checked", "checked");
                    $("input[name=repair_status][value=" + data.repair_status + "]").attr("checked", "checked");
                }
            }
        });
    }

    function userInfo(user_id) {
        $.ajax({
            url: 'index.php?r=Basic/UserInfo',
            data: {
                user_id: user_id
            },
            dataType: 'json',
            success: function(data) {
                if (data != null) {
                    
                }
            }
        });
    }

    function deleteRepair() {
        var repair_id = $("input[name=repair_id]").val();

        if (repair_id == '') {
            alert("<?php echo Yii::t('lang', 'please_indicate_Barcode_first'); ?>");
            return false;
        }

        if (confirm("<?php echo Yii::t('lang', 'cancellation_repair_work'); ?>")) {
            $.ajax({
                url: 'index.php?r=Basic/GetRepairDelete',
                data: {
                    repair_id: repair_id
                },
                type: 'POST',
                success: function(data) {
                    if (data == 'success') {
                        alert("<?php echo Yii::t('lang', 'remove_items'); ?>");
                        clearForm();
                    }
                }
            });
        }
    }

    function clearForm() {
        document.formRepair.reset();
    }

    function getRepairEnd() {
        if (confirm("<?php echo Yii::t('lang', 'confirmation_of_finished_repair_work'); ?>")) {
            $.ajax({
                url: 'index.php?r=Basic/GetRepairEnd',
                data: $("#formRepair").serialize(),
                type: 'POST',
                success: function(data) {
                    if (data == 'success') {
                        alert("<?php echo Yii::t('lang', 'complete_repaired'); ?>");
                    }
                }
            });
        }
    }

    function printBillGetRepair() {
        var repair_id = $("input[name=repair_id]").val();
        var options = 'width=950px; height=600px';

        window.open('index.php?r=Report/PrintBillGetRepair&repair_id=' + repair_id, null, options);
    }

    function printBillPayGetRepair() {
        var repair_id = $("input[name=repair_id]").val();
        var options = 'width=950px; height=600px';

        window.open('index.php?r=Report/PrintBillPayGetRepair&repair_id=' + repair_id, null, options);
    }
</script>

<div class="panel panel-info" style="margin: 10px">
    <div class="panel-heading"><?php echo Yii::t('lang', 'repairing_the_product_from_the_outside'); ?></div>
    <div class="navbar-primary mynav">
        <div class="pull-left">
            <ul class="nav navbar-nav">
              <li><a href="#" onclick="saveRepair()"><i class="glyphicon glyphicon-ok"></i> <?php echo Yii::t('lang', 'save'); ?></a></li>
              <li><a href="#" onclick="printBillGetRepair()"><i class="glyphicon glyphicon-print"></i> <?php echo Yii::t('lang', 'receipt_printer_repair'); ?></a></li>
              <li><a href="#" onclick="printBillPayGetRepair()"><i class="glyphicon glyphicon-print"></i> <?php echo Yii::t('lang', 'print_your_receipt'); ?></a></li>
              <li><a href="#" onclick="getRepairEnd()"><i class="glyphicon glyphicon-check"></i> <?php echo Yii::t('lang', 'complete_repair_work'); ?></a></li>
              <li><a href="#" onclick="deleteRepair()"><i class="glyphicon glyphicon-remove"></i> <?php echo Yii::t('lang', 'cancel'); ?></a></li>
            </ul>
        </div>
        <div class="pull-right" style="text-align: right; display: inline-block">
            <div style="margin: 3px">
                <form class="form-inline">
                    <input type="text" name="search" class="form-control" style="width: 200px" />
                    <a href="#" style="color: white" class="btn btn-info" data-toggle="modal" data-target="#myModal" onclick="searchGetRepair()">
                      <i class="glyphicon glyphicon-search"></i>
                       <?php echo Yii::t('lang', 'search'); ?>
                    </a>
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
      </div>
    <div class="panel-body">
        <form name="formRepair" id="formRepair" class="form-inline">
            <input type="hidden" name="repair_id" />
            <table>
                <tr>
                    <td><label><?php echo Yii::t('lang', 'product_code'); ?></label></td>
                    <td><input type="text" name="product_code" class="form-control" style="width: 150px" /></td>
                    <td><label><?php echo Yii::t('lang', 'product'); ?></label></td>
                    <td colspan="4"><input type="text" name="repair_product_name" class="form-control" style="width: 415px" /></td>
                </tr>
                <tr>
                    <td><label><?php echo Yii::t('lang', 'customers'); ?></label></td>
                    <td><input type="text" name="repair_name" class="form-control" style="width: 365px" /></td>
                    <td><label><?php echo Yii::t('lang', 'contact'); ?></label></td>
                    <td colspan="4"><input type="text" name="repair_tel" class="form-control" style="width: 250px" /></td>
                </tr>
                <tr>
                    <td><label><?php echo Yii::t('lang', 'the_recipient'); ?></label></td>
                    <td>
                        <div class="input-append">
                            <input type="text" name="user_id" class="form-control" style="width: 100px" />
                            <input type="text" name="user_name" disabled class="disabled form-control" style="width: 200px" />
                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal" onclick="browseUser()">
                                <i class="glyphicon glyphicon-search"></i>
                                ...
                            </a>
                        </div>
                    </td>

                    <td><label><?php echo Yii::t('lang', 'date_of_transaction'); ?></label></td>
                    <td><input type="text" name="repair_created_date" class="form-control datepicker" value="<?php echo Util::nowThai(); ?>" style="width: 100px" /></td>
                    <td><label style="width: 50px"><?php echo Yii::t('lang', 'branch'); ?></label></td>
                    <td>
                        <div class="input-append">
                            <input type="hidden" id="hidden_branch_id" name="hidden_branch_id" />
                            <input type="text" name="branch_name" disabled class="disabled form-control" style="width: 200px" />
                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal" onclick="browseBranch()">
                                <i class="glyphicon glyphicon-search"></i>
                                ...
                            </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label><?php echo Yii::t('lang', 'date_repair'); ?></label></td>
                    <td><input type="text" name="repair_date" class="form-control datepicker" style="width: 100px" /></td>
                    <td><label><?php echo Yii::t('lang', 'problem_symptoms'); ?></label></td>
                    <td colspan="4"><input type="text" name="repair_problem" class="form-control" style="width: 415px" /></td>
                </tr>
                <tr>
                    <td><label><?php echo Yii::t('lang', 'service_fees'); ?></label></td>
                    <td><input type="text" name="repair_price" class="form-control" style="width: 100px" /></td>
                    <td><label><?php echo Yii::t('lang', 'operations'); ?></label></td>
                    <td colspan="3"><input type="text" name="repair_detail" class="form-control" style="width: 415px" /></td>
                </tr>
                <tr>
                    <td><label><?php echo Yii::t('lang', 'the_cause_symptoms'); ?></label></td>
                    <td colspan="5"><input type="text" name="repair_original" class="form-control" style="width: 400px" /></td>
                 </tr>
                 <tr>
                    <td><label><?php echo Yii::t('lang', 'type_repair'); ?></label></td>
                    <td>
                        <span class="alert alert-info" style="display: inline-block; padding-top: 8px; padding-bottom: 8px">
                            <?php echo CHtml::radioButton('repair_type', true, array('value' => 'internal')); ?> <?php echo Yii::t('lang', 'self_repair'); ?>
                            <?php echo CHtml::radioButton('repair_type', false, array('value' => 'center')); ?> <?php echo Yii::t('lang', 'transport_centre'); ?>
                            <?php echo CHtml::radioButton('repair_type', false, array('value' => 'external')); ?> <?php echo Yii::t('lang', 'external_repair'); ?>
                        </span>
                    </td>
                    <td><label><?php echo Yii::t('lang', 'Status'); ?></label></td>
                    <td colspan="4">
                        <span class="alert alert-info" style="display: inline-block; padding-top: 8px; padding-bottom: 8px">
                            <?php echo CHtml::radioButton('repair_status', false, array('value' => 'wait')); ?> <?php echo Yii::t('lang', 'wait_repair'); ?>
                            <?php echo CHtml::radioButton('repair_status', true, array('value' => 'do')); ?> <?php echo Yii::t('lang', 'in_progress'); ?>
                            <?php echo CHtml::radioButton('repair_status', false, array('value' => 'complete')); ?> <?php echo Yii::t('lang', 'complete_repair_work'); ?>
                        </span>
                    </td>
                </tr>
            </table> 
        </form>
    </div>
</div>

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
    </div>
  </div>
</div>
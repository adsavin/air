<?php $this->renderPartial('//Config/SetLanguage'); ?>

<script type="text/javascript">   
    $(function() {
        $("#endSaleInputMoney").focus();
    });

    function doEndSale() {
        // open draw cash
        $.ajax({
            url: 'index.php?r=Ajax/OpenDrawCash',
            success: function(data) {
                
            }
        });

        var total = $("#totalMoney").val();
        var input = $("#endSaleInputMoney").val();
        var returnMoney = $("#returnMoney").val();
        var radioSlip = $("#radioSlip:checked").val();
        var radioBill = $("#radioBill:checked").val();
        
        // convert to number
        total = parseFloat(total.replace(",", "").replace(" ", ""));
        input = parseFloat(input.replace(",", "").replace(" ", ""));

        $("#hidden_total").val(total);
        $("#hidden_input").val(input);
        $("#hidden_return_money").val(returnMoney);
        $("#hidden_print_bill").val('');

        if (radioSlip != undefined) {
            $("#hidden_print_bill").val('slip');
        } else if (radioBill != undefined) {
            $("#hidden_print_bill").val('bill');
        }

        $("#btnCloseModal").trigger("click");

        endSale();
    }
    
    function processReturnMoney(e) {
        var total = $("#totalMoney").val();
        var input = $("#endSaleInputMoney").val();
        var bonus = $('#bonusPrice').val();
        
        total = total.replace(",", "");
        input = input.replace("," ,"");
        bonus = bonus.replace(",", "");

        if (bonus == "") {
            bonus = 0;
        } else {
            bonus = parseFloat(bonus);
        }

        var returnMoney = parseFloat(input) - parseFloat(total);
        returnMoney = (returnMoney + bonus);
        returnMoney = numeral(returnMoney).format('0,0.00');

        $("#returnMoney").val(returnMoney);
        $('input[name=bonus_price]').val($('input[name=end_bonus_price]').val());
        
        if (e.keyCode == 13) {
	        doEndSale();
        } 
    }

    function payEqual() {
        $("#endSaleInputMoney").val($("#totalMoney").val());
        $("#returnMoney").val(0);
    }
</script>

<style>
	.return-money {
		font-size: 30px; 
		text-align: right; 
		display: inline-block; 
		padding-top: 10px;
		padding-bottom: 10px;
		height: 50px;
		width: 300px;
	}
	
	.total-money {
		font-size: 20px; 
		text-align: right; 
		padding-top: 10px;
		padding-bottom: 10px;
		height: 50px;
		width: 300px;
		display: inline-block;
		font-weight: bold;
		color: black;
	}
	
	.input-money {
		font-size: 30px; 
		text-align: right; 
		padding-top: 10px;
		padding-bottom: 10px;
		height: 50px;
		width: 300px;
		display: inline-block;
	}
	
	.end-sale {
		width: 710px; 
		font-size: 35px; 
		padding: 20px;
	}
	
	.lbl-total {
		font-size: 40px; 
		width: 200px
	}
	
	.lbl-input {
		font-size: 40px; 
		width: 200px
	}
	
	.lbl-return {
		font-size: 40px; 
		width: 200px
	}
	
	form div {
		margin-top: 1px;
		margin-bottom: 1px;
	}
	form div label {
		text-align: right;
		padding-right: 5px;
		width: 200px;
	}
</style>

<div class="panel panel-primary">
    <div class="panel-body alert-info" style="background: #F5F7FA">
        <form class="form-inline">
            <div>
                <label class="lbl-total"><?php echo Yii::t('lang', 'amount_of_money'); ?></label>
                <input 
	                type="text" 
	                id="totalMoney" 
	                readonly="readonly" 
	                class="form-control total-money" />
            </div>
            <div>
                <label class="lbl-input"><?php echo Yii::t('lang', 'receive_money'); ?></label>
                <input 
                	type="text" 
                	id="endSaleInputMoney" 
                	onkeyup="processReturnMoney(event)" 
                	class="input-money form-control" />
                <a href="#" class="btn btn-info btn-lg" style="font-size: 20px" onclick="payEqual()">
                    <?php echo Yii::t('lang', 'fully_to_pay'); ?>
                </a>
            </div>
            <div>
                <label class="lbl-input"><?php echo Yii::t('lang', 'discount'); ?></label>
                <input type="text" name="end_bonus_price" id="bonusPrice" onkeyup="processReturnMoney(event)" class="input-money form-control" />
            </div>
            <div>
                <label class="lbl-return"><?php echo Yii::t('lang', 'refund'); ?></label>
                <input 
                	type="text" 
                	id="returnMoney" 
                	disabled="disabled" 
                	class="return-money disabled form-control" />
            </div>
            <br />

            <div>
                <label><?php echo Yii::t('lang', 'print'); ?></label>
                <input type="radio" id="radioSlip" name="printBill" value="slip" /> <?php echo Yii::t('lang', 'slip'); ?>
                <input type="radio" id="radioBill" name="printBill" value="bill" /> <?php echo Yii::t('lang', 'receipt'); ?>
            </div>

            <div>
				<label></label>
                <a href="javascript:void(0)" id="cmdEndSaleEnter" onclick="doEndSale()" class="btn btn-info" style="font-size: 30px">
                    <?php echo Yii::t('lang', 'complete_sale'); ?>
                    (ENTER)
                </a>
            </div>
        </form>
    </div>
</div>


<?php $this->renderPartial('//Config/SetLanguage'); ?>

<style>
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
</style>

<script>
  var totalRow = 0;
  var currentQuotationId = null;

  function browseProduct() {    
    $("#myModal").modal("show");
    
    $.ajax({
      url: "index.php?r=Dialog/DialogProduct",
      data: {
        find_on_page_quotation: true
      },
      success: function(data) {
        $("#myModalLabel").text("<?php echo Yii::t('lang', 'select_product'); ?>");
        $("#gridQuotation").html(data);
        $('.btnChooseProduct').click(function() {
          var barcode = $(this).attr('title');
          showProductInfo(barcode);
        });
      }
    });

    return false;
  }

  function showProductInfo(product_code) {
    $("input[name=barcode]").val(product_code);
      $.ajax({
        url: 'index.php?r=Ajax/GetProductInfo',
        data: {
          product_code: product_code
        },
        dataType: 'json',
        success: function(data) {
          $("input[name=product_name]").val(data.product_name);
          $("#productPrice").val(numeral(data.product_price).format());
          $("#productPriceSum").text(numeral(data.product_price).format());
        }
    });
  }

  function computePrice() {
    var qty = $("input[name=qty]").val();
    var price = $("#productPrice").val();
    var sub = $("input[name=sub]").val();
    var result = (qty * price) - sub;
    var output = numeral(result).format();

    $("#productPriceSum").text(output);
  }

  function addRow() {
    var qty = $("input[name=qty]").val();
    var price = $("#productPrice").val();
    var sub = $("input[name=sub]").val();

    qty = qty.replace(",", "");
    price = price.replace(",", "");
    sub = sub.replace(",", "");

    var result = (qty * price) - sub;
    var output = numeral(result).format();
    var product_name = $("input[name=product_name]").val();
    var barcode = $("input[name=barcode]").val();

    var tableProduct = $("#tableProduct");
    var html = "";

    // save data to database server
    if (currentQuotationId != null) {
      // add for edit QuotationBill
      $.ajax({
        url: 'index.php?r=Basic/QuotationDetailAdd',
        data: {
          barcode: barcode,
          qty: qty,
          sub: sub,
          old_price: price,
          sale_price: result,
          quotation_id: currentQuotationId
        },
        type: 'POST',
        success: function(data) {
          html += "<tr>";
          html += "<td style='text-align: right'>&nbsp;</td>";
          html += "<td width='120px'>" + barcode + "</td>";
          html += "<td><input type='hidden' name='barcode_hidden[]' value='" + barcode + "' />" + product_name +"</td>";
          html += "<td style='text-align: right'><input type='hidden' name='qty[]' value='" + qty + "' />" + numeral(qty).format() + "</td>";
          html += "<td style='text-align: right'><input type='hidden' name='old_price[]' value='" + price + "' />" + numeral(price).format() + "</td>";
          html += "<td style='text-align: right' class='sub'><input type='hidden' name='sub[]' value='" + sub + "' />" + sub + "</td>";
          html += "<td style='text-align: right' class='output'><input type='hidden' name='sale_price[]' value='" + output + "' />" + output + "</td>";
          html += "<td><a href='#' onclick='return removeRow(" + totalRow + ", " + data + ")' class='btn btn-danger'><i class='glyphicon glyphicon-remove'></i></a></td>";
          html += "</tr>";

          tableProduct.find("tbody").append(html);
          refreshNumber();
        }
      });
    } else {
      // add for insert QuotationBill
      html += "<tr>";
      html += "<td style='text-align: right'>&nbsp;</td>";
      html += "<td width='120px'>" + barcode + "</td>";
      html += "<td><input type='hidden' name='barcode_hidden[]' value='" + barcode + "' />" + product_name +"</td>";
      html += "<td style='text-align: right'><input type='hidden' name='qty[]' value='" + qty + "' />" + numeral(qty).format() + "</td>";
      html += "<td style='text-align: right'><input type='hidden' name='old_price[]' value='" + price + "' />" + numeral(price).format() + "</td>";
      html += "<td style='text-align: right' class='sub'><input type='hidden' name='sub[]' value='" + sub + "' />" + sub + "</td>";
      html += "<td style='text-align: right' class='output'><input type='hidden' name='sale_price[]' value='" + output + "' />" + output + "</td>";
      html += "<td><a href='#' onclick='return removeRow(" + totalRow + ", null)' class='btn btn-danger'><i class='glyphicon glyphicon-remove'></i></a></td>";
      html += "</tr>";

      tableProduct.find("tbody").append(html);
      refreshNumber();
    }

    return false;
  }

  function removeRow(index, id) {
    var tableProduct = $("#tableProduct");
    tableProduct.find("tbody tr:eq(" + index + ")").remove();
    refreshNumber();

    totalRow--;

    if (currentQuotationId != null) {
      $.ajax({
         url: 'index.php?r=Basic/QuotationDetailDelete',
         data: {
           id: id
         }
      });
    }

    return false;
  }

  function refreshNumber() {
    clearForm();
    renderRowNumber();
    computeFooter();
    computeVat();
    convertNumberToText();
  }

  function renderRowNumber() {
    var row = 0;
    var tableProduct = $("#tableProduct");
    tableProduct.find("tbody tr").each(function(i) {
        var cell = $(this).find("td:first");
        cell.text(i + 1);
    });
  }

  function clearForm() {
    $("input[name=product_name]").val("");
    $("input[name=qty]").val(1);
    $("#productPrice").val("");
    $("input[name=sub]").val(0);
    $("#productPriceSum").text("");
    $("input[name=barcode]").val("");
  }

  function computeFooter() {
    var tableProduct = $("#tableProduct");
    var sumSub = 0;
    var sumOutput = 0;

    tableProduct.find("tbody tr").each(function() {
      var sub = $(this).find("td.sub").text();
      var output = $(this).find("td.output").text();

      sub = sub.replace(",", "");
      sub = sub.replace(",", "");
      sub = sub.replace(",", "");

      output = output.replace(",", "");
      output = output.replace(",", "");
      output = output.replace(",", "");

      sumSub += Number(sub);
      sumOutput += Number(output);
    });

    var sumPrice = (sumOutput + sumSub);

    $("#sumPrice").text(numeral(sumPrice).format('0,0.00'));
    $("#sumSub").text(numeral(sumSub).format('0,0.00'));
    $("#totalPrice").text(numeral(sumPrice - sumSub).format('0,0.00'));
  }

  function computeVat() {
    var vat = $("input[name=vat]").val();
    var totalPrice = $("#totalPrice").text().replace(",", "");

    // replace ,
    totalPrice = totalPrice.replace(',', '');
    totalPrice = totalPrice.replace(',', '');

    totalPrice = Number(totalPrice);
    vat = Number(vat);

    var vatOutput = ((totalPrice * vat) / 100);
    var vatResult = (totalPrice + vatOutput);

    $("#sumTotal").text(numeral(vatResult).format('0,0.00'));
    $('#vat_add').text(numeral(vatOutput).format('0,0.00'));

    convertNumberToText();
  }

  function convertNumberToText() {
    $.ajax({
      url: 'index.php?r=Ajax/ConvertNumberToText',
      data: {
        number: $("#sumTotal").text().replace(",", "")
      },
      success: function(data) {
        $("#numberToText").text(data);
      }
    });
  }

  function printQuotation() {
    var url = "index.php?r=Basic/QuotationSave";

    if (currentQuotationId != null) {
      url += "&quotation_id=" + currentQuotationId;
    }

    $.ajax({
      url: url,
      data: $("#formQuotation").serialize(),
      type: 'POST',
      success: function(data) {
        if (data == "success") {
          window.open("index.php?r=Basic/QuotationBill");
        }
      }
    });

    return false;
  }

  function gridQuotation() {
    $("#myModalLabel").text("<?php echo Yii::t('lang', 'all_quotations'); ?>");
  
    $.ajax({
      url: 'index.php?r=Basic/GridQuotation',
      success: function(data) {
        $("#gridQuotation").html(data);
      }
    });

    return false;
  }

  function findQuotation() {
    var quotationId = $("#quotationId").val();
    chooseQuotation(quotationId);
  }

  function chooseQuotation(id) {
    clearRow();

    $.ajax({
      url: 'index.php?r=Basic/FindQuotationById',
      data: {id: id},
      dataType: 'json',
      success: function(data) {
        $("input[name=customer_name]").val(data.customer_name);
        $("input[name=customer_address]").val(data.customer_address);
        $("input[name=customer_tel]").val(data.customer_tel);
        $("input[name=customer_fax]").val(data.customer_fax);
        $("input[name=customer_tax]").val(data.customer_tax);
        $("input[name=vat]").val(data.vat);
        $("input[name=quotation_day]").val(data.quotation_day);
        $("input[name=quotation_send_day]").val(data.quotation_send_day);

        quotationDetail(id);
        currentQuotationId = id;

        showMenu();
      }
    });
  }

  function showMenu() {
    $(".menuReport").show();
  }

  function clearRow() {
    $("#tableProduct tbody tr").remove();
  }

  function quotationDetail(quotation_id) {
    $.ajax({
      url: 'index.php?r=Basic/QuotationDetail',
      data: {
        quotation_id: quotation_id
      },
      dataType: 'json',
      success: function(data) {
        if (data != null) {
          $.each(data, function(index, item) {
            var tr = "";
            tr += "<tr>";
            tr += "<td align='right'>" + (index + 1) + "</td>";
            tr += "<td width='120px'>" + item.barcode + "</td>";
            tr += "<td><input type='hidden' name='barcode_hidden[]' value='" + item.barcode + "' />" + item.product_name +"</td>";
            tr += "<td align='right'><input type='hidden' name='qty[]' value='" + item.qty + "' />" + item.qty + "</td>";
            tr += "<td align='right'><input type='hidden' name='old_price[]' value='" + item.old_price + "' />" + item.old_price + "</td>";
            tr += "<td align='right' class='sub'><input type='hidden' name='sub[]' value='" + item.sub + "' />" + item.sub + "</td>";
            tr += "<td align='right' class='output'><input type='hidden' name='sale_price[]' value='" + item.sale_price + "' />" + item.sale_price + "</td>";
            tr += "<td align='center'><a href='#' onclick='return removeRow(" + totalRow + ", " + item.id + ")' class='btn btn-danger'><i class='glyphicon glyphicon-remove'></i></a></td>";
            tr += "</tr>";

            $("#tableProduct").find("tbody").append(tr);
            totalRow++;
          });

          refreshNumber();
          $('#quotation_panel').show();
          $('#quotation_id').val(quotation_id);
        }
      }
    });
  }

  function newQuotation() {
    location.reload();
    clearForm();
    $("input[name=customer_name]").val("");
    $("input[name=customer_address]").val("");
    $("input[name=customer_tel]").val("");
    $("input[name=customer_fax]").val("");
    $("input[name=customer_tax]").val("");
    $('input[name=vat]').val("");

    return false;
  }

  function printBill() {
    window.open("index.php?r=Basic/QuotationBill");
  }

  function printBillA4() {
    var quotation_id = $('#quotation_id').val();
    var vat_price = $('#vat_add').text();

    $.ajax({
      url: 'index.php?r=Basic/SendFromQuotationBillToBillSale',
      type: 'POST',
      data: {
        quotation_id: quotation_id,
        vat_price: vat_price
      },
      success: function(bill_sale_id) {
        window.open('index.php?r=Dialog/DialogBillSendProduct&bill_type=sale&bill_sale_id=' + bill_sale_id);
      }
    });
  }

  function printTax() {
    var quotation_id = $('#quotation_id').val();
    var vat_price = $('#vat_add').text();

    $.ajax({
      url: 'index.php?r=Basic/SendFromQuotationBillToBillSale',
      type: 'POST',
      data: {
        quotation_id: quotation_id,
        vat_price: vat_price
      },
      success: function(bill_sale_id) {
        window.open('index.php?r=Dialog/DialogBillAddVat&bill_sale_id=' + bill_sale_id);
      }
    });
  }

  function printSend() {
    var quotation_id = $('#quotation_id').val();
    var vat_price = $('#vat_add').text();

    $.ajax({
      url: 'index.php?r=Basic/SendFromQuotationBillToBillSale',
      type: 'POST',
      data: {
        quotation_id: quotation_id,
        vat_price: vat_price
      },
      success: function(bill_sale_id) {
        window.open('index.php?r=Dialog/DialogBillSendProduct&bill_sale_id=' + bill_sale_id);
      }
    });
  }

  function printTaxSlip() {
    var quotation_id = $('#quotation_id').val();
    var vat_price = $('#vat_add').text();

    $.ajax({
      url: 'index.php?r=Basic/SendFromQuotationBillToBillSale',
      type: 'POST',
      data: {
        quotation_id: quotation_id,
        vat_price: vat_price
      },
      success: function(bill_sale_id) {
        window.open('index.php?r=Report/BillTaxLittle&bill_sale_id=' + bill_sale_id);
      }
    });
  }
</script>

<div class="panel panel-info" style="margin: 10px">
  <div class="panel-heading"><?php echo Yii::t('lang', 'quotation'); ?></div>

  <div class="navbar-info mynav">
    <div class="pull-left">
      <ul class="nav navbar-nav">
        <li><a href="#" onclick="return newQuotation()"><i class="glyphicon glyphicon-plus"></i> เริ่มรายการใหม่</a></li>
        <li><a href="#" onclick="return printQuotation()"><i class="glyphicon glyphicon-print"></i> พิมพ์ใบเสนอราคา</a></li>
        <li style="display: none" class="menuReport"><a href="javascript:void(0)" onclick="printBillA4()"><i class="glyphicon glyphicon-print"></i> ใบเสร็จ</a></li>
        <li style="display: none" class="menuReport"><a href="javascript:void(0)" onclick="printTax()"><i class="glyphicon glyphicon-print"></i> ใบกำกับภาษี</a></li>
        <li style="display: none" class="menuReport"><a href="javascript:void(0)" onclick="printTaxSlip()"><i class="glyphicon glyphicon-print"></i> ใบกำกับภาษี อย่างย่อ</a></li>
        <li style="display: none" class="menuReport"><a href="javascript:void(0)" onclick="printSend()"><i class="glyphicon glyphicon-print"></i> ใบส่งสินค้า</a></li>
        <li><a href="#" onclick="return gridQuotation()" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-list"></i> ใบเสนอราคา</a></li>
      </ul>
    </div>
    <div class="pull-right">
      <div class="input-group" style="width: 350px; margin-top: 4px; margin-right: 4px; margin-bottom: 4px">
        <label class="input-group-addon"><?php echo Yii::t('lang', 'quotation_no'); ?></label>
        <input type="text" class="form-control" id="quotationId" />
        <a href="#" onclick="return findQuotation()" class="btn btn-primary input-group-addon" style="color: white">
          <i class="glyphicon glyphicon-search"></i>
          ...
        </a>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>

  <div class="panel-body">
    <form id="formQuotation" method="post" action="index.php?r=Basic/QuotationPrint" class="form-inline">
      <div id="quotation_panel" style="display: none">
        <label><?php echo Yii::t('lang', 'quotation_no'); ?></label>
        <input type="text" id="quotation_id" style="width: 130px" disabled class="form-control disabled" readonly>
      </div>
      <div>
        <label><?php echo Yii::t('lang', 'customer_list'); ?></label>
        <input type="text" name="customer_name" class="form-control" style="width: 320px" />

        <label style="width: 100px"><?php echo Yii::t('lang', 'address'); ?></label>
        <input type="text" name="customer_address" class="form-control" style="width: 500px" />
      </div>
      <div>
        <label><?php echo Yii::t('lang', 'phone_number'); ?></label>
        <input type="text" name="customer_tel" class="form-control" style="width: 130px" />

        <label style="width: 53px">Fax</label>
        <input type="text" name="customer_fax" class="form-control" style="width: 130px" />

        <label style="width: 100px"><?php echo Yii::t('lang', 'no_taxpayers'); ?></label>
        <input type="text" name="customer_tax" class="form-control" style="width: 150px" />
      </div>

      <div style="margin-left: 155px; margin-top: 10px;">
        <table id="tableProduct" class="table table-bordered" style="width: 880px">
          <thead style="background: #f9f9f9">
            <tr>
              <th width="50px"><?php echo Yii::t('lang', 'no'); ?></th>
              <th width="400px" colspan="2"><?php echo Yii::t('lang', 'list'); ?></th>
              <th width="50px"><?php echo Yii::t('lang', 'number'); ?></th>
              <th width="100px"><?php echo Yii::t('lang', 'price_per_unit'); ?></th>
              <th width="50px"><?php echo Yii::t('lang', 'discount'); ?></th>
              <th width="90px"><?php echo Yii::t('lang', 'amount_of_money'); ?></th>
              <th width="40px"></th>
            </tr>
            <tr>
              <td></td>
              <td colspan="2">
                <div class="input-group">
                  <input type="hidden" name="barcode" />
                  <input type="text" name="product_name"  class="form-control" />
                  <a onclick="return browseProduct()" href="#" class="btn btn-primary input-group-addon" style="color: white" data-toggle="modal" data-target="#myModal">
                    <i class="glyphicon glyphicon-search"></i>
                    ...
                  </a>
                </div>
              </td>
              <td><input type="text" name="qty" class="form-control" onkeyup="computePrice()" style="width: 50px; text-align: right" value="1" /></td>
              <td style="text-align: right">
                <input type="text" name="price" style="text-align: right" onkeyup="computePrice()" class="form-control" id="productPrice" />
              </td>
              <td><input type="text" name="sub" class="form-control" onkeyup="computePrice()" style="width: 50px; text-align: right" value="0" /></td>
              <td style="text-align: right">
                <span id="productPriceSum" />
              </td>
              <td>
                <a href="#" class="btn btn-info" onclick="return addRow()">
                  <i class="glyphicon glyphicon-plus"></i>
                </a>
              </td>
            </tr>
          </thead>
          <tbody style="background: #f9f9f9">

          </tbody>
          <tfoot>
            <tr>
              <td colspan="4"></td>
              <td colspan="2"><?php echo Yii::t('lang', 'sum'); ?></td>
              <td style="text-align: right"><span id="sumPrice">0</span></td>
            </tr>
            <tr>
              <td colspan="4"></td>
              <td colspan="2"><?php echo Yii::t('lang', 'discount'); ?></td>
              <td style="text-align: right"><span id="sumSub">0</span></td>
            </tr>
            <tr>
              <td colspan="4"></td>
              <td colspan="2"><?php echo Yii::t('lang', 'product_value'); ?></td>
              <td style="text-align: right"><span id="totalPrice">0</span></td>
            </tr>
            <tr>
              <td colspan="4"></td>
              <td colspan="2"><?php echo Yii::t('lang', 'vat_percent'); ?></td>
              <td style="text-align: right">
                <input type="text" name="vat" onkeyup="return computeVat()" value="0" class="form-control" style="width: 70px; text-align: right" />
              </td>
            </tr>
            <tr>
              <td colspan="4"></td>
              <td colspan="2"><?php echo Yii::t('lang', 'tax'); ?></td>
              <td style="text-align: right">
                <span id="vat_add" style="width: 70px; text-align: right">0</span>
              </td>
            </tr>
            <tr>
              <td colspan="4"></td>
              <td colspan="2"><?php echo Yii::t('lang', 'net'); ?></td>
              <td style="text-align: right"><span id="sumTotal">0</span></td>
            </tr>
            <tr>
              <td colspan="7">
                <?php echo Yii::t('lang', 'total_price'); ?> <span id="numberToText"></span>
              </td>
            </tr>
          </tfoot>
        </table>

        <table class="table table-bordered" style="width: 820px">
          <tr>
            <td width="280px"><?php echo Yii::t('lang', 'price_filed'); ?> <input type="text" value="30" name="quotation_day" class="form-control" style="width: 50px; text-align: right" /> <?php echo Yii::t('lang', 'day'); ?></td>
            <td><?php echo Yii::t('lang', 'customers'); ?></td>
            <td><?php echo Yii::t('lang', 'bidder'); ?></td>
          </tr>
          <tr>
            <td>
              <div><?php echo Yii::t('lang', 'due_within'); ?> <input type="text" value="3" name="quotation_send_day" class="form-control" style="width: 50px; text-align: right" /> <?php echo Yii::t('lang', 'day'); ?></div>
              <div><?php echo Yii::t('lang', 'since_the_signing_of_the_contract');  ?></div>
            </td>
            <td rowspan="2">
              <div><?php echo Yii::t('lang', 'sign'); ?></div>
              <div style="margin-top: 80px; text-align: center">
                <div>(..............................................)</div>
                <div><?php echo Yii::t('lang', 'the_agreed_price'); ?></div>
              </div>
            </td>
            <td rowspan="2">
              <div><?php echo Yii::t('lang', 'sign'); ?></div>
              <div style="margin-top: 80px; text-align: center">
                <div>(..............................................)</div>
                <div><?php echo Yii::t('lang', 'bidder'); ?></div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <?php echo Yii::t('lang', 'terms_of_payment'); ?>
              <input type="radio" name="quotation_pay" value="cash" checked="checked" /> <?php echo Yii::t('lang', 'cash'); ?>
              <input type="radio" name="quotation_pay" value="credit" /> <?php echo Yii::t('lang', 'credit'); ?>
            </td>
          </tr>
        </table>
      </div>
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
      <div class="modal-body" id="gridQuotation">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">
          <i class="glyphicon glyphicon-remove"></i>
          Close
        </button>
      </div>
    </div>
  </div>
</div>

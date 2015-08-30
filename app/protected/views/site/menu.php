<?php $this->renderPartial('//Config/SetLanguage'); ?>

<?php if (Yii::app()->request->cookies['user_id'] != null): ?>

    <?php
    $user_id = Yii::app()->request->cookies['user_id']->value;
    $user = User::model()->findByPk((int) $user_id);
    ?>

    <?php if (!empty($user)): ?>
        <!--<div class="row">
          <div class="col-md-12">
            <nav class="nav navbar-inverse" style="background: #434A54" role="navigation" >-->
        <!--<ul class="nav navbar-nav">-->
        <!-- menu -->
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-heart-empty"></i>
                <?php echo Yii::t('lang', 'diary'); ?>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="index.php?r=Basic/Sale"><?php echo Yii::t('lang', 'sales'); ?></a></li>
                <!--<li><a href="index.php?r=Basic/SaleMobile"  target="_blank"><?php // echo Yii::t('lang', 'selling_products_via_phone'); ?></a></li>-->

                <?php if ($user->user_level == 'admin'): ?>
                    <li><a href="index.php?r=Basic/GetSale"><?php echo Yii::t('lang', 'returns'); ?></a></li>
                    <li><a href="index.php?r=Basic/ManageBill"><?php echo Yii::t('lang', 'sales_management_bill'); ?></a></li>
                <?php endif; ?>

                <li><a href="index.php?r=Basic/Repair"><?php echo Yii::t('lang', 'product_repairs'); ?></a></li>
                <li><a href="index.php?r=Basic/GetRepair"><?php echo Yii::t('lang', 'repairing_the_product_from_the_outside'); ?></a></li>
                <li><a href="index.php?r=Basic/BillImport"><?php echo Yii::t('lang', 'get_product'); ?></a></li>

                <?php if ($user->user_level == 'admin'): ?>
                    <li><a href="index.php?r=Basic/BillDrop"><?php echo Yii::t('lang', 'billing'); ?></a></li>
                    <li><a href="index.php?r=Basic/BillQuotation"><?php echo Yii::t('lang', 'quotation'); ?></a></li>
                    <li><a href="index.php?r=Basic/CheckStock"><?php echo Yii::t('lang', 'check_stock'); ?></a></li>
                <?php endif; ?>

                <li class="divider"></li>
                <li><a href="index.php?r=Basic/ChangeProfile"><?php echo Yii::t('lang', 'change_password'); ?></a></li>                
            </ul>
        </li>

        <!-- admin menu -->
        <?php if ($user->user_level == 'admin'): ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-list-alt"></i>
                    <?php echo Yii::t('lang', 'report'); ?>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="index.php?r=Report/Income"><?php echo Yii::t('lang', 'reported_earnings_loss'); ?></a></li>
                    <li><a href="index.php?r=Report/SalePerDay"><?php echo Yii::t('lang', 'daily_sales'); ?></a></li>
                    <li><a href="index.php?r=Report/SaleSumPerDay"><?php echo Yii::t('lang', 'the_sales_by_date'); ?></a></li>
                    <li><a href="index.php?r=Report/SaleSumPerMonth"><?php echo Yii::t('lang', 'summary_of_sales_by_month'); ?></a></li>
                    <li><a href="index.php?r=Report/SaleSumPerType"><?php echo Yii::t('lang', 'summary_of_sales_by_category'); ?></a></li>
                    <li><a href="index.php?r=Report/SaleSumPerMember"><?php echo Yii::t('lang', 'the_sales_by_members'); ?></a></li>
                    <li><a href="index.php?r=Report/SaleSumPerEmployee"><?php echo Yii::t('lang', 'the_sales_staff'); ?></a></li>
                    <li class="divider"></li>
                    <li><a href="index.php?r=Report/ProductStock"><?php echo Yii::t('lang', 'all_reports'); ?></a></li>
                    <li><a href="index.php?r=Report/ProductInStock"><?php echo Yii::t('lang', 'report_inventories_in_stock'); ?></a></li>
                    <li><a href="index.php?r=Report/ProductOutStock"><?php echo Yii::t('lang', 'reports_out_of_stock_inventories'); ?></a></li>
                    <li class="divider"></li>
                    <li><a href="index.php?r=Report/ReportAR"><?php echo Yii::t('lang', 'debtor_reports'); ?></a></li>
                    <li><a href="index.php?r=Report/ReportIR"><?php echo Yii::t('lang', 'creditors_report'); ?></a></li>
                </ul>
            </li>

<!--            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-star"></i>
                    <?php // echo Yii::t('lang', 'promotional'); ?>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="index.php?r=Support/SubPrice"><?php // echo Yii::t('lang', 'discount'); ?></a></li>
                    <li><a href="index.php?r=Support/Score"><?php // echo Yii::t('lang', 'set_points'); ?></a></li>
                </ul>
            </li>-->

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-cog"></i>
                    <?php echo Yii::t('lang', 'basic_settings'); ?>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="index.php?r=Config/Organization"><?php echo Yii::t('lang', 'store_information'); ?></a></li>
                    <li><a href="index.php?r=Config/BranchIndex"><?php echo Yii::t('lang', 'warehouse_store'); ?></a></li>
                    <li><a href="index.php?r=Config/GroupProductIndex"><?php echo Yii::t('lang', 'category'); ?></a></li>
                    <li><a href="index.php?r=Config/ProductIndex"><?php echo Yii::t('lang', 'product'); ?></a></li>
                    <li><a href="index.php?r=Config/FarmerIndex"><?php echo Yii::t('lang', 'agent'); ?></a></li>
                    <li><a href="index.php?r=Config/MemberIndex"><?php echo Yii::t('lang', 'member'); ?></a></li>
                    <li><a href="index.php?r=Config/UserIndex"><?php echo Yii::t('lang', 'user_login'); ?></a></li>
                    <li><a href="index.php?r=Config/DrawcashSetup"><?php echo Yii::t('lang', 'today_the_money_in_the_drawer'); ?></a></li>
                    <li class="divider"></li>
                    <li><a href="index.php?r=PayType/Index"><?php echo Yii::t('lang', 'distribution_of_income'); ?></a></li>
                    <li><a href="index.php?r=Pay/Index"><?php echo Yii::t('lang', 'expenditure_records'); ?></a></li>
                    <li class="divider"></li>
                    <li><a href="index.php?r=Config/BillConfigIndex"><?php echo Yii::t('lang', 'print_settings_bill'); ?></a></li>
                    <li><a href="index.php?r=Config/ConfigSoftware"><?php echo Yii::t('lang', 'bill_and_its_minimum_setting'); ?></a></li>
                    <!--<li><a href="index.php?r=Config/ConfigTime"><?php // echo Yii::t('lang', 'set_time'); ?></a></li>-->
                    <li><a href="index.php?r=Config/ConfigSale"><?php echo Yii::t('lang', 'set_conditions_of_sale'); ?></a></li>
                    <!--<li><a href="index.php?r=Config/ConfigSerialPort"><?php // echo Yii::t('lang', 'connection_settings_cash_drawer'); ?></a></li>-->
                </ul>
            </li>
        <?php endif; ?>

        <!--</ul>-->
        <!--    </div>
          </div>
        </div>-->
        <?php
    endif; 
    endif;



<!--Start main_menu-->

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">

        <div class="navbar-header">
            <!--button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button-->

            <img src="<?php echo base_url('assets/images/logo_techneeds.jpg') ?>" width="200px" height="50px" />

            <?php date_default_timezone_set('Asia/Colombo'); ?>
            <?php echo date("h:i:s a") . " - " . date("d/m/Y"); ?>

            <!-- date_default_timezone_set("America/New_York");-->

            <!--a class="navbar-brand" href="#">TechNeeds</a-->
        </div>


        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="<?php echo base_url('MainC/dashboard0'); ?>">Dashboard</a></li>
                <li><a href="<?php echo base_url('InvoiceC/invoicing'); ?>">Invoice</a></li>
                <li><a href="<?php echo base_url('StoresC/stores_allitems'); ?>">Stores</a></li>
                <li><a href="<?php echo base_url('PurchasingOrderC/purchse_order'); ?>">Purchasing Order</a></li>
              <li><a href="<?php echo base_url('repaireC/addRepairItem'); ?>"> Repair Center</a></li>
                <li><a href="<?php echo base_url('transportC/newAssign'); ?>">Transport</a></li>
                <li><a href="<?php echo base_url('ReportsC/allReports_Cf'); ?>">Reports</a></li>
                <li><a href="<?php echo base_url('ControlPanelC/activityControl'); ?>"><span class="glyphicon glyphicon-cog"></span> </a></li>                
                <li><a href=<span class="glyphicon glyphicon-earphone"></span></a></li>

                <li><a href="<?php echo base_url('mainC/logout'); ?>"><font color=red size=3pt><span class="glyphicon glyphicon-log-out"></span></font></a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url('userProfileC/userProfile'); ?>"><span class="glyphicon glyphicon-user"></span><?php echo " " . $this->session->userdata('username'); ?></a></li>
            </ul>
        </div>

    </div>

</nav>
<!--End main_menu-->
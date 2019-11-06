

<nav class="navbar navbar-default navbar-fixed-top">

    <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url('mainC/logout'); ?>"><font color=purple size=4pt>Logout &emsp;</font></a></li>
    </ul>

    <ul class="nav navbar-nav navbar-left">
        <li><a href="#" style='color: purple; font-size: 16pt'><span class="glyphicon glyphicon-user"></span><?php echo " " . $this->session->userdata('username'); ?></a></li>
    </ul>
</nav>



<div class="container padding-top : 100px">
    <div class="jumbotron col-sm-12">

        <div class="container col-lg-4">
            <img src="<?php echo base_url('assets/images/logo_techneeds.jpg') ?>" width="250px" height="100px" />
        </div>

        <div class="container col-lg-8">

            <a href="<?php echo base_url('InvoiceC/invoicing'); ?>" class="btn btn-sq-lg btn-primary">
                <!--i class="fa fa-file-text fa-5x"></i><br/-->
                <font size=6pt >&emsp; Invoice &emsp;<br> &emsp;</font>
            </a>


            <a href="<?php echo base_url('StoresC/stores_allitems'); ?>" class="btn btn-sq-lg btn-primary">
                <!--i class="fa fa-file-text fa-5x"></i><br/-->
                <font size=6pt >&emsp; Stores &emsp; <br> &emsp;</font>
            </a>

            <a href="<?php echo base_url('ReportsC/allitemsR'); ?>" class="btn btn-sq-lg btn-success">
                <!--i class="fa fa-file-text fa-5x"></i><br/-->
                <font size=6pt >&emsp;Reports&emsp;<br> &emsp;</font>
            </a>

            <hr>

            <a href="<?php echo base_url('MainC/sysControl'); ?>" class="btn btn-sq-lg btn-primary">
                <!--i class="fa fa-file-text fa-5x"></i><br/-->
                <font size=6pt >&emsp;System&emsp;<br>&emsp; Control &emsp;</font>
            </a>

            <a href="<?php echo base_url('MainC/purchasing_order'); ?>" class="btn btn-sq-lg btn-primary">
                <!--i class="fa fa-file-text fa-5x"></i><br/-->
                <font size=6pt >&emsp; Purcha &emsp;<br>&emsp; Order &emsp;</font>
            </a>

            <a href="<?php echo base_url('MainC/repairCen'); ?>" class="btn btn-sq-lg btn-warning">
                <!--i class="fa fa-file-text fa-5x"></i><br/-->
                <font size=6pt >&emsp; Repair &emsp;<br>&emsp; Center &emsp;</font>
            </a>

            <hr>

            <a href="<?php echo base_url('userProfileC/userProfile'); ?>" class="btn btn-sq-lg btn-success">
                <!--i class="fa fa-file-text fa-5x"></i><br/-->
                <font size=6pt >&emsp; My &emsp;<br>&emsp; &nbsp; Profile &nbsp; &emsp;</font>
            </a>

            <a href="<?php echo base_url('MainC/aboutUs'); ?>" class="btn btn-sq-lg btn-primary">
                <!--i class="fa fa-file-text fa-5x"></i><br/-->
                <font size=6pt >&emsp;&nbsp; About&nbsp;&emsp; <br> &emsp; Us &emsp;</font>
            </a>

            <a href="<?php echo base_url('ControlPanelC/activityControl'); ?>" class="btn btn-sq-lg btn-danger">
                <!--i class="fa fa-file-text fa-5x"></i><br/-->
                <font size=6pt >&emsp; Control &emsp; <br> &emsp; Panel &emsp;</font>
            </a>
        </div>
    </div>



</div>



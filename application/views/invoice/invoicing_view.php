<!--Start invoicing-->
<div class="container-fluid">


    <h2 align="center">Invoicing</h2>
    <div class="container">
        <form class="form-vertical" method="post">
            <div class="container form-row">
                <div class="form-group col-md-2">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addcustomer">
                        Add Customer
                    </button>
                </div>
                <div class="form-group col-md-10" id="cust_nm">
                    <div class="input-group">
                        <span class="input-group-addon">Search</span>
                        <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details"
                               class="form-control"/>
                    </div>
                </div>
            </div>
        </form>

        <div class="modal fade" id="addcustomer">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Customer</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="form-group">
                        <form method="post" action="<?php echo base_url() ?>invoiceC/addCustomer">
                            <div class="modal-body form-group">
                                <input type="text" class="form-control" name="fname"
                                       placeholder="First Name"/><br/><br/>
                                <input type="text" class="form-control" name="lname" placeholder="Last Name Name"/><br/><br/>
                                <input type="text" class="form-control" name="nic" placeholder="NIC Number"/><br/><br/>
                                <input type="text" class="form-control" name="adrs" placeholder="Address"/><br/><br/>
                                <input type="text" class="form-control" name="mobile" placeholder="Mobile"/><br/><br/>
                                <input type="text" class="form-control" name="home" placeholder="Home"/><br/><br/>
                                <select class="form-control" name="custgrp_select">
                                    <option value="">Select Group</option>
                                    <option value="1">Retail</option>
                                    <option value="2">Wholesale</option>
                                </select><br/><br/>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="addcustomer">Add Customer</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->

                </div>
            </div>
        </div>
        <div id="result"></div>
    </div>

    <div class="jumbotron">
        <div class="container-fluid">
            <form class="form-inline" method="post" action="<?php echo base_url() ?>invoiceC/form_validation">
                <div class="form-row">
                    <!--<div class="form-horizontal">
                    <!--label class="control-label col-sm-2"  for="itm_cat">Item Category</label-->
                    <div class="form-group col-sm-2">
                        <select class="form-control" id="itm_cat">
                            <?php
                            //foreach ($h->result() as $row)
                            foreach ($records3 as $rec3) {
                                ?>
                                <?php echo $rec3->grp; ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group col-sm-1" id="itm_cod">
                    <input type="text" class="form-control" placeholder="Item Code">
                </div>
                <div class="form-group col-sm-2" id="itm">
                    <input type="text" class="form-control" placeholder="Item">
                </div>
                <div class="form-group col-sm-1" id="avlQty">
                    <input type="text" class="form-control " placeholder="Available Qty">
                </div>
                <div class="form-group col-sm-1" id="qty">
                    <input type="text" class="form-control " placeholder="Qty">
                </div>
                <div class="form-group col-sm-1" id="srl_no">
                    <input type="text" class="form-control " placeholder="Serial No.">
                </div>
                <div class="form-group col-sm-1" id="unt_prc">
                    <input type="text" class="form-control " placeholder="Unit Price">
                </div>
                <div class="form-group col-sm-1" id="disc">
                    <input type="text" class="form-control " placeholder="Discount">
                </div>

                <div class="btn-group" role="group" aria-label="btngrp">
                    <button id="add_itm_btn" type="submit" class="btn btn-primary form-control">Add Item</button>
                    <button id="reset_btn" type="reset" class="btn btn-danger form-control">Reset</button>
                    <button id="transfer_btn" type="submit" class="btn btn-success form-control" onclick="myFunction()">
                        Transfer
                    </button>
                </div>
                <html>
                <body>


                <script>
                    function myFunction() {
                        window.alert('Goods Transfer');
                    }
                </script>

                </body>
                </html>

        </div>
        </form>
    </div>
</div>

<div class="jumbotron col-sm-12">
    <div class="container col-lg-8">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Item Description</th>
                    <th>Quantity</th>
                    <th>Discount</th>
                    <th>Price</th>
                </tr>
                </thead>

                <tbody>
                <?php
                //foreach ($h->result() as $row)
                foreach ($records2 as $rec1) {
                    ?>
                    <?php
                    //foreach ($h->result() as $row)
                    foreach ($records as $rec) {
                        ?>
                        <tr>
                            <td><?php echo $rec->itemCd; ?></td>
                            <td><?php echo $rec1->subGrp; ?></td>
                            <td><?php echo $rec->storeCd; ?></td>
                            <td><?php echo $rec->storeCd; ?></td>
                            <td><?php echo $rec->storeCd; ?></td>
                        </tr>
                    <?php }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container col-lg-4">

        <a href="<?php echo base_url('InvoiceC/invoicing'); ?>" class="btn btn-sq-lg btn-primary">
            <!--i class="fa fa-file-text fa-5x"></i><br/-->
            <img src="<?php echo base_url('assets/images/kitchen.png') ?>" width="150px" height="150px"/>
            <!--<font size=5pt >&emsp; Invoice &emsp;<br> &emsp;</font>-->
        </a>
        <a href="<?php echo base_url('InvoiceC/invoicing'); ?>" class="btn btn-sq-lg btn-primary">
            <!--i class="fa fa-file-text fa-5x"></i><br/-->
            <img src="<?php echo base_url('assets/images/beauty.jpg') ?>" width="150px" height="150px"/>
        </a>
        <a href="<?php echo base_url('InvoiceC/invoicing'); ?>" class="btn btn-sq-lg btn-primary">
            <!--i class="fa fa-file-text fa-5x"></i><br/-->
            <img src="<?php echo base_url('assets/images/auto.jpg') ?>" width="150px" height="150px"/>
        </a>
        <a href="<?php echo base_url('InvoiceC/invoicing'); ?>" class="btn btn-sq-lg btn-primary">
            <!--i class="fa fa-file-text fa-5x"></i><br/-->
            <img src="<?php echo base_url('assets/images/petcare.jpg') ?>" width="150px" height="150px"/>
        </a>
        <a href="<?php echo base_url('InvoiceC/invoicing'); ?>" class="btn btn-sq-lg btn-primary">
            <!--i class="fa fa-file-text fa-5x"></i><br/-->
            <img src="<?php echo base_url('assets/images/sports.jpg') ?>" width="150px" height="150px"/>
        </a>
        <a href="<?php echo base_url('InvoiceC/invoicing'); ?>" class="btn btn-sq-lg btn-primary">
            <!--i class="fa fa-file-text fa-5x"></i><br/-->
            <img src="<?php echo base_url('assets/images/computer.jpg') ?>" width="150px" height="150px"/>
        </a>
    </div>
</div>
<script>
    $('#search_text').on('input', function () {

        load_data();

        function load_data(query) {
            $.ajax({
                url: "<?php echo base_url(); ?>InvoiceC/fetchCustomer",
                method: "POST",
                data: {query: query},
                success: function (data) {
                    $('#result').html(data);
                }
            })
        }

        $('#search_text').keyup(function () {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            }
            else {
                $('#result').html("");
            }
        });
    });
</script>


<!--End form_additem-->
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
                                <input type="text" class="form-control" name="shop" placeholder="shop"/><br/><br/>
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
                    <div class="form-group col-md-2 col-sm-2">
                        <select name="itm_grp" class="form-control" id="itm_grp" required>
                            <option value="" selected disabled>Select Category</option>
                            <?php
                            foreach ($records3 as $rec) {
                                ?>
                                <option value="<?php echo $rec->grpCd; ?>"><?php echo $rec->grp; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group col-sm-1" id="itm_cod">
                    <select id="itmsub_grp" name="itmsub_grp" class="form-control" required>
                        <option value="" selected disabled>Select Item</option>
                    </select>
                </div> &nbsp;&nbsp;
                <div class="form-group col-sm-1" id="itm_cod">
                    <input type="text" class="form-control" placeholder="Item Code" id="itemCode">
                </div>
                <div class="form-group col-sm-1" id="avlQty">
                    <input type="text" class="form-control " placeholder="Available Qty" id="avlQnty">
                </div>
                <div class="form-group col-sm-1" id="qty">
                    <input type="text" class="form-control " placeholder="Qty" id="qnty">
                </div>
                <div class="form-group col-sm-1" id="srl_no">
                    <input type="text" class="form-control " placeholder="Serial No." id="serl_no">
                </div>
                <div class="form-group col-sm-1" id="unt_prc">
                    <input type="text" class="form-control " placeholder="Unit Price" id="unit_prc">
                </div>
                <div class="form-group col-sm-1" id="disc">
                    <input type="text" class="form-control " placeholder="Discount" id="discount">
                </div>

                <div class="btn-group" role="group" aria-label="btngrp">
                    <button id="add_itm_btn" type="submit" class="btn btn-primary form-control">Add Item</button> &nbsp;
                    <button id="reset_btn" type="reset" class="btn btn-danger form-control">Reset</button>
                    <button id="transfer_btn" type="submit" class="btn btn-success form-control" onclick="myFunction()">
                        Transfer
                    </button>
                </div>

                <!--                <html>-->
                <!--                <body>-->
                <!---->
                <!---->
                <!--                <script>-->
                <!--                    function myFunction() {-->
                <!--                        window.alert('Goods Transfer');-->
                <!--                    }-->
                <!--                </script>-->
                <!---->
                <!--                </body>-->
                <!--                </html>-->

        </div>
        </form>
    </div>
</div>

<div class="jumbotron col-sm-12">
    <div class="container col-lg-12">
        <div class="table-responsive mytable">

        </div>
        <div id="cart_details">
            <h3 align="center">Cart is Empty</h3>
        </div>
    </div>
    <button class="btn btn-success" id="btn_print">Submit</button>
    <a href="<?php echo base_url() ?>invoiceC/pdfdetails" class="btn btn-success" target="_blank">Print Receipt</a>
</div>
<script>
    var itemId = [];
    var cat = [];
    var i = 0;
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
<script>
    $('#itm_grp').change(function () {
        var itm_grp = $("#itm_grp").val();
        if (itm_grp != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>InvoiceC/fetchItem",
                method: "POST",
                data: {itm_grp: itm_grp},
                success: function (data) {
                    $('.mytable').html(data);
                }
            })
        }

    });

</script>
<script>
    $(document).ready(function () {

        // $('.add_cart').click(function(){
        $(document).on('click', '.add_cart', function () {
            var itemCd = $(this).data("productid");
            var subGrp = $(this).data("productname");
            var priceWs = $(this).data("price");
            cat[0] = itemCd;
            // itemId.push(itemCd);
            // itemId[cat] = itemCd;
            // console.log(itemCd);

            var quantity = $('#' + itemCd).val();
            cat[1] = quantity;
            itemId[itemCd] = quantity;
            // itemId[i] = cat;
            // i = i+1;
            if (quantity != '' && quantity > 0) {
                $.ajax({
                    url: "<?php echo base_url(); ?>InvoiceC/add",
                    method: "POST",
                    data: {product_id: itemCd, product_name: subGrp, product_price: priceWs, quantity: quantity},
                    success: function (data) {
                        // alert("Product Added into Cart");
                        $('#cart_details').html(data);
                        $('#' + itemCd).val('');
                    }
                });
            }
            else {
                alert("Please Enter quantity");
            }
        });

        $(document).on('click', '#customer', function () {
            if ($(this).is(':checked')) {
                console.log($(this).val());
                var customer = $(this).val();
                $.ajax({
                    url: "<?php echo base_url(); ?>InvoiceC/searchCustomer",
                    method: "POST",
                    data: {customer: customer},
                    success: function (data) {
                        console.log(customer);
                    }
                });
            }
        });

        $(document).on('click', '#btn_print', function () {
            // console.log(itemId);
            $.ajax({
                url: "<?php echo base_url(); ?>InvoiceC/printReceipt",
                method: "POST",
                data: {itemId: itemId},
                success: function (data) {
                    console.log(itemId);
                }
            });
        });

        $('#cart_details').load("<?php echo base_url(); ?>InvoiceC/load");

        $(document).on('click', '.remove_inventory', function () {
            var row_id = $(this).attr("id");
            if (confirm("Are you sure you want to remove this?")) {
                $.ajax({
                    url: "<?php echo base_url(); ?>InvoiceC/remove",
                    method: "POST",
                    data: {row_id: row_id},
                    success: function (data) {
                        alert("Product removed from Cart");
                        $('#cart_details').html(data);
                    }
                });
            }
            else {
                return false;
            }
        });

        $(document).on('click', '#clear_cart', function () {
            if (confirm("Are you sure you want to clear cart?")) {
                $.ajax({
                    url: "<?php echo base_url(); ?>InvoiceC/clear",
                    success: function (data) {
                        alert("Your cart has been clear...");
                        $('#cart_details').html(data);
                    }
                });
            }
            else {
                return false;
            }
        });

    });
</script>
<script>
    $('#itmsub_grp').change(function () {
        var itmsub_grp = $("#itmsub_grp").val();
        if (itmsub_grp != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>InvoiceC/fetchItemDetails",
                method: "POST",
                data: {itmsub_grp: itmsub_grp},
                success: function (data) {
                    var obj = JSON.parse(data);
                    // console.log(obj);
                    $("#itemCode").val(obj[1]);
                    $("#avlQnty").val(obj[8]);
                    $("#serl_no").val(obj[9]);
                    $("#unit_prc").val(obj[2]);
                    $("#discount").val(obj[7]);
                }
            })
        }
    });
</script>


<!--End form_additem-->
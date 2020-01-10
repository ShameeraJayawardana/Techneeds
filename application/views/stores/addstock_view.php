<!--Start form_additem-->
<h2 align="center">Add Item to Stores</h2>


<div class="container">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="jumbotron">

            <!--form class="form-horizontal" method="post" action="<?php echo base_url() ?>storesC/form_validation" -->
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>storesC/additem">
                <script>
                    function myFunction() {
                        var itmGrp = document.getElementById("itm_grp").value;
                        var itmSubGrp = document.getElementById("itmsub_grp").value;
                        var itmSize = document.getElementById("itm_size").value;
                        var itmPack = document.getElementById("itm_pack").value;
                        var itmCd1 = itmGrp.concat(itmSubGrp);
                        var itmCd2 = itmCd1.concat(itmSize);
                        var code = itmCd2.concat(itmPack);
                        document.getElementById("itm_cod").value = code;
                    }
                </script>

                <!--div class="form-group" >
                    <label class="control-label col-sm-4"  for="prd_srv">Product/Service</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="prd_srv" name="prd_srv">
                            <option>Product</option>
                            <option>Service</option>
                        </select>
                    </div>
                </div-->


                <div class="form-group">
                    <label class="control-label col-sm-4" for="itm_grp">Item Group</label>
                    <div class="col-sm-8 " name="itm_grp">
                        <select name="itm_grp" class="form-control" id="itm_grp" required oninput="myFunction()">
                            <option value="" selected disabled>Select Category</option>
                            <?php
                            foreach ($grpRecords as $rec) {
                                ?>
                                <option value="<?php echo $rec->grpCd; ?>"><?php echo $rec->grp; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="itmsub_grp">Item</label>
                    <div class="col-sm-8 ">
                        <select id="itmsub_grp" name="itmsub_grp" class="form-control" required oninput="myFunction()">
                            <option value="" selected disabled>Select Item</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="itm_size">Size</label>
                    <div class="col-sm-8 ">
                        <select id="itm_size" name="itm_size" class="form-control" required oninput="myFunction()">
                            <option value="" selected disabled>Select Size</option>
                            <?php
                            foreach ($sizeRecords as $rec) {
                                ?>
                                <option value="<?php echo $rec->sizeCd; ?>"><?php echo $rec->size; ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="itm_pack">Packing</label>
                    <div class="col-sm-8 ">
                        <select id="itm_pack" name="itm_pack" class="form-control" required oninput="myFunction()">
                            <option value="" selected disabled>Select Packing</option>
                            <?php
                            foreach ($packRecords as $rec) {
                                ?>
                                <option value="<?php echo $rec->packCd; ?>"><?php echo $rec->pack; ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="itm_cod">Item Code</label>
                    <div class="col-sm-8" id="itm_cod1" name="itm_cod">
                        <input type="text " class="form-control input-sm" name="itm_cod" id="itm_cod">
                    </div>
                </div>


                <!--div class="form-group">
                    <label class="control-label col-sm-4"  for="itm_po">PO Description</label>
                    <div class="col-sm-8" id="itm_po">
                        <input type="text" class="form-control input-sm">
                    </div>
                </div-->

                <div class="form-group">
                    <label class="control-label col-sm-4" for="itm_wprc">Item Wholesale Price</label>
                    <div class="input-group col-sm-8" id="itm_wprc">
                        <span class="input-group-addon">Rs.</span>
                        <input type="number" value="0" min="0" step="1" class="form-control currency input-sm "
                               id="itm_wprc1" name="itm_wprc1"/>
                        <span class="input-group-addon">.</span>
                        <input type="number" value="0" min="0" step="1" data-number-to-fixed="2"
                               class="form-control currency input-sm " id="itm_wprc2" name="itm_wprc2"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="itm_rprc">Item Retail Price</label>
                    <div class="input-group col-sm-8" id="itm_rprc">
                        <span class="input-group-addon">Rs.</span>
                        <input type="number" value="0" min="0" step="1" class="form-control currency input-sm "
                               id="itm_rprc1" name="itm_rprc1"/>
                        <span class="input-group-addon">.</span>
                        <input type="number" value="0" min="0" step="1" data-number-to-fixed="2"
                               class="form-control currency input-sm " id="itm_rprc2" name="itm_rprc2"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="itm_cost">Item Cost</label>
                    <div class="input-group col-sm-8" id="itm_cost">
                        <span class="input-group-addon">Rs.</span>
                        <input type="number" value="0" min="0" step="1" class="form-control currency input-sm "
                               id="itm_cost1" name="itm_cost1"/>
                        <span class="input-group-addon">.</span>
                        <input type="number" value="0" min="0" step="1" data-number-to-fixed="2"
                               class="form-control currency input-sm " id="itm_cost2" name="itm_cost2"/>
                        <span class="text-danger"><?php echo form_error("itm_cost1"); ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="mn_whl_dis">Min Wholesale Discount %</label>
                    <div class="input-group col-sm-8" id="mn_whl_dis">
                        <span class="input-group-addon">%</span>
                        <input type="number" value="0" min="0" step="0.25" data-number-to-fixed="2"
                               class="form-control currency input-sm " id="mn_whl_dis" name="mn_whl_dis"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="mx_whl_dis">Max Wholesale Discount %</label>
                    <div class="input-group col-sm-8" id="mx_whl_dis">
                        <span class="input-group-addon">%</span>
                        <input type="number" value="0" min="0" step="0.25" data-number-to-fixed="2"
                               class="form-control currency input-sm " id="mx_whl_dis" name="mx_whl_dis"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="mx_rtl_dis">Max Retail Discount %</label>
                    <div class="input-group col-sm-8" id="mx_rtl_dis">
                        <span class="input-group-addon">%</span>
                        <input type="number" value="0" min="0" step="0.25" data-number-to-fixed="2"
                               class="form-control currency input-sm " id="mx_rtl_dis" name="mx_rtl_dis"/>
                    </div>
                </div>

                <!--div class="form-group">
                    <label class="control-label col-sm-4"  for="drw_no">Drawer Number</label>
                    <div class="col-sm-8" id="drwr_no">
                        <input type="number" value="0" min="0" step="0.25" data-number-to-fixed="2" class="form-control currency input-sm " id="drw_no" />
                    </div>
                </div-->

                <!--div class="form-group">
                    <label class="control-label col-sm-4"  for="unq_itm">Unique Item</label>
                    <div class="col-sm-8" id="unq_itm">
                        <input type="text" class="form-control input-sm">
                    </div>
                </div-->

                <div class="form-group">
                    <label class="control-label col-sm-4" for="intl_qty"> Quantity</label>
                    <div class="col-sm-8" id="intl_qty">
                        <input type="text" class="form-control input-sm" name="quantity">
                    </div>
                </div>

                <!--div class="form-group">
                    <label class="control-label col-sm-4"  for="cmsn">Commision %</label>
                    <div class="col-sm-8" id="cmsn">
                        <input type="text" class="form-control input-sm">
                    </div>
                </div-->

                <div class="col-sm-4 col-sm-offset-2">
                    <button id="add_itm_btn" type="submit" class="btn btn-primary form-control">Add Stock</button>
                </div>

                <div class="col-sm-4 ">
                    <button id="reset_btn" type="reset" class="btn btn-warning form-control ">Reset</button>
                </div>

            </form>
        </div>
    </div>
</div>
<script>
    $('#itm_grp').change(function () {
        var itm_grp = $("#itm_grp").val();
        if (itm_grp != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>StoresC/fetchItem",
                method: "POST",
                data: {itm_grp: itm_grp},
                success: function (data) {
                    $('#itmsub_grp').html(data);
                }
            })
        }

    });
</script>
<!--End form_additem-->
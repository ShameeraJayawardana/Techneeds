<!--Start form_additem-->
<h2 align="center">Add Item to Stores</h2>


<div class="container"> 
    <div class="col-sm-6 col-sm-offset-3"> 
        <div class="jumbotron" >

            <!--form class="form-horizontal" method="post" action="<?php echo base_url() ?>storesC/form_validation" -->
                <form class="form-horizontal" method="post" action="<?php echo base_url() ?>storesC/additem" >
                    <script>
                    function myFunction() {
                        var itmGrp = document.getElementById("itm_grp").value;
                        var itmSubGrp = document.getElementById("itmsub_grp").value;
                        var itmCd = itmGrp.concat(itmSubGrp);
                        document.getElementById("itm_cod").innerHTML = itmCd;
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

                
                <div class="form-group" >
                    <label class="control-label col-sm-4"  for="itm_grp">Item Group</label>
                    <div class="col-sm-8 " name="itm_grp">
                        <select class="form-control" id="itm_grp" name="itm_grp" oninput="myFunction()">
                            <option selected disabled></option>
                            <?php if (count($getItmGrp)): ?>
                                <?php foreach ($getItmGrp as $itmGrp): ?>
                                    <option value=<?php echo $itmGrp->grpCd; ?>><?php echo $itmGrp->grp; ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group" >
                    <label class="control-label col-sm-4"  for="itmsub_grp">Item</label>
                    <div class="col-sm-8 ">
                        <select class="form-control" id="itmsub_grp" name="itmsub_grp" oninput="myFunction()" >
                            <option selected disabled></option>
                            <?php if (count($getItmSubGrp)): ?>
                                <?php foreach ($getItmSubGrp as $itmSubGrp): ?>
                                    <option value=<?php echo $itmSubGrp->subGrpCd; ?>><?php echo $itmSubGrp->subGrp; ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4"  for="itm_cod">Item Code</label>
                    <div class="col-sm-8" id="itm_cod" name="itm_cod">
                        <input type="text " class="form-control input-sm" name="itm_cod">
                    </div>
                </div>


                <!--div class="form-group">
                    <label class="control-label col-sm-4"  for="itm_po">PO Description</label>
                    <div class="col-sm-8" id="itm_po">
                        <input type="text" class="form-control input-sm">
                    </div>
                </div-->

                <div class="form-group"> 
                    <label class="control-label col-sm-4"  for="itm_wprc">Item Wholesale Price</label>
                    <div class="input-group col-sm-8" id="itm_wprc"> 
                        <span class="input-group-addon">Rs.</span>
                        <input type="number" value="0" min="0" step="1" class="form-control currency input-sm " id="itm_wprc1" />
                        <span class="input-group-addon">.</span>
                        <input type="number" value="0" min="0" step="1" data-number-to-fixed="2" class="form-control currency input-sm " id="itm_wprc2" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4"  for="itm_rprc">Item Retail Price</label>
                    <div class="input-group col-sm-8" id="itm_rprc">
                        <span class="input-group-addon">Rs.</span>
                        <input type="number" value="0" min="0" step="1" class="form-control currency input-sm " id="itm_rprc1" />
                        <span class="input-group-addon">.</span>
                        <input type="number" value="0" min="0" step="1" data-number-to-fixed="2" class="form-control currency input-sm " id="itm_rprc2" /> 
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4"  for="itm_cost">Item Cost</label>
                    <div class="input-group col-sm-8" id="itm_cost">
                        <span class="input-group-addon">Rs.</span>
                        <input type="number" value="0" min="0" step="1" class="form-control currency input-sm " id="itm_cost1" />
                        <span class="input-group-addon">.</span>
                        <input type="number" value="0" min="0" step="1" data-number-to-fixed="2" class="form-control currency input-sm " id="itm_cost2" /> 
                        <span class="text-danger"><?php echo form_error("itm_cost1"); ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4"  for="mn_whl_dis">Min Wholesale Discount %</label>
                    <div class="input-group col-sm-8" id="mn_whl_dis"> 
                        <span class="input-group-addon">%</span>
                        <input type="number" value="0" min="0" step="0.25" data-number-to-fixed="2" class="form-control currency input-sm " id="mn_whl_dis" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4"  for="mx_whl_dis">Max Wholesale Discount %</label>
                    <div class="input-group col-sm-8" id="mx_whl_dis">
                        <span class="input-group-addon">%</span>
                        <input type="number" value="0" min="0" step="0.25" data-number-to-fixed="2" class="form-control currency input-sm " id="mx_whl_dis" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4"  for="mx_rtl_dis">Max Retail Discount %</label>
                    <div class="input-group col-sm-8" id="mx_rtl_dis">
                        <span class="input-group-addon">%</span>
                        <input type="number" value="0" min="0" step="0.25" data-number-to-fixed="2" class="form-control currency input-sm " id="mx_rtl_dis" />
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
                    <label class="control-label col-sm-4"  for="intl_qty">Initial Quantity</label>
                    <div class="col-sm-8" id="intl_qty">
                        <input type="text" class="form-control input-sm">
                    </div>
                </div>

                <!--div class="form-group">
                    <label class="control-label col-sm-4"  for="cmsn">Commision %</label>
                    <div class="col-sm-8" id="cmsn">
                        <input type="text" class="form-control input-sm">
                    </div>
                </div-->

                <div class="col-sm-4 col-sm-offset-2" >
                    <button  id="add_itm_btn" type="submit" class="btn btn-primary form-control" >Add Item</button>
                </div>

                <div class="col-sm-4 ">
                    <button  id="reset_btn" type="reset" class="btn btn-primary form-control ">Reset</button>
                </div>

            </form>
        </div>
    </div>
</div>

            <!--End form_additem-->
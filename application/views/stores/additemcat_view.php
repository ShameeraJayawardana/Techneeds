<!--Start form_additem-->
<h2 align="center">Add New Item or New Item Category</h2>


<div class="container"> 
    <div class="col-sm-6 col-sm-offset-3"> 
        <div class="jumbotron" >

            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>storesC/form_validation" >

                <div class="form-group" >
                    <label class="control-label col-sm-4"  for="select">Category/Item</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="mySelect" onchange="return selectFn1();">
                            <option value="0">-- Select Activity --</option>
                            <option value="1">Add New Category</option>
                            <option value="2">Add New Item</option>
                        </select>
                    </div>
                </div>
                *************************************************************************************
                <div class="form-group" style="visibility: hidden" id="itmCat">
                    <label class="control-label col-sm-4"  for="itm_cat">Item Category</label>
                    <div class="col-sm-8 " id="itm_cat">
                        <input type="text " class="form-control input-sm">
                    </div>
                </div>
                *************************************************************************************
                <div class="form-group" style="visibility: hidden" id="itmSubCat" >
                    
                    <label class="control-label col-sm-4"  for="itm_cat">Item Category</label>
                    <div class="col-sm-8 " for="itm_cat">
                        <select class="form-control" id="itm_cat" >
                            <option value=""></option>
                            <option value="1">Computer & Mobile It</option>
                            <option value="2">Hardware Items</option>
                            <option value="3">Healthy Items</option>
                            <option value="4">Household Items</option>
                            <option value="5">Industrial</option>
                            <option value="6">Kitchen Items</option>               
                            <option value="7">Services</option>
                            <option value="8">TV Brackets</option>
                        </select>
                    </div>

                    <label class="control-label col-sm-4"  for="itmsub_cat">Item</label>
                    <div class="col-sm-8 " id="itmsub_cat">
                        <input type="text " class="form-control input-sm">
                    </div>

                    <label class="control-label col-sm-4"  for="itmsize">Item Size</label>
                    <div class="col-sm-8 " id="itmsub_cat">
                        <input type="text " class="form-control input-sm">
                    </div>

                    <label class="control-label col-sm-4"  for="itm_cod">Item Code</label>
                    <div class="col-sm-8" id="itm_cod">
                        <input type="text " class="form-control input-sm">
                    </div>


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

                    <div class="form-group">
                        <label class="control-label col-sm-4"  for="intl_qty">Initial Quantity</label>
                        <div class="col-sm-8" id="intl_qty">
                            <input type="text" class="form-control input-sm">
                        </div>
                    </div>
                </div>
                *************************************************************************************


                <div class="col-sm-4 col-sm-offset-2" >
                    <button  id="add_itm_btn" type="submit" class="btn btn-primary form-control" >Add Item</button>
                </div>

                <div class="col-sm-4 ">
                    <button  id="reset_btn" type="reset" class="btn btn-primary form-control ">Reset</button>
                </div>

            </form>

            <!--End form_additem-->
            
        </div>
    </div>
</div>
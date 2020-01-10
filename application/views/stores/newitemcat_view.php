<!--Start form new additem-->
<h2 align="center">Add New Item or New Item Category</h2>


<div class="container">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="jumbotron">

            <!--  <form class="form-horizontal" method="post" action="<?php // echo base_url()   ?>storesC/addNewCat" >-->

            <div class="form-group">
                <label class="control-label col-sm-4" for="select">Category/Item</label>
                <div class="col-sm-6">
                    <select class="form-control" id="mySelect" onchange="return selectFn1();">
                        <option value="0">-- Select Activity --</option>
                        <option value="1">New Category</option>
                        <option value="2">New Item</option>
                        <div class="container">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="jumbotron">

                                    <!--            <form class="form-horizontal" method="post" action="-->
                                    <?php //echo base_url() ?><!--storesC/addCategory" >-->

                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="select">Category/Item</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" id="mySelect" onchange="return selectFn1();">
                                                <option value="0">-- Select Activity --</option>
                                                <option value="1">Add New Category</option>
                                                <option value="2">Add New Item</option>
                                            </select>
                                        </div>
                                    </div>

                                    *********************************************************************************************************

                                    <form class="form-horizontal" method="post"
                                          action="<?php echo base_url() ?>storesC/addNewCategory">
                                        <div class="form-group" style="visibility: hidden" id="itmCat">
                                            <label class="control-label col-sm-4" for="itm_cat_id">Category ID</label>
                                            <div class="form-group col-md-6" id="itm_cat_id">
                                                <input type="text " class="form-control input-sm" name="itm_cat_id">
                                            </div>
                                            <label class="control-label col-sm-4" for="itm_cat">Item Category</label>
                                            <div class="form-group col-md-6" id="itm_cat">
                                                <input type="text " class="form-control input-sm" name="itm_cat">
                                            </div>
                                            <div class="form-group col-md-2 col-sm-offset-8">
                                                <button id="add" type="submit" class="btn btn-primary form-control">
                                                    Add
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                    *********************************************************************************************************

                                    <form class="form-horizontal" method="post"
                                          action="<?php echo base_url() ?>storesC/addCategory">

                                        <div class="form-group" style="visibility: hidden" id="itmSubCat">

                                            <label class="control-label col-sm-4" for="itm_grp">Item Group</label>
                                            <div class="form-group col-md-6" name="itm_grp">
                                                <select name="itm_grp" class="form-control" id="itm_grp" required
                                                        oninput="myFunction()">
                                                    <option value="" selected disabled>Select Category</option>
                                                    <?php
                                                    foreach ($grpRecords as $rec) {
                                                        ?>
                                                        <option value="<?php echo $rec->grpCd; ?>"><?php echo $rec->grp; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <label class="control-label col-sm-4" for="itm_sup_cod">Item Sub
                                                Code</label>
                                            <div class="form-group col-md-6" id="itm_sup_cod">
                                                <input type="text " class="form-control input-sm" name="itm_sup_cod">
                                            </div>

                                            <label class="control-label col-sm-4" for="item_Dis">Item
                                                Description</label>
                                            <div class="form-group col-md-6" id="item_Dis">
                                                <input type="text " class="form-control input-sm" name="item_Dis">
                                            </div>

                                            <?php echo form_open_multipart('employees/do_upload'); ?>
                                            <label class="control-label col-sm-4" for="itmsize">Upload Item
                                                Image</label>

                                            <div class="form-group col-md-6" id="itmsize">
                                                <img id="preview" style="width: 200px; height: 200px;">
                                                <input type="file" name="userfile" id="input">
                                            </div>
                                        </div>

                                        <label class="control-label col-sm-4" for="itmsize">Item Size</label>
                                        <div class="form-group col-md-6" id="itmsize">
                                            <input type="text " class="form-control input-sm" name="itmsize">
                                        </div>

                                        <label class="control-label col-sm-4" for="itmpack">Item Packing</label>
                                        <div class="form-group col-md-6" id="itmpack">
                                            <input type="text " class="form-control input-sm" name="itmpack">
                                        </div>

                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button id="add_itm_btn" type="submit" class="btn btn-primary form-control">
                                                Add Item
                                            </button>
                                        </div>

                                        <div class="col-sm-4 ">
                                            <button id="reset_btn" type="reset" class="btn btn-warning form-control ">
                                                Reset
                                            </button>
                                        </div>
                                </div>
                                </form>

                                <!--End form_additem-->

                            </div>
                        </div>
                </div>
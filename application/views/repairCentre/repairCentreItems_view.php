
<div class="container">
    <h2 align="center">Add Item to be repaired</h2>


    <div class="container-fluid">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="jumbotron">
                <form class="form-horizontal" method="post" action="<?php echo base_url() ?>repaireC/addRepairItemDetails">

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="itm_cod">Item Code</label>
                        <div class="col-sm-8" id="itm_cod1" name="itm_cod">
                            <input type="text " class="form-control input-sm" name="itm_cod" id="itm_cod">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="itm_id">Item Id</label>
                        <div class="col-sm-8" id="itm_cod1" name="itm_id">
                            <input type="text " class="form-control input-sm" name="itm_id" id="itm_id">
                        </div>
                    </div>

                    <div class="form-group">
                        
                        <label class="control-label col-sm-4" for="ret_date"> return Date</label>
                        <div class="col-sm-8" id="ret_date">
                            <input type="text" class="form-control input-sm" name="ret_date">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="reason"> Reason </label>
                        <div class="col-sm-8" id="reason">
                            <input type="text" class="form-control input-sm" name="reason">
                        </div>
                    </div>

                    <div class="col-sm-4 col-sm-offset-2">
                        <button id="add_itm_btn" type="submit" class="btn btn-primary form-control">Add</button>
                    </div>

                    <div class="col-sm-4 ">
                        <button id="reset_btn" type="reset" class="btn btn-danger form-control ">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

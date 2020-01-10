<div class="container">
    <h2 align="center">Vehicle Assigning</h2>
    <<div class="container-fluid">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="jumbotron">
             <form class="form-horizontal" method="post" action="<?php echo base_url() ?>PurchasingOrderC/new_order">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="vehicleNo">Vehicle No.</label>
                        <div class="col-sm-8" id="vehicleNo">
                            <input type="text" class="form-control input-sm" name="vehicleNo">
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="vehicleModel">Vehicle Model</label>
                        <div class="col-sm-8" id="vehicleModel">
                            <input type="text" class="form-control input-sm" name="vehicleModel">
                        </div>

                    </div>

               
                <div class="form-group">
                    <label class="control-label col-sm-4" for="drivern">Driver Name</label>
                    <div class="col-sm-8" id="drivern">
                        <input type="text" class="form-control input-sm" name="drivern">
                    </div>

                </div>

           
            <div class="form-group">
                <label class="control-label col-sm-4" for="dMobile">Mobile No.</label>
                <div class="col-sm-8" id="dMobile">
                    <input type="text" class="form-control input-sm" name="dMobile">
                </div>

            </div>

    
    <div class="form-group">
        <label class="control-label col-sm-4" for="storeNo">Store No.</label>
        <div class="col-sm-8" id="storeNo">
            <input type="text" class="form-control input-sm" name="storeNo">
        </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4" for="salesrep">Sales Rep</label>
            <div class="col-sm-8" id="salesrep">
                <input type="text" class="form-control input-sm" name="salesrep">
            </div>               

        </div>

        <div class="col-sm-4 col-sm-offset-2">
            <button id="add_itm_btn" type="submit" class="btn btn-primary form-control">Assign</button>
        </div>

        <div class="col-sm-4 ">
            <button id="reset_btn" type="reset" class="btn btn-warning form-control ">Reset</button>
        </div>
             </form>
</div>

</div>
</div>
</div>
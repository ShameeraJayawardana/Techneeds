<!--Start supplier Control-->
<h2 align="center">Suppliers</h2>


<div class="container"> 
    <div class="col-sm-6 col-sm-offset-3"> 
        <div class="jumbotron" >
           <!-- <form class="form-horizontal" method="post" action="<?php //echo base_url()  ?>PurchasingOrder/" >-->
            
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>PurchasingOrderC/addSupplierDetails">
                
                <div class="form-group" id="role">
                    <label class="control-label col-sm-4"  for="Supname">Supplier Name</label>
                    <div class="col-sm-8 " id="Supname">
                        <input type="text" class="form-control input-sm" name="Supname">
                    </div>
                </div>

                <div class="form-group" id="pw">
                    <label class="control-label col-sm-4"  for="email">Email </label>
                    <div class="col-sm-8 " id="email">
                        <input type="text" class="form-control input-sm" name="email">
                    </div>
                </div>
                
                <div class="form-group" id="pw">
                    <label class="control-label col-sm-4"  for="address">Address</label>
                    <div class="col-sm-8 " id="address">
                        <input type="text " class="form-control input-sm" name="address">
                    </div>
                </div>

                <div class="form-group" id="pw">
                    <label class="control-label col-sm-4"  for="tel1">Telephone 1</label>
                    <div class="col-sm-8 " id="tel1">
                        <input type="text " class="form-control input-sm" name="tel1">
                    </div>
                </div>

                <div class="form-group" id="pw">
                    <label class="control-label col-sm-4"  for="tel2">Telephone 2</label>
                    <div class="col-sm-8 " id="tel2">
                        <input type="text " class="form-control input-sm" name="tel2">
                    </div>
                </div>  
                
                <div class="form-group" id="role">
                    <label class="control-label col-sm-4"  for="SupType">Supplier Type</label>
                    <div class="col-sm-8 " id="SupType">
                        <select name="SupType" class="form-control">
                            <option>Local</option>
                            <option>Foreign</option>
                            
                        </select>
                    </div>
                </div>

               
                <?php
                // foreach ($records as $rec) {
                ?>
                                 <!--     <option value="<?php //echo $rec->roleId;  ?>"><?php //echo $rec->role;  ?></option>                           
                <?php // } ?>
                                  </select>
                              </div>
                          </div> -->

                <div class="col-sm-4 col-sm-offset-2" >
                    <button  id="addRole_btn" type="submit" class="btn btn-primary form-control" name="addNew" >Add Supplier</button>
                </div>

                <div class="col-sm-4 ">
                    
                    <button  id="reset_btn" type="reset" class="btn btn-danger form-control ">Cancel</button>
                </div>
              
                <div class="col-sm-4">
                     <!--  <a class="btn btn-default btn-success" href="<?php echo site_url('PurchasingOrderC/viewSupplier');?>"> View Suppliers</a>
             <button class="btn btn-success" data-toggle="modal"  href="<?php echo base_url('PurchasingOrderC/viewSupplier'); ?>" data-target="#addcustomer">
                        View Supplier
                    </button>-->
                </div>

            </form>
        </div>
    </div>
</div>

<!--End form_additem-->

<!--Start Activity Control-->
<h2 align="center"><font color=purple>User's Activity Control Panel</h2>


<div class="container"> 
    <div class="col-sm-6 col-sm-offset-3"> 
        <div class="jumbotron" >
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>ControlPanelC/addEmployeeDetails" >

                <div class="form-group" id="role">
                    <label class="control-label col-sm-4"  for="addRole">First Name</label>
                    <div class="col-sm-8 " id="addRole">
                        <input type="text " class="form-control input-sm" name="fname">
                    </div>
                </div>

                <div class="form-group" id="username">
                    <label class="control-label col-sm-4"  for="addRole">Last Name</label>
                    <div class="col-sm-8 " id="addRole">
                        <input type="text " class="form-control input-sm" name="lname">
                    </div>
                </div>

                <div class="form-group" id="pw">
                    <label class="control-label col-sm-4"  for="addRole">NIC number</label>
                    <div class="col-sm-8 " id="addRole">
                        <input type="password " class="form-control input-sm" name="nic">
                    </div>
                </div>

                <div class="form-group" id="pw">
                    <label class="control-label col-sm-4"  for="addRole">Mobile</label>
                    <div class="col-sm-8 " id="addRole">
                        <input type="password " class="form-control input-sm" name="mobile">
                    </div>
                </div>
                
                <div class="form-group" id="pw">
                    <label class="control-label col-sm-4"  for="addRole">Home</label>
                    <div class="col-sm-8 " id="addRole">
                        <input type="password " class="form-control input-sm" name="home">
                    </div>
                </div>
                
                <div class="form-group" id="pw">
                    <label class="control-label col-sm-4"  for="addRole">Address 1</label>
                    <div class="col-sm-8 " id="addRole">
                        <input type="password " class="form-control input-sm" name="add1">
                    </div>
                </div>
                <div class="form-group" id="pw">
                    <label class="control-label col-sm-4"  for="addRole">Address 2</label>
                    <div class="col-sm-8 " id="addRole">
                        <input type="password " class="form-control input-sm" name="add2">
                    </div>
                </div>
                <div class="form-group" id="pw">
                    <label class="control-label col-sm-4"  for="addRole">Address 3</label>
                    <div class="col-sm-8 " id="addRole">
                        <input type="password " class="form-control input-sm" name="add3">
                    </div>
                </div>
                
                <div class="form-group" id="role">
                    <label class="control-label col-sm-4"  for="addRole">Role</label>
                    <div class="col-sm-8 " id="addRole">
                        <select name="role" class="form-control">
                            <?php
                            foreach ($records as $rec) {
                                ?>
                            <option value="<?php echo $rec->roleId; ?>"><?php echo $rec->role; ?></option>                           
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-4 col-sm-offset-2" >
                    <button  id="addRole_btn" type="submit" class="btn btn-primary form-control" name="addNew" >Add New Role</button>
                </div>

                <div class="col-sm-4 ">
                    <button  id="reset_btn" type="reset" class="btn btn-primary form-control ">Cancel</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!--End form_additem-->
<!--Start Activity Control-->
<h2 align="center"><font color=purple>User's Activity Control Panel</h2>

<div class="container"> 
    <div class="col-sm-6 col-sm-offset-3"> 
        <div class="jumbotron" >
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>ControlPanelC/addUserDetails" >

                <div class="form-group" id="role">
                    <label class="control-label col-sm-4"  for="addRole">Role</label>
                    <div class="col-sm-8 " id="addRole">
                        <select name="role" class="form-control" id="roleData" required>
                            <option value="">Select Role</option>
                            <?php
                            foreach ($records as $rec) {
                                ?>
                                <option value="<?php echo $rec->roleId; ?>"><?php echo $rec->role; ?></option>                           
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group" id="role">
                    <label class="control-label col-sm-4"  for="addRole">Employee</label>
                    <div class="col-sm-8 " id="addRole">
                        <select name="emp" class="form-control" id="emp" required>
                            <option value="">Select Employee</option>
                        </select>
                    </div>
                </div>
                <div class="form-group" id="username">
                    <label class="control-label col-sm-4"  for="addRole">Username</label>
                    <div class="col-sm-8 " id="addRole">
                        <input type="text " class="form-control input-sm" name="username" required>
                    </div>
                </div>

                <div class="form-group" id="pw">
                    <label class="control-label col-sm-4"  for="addRole">Password</label>
                    <div class="col-sm-8 " id="addRole">
                        <input type="password" class="form-control input-sm" name="pwd" required>
                    </div>
                </div>

                <div class="form-group" id="pw">
                    <label class="control-label col-sm-4"  for="addRole">Confirm Password</label>
                    <div class="col-sm-8 " id="addRole">
                        <input type="password" class="form-control input-sm" name="cpwd" required>
                    </div>
                </div>
                <div class="form-group" id="pw">
                    <div class="col-sm-12 text-center">
                        <span style="color: red;"><?php echo $this->session->flashdata("error"); ?></span>
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
<script>
    $('#roleData').change(function () {
        var roleData = $("#roleData").val();
        if (roleData != '') {
            $.ajax({
                url:"<?php echo base_url(); ?>ControlPanelC/fetchEmp",
                method: "POST",
                data: {roleData:roleData},
                success: function(data){
                    $('#emp').html(data);
                }
            })
        }

    });
</script>
<!--End form_additem-->
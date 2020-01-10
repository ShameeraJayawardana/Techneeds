<!--Start Create New Role-->
<h2 align="center"><font color=purple>Create New Role</h2>


<div class="container"> 
    <div class="col-sm-6 col-sm-offset-3"> 
        <div class="jumbotron" >
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>ControlPanelC/createRole" >

                <div class="form-group" id="addRole">
                    <label class="control-label col-sm-4"  for="addRole">New Role</label>
                    <div class="col-sm-8 " id="addRole">
                        <input type="text " class="form-control input-sm" name="addRole">
                    </div>
                </div>

                <div class="col-sm-4 col-sm-offset-2" >
                    <button  id="addRole_btn" type="submit" class="btn btn-primary form-control" >Add New Role</button>
                </div>

                <div class="col-sm-4 ">
                    <button  id="reset_btn" type="reset" class="btn btn-danger form-control ">Cancel</button>
                </div>

            </form>


        </div>
        <?php if ($this->session->flashdata('role_created')): ?>
            <div class="alert alert-success" >
                <?php echo $this->session->flashdata('role_created'); ?> 
            </div>
        <?php endif; ?>
    </div>
</div>

<!--End Create New Role-->
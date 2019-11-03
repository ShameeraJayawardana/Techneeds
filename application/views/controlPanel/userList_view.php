<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal form-group" method="post" action="<?php echo base_url() ?>ControlPanelC/addUserDetails" >
                <table class="table table-responsive table-hover">
                    <tr>
                        <th></th>
                        <th>Employee Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>NIC number</th>
                        <th>Mobile</th>
                        <th>Home</th>
                        <th>Address</th>
                        <th>Role</th>
                    </tr>
                    <?php
                    foreach ($records as $rec) {
                        ?>
                        <tr>
                            <td>
                                <input type="checkbox" class="form-control" value="<?php echo $rec->empId; ?>" style="width: 20px; height: 20px;" />
                            </td>
                            <td>
                                <?php echo $rec->empId; ?>
                            </td>
                            <td>
                                <?php echo $rec->nm1; ?>
                            </td>
                            <td>
                                <?php echo $rec->nm2; ?>
                            </td>
                            <td>
                                <?php echo $rec->nic; ?>
                            </td>
                            <td>
                                <?php echo $rec->phnM; ?>
                            </td>
                            <td>
                                <?php echo $rec->phnH; ?>
                            </td>
                            <td>
                                <?php echo $rec->adrs1; ?>,
                                <?php echo $rec->adrs2; ?>,
                                <?php echo $rec->adrs3; ?>
                            </td>
                            <td>
                                <?php echo $rec->roleId; ?>
                            </td>
                        </tr>                         
                    <?php } ?>
                </table>
                <button type="button" name="delete_user" id="delete_user" class="btn btn-danger">DELETE USER</button>
            </form>
        </div>
    </div>
</div>
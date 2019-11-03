<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal form-group" method="post" action="<?php echo base_url() ?>ControlPanelC/addUserDetails" >
                <table class="table table-responsive table-hover">
                    <tr>
                        <th></th>
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
                                <input type="checkbox" class="form-control delete_checkbox" value="<?php echo $rec->empId; ?>" style="width: 20px; height: 20px;" />
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
                                <?php echo $rec->role; ?>
                            </td>
                        </tr>                         
                    <?php } ?>
                </table>
                <button type="button" name="delete_user" id="delete_user" class="btn btn-danger">DELETE USER</button>
            </form>
        </div>
    </div>
</div>
<style>
    .removeRow{
        background-color: #F7DDDF;
        color: #000000;
    }
</style>
<script>
    $(document).ready(function(){
        $('.delete_checkbox').click(function(){
            if($(this).is(':checked')){
                $(this).closest('tr').addClass('removeRow');
            }else{
                $(this).closest('tr').removeClass('removeRow');
            }
        });
        
        $('#delete_user').click(function(){
            var checkbox = $('.delete_checkbox:checked');
            if(checkbox.length > 0){
                var checkbox_value = [];
                $(checkbox).each(function(){
                    checkbox_value.push($(this).val());
                });
                $.ajax({
                    url: "<?php echo base_url(); ?>ControlPanelC/deleteAll",
                    method: "POST",
                    data: {checkbox_value:checkbox_value},
                    success: function(){
                        $('.removeRow').fadeOut(1500);
                    }
                })
            }else{
                alert('Select atleast one record');
            }
        });
    });
</script>
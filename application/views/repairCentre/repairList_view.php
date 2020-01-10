<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal form-group" method="post" action="<?php echo base_url() ?>repairC/viewRepairItem" >
                <table class="table table-responsive table-hover">
                    <tr>
                        <th></th>
                        <th>Item code</th>                        
                        <th>Item Id</th>
                        <th>Return Date</th>
                        <th>Reason</th>                        
                        <th>Status</th>
                    </tr>
                    <?php
                    foreach ($records as $rec) {
                        ?>
                        <tr>
                            <td>
                                <input type="checkbox" class="form-control delete_checkbox" value="<?php echo $rec->rtnId; ?>" style="width: 20px; height: 20px;" />
                            </td>
                            <td>
                                <?php echo $rec->rtnDt; ?>
                            </td>
                            <td>
                                <?php echo $rec->itemId; ?>
                            </td>
                            <td>
                                <?php echo $rec->itemCd; ?>
                            </td>
                           
                        </tr>                         
                    <?php } ?>
                </table>
                <button type="button" name="delete_user" id="delete_user" class="btn btn-danger">DELETE Item</button>
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
                    url: "<?php echo base_url(); ?>repaireC/deleteAll",
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
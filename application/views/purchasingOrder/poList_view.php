

<!--Start form_additem-->
<h2 align="center">List of Purchasing Order</h2>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal form-group" method="post" action="<?php echo base_url() ?>PurchasingOrderC/viewOrder_list" >
                <table class="table table-responsive table-hover">
                    <tr>
                        <th></th>
                        <th>PO No.</th>
                        <th>Item Code</th>
                        <th>Quantity</th>
                        <th>Supplier</th>
                        <th>Date sent</th>
                        <th>Receiving Date</th>                        
                        <th>Action</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php
                    
                    foreach ($podata as $rec) {
                        ?>
                        <tr>
                            <td>
                                <input type="checkbox" class="form-control delete_checkbox" value="<?php echo $rec->orderNo; ?>" style="width: 20px; height: 20px;" />
                            </td>
                            <td>
                                <?php echo $rec->orderNo; ?>
                            </td>
                            <td>
                                <?php echo $rec->itemCd; ?>
                            </td>
                            <td>
                                <?php echo $rec->quantity; ?>
                            </td>
                            <td>
                                <?php echo $rec->supplierId; ?>
                            </td>
                            <td>
                                <?php echo $rec->orderDate; ?>
                            </td>
                            <td>
                                <?php echo $rec->dateNeed; ?>                                
                            </td>
                            
                            <td>
                                <?php echo $rec->action; ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('PdfC/poPrint'); ?>" class="btn btn-success" target="_blank">
                                <span class="glyphicon glyphicon-eye-open"></span>&nbsp;View
                            </a>
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
                    url: "<?php echo base_url(); ?>PurchasingOrderC/deleteAll",
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
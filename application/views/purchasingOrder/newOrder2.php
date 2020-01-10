<!--start creating Purchase Order-->
<!DOCTYPE html>
<html>
    <head>

    </head>
</html>
<div class="container">
    <h2 align="center">Purchase Order</h2>

    <hr>
    <div class="jumbotron col-sm-12"> 
        <button id="additem" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addcustomer">
            <span class="glyphicon glyphicon-add"></span>Add Item</button>

        <form class="form-inline" method="post" action="<?php echo base_url() ?>invoiceC/form_validation">
           

                <table class="table">
                    <tr><th>
                            <div  class="form-group col-md-10" id="role">
                                <label class="control-label "  for="Supname">Current Date : </label>
                            </div></th><td>
                            <div class='input-group col-md-12' id='datetimepicker1'>
                                <input  type='date' name="from_date" id="from_date" class="form-control input-sm " />
                                
                            </div></td>
                        <th>
                            <div class="form-group col-md-12" id="pw">
                                <label class="control-label"  for="address">Expected Date :</label>
                            </div>  </th><td>
                            <div class='input-group col-md-12' id='datetimepicker1'>
                                <input  type='date' name="from_date" id="from_date" class="form-control input-sm " />
                                
                            </div></td></tr>

                    <tr><td>
                            <div class="form-group col-md-12" id="pw">
                                <label class="control-label "  for="address">PO Number :  </label>
                            </div></td><td>
                            <div class='input-group col-md-12' id='datetimepicker1'>
                                <input  type='text' name="from_date" id="from_date" class="form-control input-sm " />
                                
                            </div></td><td>
                            <div class="form-group col-md-12" id="pw">
                                <label class="control-label "  for="address">Supplier Name : </label>
                            </div></td><td>
                            <div class='input-group col-md-12' id='datetimepicker1'>
                                <input  type='text' name="from_date" id="from_date" class="form-control input-sm " />
                                
                            </div></td></tr>
                    <tr><td>
                            <div class="form-group col-md-10" id="pw">
                                <label class="control-label "  for="address">Create By :  </label>
                            </td><td>
                            <div class='input-group col-md-12' id='datetimepicker1'>
                                <input  type='text' name="from_date" id="from_date" class="form-control input-sm " />
                                
                            </div></td><td>
                            <div class="form-group col-md-8" id="pw">
                                <label class="control-label "  for="address">Payment Type </label></td><td>
                            <div class='input-group col-md-12' id='datetimepicker1'>
                                <input  type='text' name="from_date" id="from_date" class="form-control input-sm " />
                                
                            </div></td></tr>
                </table>


            </div>
    </div>



</form>
</div>
<hr>
<div class="container">
    <div class="jumbotron col-sm-12">   

        <table class="table table-striped table-bordered">
            <tr>
                <th></th>

                <th>PO No</th>
                <th>Item Code</th>
                <th>Description</th>
                <th>Unit Cost</th>
                <th>Quantity</th>
                <th>Sub Totals</th>
                <th>Remarks</th>
            </tr>
        </table>
    </div>
</div>

<div id="cart_details">
    <h3 align="center">Cart is Empty</h3>
</div>
</div>
<button class="btn btn-success col-sm-offset-2" id="btn_print" >Submit</button>



<script>
    $('#itm_grp').change(function () {
        var itm_grp = $("#itm_grp").val();
        if (itm_grp != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>PurchasingOrderC/fetchItem",
                method: "POST",
                data: {itm_grp: itm_grp},
                success: function (data) {
                    $('#itmsub_grp').html(data);
                }
            })
        }

    });
</script>


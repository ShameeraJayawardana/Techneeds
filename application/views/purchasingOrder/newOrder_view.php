<h2 align="center">New Purchase Order</h2>


<div class="container-fluid">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="jumbotron">

            <!--form class="form-horizontal" method="post" action="<?php echo base_url() ?>storesC/form_validation" -->
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>PurchasingOrderC/savePo">
                <script>
                    function myFunction() {
                        var itmGrp = document.getElementById("itm_grp").value;
                        var itmSubGrp = document.getElementById("itmsub_grp").value;
                        var itmSize = document.getElementById("itm_size").value;
                        var itmPack = document.getElementById("itm_pack").value;
                        var itmCd1 = itmGrp.concat(itmSubGrp);
                        var itmCd2 = itmCd1.concat(itmSize);
                        var code = itmCd2.concat(itmPack);
                        document.getElementById("itm_cod").value = code;
                    }
                </script>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="poNo"> PO No.</label>
                    <div class="col-sm-8" id="poNo">
                        <input type="text" class="form-control input-sm" name="poNo">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-4" for="itm_grp">Item Category</label>
                    <div class="col-sm-8 " name="itm_grp">
                        <select name="itm_grp" class="form-control" id="itm_grp" required oninput="myFunction()">
                            <option value="" selected disabled>Select Category</option>
                            <?php
                            foreach ($grpRecords as $rec) {
                                ?>
                                <option value="<?php echo $rec->grpCd; ?>"><?php echo $rec->grp; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="itmsub_grp">Item</label>
                    <div class="col-sm-8 ">
                        <select id="itmsub_grp" name="itmsub_grp" class="form-control" required oninput="myFunction()">
                            <option value="" selected disabled>Select Item</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-4" for="itm_size">Size</label>
                    <div class="col-sm-8 ">
                        <select id="itm_size" name="itm_size" class="form-control" required oninput="myFunction()">
                            <option value="" selected disabled>Select Size</option>
                            <?php
                            foreach ($sizeRecords as $rec) {
                                ?>
                                <option value="<?php echo $rec->sizeCd; ?>"><?php echo $rec->size; ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="itm_pack">Packing</label>
                    <div class="col-sm-8 ">
                        <select id="itm_pack" name="itm_pack" class="form-control" required oninput="myFunction()">
                            <option value="" selected disabled>Select Packing</option>
                            <?php
                            foreach ($packRecords as $rec) {
                                ?>
                                <option value="<?php echo $rec->packCd; ?>"><?php echo $rec->pack; ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="itm_cod">Item Code</label>
                    <div class="col-sm-8" id="itm_cod1" name="itm_cod">
                        <input type="text " class="form-control input-sm" name="itm_cod" id="itm_cod">
                    </div>
                </div>

                

                <div class="form-group">
                    <label class="control-label col-sm-4" for="quantity"> Quantity</label>
                    <div class="col-sm-8" id="quantity">
                        <input type="text" class="form-control input-sm" name="quantity">
                    </div>
                </div>
             
                    <div class="container form-row">
                        <div class="form-group">

                            <label class="control-label col-sm-4" for="supplier"> Supplier </label>
                            <div class="col-sm-8 " name="supplier">
                                <select name="supplier" class="form-control" id="supplier">
                                    <option value="" selected disabled>Select Supplier</option>
                                    <?php
                                    foreach ($supplier as $rec) {
                                        ?>
                                        <option value="<?php echo $rec->supplierId; ?>"><?php echo $rec->companyName; ?></option>
                                    <?php } ?>
                                </select>

                            </div>                         
                        </div>
                    </div>
                

                <div class="form-group">
                    <label class="control-label col-sm-4" for="orderdate"> Order Date</label>
                    <div class="col-sm-8" id="orderdate">
                        <input type="date" class="form-control input-sm" name="orderdate">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-4" for="expectdate"> Expecting Date</label>
                    <div class="col-sm-8" id="expectdate">
                        <input type="date" class="form-control input-sm" name="expectdate">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="createby"> Create By</label>
                    <div class="col-sm-8" id="createby">
                        <input type="text" class="form-control input-sm" name="createby">
                    </div>
                </div>
                    

                <div class="col-sm-4 col-sm-offset-2">
                    <button id="add_itm_btn" type="submit" class="btn btn-primary form-control">Create</button>
                </div>

                <div class="col-sm-4 ">
                    <button id="reset_btn" type="reset" class="btn btn-warning form-control ">Reset</button>
                </div>

            </form>
        </div>
    </div>
</div>
<script>
    $('#itm_grp').change(function () {
        var itm_grp = $("#itm_grp").val();
        if (itm_grp != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>StoresC/fetchItem",
                method: "POST",
                data: {itm_grp: itm_grp},
                success: function (data) {
                    $('#itmsub_grp').html(data);
                }
            })
        }

    });
</script>
<!--End form_additem-->

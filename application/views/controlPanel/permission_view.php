<h2 align="center">Grant Permission</h2>
<br>
<div class="container"> 
    <div class="table-responsive" >
        <table class="table table-striped table-bordered">

            <tr>
                <th class="text-center">Role</th>
                <th>Inventory</th>
                <th>Invoice</th>
                <th>Purchasing Order</th>
                <th>Control Panel</th>
                <th>Repair Centre</th>
                <th>Transport</th>
                <th>&nbsp;</th>
            </tr>           

            <?php
            foreach ($records as $rec) {
                ?>
                <tr>
                    <td>  <?php echo $rec->role; ?></td>

                    <td align="center" >
                        <input type="checkbox" class="form-control" value="" style="width: 20px; height: 20px;" />
                    </td>
                    <td align="center">
                        <input type="checkbox" class="form-control" value="" style="width: 20px; height: 20px;" />
                    </td>
                    <td align="center">
                        <input type="checkbox" class="form-control" value="" style="width: 20px; height: 20px;" />
                    </td>
                    <td align="center">
                        <input type="checkbox" class="form-control " value="" style="width: 20px; height: 20px;" />
                    </td>
                    <td align="center">
                        <input type="checkbox" class="form-control" value="" style="width: 20px; height: 20px;" />
                    </td>
                    <td align="center">
                        <input type="checkbox" class="form-control" value="" style="width: 20px; height: 20px;" />
                    </td>
                    <td align="center"><a href="" class="btn btn-success">  <span class="glyphicon glyphicon-save"></span>&nbsp;Submit
                        </a>
                    </td>
                </tr>

            <?php } ?>
        </table>
        <div class="col-sm-4" >
            <button  id="addpermission_btn" type="submit" class="btn btn-primary" style="width: 120px; height: 50px;" name="addNew" ><span class="glyphicon glyphicon-save"></span>&nbsp;Submit All</button>
        </div>
    </div>
</div>


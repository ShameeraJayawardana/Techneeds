<!--Start allitems-->
<h2 align="center">All Items at The Stores</h2>

<form class="form-inline" method="post">
    <div class="container form-row">
        
        <table>
        <!-- item category -->
        <tr><td>
        <div class="" name="itm_grp">
            <select name="itm_grp" class="form-control" id="itm_grp" required oninput="myFunction()">
                <option value="" selected disabled>Select Category</option>
                <?php
                foreach ($grpRecords as $rec) {
                    ?>
                    <option value="<?php echo $rec->grpCd; ?>"><?php echo $rec->grp; ?></option>
                <?php } ?>
            </select>
       
        </div>
            </td>
        <!-- Gender -->
        <td>
        <div class="" name="store">
            <select name="store" id="sel_store" class="form-control" >
                <option value=''> Select Store</option>
                <?php
                foreach ($storeRecords as $rec) {
                    ?>
                    <option value="<?php echo $rec->id; ?>"><?php echo $rec->storeCd; ?></option>
                <?php } ?>
            </select>
        </div>
        </td>
   
        <td>
        <div class="form-group col-md-10" id="cust_nm">
           
            <div class="input-group ">
                <span class="input-group-addon">Search</span>
                <input type="text" name="search_text" id="search_text" placeholder="Search by Item Details" class="form-control" />
            </div>
       
        </div>
        </td></tr>
            
        </table>
    </div>
    <hr>
</form>
<div id="result"></div>
<div class="container"> 

    <div class="table-responsive" >
        <table id="viewitem" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Item Code</th>
                    <th>Item</th>
                    <th>Item Category</th>
                    <th>District</th>
                    <th>Store Type</th>
                    <th>Store No</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($records as $rec) { ?>
                    <tr>

                        <td><?php echo $rec->itemCd; ?></td>
                        <td><?php echo $rec->subGrp; ?></td>
                        <td><?php echo $rec->grp; ?></td>
                        <td><?php echo $rec->dst; ?></td>
                        <td><?php echo $rec->storeTyp; ?></td>
                        <td><?php echo $rec->storeNo; ?></td>

                        <td>
                            <a href="<?php echo site_url('StoresC/viewItem'); ?>" class="btn btn-success">
                                <span class="glyphicon glyphicon-eye-open"></span>&nbsp;View
                            </a>
                            <a href="<?php echo site_url('StoresC/editItem_view'); ?>itemCode=<?php echo $rec->itemCd; ?>" onclick="loadfile1(<?php echo $rec->itemCd; ?>)" class="btn btn-warning">
                                <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit
                            </a>
                        </td>  
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

</div>

 <!-- Script -->
    <script type="text/javascript">
    $(document).ready(function(){

       var userDataTable = $('#viewitem').DataTable({
         'processing': true,
         'serverSide': true,
         'serverMethod': 'post',
         //'searching': false, // Remove default Search Control
         'ajax': {
            'url':'<?=base_url()?>StoresC/fetchItemSearch',
            'data': function(data){
               data.selectgroup = $('#itm_grp').val();
               data.selectstores = $('#sel_store').val();
               //data.searchName = $('#searchName').val();
            }
         },
         'columns': [
            { data: 'itemCd' },
            { data: 'Subgrp' },
            { data: 'grp' },
            { data: 'dst' },
            { data: 'storeTyp' },
         ]
       });

       $('#itm_grp,#sel_store').change(function(){
          userDataTable.draw();
       });
       $('#searchName').keyup(function(){
          userDataTable.draw();
       });
    });
    </script>

<script>
    var itemId = [];
    var cat = [];
    var i = 0;
    $('#search_text').on('input', function () {

        load_data();

        function load_data(query) {
            $.ajax({
                url: "<?php echo base_url(); ?>StoresC/fetchItemSearch",
                method: "POST",
                data: {query: query},
                success: function (data) {
                    $('#result').html(data);
                }
            })
        }

        $('#search_text').keyup(function () {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                $('#result').html("");
            }
        });
    });
</script>


<!--End allitems-->
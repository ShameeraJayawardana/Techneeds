<!--Start allitems-->
<h2 align="center">All Items at The Stores</h2>

<form class="form-vertical" method="post">
    <div class="container form-row">

        <div class="form-group col-md-10" id="cust_nm">
            <div class="input-group">
                <span class="input-group-addon">Search</span>
                <input type="text" name="search_text" id="search_text" placeholder="Search by Item Details" class="form-control" />
            </div>
        </div>
    </div>
</form>
<div id="result"></div>
<div class="container"> 

    <div class="table-responsive" >
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Item Code</th>
                    <th>Item</th>
                    <th>Item Category</th>
                    <th>District</th>
                    <th>Store Type</th>
                    <th>Store No</th>
                </tr>
            </thead>

            <tbody>
<?php

   foreach ($records as $rec) {
?>
                    <tr>
                      <td><?php echo $rec->itemCd;  ?></td>
                        <td><?php  echo $rec->subGrp;  ?></td>
                        <td><?php echo $rec->grp;  ?></td>
                        <td><?php  echo $rec->dst;  ?></td>
                        <td><?php echo $rec->storeTyp;  ?></td>
                        <td><?php  echo $rec->storeNo;  ?></td>
                    </tr>
<?php  }
 

?>
            </tbody>
        </table>
    </div>

</div>-->

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
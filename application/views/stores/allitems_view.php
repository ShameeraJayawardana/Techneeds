<!--Start allitems-->
<h2 align="center">All Items at The Stores</h2>

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
                //foreach ($h->result() as $row)
                foreach ($records as $rec) {
                    ?>
                    <tr>
                        <td><?php echo $rec->itemCd; ?></td>
                        <td><?php echo $rec->subGrp; ?></td>
                        <td><?php echo $rec->grp; ?></td>
                        <td><?php echo $rec->dst; ?></td>
                        <td><?php echo $rec->storeTyp; ?></td>
                        <td><?php echo $rec->storeNo; ?></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>

</div>




<!--End allitems-->
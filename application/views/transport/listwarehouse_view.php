
<h2 align="center">Warehouse List</h2>
<hr>
<div class="container"> 

    <div class="table-responsive" >
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Store Code</th>
                    <th>Store Type</th>
                    <th>Assigned</th>
                    
                </tr>
            </thead>

            <tbody>
                <?php
                //foreach ($h->result() as $row)
                foreach ($warehouse as $rec) {
                    ?>
                    <tr>
                        <td><?php echo $rec->storeCd; ?></td>
                        <td><?php echo $rec->storeTypCd; ?></td>
                        <td><?php echo $rec->branchNo; ?></td>
                       
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>

</div>


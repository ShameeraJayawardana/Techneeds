<div class="container">
    <div class="row">
    <div class="col-md-12">
            <table class="table table-striped ">

                <tbody>
                    <?php
                    foreach ($records as $rec) {
                    ?>
                        <tr>
                            <td>Item Category</td>
                            <td><?php echo $rec->itemCd; ?></td>
                        </tr>
                        <tr>
                            <td>Sub Group</td>
                            <td><?php echo $rec->subGrp; ?></td>
                        </tr>
                        <tr>
                            <td>Group</td>
                            <td><?php echo $rec->grp; ?></td>
                        </tr>
                        <tr>
                            <td>District</td>
                            <td><?php echo $rec->dst; ?></td>
                        </tr>
                        <tr>
                            <td>Store type</td>
                            <td><?php echo $rec->storeTyp; ?></td>
                        </tr>
                        <tr>
                            <td>Store No</td>
                            <td><?php echo $rec->storeNo; ?></td>
                        </tr>
                `   <?php
                    }
                    ?>
                </tbody>

            </table>

    </div>
</div>


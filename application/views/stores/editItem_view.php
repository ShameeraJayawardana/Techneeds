<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped ">
                <form id="updateData" method="post">
                    <tbody>
                    <?php
                    foreach ($records as $rec) {
                        ?>
                        <tr>
                            <td>Item Category</td>
                            <td><input type="text" class="form-control" name="itemCode"
                                       value="<?php echo $rec->itemCd; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Sub Group</td>
                            <td><input type="text" class="form-control" name="subgroup"
                                       value="<?php echo $rec->subGrp; ?>"></td>
                        </tr>
                        <tr>
                            <td>Group</td>
                            <td><input type="text" class="form-control" name="group" value="<?php echo $rec->grp; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>District</td>
                            <td><input type="text" class="form-control" name="district"
                                       value="<?php echo $rec->dst; ?>"></td>
                        </tr>
                        <tr>
                            <td>Store type</td>
                            <td><input type="text" class="form-control" name="storetype"
                                       value="<?php echo $rec->storeTyp; ?>"></td>
                        </tr>
                        <tr>
                            <td>Store No</td>
                            <td><input type="text" class="form-control" name="no" value="<?php echo $rec->storeNo; ?>">
                            </td>
                        </tr>
                        `   <?php
                    }
                    ?>
                    </tbody>
                    <button type="submit" class="btn btn-success" name="submit" id="submit">
                        UPDATE
                    </button>
                </form>
            </table>

        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#updateData').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo base_url() ?>storesC/editItem",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
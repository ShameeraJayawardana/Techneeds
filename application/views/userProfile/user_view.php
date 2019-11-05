<!-- Icon Cards-->
<div class="row">
    <div class="col-md-12">
        <form method="post" enctype="multipart/form-data" id="upload_form">
            <div class="row">
                <div class="col-md-4">
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
                    <label class="btn btn-outline-light btn-file">
                        <img src="<?php echo $row['0']->profile_pic; ?>" id="profilepic"
                             onerror="if (this.src != '<?php echo base_url('assets/images/avatar.jpg') ?>') this.src = '<?php echo base_url('assets/images/avatar.jpg') ?>';"
                             class="img-responsive img-circle"
                             style="width: 200px; height: 200px; border-radius: 100px;"
                             title="Change profile picture">
                        <span><?php echo $row['0']->userNm; ?></span>
                        <input type="file" name="image_upload" id="image_upload" style="display: none;">
                    </label><br/>
                    <input type="submit" name="upload" id="upload" value="UPLOAD" class="btn btn-outline-dark"
                           style="width: 65%;">
                    <div id="uploaded_image">

                    </div>
                </div>
                <div class="col-md-8">
                    <span><?php echo $row['0']->nm1;
                        echo " ";
                        echo $row['0']->nm2; ?></span><br/><br/>
                    <span><?php echo $row['0']->role; ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <span><?php echo $row['0']->nic; ?></span>
                </div>
                <div class="col-md-8">
                    <span><?php echo $row['0']->adrs1;
                        echo ", ";
                        echo $row['0']->adrs2;
                        echo ", ";
                        echo $row['0']->adrs3; ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <span><?php echo $row['0']->phnM; ?></span>
                </div>
                <div class="col-md-8">
                    <span><?php echo $row['0']->phnH; ?></span>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-8" id="user-data">

    </div>
</div>
<script>
    $(document).ready(function () {
        $('#upload_form').on('submit', function (e) {
            e.preventDefault();
            if ($('#image_upload').val() == '') {
                alert("Please select a file");
            } else {
                $.ajax({
                    url: "<?php echo base_url(); ?>userProfileC/uploadImage",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        $('#uploaded_image').html(data);

                        if (data === '') {
                            location.reload();
                        }
                    }
                });
            }
        });
    });
</script>
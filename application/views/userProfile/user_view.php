<!-- Icon Cards-->
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post" enctype="multipart/form-data" id="upload_form">
                    <div class="row">
                        <div class="col-md-5">
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
                                   style="width: 55%;">
                            <div id="uploaded_image">

                            </div>
                        </div>

                        <div class="col-md-7">
                            <!-- Breadcrumbs-->

                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active"><?php echo htmlentities($row['0']->role); ?></li>
                            </ol>
                            <div class="col-md-6">
                    <span><?php echo $row['0']->nm1;
                        echo " ";
                        echo $row['0']->nm2; ?></span><br/><br/>
                                <span><?php echo $row['0']->role; ?></span><br/><br/>
                                <span><?php echo $row['0']->nic; ?></span><br/><br/>
                                <span><?php echo $row['0']->adrs1;
                                    echo ", ";
                                    echo $row['0']->adrs2;
                                    echo ", ";
                                    echo $row['0']->adrs3; ?></span><br/><br/>
                                <span><?php echo $row['0']->phnM; ?></span><br/><br/>
                                <span><?php echo $row['0']->phnH; ?></span><br/><br/>

                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#changePwd"
                                        style="padding-left: 0;">CHANGE PASSWORD
                                </button>
                            </div>


                        </div>


                    </div>
                </form>
                <div class="modal fade" id="changePwd">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="changePassword" method="post">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Change password</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;
                                    </button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input type="password" class="form-control" name="current" id="current"
                                           placeholder="Current password"><br/><br/>
                                    <input type="password" class="form-control" name="new" id="new"
                                           placeholder="New password">
                                    <input type="password" class="form-control" name="confirm" id="confirm"
                                           placeholder="Confirm password">
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info">
                                        Update password
                                    </button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
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
<script>
    $(document).ready(function () {
        $('#changePassword').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?php echo base_url(); ?>userProfileC/changePwd",
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
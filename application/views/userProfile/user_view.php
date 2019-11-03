<!-- Icon Cards-->
<div class="row">
    <div class="col-md-4">
        <form action="<?php echo base_url() ?>userProfileC/uploadImage" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
                    <label class="btn btn-outline-light btn-file">
                        <img src="<?php echo $row["picture"]; ?>" id="profilepic"
                             onerror="if (this.src != '<?php echo base_url('assets/images/avatar.jpg') ?>') this.src = '<?php echo base_url('assets/images/avatar.jpg') ?>';"
                             class="img-responsive img-circle"
                             style="width: 200px; height: 200px; border-radius: 100px;"
                             title="Change profile picture">
                        <input type="file" name="file_upload" id="fileToUpload" style="display: none;">
                    </label><br/>
                    <input type="submit" name="submit" value="UPLOAD" class="btn btn-outline-dark"
                           style="width: 65%;">
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-8" id="user-data">

    </div>
</div>
<div class="row">
    <div class="modal fade" id="changePwd">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">CHANGE PASSWORD</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>


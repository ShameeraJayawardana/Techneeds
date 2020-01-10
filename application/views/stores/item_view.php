

<div class="container">

    <h2><?php
        foreach ($itemdis as $rec) {
            echo $rec->subGrp;
        }
        ?> </h2>
    <div class="row">
    <div class="col-md-12">
        <form method="post" enctype="multipart/form-data" id="upload_form">

            <div class="row">
                <div class="col-md-5">
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
                    <label class="btn btn-outline-light btn-file">
                        <img src="" id="profilepic" style="width: 200px; height: 200px; border-radius: 100px;">
                        <input type="file" name="image_upload" id="image_upload" style="display: none;">
                    </label>
                    <br/>
                    <input type="submit" name="upload" id="upload" value="UPLOAD" class="btn btn-outline-dark"
                           style="width: 55%;">
                    <div id="uploaded_image">

                    </div>
                </div>
            </div>             

            <table class="table table-striped ">

                <tbody>                 
                    <tr>
                        <td>Item Code</td>                    
                        <td><?php
                            foreach ($records as $rec) {
                                echo $rec->itemCd;
                            }
                            ?></td>                   
                    </tr>
                    <tr>
                        <td>Item Category</td>
                        <td><?php
                            foreach ($grpRecords as $rec) {
                                echo $rec->grp;
                            }
                            ?></td>                    
                    </tr>               
                    <tr>
                        <td>Item Description</td>
                        <td><?php
                            foreach ($itemdis as $rec) {
                                echo $rec->subGrp;
                            }
                            ?></td>

                    </tr>
                    <tr>
                        <td>Item Price</td>                   
                        <td>row 1</td>
                    </tr>
                    <tr>
                        <td>Max Discount</td>                   
                        <td>row 1</td>
                    </tr>
                    <tr>
                        <td>Max Retail Discount</td>                   
                        <td>row 1</td>
                    </tr>

                </tbody>

            </table>
            <button type="submit" class="btn btn-success" data-toggle="modal" style="padding-left: 0; width: 80px; height: 40px;"><span class="glyphicon glyphicon-save"></span> &nbsp;save</button>

        </form>
    </div>
</div>


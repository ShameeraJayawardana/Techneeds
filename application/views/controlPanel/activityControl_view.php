<!--Start Activity Control-->
<h2 align="center"><font color=purple>User's Activity Control Panel</h2>


<div class="container"> 
    <div class="col-sm-6 col-sm-offset-3"> 
        <div class="jumbotron" >
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>storesC/additem" >
                
                <div class="col-sm-4 col-sm-offset-2" >
                    <button  id="finish_btn" type="submit" class="btn btn-primary form-control" >Finish</button>
                </div>

                <div class="col-sm-4 ">
                    <button  id="cancel_btn" type="cancel" class="btn btn-primary form-control ">Cancel</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!--End form_additem-->
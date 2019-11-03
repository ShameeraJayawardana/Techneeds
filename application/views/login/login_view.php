<!--Start header-->
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Techneeds</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <!--End header-->

    <!--Start body-->
    <body style="padding-top : 100px ;" class="container" >
        <br /><br /><br />
        <div class="col-sm-4 col-sm-offset-4"> 
            <div class="panel-group">
                <div class="panel panel-success">
                    <div class="panel-body">
                        <form method="post" action="<?php echo base_url(); ?>mainC/login_validation">
                            <div class="col-sm-12 col-sm-offset-2" >
                                <img src="<?php echo base_url('assets/images/logo_techneeds.jpg') ?>" width="200px" height="75px" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Enter Username"/>
                                <span class = "text-danger"><?php echo form_error('username'); ?> </span>
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Enter Password"/>
                                <span class = "text-danger"><?php echo form_error('password'); ?> </span>
                            </div>

                            <div class="form-group  col-sm-12">
                                <button  id="submit" type="submit" class="btn btn-primary form-control" >Login</button>
                                
                                <!--?php echo form_submit(['class' => 'btn-primary', 'name' => 'submit', 'value' => 'Login']); ?-->
                                <?php echo $this->session->flashdata("error"); ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>




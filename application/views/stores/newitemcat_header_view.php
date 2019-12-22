<!--Start header-->
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Techneeds</title>

        <?php /*
          <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
          <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
          <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
         */ ?>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- My JavaScript -->
        <script>
            function selectFn1() {
                var selectBox = document.getElementById('mySelect');
                var userInput = selectBox.options[selectBox.selectedIndex].value;
                if (userInput == '1') {
                    document.getElementById('itmCat').style.visibility = 'visible';
                    document.getElementById('itmSubCat').style.visibility = 'hidden';
                } 
                else if (userInput == '2') {
                    document.getElementById('itmSubCat').style.visibility = 'visible';
                    document.getElementById('itmCat').style.visibility = 'hidden';
                }
                return false;
            }
        </script>


    </head>
    <!--End header-->

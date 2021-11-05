
<!DOCTYPE html>
<html lang="en">
<head>
<?php
// Output Buffer Starts
ob_start();
// Start the session
session_start();

?>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php define("SITE_URL1", "http://localhost/products-web-app/");?>
           <!-- fonts -->
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL1;?>assets/fonts/PlayfairDisplay-VariableFont_wght.ttf" />
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL1;?>assets/fonts/DancingScript-VariableFont_wght.ttf" />
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL1;?>assets/fonts/Roboto-regular.ttf" />
        <!-- fonts ends -->
        <!-- Jquery js -->
        <script src="<?php echo SITE_URL1;?>assets/js/jquery-3.6.0.min.js"></script>
        <!--  Bootstrap css-->
        <link rel="stylesheet" href="<?php echo SITE_URL1;?>assets/css/bootstrap.min.css">
        <!-- Material Design Bootstrap css-->
        <link rel="stylesheet" href="<?php echo SITE_URL1;?>assets/css/mdb.4.19.1.min.css">
       
        <!-- font-awesome all 5.15.4 css -->
        <link rel="stylesheet" href="<?php echo SITE_URL1;?>assets/css/font-awesome.min.5.15.4.all_min.css">
        <!-- admin js -->
        <link rel="stylesheet" href="<?php echo SITE_URL1;?>assets/css/admin.css">
        <script src="<?php echo SITE_URL1;?>assets/js/admin.js"></script>
    
        
    </head>
    
<body>
<?php include("login-check-admin.php");?>

<?php

          if(isset($_GET['page'])=="cat")
          {
            $category = "active";
          }
          elseif(isset($_GET['page'])=="size")
          {
            $size = "active";
          }
          elseif(isset($_GET['page'])=="atiles")
          {
            $atiles = "active";
          }
          elseif(isset($_GET['page'])=="modals")
          {
            $modals = "active";
          }
     ?>

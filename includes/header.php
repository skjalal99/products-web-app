
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
    <?php include("../config/conn.php");?>
        <!-- fonts -->
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>assets/fonts/PlayfairDisplay-VariableFont_wght.ttf" />
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>assets/fonts/DancingScript-VariableFont_wght.ttf" />
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>Roboto-regular.ttf" />
        <!-- fonts ends -->
        <!-- Jquery js -->
        <script src="<?php echo SITE_URL;?>assets/js/jquery-3.6.0.min.js"></script>
        <!--  Bootstrap css-->
        <link rel="stylesheet" href="<?php echo SITE_URL;?>assets/css/bootstrap.min.css">
        <!-- Material Design Bootstrap css-->
        <link rel="stylesheet" href="<?php echo SITE_URL;?>assets/css/mdb.4.19.1.min.css">
        <!-- Style css-->
        <link rel="stylesheet" href="<?php echo SITE_URL;?>assets/css/style.css">
        <!-- font-awesome all 5.15.4 css -->
        <link rel="stylesheet" href="<?php echo SITE_URL;?>assets/css/font-awesome.min.5.15.4.all_min.css">
         <!-- animate.min.css -->
         <!-- <link rel="stylesheet" href="../assets/css/jquery.animate.min.css">-->
        <!-- Product js -->
         <script src="<?php echo SITE_URL;?>assets/js/product.js"></script>
         <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>assets/css/dataTables.min.css">
 
        <script type="text/javascript" charset="utf8" src="<?php echo SITE_URL;?>assets/js/dataTables.min.js"></script>
   
    

    </head>
    
<body>
<?php include_once('../admin/config/dbconn.php');?>

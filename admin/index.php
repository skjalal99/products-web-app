<?php include('includes/header-admin.php');?>

<?php include('includes/aside.php');?>
<?php include_once('config/dbconn.php');?>
<?php include_once("config/functions.php");?>
<?php
if(!isset($_SESSION['User-Login']))
{
	header("Location:login.php");
}

?>

<!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
    <?php
    if(isset($_SESSION['Login']))
    {
        echo $_SESSION['Login'];
        unset( $_SESSION['Login']);
    }
    
    ?>
    <?php include('includes/navbar.php');?>
    <?php include('includes/main.php');?>
    <?php include('includes/footer1.php');?>
      


    </main>
<!-- ======== main-wrapper end =========== -->

<?php include('includes/footer-admin.php');?>
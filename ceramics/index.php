<?php include('../includes/header.php');?>
<?php
if(!isset($_SESSION['User-Loginc']))
{
   header("Location:login.php");
}


?>
<?php include('includes/ceramic_menu.php');?>


<?php include('homecards.php');?>


    
                            
  
                    






</div> <!-- Main ends -->







<?php include('includes/ceramic_footer.php');?>

<?php include('../includes/footer.php');?>
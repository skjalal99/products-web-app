
<?php
if(!isset($_SESSION['User-Login']))
{
    $_SESSION['Not-Login'] = "<div class='alert alert-warning text-center' role='alert'>You're not logged in! </div>";
		
	    // Navigate to login page:
        header("Location:../login.php");
        echo "Not logged In";

}
// else{
//     echo "==============>".$_SESSION['User-Login'];
// }
?>



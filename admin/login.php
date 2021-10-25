<?php include('../includes/header.php');?>
<?php include_once('config/dbconn.php');?>

<?php


if(isset($_SESSION['Login'])) 
{
	echo $_SESSION['Login'];
	unset ($_SESSION['Login']);
}
if(isset($_SESSION['Not-Login'])) 
{
	echo $_SESSION['Not-Login'];
	unset ($_SESSION['Not-Login']);
}
if(isset($_GET['loggedout'])) 
{
	echo "<div class='alert alert-warning text-center' role='alert'>".$_GET['loggedout']."</div>";

}

?>
<div class="container">
	<div class="d-flex justify-content-center h-100 login-wrap">
		<div class="card">
			<div class="card-header">
				<h3>Admin Login</h3>
				
			</div>
			<div class="card-body">
				<form action="" method="POST">
					<div class="input-group form-group form-group1">
						<div class="input-group-prepend">
							<span class="input-group-text input-group-text-login"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="user_name" placeholder="username">
						
					</div>
					<div class="input-group form-group form-group1">
						<div class="input-group-prepend">
							<span class="input-group-text input-group-text-login"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="user_pass" placeholder="password">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" name="user_submit" value="Login" class="btn float-end login_admin_btn">
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>


<?php

if(isset($_POST['user_submit']))
{
	$username = $_POST['user_name'];
	$pass = md5($_POST['user_pass']);
	$sql = "SELECT * FROM USERS WHERE user_name ='$username' AND password ='$pass'";
	
	$res = $conn->query($sql);

	if($res == TRUE)
	{
		$count = $res->num_rows;

		if($count == 1)
		{
		$_SESSION['User-Login'] =$username;
		echo "success";
		$_SESSION['Login'] = "<div class='alert alert-success text-center' role='alert'>You are successfully logged in </div>";
		header("Location:index.php");

		}
		else
		{
			$_SESSION['Login'] = "<div class='alert alert-warning text-center' role='alert'>Try Logging Again! </div>";
			header("Location:login.php");
		}

	}

}

?> 


<?php include('../includes/header.php');?>
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



<style>
	body,
		html {
			margin: 0;
			padding: 0;
			height: 100%;
			background: #8defff !important;
		}
</style>

<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
            <span><img src="../assets/images/ceramic.png"  class="brand_logo" height=''alt="" ></span>
          
					</div>
				</div>
				<div class="d-flex justify-content-center form_container1">
					<form method='post'>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text input-group-text-login"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="user_name" class="form-control input_user" value="" placeholder="username">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text input-group-text-login"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="user_pass" class="form-control input_pass" value="" placeholder="password">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<input type="submit"name="cer_submit" value='Login' class="btn login_btn"></input>
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						<h6>Don't have an account ?</h6>
						
					</div>
					<div class="text-center"><small>IT Administrator</small></div>
					<!-- <div class="d-flex justify-content-center links">
						<a href="#">Forgot your password?</a>
					</div> -->
				</div>
			</div>
		</div>
	</div>

	<?php

if(isset($_POST['cer_submit']))
{
	$username = $_POST['user_name'];
	$pass = md5($_POST['user_pass']);
	echo $sql = "SELECT users.user_name,users.password,users.role,users.status,company.co_name
	FROM ((users
	JOIN users_has_company ON users.id = users_has_company.users_id)
	JOIN company ON company.id = users_has_company.company_id)
	WHERE company.co_name ='CERAMICS'
	AND users.user_name ='$username'
	AND users.password ='$pass'
	AND users.role = 'ADMIN' OR users.role='USER'
	AND users.status='active'";
	echo $_SESSION['User-Logincheck']='testing';
	$res = $conn->query($sql);

	if($res == TRUE)
	{
		$count = $res->num_rows;

		if($count == 1)
		{
	echo	$_SESSION['User-Loginc'] =$username;
		echo "success";
		$_SESSION['Login'] = "<div class='alert alert-success text-center' role='alert'>You are successfully logged in </div>";
		header("Location:index.php");

		}
		else
		{
			$_SESSION['Login'] = "<div class='alert alert-warning text-center' role='alert'>Try Logging Again! </div>";
			//header("Location:login.php");
		}

	}

}

?> 




<?php include('../includes/footer.php');?>
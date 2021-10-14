<?php include('../includes/header.php');?>


<style>
 

</style>


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
						<input type="text" class="form-control" placeholder="username">
						
					</div>
					<div class="input-group form-group form-group1">
						<div class="input-group-prepend">
							<span class="input-group-text input-group-text-login"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-end login_admin_btn">
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>





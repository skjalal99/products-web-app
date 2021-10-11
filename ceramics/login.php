

<?php include('../includes/header.php');?>

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
					<form>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text input-group-text-login"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="" class="form-control input_user" value="" placeholder="username">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text input-group-text-login"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="" class="form-control input_pass" value="" placeholder="password">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="button" name="button" class="btn login_btn">Login</button>
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

	



<?php include('../includes/footer.php');?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="formstyle.css">
    </head>
    <body>
    <?php 
    include("navbar.php");
	require_once('lazy_session_start.php');
	lazy_session_start();
    ?>
    
<form method="POST" action="process.php">
	<div class="section">
    		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Enter your new password</h4>	
											<div class="form-group mt-2">
												<input type="password" name="finalpwreset" class="form-style" placeholder="Password" id="finalpwreset" onInput="checkPassword();" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
												<span id="passwordinf" style="font-size: 13px;">Password must contain at least 8 characters, one uppercase letter, one number, one lowercase and one special character</span>
											</div>
                                            <div class="form-group mt-2">
												<input type="password" name="repeatfinalpwreset" class="form-style" placeholder="Repeat your password" onInput="passwordMatch();" id="repeatfinalpwreset" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
												<span id="passmatch"></span>
											</div>
											<button name="resetpassword" id="resetpassword" class="btn mt-4" disabled="disabled">Reset</button>
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">

$(function(){
	setInterval(validate, 1);
});

function validate(){
	if(checkPassword() && passwordMatch()){
		document.getElementById("resetpassword").disabled = false;
	}else{
		document.getElementById("resetpassword").disabled = true;
	}
}

function checkPassword(){
	const string = document.getElementById('finalpwreset').value;
	const reg = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[/\W|_/g]).{8,}$/;
	if(reg.test(string)) {
		document.getElementById("passwordinf").innerHTML = ("<span style='color:green; opacity: 1; font-size:13px;'></span>");
		return true;
	}else{
		document.getElementById("passwordinf").innerHTML = ("<span style='color:red; opacity: 1; font-size:13px;'>Password must contain at least 8 characters, one uppercase letter, one number, one lowercase and one special character.</span>");
		return false;
	}
}

function passwordMatch(){
	const string1 = document.getElementById('finalpwreset').value;
	const string2 = document.getElementById('repeatfinalpwreset').value;
	if(string1 != string2){
		document.getElementById("passmatch").innerHTML = ("<span style='color:red; opacity: 1; font-size:13px;'>Passwords don't match.</span>");
		return false;
	}else{
		document.getElementById("passmatch").innerHTML = ("<span style='color:red; opacity: 1; font-size:13px;'></span>");
		return true;
	}
}

</script>

    </body>
</html>
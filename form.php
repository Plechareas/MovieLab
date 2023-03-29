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
						<h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Log In</h4>
											<div class="form-group">
												<input type="text" name="loginUsername" class="form-style" placeholder="username" id="loginUsername" autocomplete="off">
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="loginPassword" class="form-style" placeholder="password" id="loginPassword" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<button name="login" id="login" class="btn mt-4">Log in</button>
                            				<p class="mb-0 mt-4 text-center"><a href="passwordreset.php" class="link">Forgot your password?</a></p>
				      					</div>
			      					</div>
			      				</div>
								  </form>
								  <div class="card-back">
								<div class="center-wrap">
										<div class="section text-center" style="padding-top: 0.5rem;">
										<form method="POST" action="process.php">
											<h4 class="mb-2 pb-3">Sign Up</h4>
											<div class="form-group">
												<input type="text" name="username" class="form-style" placeholder="Username" id="username" autocomplete="off" onkeyup="usslength()"  onInput="checkUsername()">
												<i class="input-icon uil uil-user"></i>
												<span id="check-username"></span><br>
												<span id="uss-length"></span>
											</div>	
											<div class="form-group mt-2" style="padding-top: 0.5rem;">
												<input type="email" name="email" class="form-style" placeholder="Email" id="email" autocomplete="off" onInput="checkEmail()"  required>
												<i class="input-icon uil uil-at"></i>
												<span id="check-email"></span>
											</div>	
											<div class="form-group mt-2" style="padding-top: 0.5rem;">
												<input type="password" name="password" class="form-style" placeholder="Password" id="password" onInput="checkPassword();"   autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>	
												<span id="passwordinf" style="font-size: 13px;">Password must contain at least 8 characters, one uppercase letter, one number, one lowercase and one special character</span>							
											</div>
                                            <div class="form-group mt-2">
												<input type="password" name="password2" class="form-style" placeholder="Repeat Password" id="password2" onInput="passwordMatch();" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
												<span id="passmatch"></span>
											</div>
											<button name="register" id="register" class="btn mt-4" disabled="disable">Submit</button>
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


function usslength(){
	var string = document.getElementById('username').value;
	if(string.length<8){
		document.getElementById("uss-length").innerHTML = ("<span style='color:red; opacity: 1; font-size:13px;'>Password must be at least 8 characters</span>");
		return false;
	}else{
		document.getElementById("uss-length").innerHTML = ("<span style='color:green; opacity: 1; font-size:13px;'></span>");
		return true;
	}

}

function validate(){
	//console.log(checkUsername());
	if(checkPassword() && passwordMatch()){
		//console.log(passwordMatch());
		document.getElementById("register").disabled = false;
	}else{
		document.getElementById("register").disabled = true;
	}
}

function checkPassword(){
	const string = document.getElementById('password').value;
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
	const string1 = document.getElementById('password').value;
	const string2 = document.getElementById('password2').value;
	if(string1 != string2){
		document.getElementById("passmatch").innerHTML = ("<span style='color:red; opacity: 1; font-size:13px;'>Passwords don't match.</span>");
		return false;
	}else{
		document.getElementById("passmatch").innerHTML = ("<span style='color:red; opacity: 1; font-size:13px;'></span>");
		return true;
	}
}

function checkUsername() {
  jQuery.ajax({
    url: "process.php",
    data: 'username='+$("#username").val(),
    type: "POST",
    success:function(data){
      $("#check-username").html(data);
	  document.getElementById("register").disabled = false;
    },
    error:function () {}
  });
}

function checkEmail() {
  jQuery.ajax({
    url: "process.php",
    data: 'email='+$("#email").val(),
    type: "POST",
    success:function(data){
      $("#check-email").html(data);
	  document.getElementById("register").disabled = false;
    },
    error:function () {}
  });
}
</script>

    </body>
</html>
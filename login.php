<?php
require_once('authentication.php');


/*if(checkLogin()){
    header('Location: teachers_main.php');
    //echo "in"; die();
}*/

require_once('header.php');
    if (isset($_COOKIE['mycookie'])) {
        $v = $_COOKIE['mycookie'];
        $val = explode("%", $v);
    }
else
    {
    $val[0]=$val[1]="";
    }
?>

<style type="text/css">
        .well{
            box-shadow: 0 0 30px black;
            margin-top: 250px;
        }
         body{
                background-image: url(bg.jpg);
                background-repeat: no-repeat;
                background-size: cover;
        }
       
        .logo
        {
            height:30px; 
            width:160px;
        }
        .main_logo
        {
            position: absolute;
            margin-top: 90px;
            height: auto;
            width: auto;
        }
</style>
<div class="container">
   
    <div class="col-md-3">
    </div>
     <div class="col-md-6">
      <img src="mit_logo.png" class="main_logo"/>
    </div> 
</div>



<div class="col-md-4"></div>
<div class="col-md-4">
<!--<p><strong>SIGN IN TO CONTINUE</strong></p>-->
</div>
<div class="col-md-4"></div>

<div class="container">
	
    	<div class="col-md-4"></div>
     	<div class="col-md-4">
			<div class="well">
				<form action="login_verify.php" method="post">
					<div class="form-group">
					<label for="username" >Username</label>
                    <?php
					echo "<input type='text' class='form-control' autofocus id='username' placeholder='Username' name='username' value='$val[0]' required/>";
                    ?>
					</div>
					<div class="form-group">
					<label for="password" >Password</label>
                    <?php
					echo "<input type='password' class='form-control' id='password' placeholder='Password' name='password' value='$val[1]' required/>";
                    ?>
					</div>
                    <div>
                    <label ><input type="checkbox" name="remember" id="checkbox">&nbsp;Remember Me</label>
					<button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                    </div>
				</form>
                <div class="text-center"><br>
                    <a href="forgot_password.php"><strong style="color: #002a80;">Forgot Password ?</strong></a>
                </div>
			</div>
		</div>
		<div class="col-md-4"></div>
    
</div>

<div class="container">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4"></div>
</div>
</div>
</body>
</html>

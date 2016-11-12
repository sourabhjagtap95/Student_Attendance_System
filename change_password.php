<?php
require_once('header.php');
if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
//    echo $username . $password;
    $conn  = mysqli_connect("localhost","root","","project_new");
    if(mysqli_query($conn,"update login_info set password='".md5($password)."' where username='$username'"))
        header('Location: student_data_entered.php');
    else
        header('Location: student_data_not_entered.php');
}
?>
<html>
<head>
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
<script>
    var password = document.form.password;
    var confirm_password = document.form.confirm_password;
    function check_pass(password,confirm_password)
    {
        if(confirm_password.value == password.value)
        {
            return true;
        }
        else
        {
            alert("Passwords do not match.Check your Caps lock key.");
            confirm_password.focus();
            return false;
        }
    }
</script>
    </head>
<body>
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
            <form action="" method="post" name="form">
                <div class="form-group">
                    <label for="username" >Username</label>
                    <input type='text' class='form-control' autofocus id='username' placeholder='Username' name='username' required/>
                </div>
                <div class="form-group">
                    <label for="password" >New Password</label>
                    <input type='password' class='form-control' id='password' placeholder='New Password' name='password'  required/>
                </div>
                <div class="form-group">
                    <label for="password" >Confirm Password</label>
                   <input type='password' class='form-control' id='confirm_password' placeholder='Confirm Password' name='confirm_password' onchange='return check_pass(password,confirm_password);' required/>

                </div>
                <div>
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                </div>
            </form>
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


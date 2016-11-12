<?php
require("header_after_login.php");
require_once('authentication.php');
if(!checkLogin()){
    header('Location: home.php');
}
?>
    <html>
    <head>
        <style type="text/css">
            .well{
                box-shadow: 0 0 30px black;
                margin-top: 100px;
            }
            body{
                background-image: url(bg.jpg);
                background-repeat: no-repeat;
                background-size: cover;
            }
            .container
            {
                width: 400px;;
            }
            .logo
            {
                height:30px;
                width:160px;
            }

        </style>
    </head>
    <body>
    <div class="container">
        <div class="well">
            <form action="" method="post" name="change_password">
                <div class="text-center">
                    <legend>
                        <strong>
                            <h2>Password Change</h2>
                        </strong>
                    </legend>
                </div>
                <div class="form-group">
                    <label for="old">Old Password</label><br><br>
                    <input class="form-control" type="password" name="oldpassword" autofocus required placeholder="Old Password"><br>
                </div>
                <div class="form-group">
                    <label for="new" >New Password</label><br><br>
                    <input class="form-control" type="password" name="newpassword" placeholder="New Password" required><br>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Submit</button><br>

            </form>
        </div>
    </div>
    </body>
    </html>
<?php
$old  = isset($_POST['oldpassword'])?$_POST['oldpassword']:"0";
$new  = isset($_POST['newpassword'])?$_POST['newpassword']:"0";

if(isset($_POST['submit']))
{
    $md5_old = md5($old);
    $username =  $_SESSION['CurrentUser'];
    $conn  = mysqli_connect("localhost","root","","project_new");
    $result =  mysqli_query($conn,"select * from login_info where username='$username' and password='$md5_old'") or die(mysqli_error($conn));
    $row = mysqli_num_rows($result);
    if($row==0)
    {
        echo "<script>alert('Check again your old Password')</script>";
    }
    else
    {
        if(mysqli_query($conn,"UPDATE login_info SET password='".md5($new)."' where username='$username'"))
        {
            echo "<script>alert('Password Changed Successfully !!!')</script>";
        }
        else {
            echo mysqli_error($conn);
            echo "<script>alert('Sorry !!! Password Not Changed....')</script>";
        }
    }
}
?>
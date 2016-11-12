<?php
require_once('authentication.php');


/*if(!checkLogin()){
    header('Location: home.php');
    //echo "in"; die();
}*/

require_once('header.php');
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
            <form action="" method="post" name="forgot_password">
             <div class="form-group">
                    <label for="username">Username</label><br><br>
                    <input class="form-control" type="text" name="username" autofocus required placeholder="Your Username"><br>
                </div>
                <div class="form-group">
                    <label for="email" >Registered Email ID</label><br><br>
                    <input class="form-control" type="email" name="email" placeholder="Your Email-id" required><br>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Submit</button><br>
                <div class="form-group text-center">
                    <pre><strong>We will send you an email containing    your new password !! </strong></pre>
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
<?php
$username  = isset($_POST['username'])?$_POST['username']:"0";
$email  = isset($_POST['email'])?$_POST['email']:"0";
//    echo $email;
$generated_password="";

if(isset($_POST['submit'])){
$conn  = mysqli_connect("localhost","root","","project_new");
$result  = mysqli_query($conn,"select * from login_info where email='$email' and username='$username'");
$row = mysqli_fetch_array($result);
if($row[1]==$username && $row[4]==$email){
$username = $row[1];
//die($username);
function randomString($length = 6) {
 $str = "";
 $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
 $max = count($characters)-1;
 for ($i = 0; $i < $length; $i++) {
  $rand = mt_rand(0, $max);
  $str .= $characters[$rand];
 }
 return $str;
}
$new_password = randomString(6);
echo $new_password;
  $md5_pass = md5($new_password);
      echo $md5_pass;
         $conn  = mysqli_connect("localhost","root","","project_new");
       if(mysqli_query($conn,"UPDATE login_info SET password='$md5_pass' WHERE username = '$username'"))
    {
        header('Location: changed_password.php');
    }
    else
        echo mysqli_errno($conn);
}
else{
    echo "<script>alert('Please Check if you have entered correct username and email-id')</script>";
    }

      /*Generate a new random password*/



   /********************************Sending Mail************************/
            $to      = $email;
            $subject = 'Forgot Password !';
            $message = '<html style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-family: sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;font-size: 10px;-webkit-tap-highlight-color: rgba(0,0,0,0);">
            <head style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
            </head>
            <style style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
            .form{
            background-color: #fff;
            border-radius: 5px;
            margin: 0 auto 25px;
            width: 600px;
            padding: 20px 20px 30px;
            box-shadow: 1px 1px 10px black;
            }
            </style>
            <body style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;margin: 0;font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size: 14px;line-height: 1.42857143;color: #333;background-color: #fff;">
            <div class="form" <strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;background-color: #fff;border-radius: 5px;margin: 0 auto 25px;width: 600px;padding: 20px 20px 30px;box-shadow: 1px 1px 10px black;">Dear,<br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;"><br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
            <b style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">Your Registration details are as follows:</b><br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;"><br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
            <div class="table-responsive" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;min-height: .01%;overflow-x: auto;">
            <legend style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 0;border: 0;display: block;width: 100%;margin-bottom: 20px;font-size: 21px;line-height: inherit;color: #333;border-bottom: 1px solid #e5e5e5;">
            <strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;"><b style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">Account Details:</b></strong>
            </legend>
            <table class="table table-hover table-bordered" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;border-spacing: 0;border-collapse: collapse!important;background-color: transparent;width: 100%;max-width: 100%;margin-bottom: 0;border: 0;">
            <tr style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;page-break-inside: avoid;">
            <th style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 0;text-align: left;background-color: #fff!important;border: 1px solid #ddd!important;">Username: </th>
            <td style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 0;background-color: #fff!important;border: 1px solid #ddd!important;">'.$username.' </td>
            </tr>
            <tr style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;page-break-inside: avoid;">
            <th style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 0;text-align: left;background-color: #fff!important;border: 1px solid #ddd!important;">Password: </th>
            <td style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 0;background-color: #fff!important;border: 1px solid #ddd!important;">'.$new_password.' </td>
            </tr>
            </table>
            </div>
            <strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;"><br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">Please login with new password.</strong><br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;"><br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
            <strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">Regards,</strong><br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;"><br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
            <strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">MIT AOE</strong>
            </div>
            </body>
            </html>';
            $headers = 'From: sourabhjagtap95@gmail.com' . "\r\n" .
            'Reply-To: admin@attendance.com' . "\r\n".
            'MIME-Version: 1.0' . "\r\n" .
            'Content-Type: text/html; charset="utf-8"'. "\r\n";


            if(mail($to, $subject, $message, $headers)) {
            echo 'Email sent successfully!';
            } else {
            die('Failure: Email was not sent!');
            }
            //header('Location: change_password.php');


            }
            /********************************Ending Mail*******************************************/
?>
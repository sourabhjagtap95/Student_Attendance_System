<?php
session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$birthdate=$_POST['date'];
    $birthmonth=$_POST['month'];
    $birthyear=$_POST['year'];
    $gender=$_POST['gender'];
	$uid = $_POST['uid'];

$captcha_code = $_SESSION['captcha_code'];
$user_code  = $_POST['captcha'];
if( $captcha_code == $user_code) {
    $conn = mysql_connect("localhost", "root", "");
    mysql_select_db("project_new", $conn);

    /*search for uid from security_table*/
    $uidquery = "select uid from security_table where firstname='$firstname' and lastname='$lastname'";
    $result = mysql_query($uidquery);
    $row = mysql_fetch_array($result);
    //echo $row['uid'];


    /*check if uids are same*/
    if ($uid == $row['uid']) {
        $usernamequery = "select * from login_info where username='$username'";
        $result = mysql_query($usernamequery);
        $noofrows = mysql_num_rows($result);

        /*if the username doesn't exists,then enter the details in the database*/
        if ($noofrows == 0) {

            /*Insert data into teacher record*/
            $query1 = "insert into teacher_record values ('','$username','$firstname','$lastname','$birthdate-$birthmonth-$birthyear','$gender','$email','$mobile')";
            mysql_query($query1);
            //echo $query1;

            /*Insert data into login info table*/
            $type = "T";
            $encrypted_password = md5($password);
            $query2 = "insert into login_info values('','$username','$encrypted_password','$type','$email')";
            //echo $query2;
            /********************************Sending Mail************************/
            $to = $email;
            $subject = 'Account Created Successfully !!!';
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
            <div class="form" <strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;background-color: #fff;border-radius: 5px;margin: 0 auto 25px;width: 600px;padding: 20px 20px 30px;box-shadow: 1px 1px 10px black;">Dear ' . $firstname . ',<br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;"><br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
		<b style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">Your Registration details are as follows:</b><br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;"><br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
		<div class="table-responsive" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;min-height: .01%;overflow-x: auto;">
                <legend style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 0;border: 0;display: block;width: 100%;margin-bottom: 20px;font-size: 21px;line-height: inherit;color: #333;border-bottom: 1px solid #e5e5e5;">
                <strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;"><b style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">Account Details:</b></strong>
                </legend>
		<table class="table table-hover table-bordered" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;border-spacing: 0;border-collapse: collapse!important;background-color: transparent;width: 100%;max-width: 100%;margin-bottom: 0;border: 0;">
		<tr style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;page-break-inside: avoid;">
                <th style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 0;text-align: left;background-color: #fff!important;border: 1px solid #ddd!important;">Username: </th>
		<td style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 0;background-color: #fff!important;border: 1px solid #ddd!important;">' . $username . ' </td>
		</tr>
		<tr style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;page-break-inside: avoid;">
                <th style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 0;text-align: left;background-color: #fff!important;border: 1px solid #ddd!important;">Password: </th>
		<td style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 0;background-color: #fff!important;border: 1px solid #ddd!important;">' . $password . '</td>
		</tr>
		</table>
     		</div>
		<strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">Please store this email carefully.</strong><br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;"><br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
		<strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">Regards,</strong><br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;"><br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
		<strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">MIT AOE</strong>
            </div>
            </body>
            </html>';
            $headers = 'From: sourabhjagtap95@gmail.com' . "\r\n" .
                'Reply-To: admin@attendance.com' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n" .
                'Content-Type: text/html; charset="utf-8"' . "\r\n";


            if (mail($to, $subject, $message, $headers)) {
                echo 'Email sent successfully!';
            } else {
                die('Failure: Email was not sent!');
            }
            /********************************Ending Mail*******************************************/
            mysql_query($query2);
            header('Location: teacher_data_entered.php');
            //}

        } else
            header('Location: teacher_data_not_entered.php');

    } else {
        header('Location: uid_name_error.php');
    }
}
else
{
    header('Location: captcha_error.php');
}

?>
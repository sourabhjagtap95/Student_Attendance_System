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

        body{
            background-image: url(bg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .row{
            text-align: center;
        }
        .well
        {
            text-align: center;
            width: auto;
        }
        .container
        {
            width: 750px;
        }
        .col-md-4
        {
            margin-top: 200px;
        }

    </style>
</head>
<body>

<?php
$username = $_SESSION['CurrentUser'];
$conn = mysqli_connect("localhost","root","","project_new");
$result = mysqli_query($conn,"SELECT * FROM teacher_record WHERE username='$username'") or die(mysqli_errno($conn));
$row = mysqli_fetch_array($result);
?>

<div class="container">
    <div class="well">
        <form class="form-horizontal" role="form">
            <legend>
                <strong>
                    <h2>Your Profile Details</h2>
                </strong>
            </legend>
            <fieldset>
                <div class="well">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="firstname">First Name:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="firstname" disabled value="<?php echo $row[2]; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="lastname">Last Name:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="lastname" disabled value="<?php echo $row[3]; ?>">
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="well">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="username">User Name:</label>
                        <div class="col-sm-6">
                            <?php
                            echo '<input type="text" class="form-control" id="username" disabled value="'.$username.'"> ';
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email-ID:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="email" disabled value="<?php echo $row[6]; ?>">
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="well">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="mobile">Mobile:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="mobile" disabled value="<?php echo $row[7]; ?>">
                        </div>
                    </div>
            </fieldset>
            <a href="teacher_passwd_change.php" class="btn btn-info btn-lg" >Change Password</a>
        </form>
    </div>
</div>
</body>
</html>

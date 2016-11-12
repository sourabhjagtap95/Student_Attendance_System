<?php

require_once('header_after_login.php');
require_once('authentication.php');

if(!checkLogin()){
	header('Location: home.php');
      //echo "out"; die();
}
?>
<style type="text/css">
body{
    text-align: center;

}
body{
                background-image: url(bg.jpg);
                background-repeat: no-repeat;
                background-size: cover;
        }
.well
 {
    text-align: center;
 }
 table.table-condensed
 {
     margin-left: auto;
     margin-right: auto;
 }
</style>

    <div class="container">
    <br><br><br><br><br><br>
    <div class="row">
        <div class="col-md-4">
            <a href="attendance.php"><div class="well">
            <img src="attendance.png" class="img-circle"><br><br>
            <b>ENTER ATTENDANCE</b>
            </div></a>
        </div>
        <div class="col-md-4">
            <a href="view_attendance.php"><div class="well">
            <img src="attendance_record.png" class="img-circle"><br><br>
            <b>VIEW ATTENDANCE</b>
            </div></a>
        </div>
        <div class="col-md-4">
            <a href="subject_details.php"><div class="well">
            <img src="subject_details.png" class="img-circle"><br><br>
            <b>YOUR SUBJECT DETAILS</b>
            </div></a>
        </div>
    </div>
    </div>

</body>
</html>

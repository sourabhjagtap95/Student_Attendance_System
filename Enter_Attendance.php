<?php
//session_start();
require_once('header_after_login.php');
require_once('authentication.php');
if(!checkLogin()){
    header('Location: home.php');
}
?>
    <style type="text/css">
        .logo img{
            display: block;
            margin-left: auto;
            margin-right: auto;
            height: 50px;
            width: 50px;
        }
        p 
        {
        	text-align: center;	
        	font-size: 50px;
        	font: Arial;
        }
        .login{
        height: 50px;
        text-align: center;
        font-size: 20px;
        color:green;
    }
    .card
    {
        width: auto;
        height: auto;
    }
    .form
    {
        background-color: #fff;
        border-radius: 5px;
        margin: 0 auto 25px;
        width: 600px;
        text-align: center;
        padding: 20px 20px 30px;
        box-shadow: 1px 1px 10px black;
    }
    fieldset { 
    display: block;
    margin-left: 2px;
    margin-right: 2px;
    padding-top: 1em;
    padding-bottom: 5em;
    padding-left: 0.75em;
    padding-right: 0.75em;
    font-family: inherit;
}
body{
                background-image: url(bg.jpg);
                background-repeat: no-repeat;
                background-size: cover;
        }
    </style>
</head>
<body>
<div class="container">
    <br><p><strong>Enter Attendance</strong></p><br>
    <div class="container">
        <form class="form-inline" role="form" action="submit_attendance.php" method="POST">
        <fieldset>
            <legend>
                <strong>Select Date and Time:</strong>
            </legend>
                        <select id="text-fields" class="form-control" name="date" required>
                                <option disabled selected value="blank">Date</option>
                                <?php
                                    for($i=1;$i<32;$i++)
                                    {
                                    echo "<option name='$i'>$i</option>";  
                                    }       
                                ?>
                            </select>
                             <select id="text-fields" class="form-control" name="month" required>
                                <option disabled selected value="blank1">Month</option>
                                <option name="JAN">January</option>
                                <option name="FEB">February</option>
                                <option name="MAR">March</option>
                                <option name="APR">April</option>
                                <option name="MAY">May</option>
                                <option name="JUNE">June</option>
                                <option name="JULY">July</option>
                                <option name="AUG">August</option>
                                <option name="SEP">September</option>
                                <option name="OCT">October</option>
                                <option name="NOV">November</option>
                                <option name="DEC">December</option>
                            </select>
                            <input type="text" class="form-control" placeholder="2015" disabled>
                            <select class="form-control" name="time">
                                <option value="p1">8:35 AM-9:30 AM</option>
                                <option value="p2">9:30 AM-10:25 AM</option>
                                <option value="p3">10:35 AM-11:30 AM</option>
                                <option value="p4">11:30 AM-12:25 PM</option>
                                <option value="p5">1:15 PM-2:05 PM</option>
                                <option value="p6">2:05 PM-2:55 PM</option>
                                <option value="p7">3:05 PM-3:55 PM</option>
                                <option value="p8">3:55 PM-4:45 PM</option>
                            </select>
        </fieldset>

             <?php
            
                $server = mysql_connect("localhost","root", "");
                 mysql_select_db("project_new",$server);

              if (isset($_POST['theory_a']))
              {
                $th_id_a = $_POST['theory_a'];
                  echo '<input name="subject" type="hidden" value="'.$_POST['theory_a'].'">';

//                $_SESSION['division_for_attendance']="A";
                echo '<input name="division_a" type="hidden"></input>';
                $th_a = mysql_query("select * from studentinfo where division='A'");
              
                echo "<div class='table-responsive'>";
                echo "<table class='table table-hover table-bordered' style='width:1000px; margin:auto; margin-bottom:100px;'>";
                echo "<tr>";
                echo "<td>RollNo</td>";
                echo "<td>Firstname</td>";
                echo "<td>Lastname</td>";
                echo "<td>Year</td>";
                echo "<td>Division</td>";
                //echo "<td>Batch</td>";
                echo "<td>Give Attendance</td>";
                echo "</tr>";
                while ($row = mysql_fetch_array($th_a)) 
                {  
                   echo "<tr>";
                   echo "<td>".$row['rollno']."</td>";
                   echo "<td>".$row['firstname']."</td>";
                   echo "<td>".$row['lastname']."</td>";
                   echo "<td>".$row['year']."</td>";
                   echo "<td>".$row['division']."</td>";
                   //echo "<td>".$row['batch']."</td>";
                   echo "<td><input type='checkbox' name='presentee[]' value='".$row['rollno']."'/>&nbsp;PRESENT</td>";
                   echo "<td style='display: none;'><input type='checkbox' name='rollnoofall[]' value='".$row['rollno']."' checked style='display: none;'/></td>";

                   echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
              }
              
              elseif (isset($_POST['theory_b']))
              {
                $th_id_b = $_POST['theory_b'];
//                $_SESSION['division_for_attendance']="B";
                  echo '<input name="subject" type="hidden" value="'.$_POST['theory_b'].'">';
                  echo '<input name="division_b" type="hidden"></input>';
                $th_b = mysql_query("select * from studentinfo where division='B'");
              
                echo "<div class='table-responsive'>";
                echo "<table class='table table-hover table-bordered' style='width:1000px; margin:auto; margin-bottom:100px;''>";
                echo "<tr>";
                echo "<td>RollNo</td>";
                echo "<td>Firstname</td>";
                echo "<td>Lastname</td>";
                echo "<td>Year</td>";
                echo "<td>Division</td>";
                //echo "<td>Batch</td>";
                echo "<td>Give Attendance</td>";
                echo "</tr>";
                while ($row = mysql_fetch_array($th_b)) 
                {  
                   echo "<tr>";
                   echo "<td>".$row['rollno']."</td>";
                   echo "<td>".$row['firstname']."</td>";
                   echo "<td>".$row['lastname']."</td>";
                   echo "<td>".$row['year']."</td>";
                   echo "<td>".$row['division']."</td>";
                  // echo "<td>".$row['batch']."</td>";
                   echo "<td><input type='checkbox' name='presentee[]' value='".$row['rollno']."'>&nbsp;PRESENT</td>";
                    echo "<td style='display: none;'><input type='checkbox' name='rollnoofall[]' value='".$row['rollno']."' checked style='display: none;'/></td>";
                   echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
              }
               elseif (isset($_POST['batch'])&&!empty($_POST['batch']))
              {
                $pr_a = mysql_query("select * from studentinfo where batch='".$_POST['batch']."'");
//                  $_SESSION['batch']  = $_POST['batch'];
                 echo '<input name="practical_name" type="hidden" value="'.$_POST['practical_name'].'">';
                      echo '<input name="batch_name" type="hidden" value="'.$_POST['batch'].'">';
                echo "<div class='table-responsive'>";
                echo "<table class='table table-hover table-bordered' style='width:1000px; margin:auto; margin-bottom:100px;'>";
                echo "<tr>";
                echo "<td>RollNo</td>";
                echo "<td>Firstname</td>";
                echo "<td>Lastname</td>";
                echo "<td>Year</td>";
                echo "<td>Division</td>";
                echo "<td>Batch</td>";
                echo "<td>Give Attendance</td>";
                echo "</tr>";
                while ($row = mysql_fetch_array($pr_a)) 
                {  
// echo '<pre>'; print_r($row); echo '</pre>';
                   echo "<tr>";
                   echo "<td>".$row['rollno']."</td>";
                   echo "<td>".$row['firstname']."</td>";
                   echo "<td>".$row['lastname']."</td>";
                   echo "<td>".$row['year']."</td>";
                   echo "<td>".$row['division']."</td>";
                   echo "<td>".$row['batch']."</td>";

                   echo "<td><input type='checkbox' name='presentee[]' value='".$row['rollno']."'/>&nbsp;PRESENT</td>";
                   echo "<td style='display: none;'><input type='checkbox' name='rollnoofall[]' value='".$row['rollno']."' checked style='display: none;'/></td>";
                   echo "</tr>";
                }
                echo "</table>";
                echo "</div>";

              }
            ?>
<div class="text-center">

            <button type="submit" class="btn btn-success btn-lg" style=" margin-top: -50px;" data-toggle="modal" data-target="#myModal">Submit</button>


</div>
</form>
   </div>
</div>
  </body>
</html>

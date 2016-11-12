<?php
require_once('header_after_login.php');
  require_once('authentication.php');
// session_start();
    if(!checkLogin())
    {
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
     p 
        {
            text-align: center; 
            font-size: 50px;
            font: Arial;
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
    select{
        font-family: Arial;
        font-weight: bold;
    }
</style>

</head>
<body>
<div class="container">
    <br><p><strong>View Attendance</strong></p><br>
<form class="form-inline" role="form" name="view_attendance" method="POST" action="view_attendance.php">
<div class="container ">
    <div class="text-center">
<fieldset>
    <legend>
            <strong>Select Division,Batch,Subject and Month:</strong>
    </legend>
    
    <select name="division" class="form-control" id="text-fields" required>
    <option disabled selected value="">Divsion</option>
    <option name="A" value="A">Division A</option>
    <option name="B" value="B">Division B</option>
    </select>

    <select name="batch" class="form-control" id="text-fields" >
    <option disabled selected value="">Batch</option>
    <option name="A" value="A">A</option>
    <option name="B" value="B">B</option>
    <option name="C" value="C">C</option>
    <option name="D" value="D">D</option>
    <option name="E" value="E">E</option>
    <option name="F" value="F">F</option>
    <option name="G" value="G">G</option>
    <option name="H" value="H">H</option>

    </select>

    <select class="form-control" id="subjects" name="subjects" required>
    <option selected disabled value="">Select from the list</option>
    <option value="1">Theory Of Computation  (TOC)</option>
    <option value="2">Database Management System And Administration  (DMSA)</option>
    <option value="3">Data Communication And Wireless Sensors Networks  (DCWSN)</option>
    <option value="4">Computer Forensic And Cyber Applications  (CFCA)</option>
    <option value="5">Operating System And Design  (OSD)</option>
    <option value="6">Employability Development Skills Lab  (ESDL)</option>
    <option value="7">Programming Lab 1  (PL-I)</option>
    <option value="8">Programming Lab 2  (PL-II)</option>
    </select>

    <select id="text-fields" class="form-control" name="month" required>
    <option disabled selected value="">Month</option>
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
    <button type="submit" style="margin-left:50px;" class="btn btn-primary" value="submit" name="submit" >SUBMIT</button>
</fieldset>
        </div>
</div>

<?php
            
        $server = mysql_connect("localhost","root", "");
        mysql_select_db("project_new",$server);

        if (isset($_POST['submit']))
        {

             $subid = $_POST['subjects'];


           if($_POST['division'] == 'A')
            {
                $th_a = mysql_query("select * from studentinfo where division='A'");
                echo "<div class='text-center'>";
                echo "<legend><strong><h3>Year: T.E &nbsp;&nbsp;&nbsp;&nbsp;Division : A &nbsp;&nbsp;&nbsp;&nbsp; Month: ".$_POST['month']."</h3></strong></legend>";
                echo "</div>";
                echo "<div class='table-responsive' >";
                echo "<table class='table table-hover table-bordered' style='width:auto; margin:auto; margin-bottom:100px; border: 2px solid black;'>";
                  echo "<tr>";
                  echo "<th colspan='3' style='text-align: center;'>Student Details</th>";
                  echo "<th colspan='33' style='text-align: center;'>Dates</th>";
                  echo "</tr>";
                echo "<tr>";
                echo "<th style='width:1px;'>RollNo</th>";
                echo "<th style='width:1px;'>Firstname</th>";
                echo "<th style='width:1px;'>Lastname</th>";

                for ($i=1; $i < 32; $i++) {
                  echo "<th>".$i."</th>";
                }
                echo "<th>Total No. of Lectures</th>";
                  echo "<th>Average in %</th>";
                echo "</tr>";
                    $query= "SELECT * FROM attendance_theory_a INNER JOIN studentinfo ON
                            attendance_theory_a.rollno=studentinfo.rollno where
                            studentinfo.division='A' AND attendance_theory_a.subject = $subid";
                    $executed = mysql_query($query);
                    $rows = mysql_fetch_array($executed);

                while ($row = mysql_fetch_array($th_a))
                {
                    $count_p = 0;
                    $count_a = 0;
                   echo "<tr>";
                   $rollno = $row['rollno'];
                   echo "<td>".$row['rollno']."</td>";
                   echo "<td>".$row['firstname']."</td>";
                   echo "<td>".$row['lastname']."</td>";
                   for ($i=1; $i < 32; $i++) 
                   {
                        if($subid <5)
                                $query = "SELECT status FROM `attendance_theory_a` WHERE present_month = '".$_POST['month']."' AND present_date='".$i."' AND rollno=".$rollno." AND subject=$subid ";
                        else
                                $query = "SELECT status FROM `attendance_practical` WHERE present_month = '".$_POST['month']."' AND present_date='".$i."' AND rollno=".$rollno." AND subject=$subid AND batch='".$_POST['batch']."'";
                       $executed = mysql_query($query);
                       $rows = mysql_fetch_array($executed);
                       if(!empty($rows)){

                           if($rows[0]=='p')
                           {
//                               echo "<td >".'<font style="color:green;">P</font>'."</td>";
                                   $count_p++;
                               echo "<td>".$count_p."</td>";

                           }
                           else
                           {
                               echo "<td >".'<font style="color:red;">A</font>'."</td>";
                               $count_a++;
                           }

                       }else{
                           echo "<td >"."-"."</td>";
                       }
                    }

                    $total = $count_a + $count_p;
                    echo "<td>".$total."</td>";
                    if($total!=0)
                    {
                        if(round((($count_p/$total)*100))<75)
                            echo "<td><font style='color: red;' >".round((($count_p/$total)*100))."</font></td>";
                        else
                            echo "<td><font style='color: green;' >".round((($count_p/$total)*100))."</font></td>";
                    }
                    else
                    {
                        echo "<td><font style='color: red;' >".round(0)."</font></td>";
                    }
                   echo "</tr>";
                }
        }

            if($_POST['division'] == 'B')
            {
                $th_b = mysql_query("select * from studentinfo where division='B'");
                echo "<div class='text-center'>";
                echo "<legend><strong><h3>Year: T.E &nbsp;&nbsp;&nbsp;&nbsp;Division : B &nbsp;&nbsp;&nbsp;&nbsp; Month: ".$_POST['month']."</h3></strong></legend>";
                echo "</div>";
                echo "<div class='table-responsive' >";
                echo "<table class='table table-hover table-bordered' style='width:auto; margin:auto; margin-bottom:100px; border: 2px solid black;'>";
                  echo "<tr>";
                  echo "<th colspan='3' style='text-align: center;'>Student Details</th>";
                  echo "<th colspan='33' style='text-align: center;'>Dates</th>";
                  echo "</tr>";
                echo "<tr>";
                echo "<th style='width:1px;'>RollNo</th>";
                echo "<th style='width:1px;'>Firstname</th>";
                echo "<th style='width:1px;'>Lastname</th>";

                for ($i=1; $i < 32; $i++) {
                  echo "<th>".$i."</th>";
                }
                echo "<th>Total No. of Lectures</th>";
                  echo "<th>Average in %</th>";
                echo "</tr>";
                    $query= "SELECT * FROM attendance_theory_b INNER JOIN studentinfo ON
                            attendance_theory_b.rollno=studentinfo.rollno where
                            studentinfo.division='B' AND attendance_theory_b.subject = $subid";
                    $executed = mysql_query($query);
                    $rows = mysql_fetch_array($executed);

                while ($row = mysql_fetch_array($th_b))
                {
                    $count_p = 0;
                    $count_a = 0;
                   echo "<tr>";
                   $rollno = $row['rollno'];
                   echo "<td>".$row['rollno']."</td>";
                   echo "<td>".$row['firstname']."</td>";
                   echo "<td>".$row['lastname']."</td>";
                   for ($i=1; $i < 32; $i++) 
                   {
                        if($subid <5)
                                $query = "SELECT status FROM `attendance_theory_b` WHERE present_month = '".$_POST['month']."' AND present_date='".$i."' AND rollno=".$rollno." AND subject=$subid ";
                        else
                                $query = "SELECT status FROM `attendance_practical` WHERE present_month = '".$_POST['month']."' AND present_date='".$i."' AND rollno=".$rollno." AND subject=$subid AND batch='".$_POST['batch']."'";
                       $executed = mysql_query($query);
                       $rows = mysql_fetch_array($executed);
                       if(!empty($rows)){

                           if($rows[0]=='p')
                           {
//                               echo "<td >".'<font style="color:green;">P</font>'."</td>";
                                   $count_p++;
                               echo "<td>".$count_p."</td>";

                           }
                           else
                           {
                               echo "<td >".'<font style="color:red;">A</font>'."</td>";
                               $count_a++;
                           }

                       }else{
                           echo "<td >"."-"."</td>";
                       }
                    }

                    $total = $count_a + $count_p;
                    echo "<td>".$total."</td>";
                    if($total!=0)
                    {
                        if(round((($count_p/$total)*100))<75)
                            echo "<td><font style='color: red;' >".round((($count_p/$total)*100))."</font></td>";
                        else
                            echo "<td><font style='color: green;' >".round((($count_p/$total)*100))."</font></td>";
                    }
                    else
                    {
                        echo "<td><font style='color: red;' >".round(0)."</font></td>";
                    }
                   echo "</tr>";
                
                }


                echo "</table>";
                echo "</div>";
        }
    }

?>

</form>
</body>
</html>


<?php
//session_start();
require_once('header_after_login.php');
require_once('authentication.php');
if(!checkLogin()){
	header('Location: home.php');
}
?>
    <style type="text/css">
body{
                background-image: url(bg.jpg);
                background-repeat: no-repeat;
                background-size: cover;
        }
    </style>
</head>
<body>
<?php
    $date = $_POST['date'];
    $month = $_POST['month'];
    //$year = $_POST['year'];
    $time = $_POST['time'];
    
    $conn = mysql_connect("localhost","root","");
    mysql_select_db("project_new",$conn);

    //$subject = '';

   if(isset($_POST['subject'])){
       $th_a = mysql_query("select * from subjects_theory where sub_name='".$_POST['subject']."'");
       $row = mysql_fetch_array($th_a);
       $subject = $row[0];
//       echo $subject; die();
   }elseif(isset($_POST['practical_name'])){
       $pr_a = mysql_query("select * from subjects_practical where sub_name='".$_POST['practical_name']."'");
       $row = mysql_fetch_array($pr_a);
       $subject = $row[0];
//       echo $subject; die();

   }
    //echo $subject; die();
    function checkexists($value_arr, $rollno){
        foreach($value_arr as $val2){
            if($val2 == $rollno){
            return true;
            }
        }
        return false;
    }

    if(isset($_POST['rollnoofall']))
    {
        $value_arr = $_POST['presentee'];
        $value_arr2 = $_POST['rollnoofall'];
        foreach($value_arr2 as $val){

            if(checkexists($value_arr, $val))
            {
                $status = 'p';
            }else{
                $status = 'a';
            }

            if(isset($_POST['division_a']))
            {
                $query="insert into attendance_theory_a values('".$val."','$subject','$date','$month','$time','$status')";
                mysql_query($query) or die(mysql_error($conn));
            }
            elseif(isset($_POST['division_b']))
            {
                $query1="insert into attendance_theory_b values('".$val."','$subject','$date','$month','$time','$status')";
                mysql_query($query1) or die(mysql_error($conn));
            }

               elseif(isset($_POST['batch_name']))
                {
                    $batch = $_POST['batch_name'];
//                    echo strtolower($batch);
                    $query1="insert into attendance_practical values('".$val."','$subject','$date','$month','$time','$status','$batch')";
//                    echo "insert into attendance_practical_".strtolower($batch)." values('".$val."','$subject','$date','$month','$time','$status')";
                    mysql_query($query1) or die(mysql_error($conn));
                }
            }

    }
    header('Location: attendance_entered.php')
        
?>
</body>
</html>

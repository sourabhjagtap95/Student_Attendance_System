<?php
//session_start();
require_once('authentication.php');
if(!checkLogin()){
    header('Location: home.php');
}
$tid = $_SESSION['tid'];

/*for division A*/
$th_id_a = $_POST['theory_a'];
$practical_id_a = $_POST['practical_a'];
$batch_arr_a=$_POST['batch_a'];
$batch_a=implode(",",$batch_arr_a);
//echo "theory:" .$th_id_a;
//echo "practical:" .$practical_id_a;


//connecting to database
$conn = mysql_connect("localhost","root","");
mysql_select_db("project_new",$conn);

$query_theory_a = "update loadinfo_a set sub_th_id='$th_id_a' where tid='$tid'";
mysql_query($query_theory_a);

$query_practical_a = "update loadinfo_a set sub_pr_id='$practical_id_a' where tid='$tid'";
mysql_query($query_practical_a);

$query_batch_a = "update loadinfo_a set batch='$batch_a' where tid='$tid'";
mysql_query($query_batch_a);

$_SESSION['theory_a']= $th_id_a;

$_SESSION['practical_a']= $practical_id_a;

$_SESSION['batch_a']= $batch_a;



header('Location: subject_details.php');


/*Goto Next Page*/


	
?>
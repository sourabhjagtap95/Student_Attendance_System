<?php
//session_start();
require_once('authentication.php');
if(!checkLogin()){
    header('Location: home.php');
}
$tid = $_SESSION['tid'];



/*for division B*/
$th_id_b = $_POST['theory_b'];
$practical_id_b = $_POST['practical_b'];
$batch_arr_b=$_POST['batch_b'];
$batch_b=implode(",",$batch_arr_b);

//connecting to database
$conn = mysql_connect("localhost","root","");
mysql_select_db("project_new",$conn);



$query_theory_b = "update loadinfo_b set sub_th_id='$th_id_b' where tid='$tid'";
mysql_query($query_theory_b);

$query_practical_b = "update loadinfo_b set sub_pr_id='$practical_id_b' where tid='$tid'";
mysql_query($query_practical_b);

$query_batch_b = "update loadinfo_b set batch='$batch_b' where tid='$tid'";
mysql_query($query_batch_b);


$_SESSION['theory_b']= $th_id_b;

$_SESSION['practical_b']= $practical_id_b;

$_SESSION['batch_b']= $batch_b;


header('Location: subject_details.php');


/*Goto Next Page*/


	
?>
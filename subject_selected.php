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

$query_a = "insert into loadinfo_a(tid,sub_th_id,sub_pr_id,batch) values('$tid','$th_id_a','$practical_id_a','$batch_a')";
// echo $query_a;
mysql_query($query_a);


/*for division B*/
$th_id_b = $_POST['theory_b'];
$practical_id_b = $_POST['practical_b'];
$batch_arr_b=$_POST['batch_b'];
$batch_b=implode(",",$batch_arr_b);
//echo "theory:" .$th_id_b;
//echo "practical:" .$practical_id_b;

$query_b = "insert into loadinfo_b(tid,sub_th_id,sub_pr_id,batch) values('$tid','$th_id_b','$practical_id_b','$batch_b')";
//echo $query_b;

$_SESSION['theory_a']= $th_id_a;
$_SESSION['theory_b']= $th_id_b;
$_SESSION['practical_a']= $practical_id_a;
$_SESSION['practical_b']= $practical_id_b;
$_SESSION['batch_a']= $batch_a;
$_SESSION['batch_b']= $batch_b;

if(mysql_query($query_b))
	header('Location: teachers_main.php');



/*Goto Next Page*/


	
?>

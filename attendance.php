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
<?php
$conn = mysqli_connect("localhost","root","","project_new");
 if(isset($_SESSION['CurrentUser']))
 $tid = $_SESSION['tid'];

$th_id_a=mysql_query("select sub_th_id from loadinfo_a where loadinfo_a.tid='$tid'");
echo $th_id_a;

$executed_for_a = mysqli_query($conn,"select sub_th.sub_name,sub_pr.sub_name,batch from subjects_theory as sub_th,subjects_practical as sub_pr,loadinfo_a
                where loadinfo_a.sub_th_id=sub_th.sub_th_id and loadinfo_a.sub_pr_id=sub_pr.sub_pr_id and loadinfo_a.tid='$tid'") or die(mysqli_error($conn));
$rows_for_a = mysqli_fetch_array($executed_for_a);
$sub_th_name_a = $rows_for_a[0];      /*Theory Subjects For Div A*/
$sub_pr_name_a = $rows_for_a[1];      /*Practicals For Div A*/

if(!empty($rows_for_a[2])){
    $batches_a = $rows_for_a[2];            //Batch for Div A
    $batch_a=explode(",",$batches_a);
}


$executed_for_b = mysqli_query($conn,"select sub_th.sub_name,sub_pr.sub_name,batch from subjects_theory as sub_th,subjects_practical as sub_pr,loadinfo_b
                where loadinfo_b.sub_th_id=sub_th.sub_th_id and loadinfo_b.sub_pr_id=sub_pr.sub_pr_id and loadinfo_b.tid='$tid'") or die(mysqli_error($conn));
$rows_for_b = mysqli_fetch_array($executed_for_b);
$sub_th_name_b = $rows_for_b[0];      /*Theory Subjects For Div B*/
$sub_pr_name_b = $rows_for_b[1];     /*Practicals For Div B*/
$batches_b = $rows_for_b[2];            /*Batch for Div B*/
$batch_b=explode(",",$batches_b);

?>
<div class="container">
    <br><p><strong>Enter Attendance</strong></p><br>
</div>
<div class="form">
   
<form action="Enter_Attendance.php" method="POST" name="attendance" class="form-horizontal">
	  <fieldset>
		    <legend><strong>Division A</strong> </legend>
		    <label><strong><h4><b>Your subject : </b></h4></strong></label>
        <label>
             <input type="submit" name="theory_a" class="btn btn-primary" style="margin-left:50px;" value="<?php echo "$sub_th_name_a";?>"/>
        </label>
     	  <br>
        <label><strong><h4 style='margin-top:50px;'><b>Your Practical : </b></h4></strong></label>
        <label>
               <input type='text' size="10" style='margin-left:34px; margin-top:20px; ' name='practical_a' required disabled='' class='form-control' value='<?php echo "$sub_pr_name_a"; ?>'/>
        </label> <br>
        <label><strong><h4 style="margin-top:40px;"><b>Select Your Batch : </b></h4></strong></label>
        <?php 
          if($batch_a && count($batch_a)>0)
          {

              echo "<div class='dropdown' style='margin-left:180px; margin-top:-30px;'>";
//
          $i=0;
          while($i<count($batch_a))
          {
              //echo "<li name='b' id='".$batch_a[$i]."'>".$batch_a[$i]."</li>";

              echo '<form action="Enter_Attendance.php" method="POST"> <input type="hidden" name="practical_name" value="'.$sub_pr_name_a.'"> <input type="hidden" name="batch" value="'.$batch_a[$i].'"><input type="submit" style="margin:0px 10px 10px 2px;" class="btn btn-primary" value="'.$batch_a[$i].'"> </form>';

              $i+=1;
          }
           //echo "</ul>";
            echo "</div>";
            //echo "<input type='text' id='demo'/>";
          }


        ?>
         </fieldset>
    </form>

    <fieldset>
    <form action="Enter_Attendance.php" method="POST" name="attendance" class="form-horizontal">
      <legend><strong>Division B</strong> </legend>
		  <label><strong><h4><b>Your subject : </b></h4></strong></label>
		  <label>
          <input type="submit" name="theory_b" class="btn btn-primary" style="margin-left:50px;" value="<?php echo "$sub_th_name_b";?>"/>
      </label>
    </form>
    	<br>

      <label><strong><h4><b>Your Practical : </b></h4></strong></label>
			
      <label>
        
            <input type='text' size="10" style='margin-left:34px; margin-top:20px; ' name='practical_b' required disabled='' class='form-control' value='<?php echo "$sub_pr_name_b"; ?>'/>
       
      </label>
      <br>	
      
       <label><strong><h4 style="margin-top:40px;"><b>Select Your Batch : </b></h4></strong></label>
        <?php 
        
          if($batch_b)
          {
              
              echo "<div class='dropdown' style='margin-left:180px; margin-top:-30px;'>";

            foreach ($batch_b as $batch){
                echo '<form action="Enter_Attendance.php" method="POST" class="form-inline">';
                echo '<div class="form-group">';
                echo "<input type='hidden' name='practical_name' value='".$sub_pr_name_b."'/>";
                echo '<input type="hidden" name="batch" value="'.$batch.'"><input type="submit" class="btn btn-primary form-control" style="margin:0px 10px 10px 2px;" value="'.$batch.'"> </form>';
            }   echo '</div>';


           //   echo "</ul>";
            echo "</div>";
          }

        ?>


    </fieldset>
</div>
</body>
</html>

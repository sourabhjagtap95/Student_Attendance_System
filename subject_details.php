<?php

  require_once('authentication.php');
// session_start();
   if(!checkLogin())
   {
      header('Location: home.php');
   }
require_once('header_after_login.php');
?>

<style type="text/css">
.container #heading
{
  font-size: 30px;

}
body{
                background-image: url(bg.jpg);
                background-repeat: no-repeat;
                background-size: cover;
        }
</style>
    <div class="container">
    <br><center><strong><p id="heading">Your Subject Details</p></strong></center><br>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <div class="well">
                <?php
                 //session_start();
                    $conn = mysqli_connect("localhost","root","","project_new");
                    if(isset($_SESSION['CurrentUser']))
                    //     echo $_SESSION['CurrentUser'];
                    // echo $_SESSION['tid'];
                    $tid = $_SESSION['tid'];
                    $executed_for_a = mysqli_query($conn,"select sub_th.sub_name,sub_pr.sub_name ,batch from subjects_theory as sub_th,subjects_practical as sub_pr,loadinfo_a
                                         where loadinfo_a.sub_th_id=sub_th.sub_th_id and loadinfo_a.sub_pr_id=sub_pr.sub_pr_id and loadinfo_a.tid='$tid'") or die(mysqli_error($conn));
                    $rows_for_a = mysqli_fetch_array($executed_for_a);
                    $sub_th_name_a = $rows_for_a[0];      /*Theory Subjects For Div A*/
                    $sub_pr_name_a = $rows_for_a[1];      /*Practicals For Div A*/
                    $batches_a = $rows_for_a[2];            /*Batch for Div A*/
                    $batch_a=explode(",",$batches_a);

                    $executed_for_b = mysqli_query($conn,"select sub_th.sub_name,sub_pr.sub_name,batch from subjects_theory as sub_th,subjects_practical as sub_pr,loadinfo_b
                                           where loadinfo_b.sub_th_id=sub_th.sub_th_id and loadinfo_b.sub_pr_id=sub_pr.sub_pr_id and loadinfo_b.tid='$tid'") or die(mysqli_error($conn));
                    $rows_for_b = mysqli_fetch_array($executed_for_b);
                    $sub_th_name_b = $rows_for_b[0];      /*Theory Subjects For Div B*/
                    $sub_pr_name_b = $rows_for_b[1];      /*Practicals For Div B*/
                    $batches_b = $rows_for_b[2];            /*Batch for Div B*/
                    $batch_b=explode(",",$batches_b);
                    //echo "theory name:" .$sub_th_name. "practical name:" .$sub_pr_name; 
  ?>
 <form class="form-horizontal">
          <fieldset>
              <legend>
              <strong><p align="center">Division A:</p></strong>
              </legend>
              <div class="form-group">
                  <label for='sub_th_a' class='col-sm-2 control-label' style="margin-left:80px;">Theory Subjects:</label>
                  <div class='col-sm-6'>
  <?php
  echo "<input type='text' class='form-control' id='sub_th_a' disabled value='$sub_th_name_a'>";
  ?>
                  </div>
              </div>
              <div class="form-group">
                  <label for='sub_pr_a' class='col-sm-2 control-label' style="margin-left:80px;">Practicals:</label>
                  <div class='col-sm-6'>
  <?php
  echo "<input type='text' class='form-control' id='sub_pr_a' disabled value='$sub_pr_name_a'>";
  ?>
                  </div>
              </div>
              <div class="form-group">
                  <label for='batch_a' class='col-sm-2 control-label' style="margin-left:80px;">Batch:</label>
                  <div class='col-sm-6'>
  <?php
 foreach ($batch_a as $batch) 
  {
    echo "<input type='text' class='form-control' id='batch' disabled value='$batch' style='margin-top:5px; width:100px;'/>";
  }
  ?>
                  </div>
              </div>
              <div class="text-right">
              <a href="subject_change_a.php" class="btn btn-info btn-lg" >Change Subjects </a>
            </div>
             </fieldset>
               <fieldset style="margin-top:50px;">
              <legend>
              <strong><p align="center" >Division B:</p></strong>
              </legend>
              <div class="form-group">
                  <label for='sub_th_b' class='col-sm-2 control-label' style="margin-left:80px;">Theory Subjects:</label>
                  <div class='col-sm-6'>
  <?php
  echo "<input type='text' class='form-control' id='sub_th_b' disabled value='$sub_th_name_b'>";
  ?>
                  </div>
              </div>
              <div class="form-group">
                  <label for='sub_pr_b' class='col-sm-2 control-label' style="margin-left:80px;">Practicals:</label>
                  <div class='col-sm-6'>
  <?php
  echo "<input type='text' class='form-control' id='sub_pr_b' disabled value='$sub_pr_name_b'>";
  ?>
                  </div>
                </div>
              <div class="form-group">
                  <label for='batch_b' class='col-sm-2 control-label' style="margin-left:80px;">Batch:</label>
                  <div class='col-sm-6'>
  <?php
 foreach ($batch_b as $batch) 
  {
    echo "<input type='text' class='form-control' id='batch' disabled value='$batch' style='margin-top:5px; width:100px;'/>";
  }
  ?>
                  </div>
              </div>
          </fieldset>
          <div class="text-right">
      <a href="subject_change_b.php" class="btn btn-info btn-lg" >Change Subjects </a>
  </div>
  </form>
  </div>
  </div>
  </div>
  </div>
  

<?php
require_once('header.php');
?>
    
    <style type="text/css">
	    	body{
	            background-image: url(bg.jpg);
	            background-repeat: no-repeat;
	            background-size: cover;
	        }
	        ul{
            	margin-top: 10px;
       		 }
       		 .nav-tabs{
            	border-bottom: 0px;
       		 }
	        p {
	        	text-align: center;	
	        	font-size: 20px;
	        	font: Arial;
	        	position: absolute;
			    top: 225px;
			    right: 50px;
	        }
	         .main_logo
        	{
           		position: absolute;
           		margin-top: 90px;
            	height: auto;
            	width: auto;
        	}
	        .well{
	        	box-shadow: 0 0 30px black;
	        }
	        
	   </style>    
</head>
<body>
<div class="container">
    <div class="row">
    <div class="col-md-3"></div>
     <div class="col-md-6">
      <div class="span4"></div>
      <div class="span4"><img src="mit_logo.png" class="main_logo" /></div>
      <div class="span4"></div>
      </div>
      <div class="col-md-3"></div>
    </div>
</div>


<div class="container">
<div class="col-md-4"></div>
<div class="col-md-4">
<p><strong>CREATE YOUR ACCOUNT AS</strong></p>
</div>
<div class="col-md-4"></div>
</div>
<div class="container">
	<div class="row">
    	<div class="col-md-4"></div>
     	<div class="col-md-4"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<div class="well">
				<form>
					<a class="btn btn-success btn-lg btn-block" href="student_sign_up.php">STUDENT</a><br>
					<a class="btn btn-primary btn-block btn-lg" href="teacher_sign_up.php">TEACHER</a>
				</form>
			</di
		</div>
		<div class="col-md-4"></div>
    </div>
</div>

</body>
</html>
<?php

 require_once('authentication.php');
//session_start();
 if(!checkLogin()){
     header('Location: Home.php');
 }
require_once('header_after_login.php');
?>

<style type="text/css">
body{
                background-image: url(bg.jpg);
                background-repeat: no-repeat;
                background-size: cover;
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
    select{
        font-family: Arial;
        font-weight: bold;
    }
   
    
</style>
</head>
<body>

<form role="form" action="subject_selected.php" method="post"> 
        <div class="form-group form">
        <div class="card">
                <legend>
                    <strong><label for="division_a">Division A:</label></strong>
                </legend>
            <fieldset>
                <legend>
                <strong><label for="theory_a">Select Your Theory Subjects:</label></strong>
            </legend>
                    <select class="form-control" id="theory_a" name="theory_a">
                    <option selected disabled>Select from the list</option>
                    <option value="1">Theory Of Computation</option>
                    <option value="2">Database Management System And Administration</option>
                    <option value="3">Data Communication And Wireless Sensors Networks</option>
                    <option value="4">Computer Forensic And Cyber Applications</option>
                    <option value="5">Operating System And Design</option>
                    </select>
            </fieldset>
            <fieldset>
                <legend>
                    <strong>
                        <label for="practical_a">Select Practicals:</label>
                    </strong>
                </legend>
                    <select class="form-control" id="practical_a" name="practical_a">
                    <option selected disabled>Select from the list</option>
                    <option value="6">ESDL</option>
                    <option value="7">Programming Lab 1</option>
                    <option value="8">Programming Lab 2</option>
                </select>
            </fieldset>
             <fieldset>
                <legend>
                    <strong>
                        <label for="batch_a">Select Your Batch: <small>(Hold <kbd>ctrl</kbd> to select multiple)</small></label>
                    </strong>
                </legend>
                <select multiple class="form-control" id="batch_a" name="batch_a[ ]">
                <option value="A">Batch A</option>
                <option value="B">Batch B</option>
                <option value="C">Batch C</option>
                <option value="D">Batch D</option>
                </select>
            </fieldset>
         
                <legend>
                    <strong><label for="theory_b">Division B:</label></strong>
                </legend>
           
            <fieldset>
                <legend>
                    <strong><label for="theory_b">Select Your Theory Subjects:</label></strong>
                </legend>
                    <select class="form-control" id="theory_b" name="theory_b">
                    <option selected disabled>Select from the list</option>
                    <option value="1">Theory Of Computation</option>
                    <option value="2">Database Management System And Administration</option>
                    <option value="3">Data Communication And Wireless Sensors Networks</option>
                    <option value="4">Computer Forensic And Cyber Applications</option>
                    <option value="5">Operating System And Design</option>
                    </select>
            </fieldset>
            <fieldset>
                <legend>
                    <strong>
                        <label for="practical_b">Select Practicals:</label>
                    </strong>
                </legend>
                    <select class="form-control" id="practical_b" name="practical_b">
                    <option selected disabled>Select from the list</option>
                    <option value="6">ESDL</option>
                    <option value="7">Programming Lab 1</option>
                    <option value="8">Programming Lab 2</option>
                </select>
            </fieldset>
            <fieldset>
                <legend>
                    <strong>
                        <label for="batch_b">Select Your Batch: <small>(Hold <kbd>ctrl</kbd> to select multiple)</small></label>
                    </strong>
                </legend>
                <select multiple class="form-control" id="batch_b" name="batch_b[ ]">
                <option value="E">Batch E</option>
                <option value="F">Batch F</option>
                <option value="G">Batch G</option>
                <option value="H">Batch H</option>
                </select>
            </fieldset>
            <button type="submit" class="btn btn-success btn-lg">SUBMIT</button>
            <button type="reset" class="btn btn-danger btn-lg">RESET</button>
        </div>
        </div>
</form>
</body>
</html>
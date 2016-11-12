<?php
require_once('header.php');
?>
    
<html>
<head>
    <style type="text/css">
        body
        {
            background:url(bg.jpg);
            background-color: #fff;
        }
        p 
        {
            text-align: center; 
            font-size: 25px;
            font-family: Arial;
        }
       #optionbuttons
        {
            text-align: center;
            
        }
        #optionbuttons button
        {
            margin:20px;
        }
        #cancel
        {
            text-decoration: none;
            color: white;
        }
        
      textarea
      {
        width:200%;
      }
        
    </style>

     <script type="text/javascript" >
         function reloadCaptcha()
         {
             img = document.getElementById('captcha');
             img.src = 'captcha.php';
         }

         function formValidation()
    {
       var date = document.student_registration.date;
       var month = document.student_registration.month;
       var year = document.student_registration.year;
       var division = document.student_registration.division;
       var username = document.student_registration.username;
       var firstname = document.student_registration.firstname;
       var lastname = document.student_registration.lastname;
       var password = document.student_registration.password;
       var confirm_password = document.student_registration.confirm_password;
       var email= document.student_registration.email;
       var mobile = document.student_registration.mobile;
       if(firstname_validation(firstname))
       {
          if(lastname_validation(lastname))
           {
               if(username_validation(username))
               {
                    if(password_validation(password))
                    {
                        if(check_pass(password,confirm_password))
                        {        
                            if(check_dob(date,month,year))
                            {    
                                if(check_class(division))
                                {          
                                    if(email_validation(email))
                                    {
                                        if(check_mobile(mobile))
                                        {
                                            return true;
                                        }
                                    }
                                                            
                                }                       
                            }                     
                        }
                      
                    }
                }
            }
        }
        return false;
    }
    
function firstname_validation(firstname)  
{  
    var format = /^[A-Za-z]+$/;
    if (firstname.value.match(format))  
    {  
        return true;  
    }  
    else
    {
        alert("First Name must be a valid name");  
        firstname.focus();  
        return false;
    }
}   

function lastname_validation(lastname)  
{  
    var format = /^[A-Za-z]+$/;
    if (lastname.value.match(format))  
    {  
        return true;  
    }  
    else
    {
        alert("Last Name must be a valid name");  
        lastname.focus();  
        return false;
    }
}

function username_validation(username)
{
    var format = /^[A-Za-z][A-Za-z0-9_@]{4,9}$/;
    var wrong = /^[0-9_@]+$/;
    if(username.value.match(wrong))
        {
            alert("User Name should start with atleast with one alphabet");
            username.focus();
            return false;
        }
     if(!username.value.match(format))
        {
            if(username.value.length>=5 && username.value.length<=10)
            { 
                var symformat = /^[_@]$/;
                if(!username.value.match(symformat))
                {
                    alert("User Name can contain only _ or @ symbols.");
                    username.focus();
                    return false;
                }
                
            }
            else
            {
                alert("User Name should be between 5 to 10 characters");
                username.focus();
                return false;
      
            }
        }
    else 
        {
            
            return true;
        }
}

function password_validation(password)  
{  
    var format = /^[A-Za-z0-9_@]{5,10}$/;
    if (!password.value.match(format))  
    {  
       if(password.value.length>=5 && password.value.length<=10)
        { 
            var symformat = /^[_@]$/;
            if(!password.value.match(symformat))
            {
                alert("Password can contain only _ or @ symbols.");
                password.focus();
                return false;
            }
                
        }
        else
        {
            alert("Password should be between 5 to 10 characters");
            password.focus();
            return false;
      
        }
    }  
    else
    {
            return true;  
    }
}

function check_pass(password,confirm_password)
{
    if(confirm_password.value == password.value)
        {
            return true;
        }
    else
        {
            alert("Passwords do not match.Check your Caps lock key.");
            confirm_password.focus();
            return false;
        }
}

function check_dob(date,month,year)
{
    if ( document.getElementsByName('date')[0].value == 'dateblank' )
    {
        alert("Please Select Birth Date");
        date.focus();
        return false;
    }
    
    else if ( document.getElementsByName('month')[0].value == 'monthblank' )
    {
        alert("Please Select Birth Month");
        month.focus();
        return false;
    }
    
    else if ( document.getElementsByName('year')[0].value == 'yearblank' )
    {
        alert("Please Select Birth Year");
        year.focus();
        return false;
    }
    return true;
}


function check_class(division)
{
  
   if ( document.getElementsByName('division')[0].value == 'blank4' )
    {
        alert("Please Select Division");
        division.focus();
        return false;
    }
    return true;
}

function email_validation(email)
{
//    var format = /^[a-z0-9._-]+@[a-z]+.[a-z.]{2,5}+$/;
    var format = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if(email.value.match(format))
    {
        return true;
    }
    else
    {
        alert("Enter a valid email address (e.g someone@example.com)");
        email.focus();
        return false;
    }
}

function check_mobile(mobile)
{
    var numbers=/^[0-9]{10}$/;
    var plus = /^(\+91-|\+91|0)?\d{10}$/;
    if(mobile.value.match(numbers) || mobile.value.match(plus))
    {
        return true;
    }
    else
    {
        alert('Mobile must be a valid number');
        mobile.focus();
        return false;
    }
}

    </script>

    
</head>
<body onload="document.student_registration.firstname.focus();">

    <div class="container">
    <br><br><p><strong>SIGN UP FORM FOR STUDENTS</strong></p><br>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <div class="well">

            <form name="student_registration" action="student_record.php" method="post" onSubmit="return formValidation()">
            <div class="form-element multi-field name" id="name">
                    <fieldset>
                        <legend>
                            <strong>Name</strong>
                        </legend>
                        <label>
                            <input type="text" name="firstname" id="text-fields" class="form-control" spellcheck="false" placeholder="First" onchange="return firstname_validation(firstname)" required/>
                        </label>
                        <label>
                            <input type="text" name="lastname" id="text-fields" class="form-control" spellcheck="false" placeholder="Last" onchange="return lastname_validation(lastname)" required/>
                        </label>
                    </fieldset>
                    <fieldset>
                        <legend>
                            <strong>Username</strong>
                        </legend>
                        <label>
                            <input type="text" name="username" id="text-fields" class="form-control" spellcheck="false" placeholder="User Name" onchange="return username_validation(username)" required/> 
                        </label> 
                    </fieldset>
                    <fieldset>
                        <legend>
                            <strong>Password</strong>
                        </legend>
                        <label>
                            <input type="password" name="password" id="text-fields" class="form-control" spellcheck="false" placeholder="Password" onchange="return password_validation(password)" required/>
                        </label> 
                       <label>
                            <input type="password" name="confirm_password" id="text-fields" class="form-control" spellcheck="false" placeholder="Confirm Password" onchange="return check_pass(password,confirm_password)" required/>
                        </label> 
                    </fieldset>
                    <fieldset>
                        <legend>
                            <strong>Date Of Birth</strong>
                        </legend>
                        <label>
                            <select id="text-fields" class="form-control" name="date" required>
                                <option disabled selected value="dateblank">Date</option>
                                <?php
                                    for($i=1;$i<32;$i++)
                                    {
                                    echo "<option name='$i'>$i</option>";  
                                    }     
                                ?>
                            </select>
                          </label>
                          <label>
                            <select id="text-fields" class="form-control" name="month" required>
                                <option disabled selected value="monthblank">Month</option>
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
                        </label> 
                          <label>
                              <select id="text-fields" class="form-control" name="year" required>
                                <option disabled selected value="yearblank">Year</option>
                                    <?php
                                     for($i=1960;$i<2016;$i++)
                                    {
                                    echo "<option name='$i'>$i</option>";  
                                    }  
                                    ?>
                              </select>
                          </label>
                    </fieldset>
                    <fieldset>
                        <legend>
                            <strong>Gender</strong>
                        </legend>
                        <div class="radio">
                            <label for="radio-id" class="radio-label"><input type="radio" name="gender" id="radio-id" class="radio" value="male" required><b>Male</b></label>
                            <label for="radio-id2" class="radio-label"><input type="radio" name="gender" id="radio-id2" class="radio" value="female" required><b>Female</b></label>  
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>
                            <strong>
                                Info
                            </strong>
                        </legend>
                        <label>
                            <select id="text-fields" class="form-control" name="classyear" required>
                                <option selected value="T.E">Third Year (T.E)</option>
                            </select>   
                        </label>
                        <label>
                            <select name="division" class="form-control" id="text-fields" required>
                                <option disabled selected value="blank4">Divsion</option>
                                <option name="A" value="A">Division A</option>
                                <option name="B" value="B">Division B</option>
                              
                            </select>
                        </label>
                        <label>
                                <input type="text" name="batch" class="form-control" id="text-fields" placeholder="Batch" required>
                            </label>
                            <label>
                                <input type="text" name="rollno" class="form-control" id="text-fields" placeholder="Roll No." required>
                            </label>
                    </fieldset>
                    <fieldset>
                        <legend>
                            <strong>Email-Id</strong>
                        </legend>
                        <label>
                            <input type="text" name="email" id="text-fields" class="form-control" spellcheck="false" placeholder="Email-id" onchange="return email_validation(email)" required>
                        </label> 
                    </fieldset>
                    <fieldset>
                        <legend>
                            <strong>Mobile</strong>
                        </legend>
                        <label>
                            <input type="text" name="mobile" id="text-fields" class="form-control" spellcheck="false" placeholder="Mobile Number" onchange="return check_mobile(mobile)" required>
                        </label> 
                    </fieldset>
                    <fieldset>
                        <legend>
                            <strong>Address</strong>
                        </legend>
                        <label>
                            <textarea placeholder="Address" name="address"></textarea>
                        </label> 
                        
                    </fieldset>
                <strong>Captcha</strong>
                </legend>
                <center><img id="captcha" name="captcha" src="captcha.php"/></center><br><br>
                <label>Enter the captcha here:</label>
                <input type="text" id="text-fields" style=" height:30px; width:200px;margin-right:10px;margin-left:10px;" spellcheck="false" name="captcha" required>
                <button type="button" class="btn btn-default" aria-label="Refresh">
                    <span class="glyphicon glyphicon-refresh" aria-hidden="true" onclick="reloadCaptcha();"></span>
                </button>

                </fieldset>
                </div>
                
                    <br>
                    <div class="button" id="optionbuttons">
                    <button type="submit" class="btn btn-success btn-lg">SUBMIT</button>
                    <button type="reset" class="btn btn-warning btn-lg">RESET</button>
                    <button type="cancel" class="btn btn-danger btn-lg"><a href="Sign_up_as.php" style="text-decoration:none; color:white;">CANCEL</a></button>    
                    </div>
                
                </div>
            </div>
            </div>
        </div>
        </form>



</body>
</html>
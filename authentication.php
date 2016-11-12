<?php
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'project_new');
define('HOST', 'localhost');

function setReporting()
{
    if (DEVELOPMENT_ENVIRONMENT == true) {
        error_reporting(E_ALL);
        ini_set('display_errors', 'On');
    } else {
        error_reporting(E_ALL);
        ini_set('display_errors', 'Off');
        ini_set('log_errors', 'On');
        ini_set('error_log', ROOT.DS.'appdata'.DS.'logs'.DS.'error.log');
    }
}


function attemptLogin($username, $password)
    {
        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        $sql = "SELECT * FROM login_info WHERE username = '$username'";
        
        $result = $conn->query($sql);
        

        if ($result->num_rows == 1) 
        {

            $sql = "SELECT * FROM login_info WHERE username = '$username'";
            $result = $conn->query($sql);
            $check = mysqli_fetch_array($result);
            //print_r($check[3]);
            if( $check[3] == 'T')
            {
                    $sql = "SELECT * FROM login_info WHERE username = '$username'";
                    $result = $conn->query($sql);
                    $row = mysqli_fetch_assoc($result);
                   //print_r($row);
                if ($row["password"]==md5($password)) 
                {

                    $_user_browser            = $_SERVER['HTTP_USER_AGENT'];
                    $_SESSION['id']           = $row["user_id"];
                    $_SESSION['CurrentUser']  = $username;
                    $passwordhash             = $row["password"];
                    $_SESSION['login_string'] = hash('sha512', $passwordhash.$_user_browser);
                    $_SESSION['person']       = "teacher";

                    $query = "select tid from teacher_record where username='$username'";
                    $result = $conn->query($query);
                    $row = $result->fetch_assoc();
                    $_SESSION['tid'] = $row['tid'];

                    $query = "select * from loadinfo_a where tid='".$row['tid']."'";
                    $result = $conn->query($query);
                    if($result->num_rows==0)
                    {
                        $query = "select * from loadinfo_b where tid='".$row['tid']."'";
                        $result = $conn->query($query);
                        $row2 = $result->num_rows;
                        if($row2==0)
                        {
                            $conn->close();
                            header('Location: subject_selection.php');
                        }
                    } 
                    else
                    {
                        //$conn->close();
                        header('Location: teachers_main.php');
                    }
                    return 1;

                } 
                else 
                {
                    //$conn->close();
                    header('Location: login_error.php');
                }
            }
            else if( $check[3] == 'S')
            {
                 $_SESSION['CurrentUser'] = $username;
                $sql = "SELECT * FROM login_info WHERE username = '$username'";
                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result);
                if ($row["password"]==md5($password)) {

                    $_user_browser = $_SERVER['HTTP_USER_AGENT'];
                    $_SESSION['id'] = $row["user_id"];
                    $_SESSION['CurrentUser'] = $username;
                    $passwordhash = $row["password"];
                    $_SESSION['login_string'] = hash('sha512', $passwordhash . $_user_browser);
                    $_SESSION['person']       = "student";
                    /*use SID of CurrentUser*/
                    $query = "select sid from student_record where username='$username'";
                    $result = mysql_query($query);
                    $row = mysql_fetch_array($result);
                    $_SESSION['sid'] = $row['sid'];
                    $sid = $row['sid'];
                    header('Location: students_main.php');
                }
                else
                    header('Location: login_error.php');
            }
        }
        else 
        {
            //$conn->close();
            header('Location: login_error.php');
        }
    }


function checkLogin()
    {
        if (isset($_SESSION['id'], $_SESSION['CurrentUser'], $_SESSION['login_string'])) {

            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
            $sql = "SELECT * FROM login_info WHERE username = '".$_SESSION['CurrentUser']."'";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $conn->close();

                $passwordhash    = $row["password"];
                $user_browser   = $_SERVER['HTTP_USER_AGENT'];
                if ($_SESSION['login_string'] == hash('sha512', $passwordhash.$user_browser) && $_SESSION['id']==$row['user_id']) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
session_start();

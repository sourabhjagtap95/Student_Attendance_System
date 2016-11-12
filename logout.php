<?php
require_once('authentication.php');

//session_start();
//echo $_SESSION['person'];
if($_SESSION['person']=="student")
{
    $_SESSION['person']="";
    session_destroy();
}
else if($_SESSION['person']=="teacher")
{
    $_SESSION['person']="";
    session_destroy();
}
/*session_destroy();*/

header('Location: home.php');

?>

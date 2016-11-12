<?php

require_once('authentication.php');

$username = $_POST['username'];
$password = $_POST['password'];
$remember = isset($_POST['remember']) ? TRUE: FALSE;
//setReporting();
//session_start();

if ($remember==TRUE)
{
	//echo "remember";
	//echo "\n" .$username . "   " . $password;
	$cookie_name = 'mycookie';
	$cookie_value = $username. "%" .$password;
	setcookie($cookie_name,$cookie_value,time()+(60*2)); //cookie set for 1 day :-D
}
attemptLogin($username,$password);
?>
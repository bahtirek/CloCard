<?
session_start(); 
if($_COOKIE['userdata']){
	setcookie('userdata', "");
	$_SESSION = array();
	session_destroy();
	header('Location: index.php'); 
	exit; 
}else{
	header('Location: login_signup.php'); 
	exit; 
}
	
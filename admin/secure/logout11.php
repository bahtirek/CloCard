<?
if($_COOKIE['userdata']){
	setcookie('userdata', "");
	header('Location: /clocard/index.php'); 
	exit; 
}else{
	header('Location: /clocard/login_signup.php'); 
	exit; 
}
	
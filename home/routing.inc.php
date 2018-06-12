<?php
switch($id){
	case 'contact': include 'home/contact.inc.php'; break;
	case 'about': include 'home/about.inc.php'; break;
	case 'faq': include 'home/faq.inc.php'; break;
	//case 'loginsignup': include 'home/login_signup.inc.php'; break;
	default: include 'home/main.inc.php';
}
?>
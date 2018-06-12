<?
$title = 'Keep your card in cloud';
$header = "What is CloCard?";
$id = strtolower(strip_tags(trim($_GET['id'])));

switch($id){
	case 'contact': 
		$title = 'Contact';
		$header = 'Contact Us';
		break;
	case 'faq': 
		$title = 'FAQ';
		$header = 'FAQ';
		break;
	case 'about': 
		$title = 'About';
		$header = 'About';
		break;
	/* case 'loginsignup': 
		$title = 'Login/Signup';
		$header = 'Login or Signup';
		break; */
}
?>
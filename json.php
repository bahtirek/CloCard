<?
include "inc/lib.inc.php";
include "inc/myfunction.php";
include"inc/matrix.php";
include"admin/secure/saveToDb.php";
include "admin/secure/secure.php";

	if($_SERVER["REQUEST_METHOD"]=="GET"){
		if (array_key_exists('phone', $_GET)) {
			include "jsonbyphone.php";	
		}
		if (array_key_exists('name', $_GET)) {
			include "jsonbyname.php";	
		}
		if (array_key_exists('company', $_GET)) {
			include "jsonbycompany.php";	
		}
	}
	
?>
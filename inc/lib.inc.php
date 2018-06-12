<?
//// ERROR HANDLER
function myError($errno, $errmsg, $errfile, $errline){
	$dt = date("m-d-Y H:i:s");
	$str = "[$dt] - $errmsg in $errfile:$errline\n";
	switch ($errno) {
		case E_USER_ERROR:
		case E_USER_WARNING:
		case E_USER_NOTICE:
			echo $msg;
	}
	error_log($str, 3, "error.log");
	
}

//// END OF ERROR HANDLER
/* ERROR TRIGGER
trigger_error(ERR_ON_MENU, E_USER_ERR);


*/
?>
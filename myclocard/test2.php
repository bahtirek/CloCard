<?

	//error_reporting(0);
	include "../inc/matrix.php";
	include "../inc/myfunction.php";
	require_once "../inc/lib.inc.php";
	require_once "../inc/data.inc.php";
	require_once "../admin/secure/secure.php";
	
	//set_error_handler("myError");
	//$headerLocation = "/clocard/login_signup.php";
	$sql = "Select * from phone";
	if(!$result = mysqli_query($link, $sql)){
			echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
			return false;
		}
	while($phone = mysqli_fetch_ASSOC($result)){
		echo "(",$phone["areacode"],")",$phone["phonenumber"], "<br>";
	};
<?
session_start();
	//error_reporting(0);
	include "../inc/matrix.php";
	include "../inc/myfunction.php";
	require_once "../inc/lib.inc.php";
	require_once "../inc/data.inc.php";
	require_once "../admin/secure/secure.php";
	require_once "../admin/secure/saveToDb.php";
	include '../home/headers.inc.php';
	//set_error_handler("myError");
	//$headerLocation = "/clocard/login_signup.php";
	$logStatus = logCheck();
	$userId = $logStatus['userid'];
	$userName = $logStatus['name'];
	if($logStatus["log"]=="Login/Signup"){
		header("Location: ../login_signup.php");
	}
	$sql = "SELECT ptype, id FROM phone";
	if(!$result1 = mysqli_query($link, $sql)){
		echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
		return false;
	}
	while($ptypearr = mysqli_fetch_assoc($result1)){
		$ptype = $ptypearr["ptype"];
		$phoneId = $ptypearr["id"];
		$sql2 = "UPDATE name_phone_ptype SET ptype='$ptype' WHERE phone_id=$phoneId";
		if(!$result2 = mysqli_query($link, $sql2)){
			echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
			return false;
		}
	}
<?
include "../inc/lib.inc.php";
include "../inc/myfunction.php";
include"../inc/matrix.php";
include"../admin/secure/saveToDb.php";
include "../admin/secure/secure.php";

	
	$date=time();
	$randomInt = rand(100, 999);
	$clientAppId = md5($date.$cardId.$nameOnCardId.$randomInt);
	$sql = "SELECT COUNT(app_id) as countid FROM clientappid WHERE app_id='$clientAppId'";
	if(!$result = mysqli_query($link, $sql)){
		printf("Errormessage: %s\n", mysqli_error($link));
		return false;
	}
	$count = mysqli_fetch_assoc($result);
	
	if($count["countid"]!=0){
		header('Location: getid.php');
		exit;
	}
	$jsonAppId = json_encode($clientAppId);
	$sql = "INSERT INTO clientappid (app_id) VALUES ('$clientAppId')";
	if(!$result = mysqli_query($link, $sql)){
		printf("Errormessage: %s\n", mysqli_error($link));
		return false;
	}
	if($jsonAppId){echo $jsonAppId;}

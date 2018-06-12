<?
include "../inc/lib.inc.php";
include "../inc/myfunction.php";
include"../inc/matrix.php";
include"../admin/secure/saveToDb.php";
include "../admin/secure/secure.php";

/* 	if($_SERVER["REQUEST_METHOD"]=="GET"){
		if (array_key_exists('json', $_GET)) {
			$json = json_decode($_GET["json"], true);
			if($json["cardid"]){
				$cardId = $json["cardid"];
			}else{$error = "no card id";}
			if($json["nameid"]){
				$nameOnCardId = $json["nameid"];
			}else{$error = "no name id";}
			if($json["cardid"]){
				$clientAppId = $json["appid"];
			}else{$error = "no app id";}
			if ($clientAppId == "deny"){
				$date=time();
				$randomInt = rand(100, 999);
				$clientAppId = md5($date.$cardId.$nameOnCardId.$randomInt);
				$jsonAppId = json_encode($clientAppId);
			}
			$sql = "INSERT INTO backup (card_id, nameoncard_id, clientapp_id) VALUES ($cardId, $nameOnCardId, '$clientAppId')";
			if(!$result = mysqli_query($link, $sql)){
				printf("Errormessage: %s\n", mysqli_error($link));
				return false;
			}
			if($jsonAppId){echo $jsonAppId;}
		}
	} */
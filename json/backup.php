<?
include "../inc/lib.inc.php";
include "../inc/myfunction.php";
include"../inc/matrix.php";
include"../admin/secure/saveToDb.php";
include "../admin/secure/secure.php";

	if($_SERVER["REQUEST_METHOD"]=="GET"){
		if (array_key_exists('json', $_GET)) {
			$json = json_decode($_GET["json"], true);
			if($json["appid"]){
				$appId = $json["appid"];
				if($json["cardid"]){
					$cardId = $json["cardid"];
					if($json["nameid"]){
						$nameOnCardId = $json["nameid"];
					}else{
						$error = "no name id";
						$nameOnCardId = 0;
					}
					$sql = "INSERT INTO backup (card_id, nameoncard_id, clientapp_id) VALUES ($cardId, $nameOnCardId, '$appId')";
					if(!$result = mysqli_query($link, $sql)){
						printf("Errormessage: %s\n", mysqli_error($link));
						return false;
					}
				}else{$error = "no card id";}
			}else{$error = "no app id";}
		}
	}
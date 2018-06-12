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







session_start();
if($_SESSION["masterCard"]){
	$masterCard = $_SESSION["masterCard"];
}
if($_SESSION["card"]){
	$card = $_SESSION["card"];
}
if ($_SESSION["phone"]){
	$phone = $_SESSION["phone"];
}
if ($_SESSION["name"]){
	$name = $_SESSION["name"];
}

$phoneId4=$phone["phoneid4"];
//print_r($phone);
//print_r($card);
/* print_r($card);
print_r($phone);
print_r($name);
print_r($cardmaster);
print_r($cardId);
echo"<br>vas", $_GET["usecard"]; */
//print_r($card);
$cardId = $card["id"];

/////   card name adding 
	
	if($phone["ext4"] or $phone["ext5"]){
		$name["ext"] = "y";
	}
	if($cardId){
		$name["cardid"] = $cardId;
	}
	if($userId){
		$name["userid"] = $userId;
	}
	addNameOnCard($name);
	$nameOnCardId = mysqli_insert_id($link);
	
/////  END OF -- card name adding


/////   phone adding
	
		for($i=4; $i<=6; $i++){
			if(!$phone["phoneid".$i]){
				$phonenumber = $phone["number".$i];
				$areacode = $phone["areacode".$i];
				$ptype = $phone["ptype".$i];
				//echo"<br>", " added to phone area ",$areacode," number ", $phonenumber," id ",$phone["phoneid".$i];
				addPhone($phonenumber, $areacode, $ptype);
				$phone["phoneid".$i] = mysqli_insert_id($link);
				
			}
			
/////          relation nameOnCardId_CardId_PhoneId
			if($phone["phoneid".$i]){
			$phoneid = $phone["phoneid".$i];
			$ptype = $phone["ptype".$i];
			$sql = "INSERT INTO name_phone_ptype(phonepos, phone_id, nameoncard_id, card_id)
									VALUES($i, $phoneid, $nameOnCardId, $cardId)";
									//echo $sql;
			if(!$result = mysqli_query($link, $sql))
				return false;
			}///  END OF       relation nameOnCardId_CardId_PhoneId 
		}

/////  END OF -- phone info adding



////  phone  ext adding

	for($i=4; $i<=5; $i++){
		if($phone["ext".$i]){
			$ext = clearStr($phone["ext".$i]);
			$extpos = $phone["extpos".$i];
			$sql = "INSERT INTO ext(nameoncard_id, ext, extpos) VALUES($nameOnCardId, $ext, $extpos)";
			//echo $sql;
			if(!$result = mysqli_query($link, $sql))
				return false;
		}
	}

////    END OF --- phone ext adding




////   relation user_nameoncard
	if($userId and  $nameOnCardId){
		$sql = "INSERT INTO user_nameoncard (user_id, nameoncard_id) VALUES ($userId, $nameOnCardId)";
		if(!$result = mysqli_query($link, $sql))
			return false; 
	}
////   END OF ---  relation
	$_SESSION["cardsuccess"] = $card;
	$_SESSION["phonesuccess"] = $phone;
	$_SESSION["namesuccess"] = $name;
	if ($_SESSION["name"]){
		unset($_SESSION["name"]);
	}
	if ($_SESSION["phone"]){
		unset($_SESSION["phone"]);
	}	
	if ($_SESSION["card"]){
			unset($_SESSION["card"]);
	}

	header ("Location: ../success.php");
	exit;


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
if($_SESSION["card"]){
	$card = $_SESSION["card"];
}
if ($_SESSION["phone"]){
	$phone = $_SESSION["phone"];
}
if ($_SESSION["name"]){
	$name = $_SESSION["name"];
}

//print_r($card);
/*print_r($phone);
print_r($name);
print_r($cardmaster);
print_r($cardId);
echo"<br>vas", $_GET["usecard"]; */

//ECHO "card <br>";
/////   card info adding 
		
	if($card["logo"]){	
		///// creating folder if not exist
		$epath = "../";
		$folderName = 'logo/'.date('m_d_Y').'/';
		if(!file_exists($epath.$folderName)){
		if(!mkdir($epath.$folderName)){
				  ///error trgger
				  
				$folderName = 'logo/sparedir/';
			}
		}
		///// end of creating folder if not exist
		
		$oldPath = $card["logo"];
		$newPath = $folderName.$card["file"];
		rename($oldPath, $epath.$newPath);
		//$card["logo"] = str_replace("../", "", $newPath);
		$card["logo"] = $newPath;
	}
	addToCard($card);
	$cardId = mysqli_insert_id($link);
	

	  
	  
/////  END OF -- card info adding
//ECHO "end ofcard <br>";
//ECHO "name<br>";
/////   card name adding 
	
	if($phone["ext1"] or $phone["ext2"]){
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
//ECHO "end of name<br>";
//ECHO "phone<br>";

/////   phone adding
	
		for($i=1; $i<=6; $i++){
			if($phone["number".$i] and $phone["areacode".$i]){
				if(!$phone["phoneid".$i]){
					$phonenumber = $phone["number".$i];
					$areacode = $phone["areacode".$i];
					$ptype = $phone["ptype".$i];
					$sql = "SELECT id FROM phone WHERE areacode = $areacode AND phonenumber = $phonenumber";
					//echo $sql, "<br>";
					if(!$result = mysqli_query($link, $sql))
						return false;
					$phoneidarray = mysqli_fetch_ASSOC($result);
					if(!$phoneidarray["id"]){//if phone not exist
						addPhone($phonenumber, $areacode, $ptype);
						$phone["phoneid".$i] = mysqli_insert_id($link);
					}else{
						$phone["phoneid".$i] = $phoneidarray["id"];
					}
				}
				
				/////          relation nameOnCardId_CardId_PhoneId
				if($phone["phoneid".$i]){
					$phoneid = $phone["phoneid".$i];
					$sql = "INSERT INTO name_phone_ptype(phonepos, phone_id, nameoncard_id, card_id)
										VALUES($i, $phoneid, $nameOnCardId, $cardId)";
										//echo $sql;
					if(!$result = mysqli_query($link, $sql)){
						echo"chto to";
						return false;
					}
					
				}///  END OF       relation nameOnCardId_CardId_PhoneId 
			}
		}

/////  END OF -- phone info adding
//ECHO "end of phone<br>";
//ECHO "ext<br>";


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

//ECHO "end of ext<br>";
//ECHO "user_name<br>";


////   relation user_nameoncard
	if($userId and  $nameOnCardId){
		$sql = "INSERT INTO user_nameoncard (user_id, nameoncard_id) VALUES ($userId, $nameOnCardId)";
		if(!$result = mysqli_query($link, $sql))
			return false; 
	}
	
////   END OF ---  relation
//ECHO "end of user_name<br>";

	$_SESSION["cardsuccess"] = $card;
	$_SESSION["phonesuccess"] = $phone;
	$_SESSION["namesuccess"] = $name;
	if($_SESSION["card"]){
		unset($_SESSION["card"]);
	}
	if ($_SESSION["phone"]){
		unset($_SESSION["phone"]);
	}
	if ($_SESSION["name"]){
		unset($_SESSION["name"]);
	}


	header ("Location: ../success.php");
	exit;


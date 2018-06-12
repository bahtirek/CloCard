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
	if($_SESSION["editedcard"]){
		$card = $_SESSION["editedcard"];
	}
	if ($_SESSION["editedphone"]){
		$phone = $_SESSION["editedphone"];
	}
	if ($_SESSION["editedname"]){
		$name = $_SESSION["editedname"];
	}
	if($_SESSION["mastercard"]){
		$masterCard = $_SESSION["mastercard"];
	}
	if($_SESSION["masterphone"]){
		$masterPhone = $_SESSION["masterphone"];
	}
	if($_SESSION["mastername"]){
		$masterName = $_SESSION["mastername"];
	}
	$card["fax"] = $masterCard["fax"];
	$card["cardtype"] = $masterCard["cardtype"];
	$name["nameoncardid"] = $masterName["nameoncardid"];
	echo "eto master";
	print_r($masterCard);
	print_r($masterPhone);
	print_r($masterName);
	print_r($name);
	echo "eto master";
	echo "eto not master";
	print_r($card);
	print_r($phone);
	var_dump($name);
	var_dump($masterName);
	echo "eto not master";

	
	if($card !== $masterCard){
		echo $isCardEdited = 1;
	}else{$isCardEdited = 0;}
	if($name !== $masterName){
		echo $isNameEdited = 1;
	}else{$isNameEdited = 0;}
	if($phone !== $masterPhone){
		echo $isPhoneEdited = 1;
	}else{$isPhoneEdited = 0;}
	
	echo " <br>, isCardEdited = ",$isCardEdited, "<br>";
echo "isnameEdited = ",$isNameEdited, "<br>";
echo "isphoneEdited = ",$isPhoneEdited, "<br>";

foreach($namearr1 as $key => $val){
		if ($name[$key] !== $masterName[$key]){
			$isNameEdited = 1;
			echo $name[$key];
		echo " => ", $masterName[$key], "<br>";
		echo $key;
		}
		echo $name[$key];
		echo " => ", $masterName[$key], "<br>";
	}
	////phone check
	if($phone !== $masterPhone){
		echo $isPhoneEdited = 1;
	}else{$isPhoneEdited = 0;}
	echo "isPhoneEdited = ",$isPhoneEdited, "<br>";
		var_dump($masterPhone);
		var_dump($phone);
	foreach($phone as $key => $val){
		if ($val !== $masterPhone[$key]){
			
			echo $val;
		echo " => vot eto ", $masterPhone[$key], "<br>";
		echo $key;
		}
			var_dump($masterPhone[$key]);
		echo " => ";
		var_dump($val);
		echo $key,"<br>";
	}
	foreach($phone as $key => $val){
		if ($val !== $masterPhone[$key]){
			
			//echo $val;
		echo " => vot eto ", $val," =>  ", $masterPhone[$key]," ",$key, "<br>";
		//echo $key;
		}
		
	}
	
	////end phone check
	
//print_r($card);
/*print_r($phone);
print_r($name);
print_r($cardmaster);
print_r($cardId);
echo"<br>vas", $_GET["usecard"]; */

/////is any changes was made
/* 	$isCardEdited = 0;
	$isNameEdited = 0;
	$isPhoneEdited = 0;
	$isExtEdited = 0;
	$isPtypeEdited = 0;
	foreach($masterCard as $key => $val){
		if ($card[$key] !== $val){
			$isCardEdited = 1;
		};
	}
	foreach($masterName as $key => $val){
		if ($name[$key] !== $val){
			$isNameEdited = 1;
		}
	}
	for ($i = 1; $i <= 6; $i++) {
		if($phone["areacode".$i] !== $masterPhone["areacode".$i]){
			$isPhoneEdited = 1;
		}
		if($phone["ptype".$i] !== $masterPhone["ptype1".$i]){
			$isPtypeEdited = 1;
		}
		if($phone["number".$i] !== $masterPhone["number".$i]){
			$isPhoneEdited = 1;
		}
		
		if($phone["ext".$i] !== $masterPhone["ext".$i]){
			$isExtEdited = 1;
		}
	}
	$result = array_diff($masterCard, $card);
	print_r($result);
	$result = array_diff($masterName, $name);
	print_r($result);
	$result = array_diff($masterPhone, $phone);
	print_r($result);
	
	function key_compare_func($a, $b)
		{
			if ($a === $b) {
				return 0;
			}
		}


$result = array_diff_uassoc( $card, $masterCard,"key_compare_func");
print_r($result);
	
echo " <br>, isCardEdited = ",$isCardEdited, "<br>";
echo "isnameEdited = ",$isNameEdited, "<br>";
echo "isphoneEdited = ",$isPhoneEdited, "<br>";
echo "isextEdited = ",$isExtEdited, "<br>";
echo "isPtypeEdited = ",$isPtypeEdited, "<br>"; 
foreach($strarr as $key => $val){
		if ($card[$key] !== $masterCard[$key]){
			$isCardEdited = 1;
		}
		echo $card[$key];
		echo " => ", $masterCard[$key], "<br>";
	}
*/

/////end of is any changes was made

/////   card info adding 


	  
	  
/////  END OF -- card info adding

/////   card name adding 
	
	if($phone["ext1"] or $phone["ext2"]){
		$name["ext"] = 1;
	}
	if($cardId){
		$name["cardid"] = $cardId;
	}
	if($userId){
		$name["userid"] = $userId;
	}
	//updateNameOnCard($name);
	//$nameOnCardId = mysqli_insert_id($link);
	
/////  END OF -- card name adding


/////   phone adding
	
/* for($i=1; $i<=6; $i++){
			if(!$phone["phoneid".$i]){
				$phonenumber = $phone["number".$i];
				$areacode = $phone["areacode".$i];
				$ptype = $phone["ptype".$i];
				addPhone($phonenumber, $areacode, $ptype);
				$phone["phoneid".$i] = mysqli_insert_id($link);
			}
			/////          relation nameOnCardId_CardId_PhoneId
			if($phone["phoneid".$i]){
				$phoneid = $phone["phoneid".$i];
				$sql = "INSERT INTO name_phone_ptype(phonepos, phone_id, nameoncard_id, card_id)
									VALUES($i, $phoneid, $nameOnCardId, $cardId)";
									//echo $sql;
				if(!$result = mysqli_query($link, $sql))
				return false; 
			///  END OF       relation nameOnCardId_CardId_PhoneId 
			}
		}*/

/////  END OF -- phone info adding


////  phone  ext adding

/* 	for($i=1; $i<=2; $i++){
		if($phone["ext".$i]){
			$ext = clearStr($phone["ext".$i]);
			$extpos = $phone["extpos".$i];
			$sql = "INSERT INTO ext(nameoncard_id, ext, extpos) VALUES($nameOnCardId, $ext, $extpos)";
			//echo $sql;
			if(!$result = mysqli_query($link, $sql))
				return false;
		}
	}
 */
////    END OF --- phone ext adding




////   relation user_nameoncard
	/* if($userId and  $nameOnCardId){
		$sql = "INSERT INTO user_nameoncard (user_id, nameoncard_id) VALUES ($userId, $nameOnCardId)";
		if(!$result = mysqli_query($link, $sql))
			return false; 
	} */
	
////   END OF ---  relation
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


	//header ("Location: ../success.php");
	//exit;


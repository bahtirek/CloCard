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
	//print_r($card);
	//print_r($name);
	//print_r($phone);
	
	//// update card
	if($card !== $masterCard){
		if($card["logo"] !== $masterCard["logo"]){
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
				rename($epath.$oldPath, $epath.$newPath);
				//$card["logo"] = str_replace("../", "", $newPath);
				$card["logo"] = $newPath;
			}
		}
		
		$cardId = $name["cardid"];
		$card["cardtype"] = "";
		updateCard($card, $cardId);
		
	}else{$cardId = $name["cardid"];}
	
	//// end of update card
	
	
	//// update name
	if($name !== $masterName){
		$nameOnCardId = $name["nameoncardid"];
		updateNameOnCard($name);
		//print_r($name);
	}else{$nameOnCardId = $name["nameoncardid"];}
	//// end of update name
	
	//// update backup table
		$update = 1;
		$sql = "UPDATE backup SET uptodate=1 WHERE nameoncard_id=$nameOnCardId AND card_id=$cardId";
		//echo $sql;
		if(!$result = mysqli_query($link, $sql)){
			printf("Errormessage: %s\n", mysqli_error($link));
			return false;
		}
	//// end of update backup table
	
	
	//// update phone
	if($phone !== $masterPhone){
		//echo "nerovno";
		for($i=1; $i<=6; $i++){
																		////proverka sushest phone???
			$phonenumber = $phone["number".$i];
			$areacode = $phone["areacode".$i];
			$ptype = $phone["ptype".$i];
			$phoneId = $phone["phoneid".$i];
			$mPhonenumber = $masterPhone["number".$i];
			$mAreacode = $masterPhone["areacode".$i];
			$mPtype = $masterPhone["ptype".$i];
			$mPhoneId = $masterPhone["phoneid".$i];
			//echo $i," ",$areacode," ",$phonenumber," ",$mAreacode," ",$mPhonenumber," ",$phoneId," ",$mPhoneId,"<br>";
			if($phonenumber !== $mPhonenumber OR $areacode !== $mAreacode){
				
				////delete phonenumber
				if(!$phonenumber and !$areacode){
					////delete phone from relationship 
					$sql = "DELETE FROM name_phone_ptype WHERE phone_id=$mPhoneId AND nameoncard_id=$nameOnCardId AND card_id=$cardId AND phonepos=$i";
					if(!$result = mysqli_query($link, $sql))
						return false;	
				////// end of delete phone from relationship
					$sqlPhoneCnt = "SELECT COUNT(phone_id) AS phoneCnt FROM name_phone_ptype WHERE phone_id=$phoneId";
					if(!$resultPhone = mysqli_query($link, $sqlPhoneCnt)){
						echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
						return false;
					}
					$phoneCntResult = mysqli_fetch_assoc($resultPhone);
					$phoneCnt = $phoneCntResult["phoneCnt"];
					////master relation
					$sqlMasterCnt = "SELECT COUNT(phone_id) AS masterCnt FROM master WHERE phone_id=$phoneId";
					if(!$resultMaster = mysqli_query($link, $sqlMasterCnt)){
						echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
						return false;
					}
					$masterCntResult = mysqli_fetch_assoc($resultMaster);
					$masterPhoneCnt = $masterCntResult["masterCnt"];
					////master relation
					if($masterPhoneCnt == 0 AND $phoneCnt == 0){
						$sqlDeletePhone = "DELETE FROM phone WHERE id=$phoneId";
						//echo $sqlrelation;
						if(!$resultrelation = mysqli_query($link, $sqlDeletePhone)){
							echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
							return false;
						}
					}
				}//// end of delete phonenumber
				
				if($phonenumber and $areacode){  
					if(!$phoneId){//////if phone not exist adding new one
						$sql = "SELECT id FROM phone WHERE areacode = $areacode AND phonenumber = $phonenumber";
						//echo $sql, "<br>";
						if(!$result = mysqli_query($link, $sql))
							return false;
						$phoneidarray = mysqli_fetch_ASSOC($result);
						if(!$phoneidarray["id"]){//if phone not exist
							addPhone($phonenumber, $areacode, $ptype);
							$phone["phoneid".$i] = mysqli_insert_id($link);
							$phoneId = $phone["phoneid".$i];
						}else{
							$phone["phoneid".$i] = $phoneidarray["id"];
							$phoneId = $phone["phoneid".$i];
						}
						////// end of if phone not exist adding new one
						                              /////    ****      relation nameOnCardId_CardId_PhoneId
						
						$sql = "INSERT INTO name_phone_ptype(phonepos, phone_id, nameoncard_id, card_id) VALUES($i, $phoneId, $nameOnCardId, $cardId)";
						//echo $sql;
						if(!$result = mysqli_query($link, $sql))
							return false;
						                       ///  **********END OF       relation nameOnCardId_CardId_PhoneId 
						
					}else{/// UPDATE exist phone esli id sushest update tolko relationship
						if($mAreacode AND $mPhonenumber){////if relationship exist
							$sql = "UPDATE name_phone_ptype SET phone_id=$phoneId WHERE nameoncard_id=$nameOnCardId AND card_id=$cardId AND phonepos=$i";
							//echo "update",$sql;
							if(!$result = mysqli_query($link, $sql))
								return false;	
						}else{////if relationship notexist
							$sql = "INSERT INTO name_phone_ptype(phonepos, phone_id, nameoncard_id, card_id) VALUES($i, $phoneId, $nameOnCardId, $cardId)";
							//echo $sql;
							if(!$result = mysqli_query($link, $sql))
								return false;
							}
						}
						
					}
					if($ptype !== $mPtype){
						$sql = "UPDATE phone SET ptype='$ptype' WHERE id=$mPhoneId";
							//echo "update",$sql;
							if(!$result = mysqli_query($link, $sql))
								return false;
					}
				}
				if($ptype !== $mPtype){
					$sql = "UPDATE phone SET ptype='$ptype' WHERE id=$mPhoneId";
					//echo "update",$sql;
					if(!$result = mysqli_query($link, $sql))
						return false;
				}
			}
		for($e=4; $e<=5; $e++ ){
			if($phone["ext".$e] !== $masterPhone["ext".$e]){
				//echo"net ne rovno";
				if($phone["ext".$e]){
					if($masterPhone["ext".$e]){
						$ext = $phone["ext".$e];
						updateExt($ext, $nameOnCardId, $e);
					}else{
						$ext = $phone["ext".$e];
						addExt($ext, $nameOnCardId, $e);
					}
					
				}else{
					$sql = "DELETE FROM ext WHERE nameoncard_id=$nameOnCardId AND extpos=$e";
					if(!$result = mysqli_query($link, $sql))
						return false;
				}
					
			}
		}
	}else{$phoneId = $phone["id"];}
	//// end of update phone
	//// update update info
	//// end of update update info


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


<?
	session_start();
	//error_reporting(0);
	include "../inc/matrix.php";
	include "../inc/myfunction.php";
	require_once "../inc/lib.inc.php";
	require_once "../inc/data.inc.php";
	require_once "../admin/secure/secure.php";
	include '../home/headers.inc.php';
	//set_error_handler("myError");
	//$headerLocation = "/clocard/login_signup.php";
	$logStatus = logCheck();
	if($logStatus["log"]=="Login/Signup"){
		header("Location: ../login_signup.php");
	}
	//////vars
	$userName = $logStatus["username"];
	$navpath ="../";
	$logStatus['link'] = "../logout.php";
	$deleteRel = 0;
	$deleteCard = 0;
	$deleteName = 0;
	
	//////vars
	
	if ($_GET["deletecard"]){
		if ($_SESSION["editcard"]){
			$editCard = $_SESSION["editcard"];
		}
		/////VARS
		$id = $_GET["deletecard"];
		$card = $editCard[$id]["card"];
		$phone = $editCard[$id]["phone"];
		$name = $editCard[$id]["name"];
		$cardId = $name["cardid"];
		$nameOnCardId = $name["nameoncardid"];
		/////VARS
		
		//print_r($phone);
		for($i=1; $i<=6; $i++){
			$phoneId = $phone["phoneid".$i];
			$ptype = $phone["ptype".$i];
			$ext = $phone["ext".$i];
			if($phoneId){
				////delete relation
				$sqlnpp = "SELECT COUNT(nameoncard_id) AS relationCnt FROM name_phone_ptype 
							                           WHERE nameoncard_id=$nameOnCardId AND card_id=$cardId AND phone_id=$phoneId AND phonepos=$i AND ptype='$ptype'";
				//echo "<br>", $sqlnpp ;
				if(!$resultnpp = mysqli_query($link, $sqlnpp)){
					echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
					return false;
				}
				$relationCntResult = mysqli_fetch_assoc($resultnpp);
				$relationCnt = $relationCntResult["relationCnt"];
				if($relationCnt == 1){
					$sqlrelation = "DELETE FROM name_phone_ptype WHERE nameoncard_id=$nameOnCardId AND card_id=$cardId AND phone_id=$phoneId AND phonepos=$i AND ptype='$ptype'";
					//echo "<br>", $sqlrelation;
					if(!$resultrelation = mysqli_query($link, $sqlrelation)){
						echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
						return false;
					}
				$deleteRel = mysqli_affected_rows($link);
				$deleteRel++;
				} 
				////end of delete relation
				
				////delete phone
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
				////end of delete phone
				////delete ext
				if($ext){
					$sqlExt = "DELETE FROM ext WHERE extpos=$i AND nameoncard_id=$nameOnCardId AND ext=$ext";
					if(!$resultExt = mysqli_query($link, $sqlExt)){
						echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
						return false;
					}
					$deleteExt = mysqli_affected_rows($link);
					$deleteExt++;
				}
				////end of delete ext
			}////if phoneId
			
		}///for 
		
		////delete card
		
		$sql = "SELECT COUNT(card_id) AS cardCnt FROM name_phone_ptype WHERE card_id=$cardId";
			//echo $sql;
			if(!$result = mysqli_query($link, $sql))
				return false;
		$cardCntResult = mysqli_fetch_assoc($result);
		$cardCnt = $cardCntResult["cardCnt"];
		if($cardCnt == 0){
			$sql = "SELECT logo FROM card WHERE id=$cardId";
			if(!$result = mysqli_query($link, $sql)){
				echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
				return false;
			}
			$logoResult = mysqli_fetch_assoc($result);
			$logo = $logoResult["logo"];
			if(file_exists("../".$logo)){
				unlink("../".$logo);
			}
			$sqlDeleteCard = "DELETE FROM card WHERE id=$cardId";
			//echo $sqlDeleteCard;
			if(!$resultrelation = mysqli_query($link, $sqlDeleteCard)){
				echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
				return false;
			}
			$deleteCard = mysqli_affected_rows($link);
			$deleteCard++;
		}
		
		////end of delete card
				
		////delete nameoncard
		$sqlNameOnCardId = "SELECT COUNT(nameoncard_id) AS nameOnCardIdCnt FROM name_phone_ptype WHERE nameoncard_id=$nameOnCardId";
			//echo $sqlNameOnCardId;
			if(!$result = mysqli_query($link, $sqlNameOnCardId))
				return false;
		$nameOnCardIdCntResult = mysqli_fetch_assoc($result);
		$nameOnCardIdCnt = $nameOnCardIdCntResult["nameOnCardIdCnt"];
		if($nameOnCardIdCnt == 0){
			$sqlDeleteName = "DELETE FROM nameoncard WHERE id=$nameOnCardId";
			if(!$resultname = mysqli_query($link, $sqlDeleteName)){
				echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
				return false;
			}
			$deleteName = mysqli_affected_rows($link);
			$deleteName++;
		}
		
		////end of delete nameoncard
		
		
		//print_r($phone);
		//print_r($card);
		//print_r($name);
		
		
	} //end of get
	session_destroy();
	header('location: myclocard.php');
	exit;
?>

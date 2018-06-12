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
	//print_r($logStatus);
	$userName = $logStatus["username"];
	$navpath ="../";
	$logStatus['link'] = "../logout.php";
	if ($_GET["deletecard"]){
		if ($_SESSION["editcard"]){
			$editCard = $_SESSION["editcard"];
		}
		$id = $_GET["deletecard"];
		echo $i;
		$card = $editCard[$id]["card"];
		$phone = $editCard[$id]["phone"];
		
		$name = $editCard[$id]["name"];
		$cardId = $name["cardid"];
		$nameOnCardId = $name["nameoncardid"];
		
		////delete nameoncard
		$sql = "SELECT COUNT(nameoncard_id) AS nameOnCardIdCnt FROM name_phone_ptype WHERE nameoncard_id=$nameOnCardId";
			echo $sql;
			if(!$result = mysqli_query($link, $sql))
				return false;
		$phoneCnt = mysqli_fetch_assoc($result);
		print_r($phoneCnt);
		////end of delete nameoncard
		
		////delete card
		
		$sql = "SELECT COUNT FROM name_phone_ptype WHERE card_id=$cardId";
			echo $sql;
			if(!$result = mysqli_query($link, $sql))
				return false;
		$cardCnt = mysqli_fetch_assoc($result);
		print_r($cardCnt);
		/* if($cardCnt == 1){
					$sqlDeleteCard = "DELETE FROM card WHERE id=$cardId";
					//echo $sqlDeleteCard;
					if(!$resultrelation = mysqli_query($link, $sqlDeleteCard)){
						echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
						return false;
					}
					$deleteCard = mysqli_affected_rows($link);
					$deleteCard++;
					
				} */
		////end of delete card
		
		print_r($phone);
		for($i=1; $i<=6; $i++){
			$phoneId = $phone["phoneid".$i];
			$ptype = $phone["ptype".$i];
			echo "pp-", $phoneId;
			if($phoneId){
				////delete phone
				$sql = "SELECT * FROM phone WHERE id=$phoneId";
					echo $sql;
					if(!$result = mysqli_query($link, $sql)){
						echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
						return false;
					}
				$phoneCnt = mysqli_num_rows($result);
				echo " -row_cnt",$row_cnt , "<br>";
				if($phoneCnt == 1){
					//$sqlDeletePhone = "DELETE FROM phone WHERE id=$phoneId";
					echo $sqlDeletePhone;
					if(!$resultrelation = mysqli_query($link, $sqlDeletePhone)){
						echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
						return false;
					}
					$deletePhone = mysqli_affected_rows($link);
					$deletePhone++;
					
				}
				////end of delete phone
				
				////delete relation
				$sqlnpp = "SELECT * FROM name_phone_ptype WHERE nameoncard_id=$nameOnCardId AND card_id=$cardId AND phone_id=$phoneId AND phonepos=$i AND ptype='$ptype'";
					//echo $sqlnpp ;
					if(!$resultnpp = mysqli_query($link, $sqlnpp)){
						echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
						return false;
					}
						
				$relationCnt = mysqli_num_rows($resultnpp);
				if($relationCnt == 1){
					//$sqlrelation = "DELETE FROM WHERE name_phone_ptype WHERE nameoncard_id=$nameOnCardId AND card_id=$cardId AND phone_id=$phoneId AND phonepos=$i AND ptype='$ptype'";
				
					//echo $sqlrelation;
					if(!$resultrelation = mysqli_query($link, $sqlnpp)){
						echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
						return false;
					}
				$deleteRel = mysqli_affected_rows($link);
				$deleteRel++;
				}
				////end of delete relation
			}
			
		}
		

		$sql = "DELETE FROM nameoncard WHERE nameoncard_id=$nameOnCardId";
		//print_r($phone);
		//print_r($card);
		//print_r($name);
		
		/* $_SESSION["mastercard"] = $editCard[$id]["card"];
		$_SESSION["masterphone"] = $editCard[$id]["phone"];
		$_SESSION["mastername"] = $editCard[$id]["name"];
		$_SESSION["logo"] = $card["logo"];
		 */
	}

	
?>

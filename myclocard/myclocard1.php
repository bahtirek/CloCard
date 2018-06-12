<?
session_start();
	//error_reporting(0);
	include "../inc/matrix.php";
	include "../inc/myfunction.php";
	require_once "../inc/lib.inc.php";
	require_once "../inc/data.inc.php";
	require_once "../admin/secure/secure.php";
	include '../home/headers.inc.php';
	include "card.php";
	//set_error_handler("myError");
	//$headerLocation = "/clocard/login_signup.php";
	$logStatus = logCheck();
	$logStatus['link'] = "../logout.php";
	if($logStatus["log"]=="Login/Signup"){
		header("Location: ../login_signup.php");
	}
	$i = 1;
	$navpath ="../";
	$userId = $logStatus["userid"];
	
	$sql = "SELECT n.id, n.firstname, n.lastname, n.position, n.ext, n.emailpersonal, n.weblink, n.user_id, n.weblink, n.card_id,
					c.companyname, c.companyname2, c.slogan, c.fax, c.address, c.address2, c.city, c.state, c.emailcompany, c.zipcode, 		
					c.website, c.facebook, c.twitter, c.description1, c.description2, c.description3, c.description4, c.description5, 	
					c.description6, c.description7, c.description8, c.description9, c.description10, c.field, c.logo
			FROM nameoncard n		
			INNER JOIN card c ON c.id=n.card_id
			WHERE n.user_id=$userId";
			
	if(!$result1 = mysqli_query($link, $sql)){
		echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
		return false;
	}
	while($existCard = mysqli_fetch_assoc($result1)){
		foreach($existCard as $key => $val){
			$card[$key] = $existCard[$key];
			$name[$key] = $existCard[$key];
		}
		$cardId = $existCard["card_id"];
		$nameOnCardId = $existCard["id"];
		$sql2 = "SELECT phonepos, phone_id FROM name_phone_ptype WHERE card_id=$cardId AND nameoncard_id=$nameOnCardId";
		if(!$result2 = mysqli_query($link, $sql2)){
			echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
			return false;
		}
		
		while($existPhone = mysqli_fetch_assoc($result2)){
			$phoneId = $existPhone["phone_id"];
			$phonePos = $existPhone["phonepos"];
			$sql3 = "SELECT phonenumber, areacode, ptype FROM phone WHERE id=$phoneId";
			if(!$result3 = mysqli_query($link, $sql3)){
				echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
				return false;
			}
			//echo $sql3;
			$phoneArray = mysqli_fetch_assoc($result3);
			$areaCode = $phoneArray["areacode"];
			$phoneNumber = $phoneArray["phonenumber"];
			$ptype = $phoneArray["ptype"];
			$phone["ptype".$phonePos] = $ptype;
			$phone["phoneid".$phonePos] = $phoneId;
			$phone["areacode".$phonePos] = $areaCode;
			$phone["number".$phonePos] = $phoneNumber;
			$phone["phone".$phonePos] = area_phone($phoneNumber, $areaCode);
			$phone["phonestring".$phonePos] = phoneStr2($phoneNumber, $areaCode, $ptype, "");
			//echo $phonePos," - ",$phone["ptype"]," : (",$phone["areacode"],") ",$phone["phonenumber"],"<br>";
			
		}
		$sql4 = "SELECT ext, extpos FROM ext WHERE nameoncard_id = $nameOnCardId";
		if(!$result4 = mysqli_query($link, $sql4)){
			echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
			return false;
		}
		while($ext = mysqli_fetch_assoc($result4)){
			$extPos = $ext["extpos"];
			$phone["ext".$extPos] = $ext["ext"];
			$phone["phonestring".$extPos] = phoneStr2($phone["number".$extPos], $phone["areacode".$extPos], $phone["ptype".$extPos], $ext["ext"]);
		}
		$array[$i]["card"] = $card;
		$array[$i]["name"] = $name;
		$array[$i]["phone"] = $phone;
		$i++;
		//echo $sql4;
		//print_r($phone);
	}
	//print_r ($array);
	$_SESSION["editcard"] = $array;
?>
<!DOCTYPE html>
<html>

<head>
  <title><?=$title?></title>
  <link rel="stylesheet" href="../style.css" />
  
</head>

<body>

  <header>
    <!-- Header -->
	<span class="slogan">Keep your card in cloud</span>
    <img src="../images/clocardlogo.png"  alt="cloud" class="logo"  usemap="logo"/>
	<map name="logo">
		<area shape="rect" coords="0,0,309,84" href="../index.php">
	</map>
		<!-- Menu -->
	<?include'../home/navin.inc.php';?>
		<!-- menu -->

    <!-- header -->
  </header>

  
	<section id="main">
	
    <!-- Main content -->
    <h1>Create New Clocard</h1>
	<?
	if(!$array){
		echo "<p> You dont have Clocard yet</p>";
	}else{
		foreach($array as $key => $val){
		$card = $array[$key]["card"];
		$phone = $array[$key]["phone"];
		$name = $array[$key]["name"];
		
	
	?>
		<table align="center" style="width:310px; margin-bottom:7em; margin-top: 2em; background-color:#E4E4E4;border: 1px solid #9f9f9f; border-radius: 9px; box-shadow: 0 16px 18px 0 rgba(0, 0, 0, 0.2), 0 16px 30px 0 rgba(0, 0, 0, 0.19);">
			<tr height="50px" style=" margin:0;">
				<td   style="text-align:center;">
					<img src="../images/speaker2.png" width="110px" align="center"/>
				</td>
			</tr>
			<tr height="500px">
				<td  align="center" style="background-color:white; border: 1px solid #9f9f9f; border-radius: 3px;">
				
						<div class="parent">
							<div class="child"> 
								<?
									$card = drawNewCard2($card, $name, $phone);
								?>
							</div>
						</div>
					
			
				</td>
			</tr>
			<tr >
				
				<td style="text-align:center; margin-bottom:0; margin-top: 7px; padding-bottom:0; padding-top:10px;" >
					<a href="editcard.php?editcard=<?=$key?>" title="Edit"><img src="../images/cloud.png" width="60px" alt="Edit" /></a>
				</td>
				<tr style="text-align:center; margin:0; padding:0; ">
				<td style="text-align:center; margin:0; padding:0; " >
					<div style="margin-top: -7px; padding-bottom:4px;" >Edit</div>
				</td>
				</tr>
			</tr>
		</table>
	<?}
	}?>
	

	</section>
    <!-- Main content -->
  
	<div>
		
	</div>
  <footer>
    <!-- Footer -->
	
    <?
	if(!include '../home/footer.inc.php'){
			echo ERR_ON_INC_MAIN_PAGE;
		} 
	?>
    <!-- Footer -->
  </footer>
</body>

</html>


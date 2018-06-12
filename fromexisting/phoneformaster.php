<?
	session_start();
	//error_reporting(0);
	include "../inc/matrix.php";
	include "../inc/myfunction.php";
	require_once "../inc/lib.inc.php";
	require_once "../inc/data.inc.php";
	require_once "../admin/secure/secure.php";
	//include '../home/headers.inc.php';
	//set_error_handler("myError");
	//$headerLocation = "/clocard/login_signup.php";
	$logStatus = logCheck();
	$logStatus['link'] = "../logout.php";
	if($logStatus["log"]=="Login/Signup"){
		header("Location: ../login_signup.php");
	}
	$navpath ="../";
	$_SESSION["createmorecards"] = "fromexisting/phoneformaster.php";
	
	/// phone info
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if($_POST["master"]){
			$master = $_POST["master"];
			if(is_numeric($master)){
				$numberarea = phoneValidation($master);
				extract ($numberarea);
				$sql = "SELECT id FROM phone WHERE areacode = $areacode AND phonenumber = $phonenumber";
				//echo $sql;
				if(!$result = mysqli_query($link, $sql))
					return false;
				$phoneidarray = mysqli_fetch_ASSOC($result);
				if($phoneidarray["id"]){//if phone exist
					$phoneId = $phoneidarray["id"];
					$sql = "SELECT card_id FROM master WHERE phone_id=$phoneId";
					//echo $sql;
					if(!$result = mysqli_query($link, $sql)){
						echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
						return false;
					}
					$masterCardId = mysqli_fetch_ASSOC($result); 
					$cardId = $masterCardId["card_id"];
					$sql = "SELECT * FROM master WHERE card_id=$cardId ";
					if(!$result = mysqli_query($link, $sql)){
						$errorcode = mysqli_errno($link) . ": " . mysqli_error($link). "\n";
						return false;
					}
					while($master = mysqli_fetch_ASSOC($result)){
						$phonepos = $master["phonepos"];
						$phoneId = $master["phone_id"];
						$ptype = $master["ptype"];
						$sql = "SELECT phonenumber, areacode, ptype FROM phone WHERE id=$phoneId ";
						//echo $sql;
						if(!$result1 = mysqli_query($link, $sql)){
							echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
							return false;
						}
						$phoneSql = mysqli_fetch_ASSOC($result1);
						$phonenumber = $phoneSql["phonenumber"];
						$areacode = $phoneSql["areacode"];
						$ptype = $phoneSql["ptype"];
						$phone["number".$phonepos] = $phonenumber;
						$phone["areacode".$phonepos] = $areacode;
						$phone["ptype".$phonepos] = $ptype;
						$phone["phoneid".$phonepos] = $phoneId;
						$phone["phonestring".$phonepos] = phoneStr2($phonenumber, $areacode, $ptype,"");
					}
					$sql = "SELECT * FROM card WHERE id=$cardId";
					if(!$result = mysqli_query($link, $sql)){
						echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
						return false;
					}
					$card = mysqli_fetch_ASSOC($result);
					//print_r($masterCard);
					$_SESSION["card"] = $card;
					$_SESSION["phone"] = $phone;
					//print_r($phone);
					header('Location: createnewcardfrommaster.php');
					exit;
				}else{ 
					$error = "Sorry there is no card under phone that you have entered";
				}
			}else{
			}
		}
	}
	
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
    <form action="<?= $_SERVER['PHP_SELF']?>" method="post" enctype = "multipart/form-data" >
		<fieldset >
			<legend>Phone</legend>
				<div>
					<label>Business  phone:</label>
					<input type="text" name="master"  class="typeText companyphone" maxlength="10"/>
				</div>
		</fieldset>
		
		
		
		<br>
		<input style="width:48%; float: left; background-color: white; border: 1px solid #c8c8c8;" type="submit" value="Submit"/>
		<input style="width:48%; float: right; background-color: white; border: 1px solid #c8c8c8;" type="reset"/>
		</form>
   
    <!-- Main content -->
  </section>
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
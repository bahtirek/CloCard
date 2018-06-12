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
	$navpath ="../";
	$logStatus['link'] = "../logout.php";
	if ($_GET["cardreviewed"]=="edit"){
		if ($_SESSION["name"]){
			$name = $_SESSION["name"];
		}
		if($_SESSION["phone"]){
			$phone = $_SESSION["phone"];
		}
	}
	
	if($_SESSION["card"]){
			$card = $_SESSION["card"];
		}
	if($_SESSION["phone"]){
			$phone = $_SESSION["phone"];
		}
	
	//print_r($card);	
	//print_r($phone);	
	//echo $masterCard["logo"];
	//echo $masterCard["logo"];
	
	
	//echo"<br>";
	//var_dump($_SESSION['cardMaster']);
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
	
		//print_r($_POST);
		/// phone info
		//// phone - (561)7296669, number- 7296669, arecode - 561, ext - 111, phonestring - (561)729-6669 ext:111, ptype - office, extpos- 1, 
		
		foreach($phonearr2 as $key => $val){
			if($_POST[$key]){
				$phone["phoneid".$val] = "";
				$numberarea = phoneValidation($_POST[$key]);
				extract ($numberarea);
				$sql = "SELECT id FROM phone WHERE areacode = $areacode AND phonenumber = $phonenumber";
				if(!$result = mysqli_query($link, $sql))
					return false;
				$phoneidarray = mysqli_fetch_ASSOC($result);
				if($phoneidarray["id"]){//if phone exist
					$phoneId = $phoneidarray["id"];
					$phone["phoneid".$val] = $phoneId;
				}
				$phone["phonestring".$val] = phoneStr2($phonenumber, $areacode, $_POST["ptype".$val], $_POST["ext".$val]);
				$phone["ptype".$val] = $_POST["ptype".$val];
				$phone["phone".$val] = area_phone($phonenumber, $areacode);
				$phone["number".$val] = $phonenumber;
				$phone["areacode".$val] = $areacode;
				
				if($_POST["ext".$val]){
					$ext = $_POST["ext".$val];
					//$ext = clearExt($_POST["ext".$val]);
					$phone["ext".$val] = $ext;
					$phone["extpos".$val] = $val;
					$phone["ext"] = "y";
				}
			}
		}
		
		/// end of phone info
		
		/// personal info
		foreach($name as $key => $val){
			if($_POST[$key]){
				$data = clearStr2($_POST[$key]);
				$name[$key] = $data;
			}
		}
		if($phone["ext4"] or $phone["ext5"]){
			$name["ext"] = "y";
		}
		/// end of personal info
		
		$_SESSION['phone'] = $phone;
		$_SESSION['name'] = $name;
		//$_SESSION['card'] = $masterCard;
		//print_r($phone);
		header("Location: reviewcard.php");
		exit;
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
	<div style="margin-bottom: 10em;">
	<form action="<?= $_SERVER['PHP_SELF']?>" method="post" enctype = "multipart/form-data" >
		
		<fieldset >
			<?include"personal_form.php"?>
		</fieldset>
		<fieldset>
			<?include"master_form.php"?>
		</fieldset>
		
		
		
		
		<br>
		<input style="width:48%; float: left; background-color: white; border: 1px solid #c8c8c8;" type="submit" value="Submit"/>
		<input style="width:48%; float: right; background-color: white; border: 1px solid #c8c8c8;" type="reset"/>
		</form>
    
</div>
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
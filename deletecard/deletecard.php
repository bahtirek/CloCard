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
	if ($_GET["editcard"]){
		if ($_SESSION["editcard"]){
			$editCard = $_SESSION["editcard"];
		}
		$id = $_GET["editcard"];
		$card = $editCard[$id]["card"];
		$phone = $editCard[$id]["phone"];
		print_r($phone);
		$name = $editCard[$id]["name"];
		$_SESSION["mastercard"] = $editCard[$id]["card"];
		$_SESSION["masterphone"] = $editCard[$id]["phone"];
		$_SESSION["mastername"] = $editCard[$id]["name"];
		$_SESSION["logo"] = $card["logo"];
		
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
			<?include"image_form.php"?>
		</fieldset>
		
		<fieldset >
			<?include"personal_form.php"?>
		</fieldset>
		<fieldset>
			<?include"card_form.php"?>
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
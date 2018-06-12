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
	$navpath ="../";
if($_SESSION["card"]){
	$card = $_SESSION["card"];
}
if ($_SESSION["phone"]){
	$phone = $_SESSION["phone"];
}
if ($_SESSION["name"]){
	$name = $_SESSION["name"];
}
print_r($card);
/* var_dump($card);
print_r($phone);
var_dump($name); */

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
	<table align="center" style="width:330px; margin-bottom:5em; margin-top: 2em; background-color:#E4E4E4;border: 1px solid #9f9f9f; border-radius: 9px; box-shadow: 0 16px 18px 0 rgba(0, 0, 0, 0.2), 0 16px 30px 0 rgba(0, 0, 0, 0.19);">
		<tr height="60px" style=" margin:0;">
			<td  colspan="2" style="text-align:center;">
				<img src="../images/speaker2.png" width="120px" align="center"/>
			</td>
		</tr>
		<tr height="520px">
			<td colspan="2" align="center" style="background-color:white; border: 1px solid #9f9f9f; border-radius: 3px;">
			
					<div class="parent">
						<div class="child"> 
							<?
								$card = drawNewCard2($card, $name, $phone);
							?>
						</div>
					</div>
				
		
			</td>
		</tr>
		<tr height="60px">
			<td style="text-align:center;">
				<a href="createnewcard.php?cardreviewed=edit" title="Back"><img src="../images/back.png" width="50px" alt="Back"/></a>
			</td>
			<td style="text-align:center;">
				<a href="saveCard.php" title="Save"><img src="../images/cloud.png" width="60px" alt="Save" /></a>
			</td>
			
		</tr>
	</table>


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


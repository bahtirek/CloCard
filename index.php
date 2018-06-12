<?
	//error_reporting(0);
	require_once "inc/lib.inc.php";
	require_once "inc/data.inc.php";
	require_once "admin/secure/secure.php";
	//set_error_handler("myError");
	include 'home/headers.inc.php';
	//$headerLocation = "/clocard/login_signup.php";
	$logStatus = logCheck();
	
	//print_r ($logStatus);
	$navpath ="";
?>
<!DOCTYPE html>
<html>

<head>
  <title><?=$title?></title>
  <link rel="stylesheet" href="style.css" />
  
</head>

<body>

  <header>
    <!-- Header -->
	<span class="slogan">Keep your card in cloud</span>
    <img src="images/clocardlogo.png"  alt="cloud" class="logo"  usemap="logo"/>
	<map name="logo">
		<area shape="rect" coords="0,0,309,84">
	</map>
		<!-- Menu -->
	<?
		if($logStatus["log"]=="LogOut"){
			$map1 = "newcard/createnewcard.php";
			$map2 = "fromexisting/phoneformaster.php";
			include'home/navin.inc.php';
		}else{
			$map1 = "login_signup.php";
			$map2 = "login_signup.php";
			include'home/navout.inc.php';
		}
	?>
		<!-- menu -->

    <!-- header -->
  </header>

  <section id="main">
    
    <h1><?=$header?></h1>
    
    <!-- Main content -->
	<div class="article">
	<h3></h3>
    <p>
     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Hoc enim constituto in philosophia constituta sunt omnia. At enim, qua in vita est aliquid mali, ea beata esse non potest. Immo alio genere; At hoc in eo M. Non quam nostram quidem, inquit Pomponius iocans; Age nunc isti doceant, vel tu potius quis enim ista melius?
	Sed fortuna fortis; Potius inflammat, ut coercendi magis quam dedocendi esse videantur. Quod ea non occurrentia fingunt, vincunt Aristonem; Tum Piso: Quoniam igitur aliquid omnes, quid Lucius noster?
	</p>
	<p>
    Create single CloCard for buisness or individuals click --> <a href="newcard/createnewcard.php">New Clocard</a>
	</p>
	<p>
    Create single CloCard from existing CloCard click --> <a href="fromexisting/phoneformaster.php">New Clocard from existing</a>
	</p>
	<p>
    Create CloCards for all employees click --> <a href="forall/createmaster.php">New Clocard for all</a>
	</p>
	
    </div>
	
		<table align="center" style="width:270px; margin-bottom:7em; margin-top: 2em; background-color:#E4E4E4;border: 1px solid #9f9f9f; border-radius: 9px; box-shadow: 0 16px 18px 0 rgba(0, 0, 0, 0.2), 0 16px 30px 0 rgba(0, 0, 0, 0.19);">
		<tr height="40px" style=" margin:0;">
			<td  colspan="2" style="text-align:center;">
				<img src="images/speaker2.png" width="90px" align="center"/>
			</td>
		</tr>
		<tr height="427px">
			<td colspan="2" align="center" style="background-color:white; border: 1px solid #9f9f9f; border-radius: 3px;">
			
					
					<div >
						<img  src="images/demo1.jpg"/>
					</div>
				
		
			</td>
		</tr>
		<tr height="60px">
			<td style="text-align:center;">
				<img src="images/back.png" width="50px" alt="Back"/>
			</td>
			<td style="text-align:center;">
				<img src="images/cloud.png" width="50px" alt="Save" />
			</td>
			
		</tr>
	</table>
	
	<!-- <img src="images/cloud2.png"  alt="cloud"  class="sectionimg" usemap="#cloudmap"/>
	<map name="cloudmap">
		<area shape="rect" coords="40,100,160,150" href="<?=$map1?>" alt="New Card">
		<area shape="rect" coords="185,60,360,110" href="<?=$map2?>" alt="Existing Card">
	</map> -->
    <!-- Main content -->
  </section>
	<div>
		
	</div>
  <footer>
    <!-- Footer -->
	
    <?
	if(!include 'home/footer.inc.php'){
			echo ERR_ON_INC_MAIN_PAGE;
		} 
	?>
    <!-- Footer -->
  </footer>
</body>

</html>
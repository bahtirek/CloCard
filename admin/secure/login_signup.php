<?
	//error_reporting(0);
	require_once "inc/lib.inc.php";
	require_once "inc/data.inc.php";
	require_once "admin/secure/secure.php";
	//set_error_handler("myError");
	

	if($_SERVER['REQUEST_METHOD']=='POST'){
		if($_POST['login']){
			$email = strtolower(trim(strip_tags($_POST["email"])));
			$password = trim(strip_tags($_POST["password"]));
			if($email and $password){
				if($userData = userLoginCheck($email, $password)){///secure.php
					//$userData['hash'] = 
					$userDataStr = base64_encode(serialize($userData));
					setcookie("userdata", $userDataStr);///user id and name
					$originPage = $_COOKIE['originpage'];
					header ("Location: $originPage");
					exit;
				}else{$formError = 'Wrong email or password'; echo $formError;}
			}else{$formError = 'Wrong email or password'; echo $formError;}
		}
	}


?>
<!DOCTYPE html>
<html>

<head>
  <title>Login/Signup</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
	<header>
    <!-- Header -->
	<span class="slogan">Keep your card in cloud</span>
    <img src="images/clocardlogo.png"  alt="cloud" class="logo" usemap="#logo"/>
	<map name="logo">
		<area shape="rect" coords="0,0,309,84" href="index.php" alt="New Card">
	</map>
	
	
		<!-- Menu -->
	<?
		if($logStatus["log"]=="LogOut"){
			include'home/navin.inc.php';
		}else{
			include'home/navout.inc.php';
		}
	?>
		<!-- menu -->

    <!-- header -->
  </header>

  <section id="main">
    
    <h1>Login or Signup</h1>
    <div class="login">
    <!-- Main content -->
	<table >
		<tr>
			<td valign="top" >
				<form action="<?= $_SERVER['PHP_SELF']?>" method="post">
					<fieldset>
						<legend>Login</legend>
						<div>
							<label>Email :</label>
							<input type="text" name="email" />
						</div>
						<div>
							<label>Password :</label>
							<input type="password" name="password" />
						</div>
						<div>
							<input type="hidden" name="login" value="1">
						<div>
						<br>
						</div>
						<input type="submit" value="Login" >
						</div>
					</fieldset>
				</form>
			</td>
			<td valign="top"><h1></h1></td>
			<td valign="top">
				<form action="<?= $_SERVER['PHP_SELF']?>"  method="post">
					<fieldset>
						<legend>Signup</legend>
						<div>
							<label>Name :</label>
							<input type="text" name="name" />
						</div>
						<div>
							<label>Email :</label>
							<input type="text" name="email" />
						</div>
						<div>
							<label>Password :</label>
							<input type="password" name="password" />
						</div>
						<div>
							<label>Password :</label>
							<input type="password" name="password2" />
						</div>
						<div>
							<input type="hidden" name="signup" value="2">
						</div>
						<br>
						<div>
						<input type="submit" value="Signup" />
						</div>
					</fieldset>	
				</form>
			</td>
		</tr>
	</table>
	</div>
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
  
    <!-- Main content -->
  </div>

</body>

</html>



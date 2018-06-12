		
		
		<ul>
			<li class="dropdown">
				<a href="#" >Create Clocard</a>
				<div class="dropdown-content">
				    <a href="<?=$navpath;?>newcard/createnewcard.php">New Clocard</a>
				    <a href="<?=$navpath;?>fromexisting/phoneformaster.php">From Existing</a>
				    <a href="<?=$navpath;?>newmaster/createmaster.php">Master</a>
				</div>
			  </li>
			<li><a href='<?=$navpath;?>myclocard/myclocard.php'>My Clocard</a></li>
			<li><a href='#'>Contact Us</a></li>
			<li><a href='#'>FAQ</a></li>
			<li><a href='#'><?echo "Hi, ",$logStatus["username"]?></a></li>
			<li><a href="<?=$logStatus['link']?>" ><?=$logStatus['log']?></a></li>
			
			<!--<li><a href='.php'></a></li>-->
		</ul>
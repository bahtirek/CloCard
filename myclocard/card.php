<?
include"../inc/matrix.php";

$mtxproba = [
			"companyname"=> "", 
			"companyname2"=> "", 
			"slogan"=> "", 
			"flname" => "",
			"position" => "",
			"phonestring1"=>"", 
			"phonestring2"=>"", 
			"phonestring3"=>"",
			"phonestring4"=>"",
			"phonestring5"=>"",
			"faxstring"=>"",//// phonestring4 is a fax number
			"emailcompany" => "",
			"emailpersonal" => "",
			"website"=> "",
			"weblink" => "",			
			"address"=> "", 
			"address2"=> "", 
			"city"=> "", 
			"st"=> "",
			"pustota"=>"&nbsp;&nbsp;",
			"facebook"=> "", 
			"twitter"=> "",
			"description1"=> "", 
			"description2"=> "", 
			"description3"=> "", 
			"description4"=> "", 
			"description5"=> "", 
			"description6"=> "", 
			"description7"=> "", 
			"description8"=> "", 
			"description9"=> "", 
			"description10"=> ""];
		

function drawNewCard2($mycard, $name, $phone){
	global $states;
	global $mtxproba;
	$proba = $mtxproba;
	if($mycard or $name or $phone){
		foreach($proba as $key=>$val){
			if($mycard[$key]) $proba[$key] = $proba[$key].$mycard[$key];
			if($phone[$key])$proba[$key] = $phone[$key];
			if($name[$key])$proba[$key] = $name[$key];
		}
	}
	foreach($states as $key => $val){
			if($mycard['state']==$key){
				$state = $val;
			}
		}
	$proba["st"] = $state."&nbsp;&nbsp;".$mycard["zipcode"];
	$proba["flname"] = $name["firstname"]."&nbsp;&nbsp;".$name["lastname"];
	//if(!empty($proba["emailcompany"])) {$proba["email1"] = "E-mail:&nbsp;&nbsp;".$proba["email1"];}
	$comp = array_slice($proba, 0,5);
	$ph = array_slice($proba, 5,4);
	$descr = array_slice($proba, 20);
	$webad = array_slice($proba,9,11);
	if($mycard["emailcompany"]){
		$webad["emailcompany"]= "E-mail:&nbsp;&nbsp;".$mycard["emailcompany"];
	}
	if($name["emailpersonal"]){
		$webad["emailpersonal"]= "E-mail:&nbsp;&nbsp;".$name["emailpersonal"];
	}
	
	$webad["website"]= $mycard["website"];
	
	echo"<table align=\"center\" >";
	if($mycard["logo"]){
		echo "<tr><td><img src=\"", "../",$mycard["logo"],"\" width=\"200\" align=\"center\" class=\"image\"></td></tr>";
	}
	
	foreach($comp as $key=>$val){
		if($comp[$key]){
			if($comp[$key]==$comp["slogan"]){
				echo "<tr>\n";
					echo "<td style=\"font-style:italic\">",$comp[$key],"</td>";
				echo "</tr>";
			}else{
				echo "<tr>\n";
					echo "<td>",$comp[$key],"</td>";
				echo "</tr>";
			}
		}
	}
	echo "<br>";
	echo"</table>";
	echo"<table style=\"align=\"center\" >";
	foreach($ph as $key=>$val){
		if($ph[$key]){
			echo "<tr>\n";
				echo "<td style=\"text-align: left;\">",$ph[$key],"</td>";
			echo "</tr>";
		}
	}

	
	echo"</table>";	
	
	echo"<table align=\"center\">";
	foreach($webad as $key=>$val){
		if($webad[$key]){
			echo "<tr>\n";
				echo "<td>",$webad[$key],"</td>";
			echo "</tr>";
		}
	}
	echo"</table>";
	echo"<ul>";
	foreach($descr as $key=>$val){
		if($descr[$key])
			echo "<li style=\"text-align:left;\">", $descr[$key],"</li>";
	}
	echo"</ul>";
	
//return $proba;

}

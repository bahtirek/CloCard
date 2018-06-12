<?
/////adding new user to dB
function saveUser($email, $hash, $name){
	global $link;
	if ($email and $hash and $name){
		$sql = 'INSERT INTO users (email, password, name)
		                    VALUES(?,?,?)';
		
		if(!$stmt = mysqli_prepare($link, $sql))
			return false;
		mysqli_stmt_bind_param($stmt, "sss", $email, $hash, $name);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return true;
	}
	return false;
}
///// end of adding new user to dB

//////   adding phone data to phone table

function addPhone($phonenumber, $areacode, $ptype){
	global $link;
	//echo $phonenumber, $areacode;
	if($phonenumber and $areacode){
		$sql = "INSERT INTO phone (phonenumber, areacode, ptype)
							VALUES (?, ?, ?)";
	
		if(!$stmt = mysqli_prepare($link, $sql)){
			echo "error";
			return false;
			exit;
		}
		mysqli_stmt_bind_param($stmt, 'iis', $phonenumber, $areacode, $ptype);
		mysqli_stmt_execute($stmt);
		if(mysqli_stmt_error($stmt)){
			printf("Error:on add name %s.\n", mysqli_stmt_error($stmt));
		}
		mysqli_stmt_close($stmt); 
		return true;
	}
}
//////   END OF  --  adding phone data to phone table

//////   adding ext data to phone table

function addExt($ext, $nameOnCardId, $extPos){
	global $link;
	//echo $phonenumber, $areacode;
	if($ext AND $nameOnCardId AND $extPos){
		$sql = "INSERT INTO ext (ext, nameoncard_id, extpos)	VALUES (?, ?, ?)";
		if(!$stmt = mysqli_prepare($link, $sql)){
			return false;
			exit;
		}
		mysqli_stmt_bind_param($stmt, 'sii', $ext, $nameOnCardId, $extPos);
		mysqli_stmt_execute($stmt);
		if(mysqli_stmt_error($stmt)){
			printf("Error:on add name %s.\n", mysqli_stmt_error($stmt));
		}
		mysqli_stmt_close($stmt); 
		return true;
	}
}
//////   END OF  --  adding ext data to phone table


/////////       adding card info to card table

function addToCard($array){
	global $link;
	extract($array);
	$field = "";
	//print_r($array);
	$sql = "INSERT INTO card (companyname, 
								companyname2, 
								slogan, 
								fax,
								address, 
								address2, 
								city, 
								state, 
								emailcompany,
								zipcode,
								website,
								facebook, 
								twitter, 
								description1, 
								description2,
								description3,
								description4,
								description5,
								description6,
								description7,
								description8,
								description9,
								description10,
								field,
								logo,
								cardtype)
						VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	if(!$stmt = mysqli_prepare($link, $sql)){
		return false;
		exit;
	}
	mysqli_stmt_bind_param($stmt, 'ssssssssssssssssssssssssss',  $companyname, 
														$companyname2, 
														$slogan, 
														$fax,
														$address, 
														$address2, 
														$city, 
														$state, 
														$emailcompany,
														$zipcode,
														$website, 
														$facebook, 
														$twitter, 
														$description1, 
														$description2,
														$description3,
														$description4,
														$description5,
														$description6,
														$description7,
														$description8,
														$description9,
														$description10,
														$field,
														$logo,
														$cardtype);
	mysqli_stmt_execute($stmt);
	if(mysqli_stmt_error($stmt)){
		printf("Error:on add name %s.\n", mysqli_stmt_error($stmt));
	}
	mysqli_stmt_close($stmt);
	return true;		
}

/////////       END OF -- adding card info to card table


/////////       adding nameoncard to card table

function addNameOnCard($array){
	global $link;
	extract($array);
	$sql = "INSERT INTO nameoncard ( firstname,
									 lastname,
									 position,
									 emailpersonal,
									 weblink,
									 card_id,
									 ext,
									 user_id)
						VALUES (?,?,?,?,?,?,?,?)";
	if(!$stmt = mysqli_prepare($link, $sql)){
		return false;
		exit;
	}
	mysqli_stmt_bind_param($stmt, 'sssssisi',  	 $firstname,
													 $lastname,
													 $position,
													 $emailpersonal,
													 $weblink,
													 $cardid,
													 $ext,
													 $userid);
	mysqli_stmt_execute($stmt);
	if(mysqli_stmt_error($stmt)){
		printf("Error:on add name %s.\n", mysqli_stmt_error($stmt));
	}
	
	mysqli_stmt_close($stmt);
			
}
/////////       END OF -- adding nameoncard info to card table

////////////                                       ***************              Db UPDATE      ****************


/////////       update card info 

function updateCard($array, $cardId){
	global $link;
	extract($array);
	$field = "";
	//print_r($array);
	$sql = "UPDATE card SET companyname=?, 
								companyname2=?, 
								slogan=?, 
								fax=?,
								address=?, 
								address2=?, 
								city=?, 
								state=?, 
								emailcompany=?,
								zipcode=?,
								website=?,
								facebook=?, 
								twitter=?, 
								description1=?, 
								description2=?,
								description3=?,
								description4=?,
								description5=?,
								description6=?,
								description7=?,
								description8=?,
								description9=?,
								description10=?,
								field=?,
								logo=?,
								cardtype=? 	WHERE id=?";
								
	if(!$stmt = mysqli_prepare($link, $sql)){
		return false;
		exit;
	}
	mysqli_stmt_bind_param($stmt, 'ssssssssssssssssssssssssssi',  $companyname, 
														$companyname2, 
														$slogan, 
														$fax,
														$address, 
														$address2, 
														$city, 
														$state, 
														$emailcompany,
														$zipcode,
														$website, 
														$facebook, 
														$twitter, 
														$description1, 
														$description2,
														$description3,
														$description4,
														$description5,
														$description6,
														$description7,
														$description8,
														$description9,
														$description10,
														$field,
														$logo,
														$cardtype,
														$cardId);
	mysqli_stmt_execute($stmt);
	if(mysqli_stmt_error($stmt)){
		printf("Error:on add name %s.\n", mysqli_stmt_error($stmt));
	}
	mysqli_stmt_close($stmt);
	return true;		
}


/////////       END OF -- update card info

//////   update phone data 

function updatePhone($phonenumber, $areacode, $phoneId, $ptype){
	global $link;
	//echo $phonenumber, $areacode;
	if($phonenumber and $areacode){
		$sql = "UPDATE phone SET phonenumber=?, areacode=?, ptype=? WHERE id=?";
		
		if(!$stmt = mysqli_prepare($link, $sql)){
			echo "error";
			return false;
			exit;
		}
		mysqli_stmt_bind_param($stmt, 'iisi', $phonenumber, $areacode, $ptype,$phoneId);
		mysqli_stmt_execute($stmt);
		if(mysqli_stmt_error($stmt)){
			printf("Error:on add name %s.\n", mysqli_stmt_error($stmt));
		}
		mysqli_stmt_close($stmt); 
		return true;
	}
}
//////   END OF  --  update phone data

/////////       adding nameoncard to card table

function updateNameOnCard($array){
	global $link;
	extract($array);
	$sql = "UPDATE nameoncard SET firstname=?,
									 lastname=?,
									 position=?,
									 emailpersonal=?,
									 weblink=?,
									 card_id=?,
									 ext=?,
									 user_id=? WHERE id=?";
									 
	if(!$stmt = mysqli_prepare($link, $sql)){
		return false;
		exit;
	}
	mysqli_stmt_bind_param($stmt, 'sssssisii',  	 $firstname,
													 $lastname,
													 $position,
													 $emailpersonal,
													 $weblink,
													 $cardid,
													 $ext,
													 $userid,
													 $nameoncardid);
	mysqli_stmt_execute($stmt);
	if(mysqli_stmt_error($stmt)){
		printf("Error:on add name %s.\n", mysqli_stmt_error($stmt));
	}
	
	mysqli_stmt_close($stmt);
			
}
/////////       END OF -- adding nameoncard info to card table

/////////       update ext info to ext table

	function updateExt($ext, $nameOnCardId, $extPos){
	global $link;
	$sql = "UPDATE ext SET ext=? WHERE nameoncard_id=? AND extpos=?";
	if(!$stmt = mysqli_prepare($link, $sql)){
		echo"blllll";
		return false;
		exit;
	}
	mysqli_stmt_bind_param($stmt, 'sii', $ext, $nameOnCardId, $extPos);
	mysqli_stmt_execute($stmt);
	if(mysqli_stmt_error($stmt)){
		printf("Error:on add name %s.\n", mysqli_stmt_error($stmt));
	}
	
	mysqli_stmt_close($stmt);
			
}
/////////      END OF -- update ext info to ext table

/////////      update relationship info to ext table
	function updateRelationship($phonenumber, $areacode, $phoneId){
	global $link;
	//echo $phonenumber, $areacode;
	if($phonenumber and $areacode){
		$sql = "UPDATE phone SET phonenumber=?, areacode=? WHERE id=?";
		
		if(!$stmt = mysqli_prepare($link, $sql)){
			echo "error";
			return false;
			exit;
		}
		mysqli_stmt_bind_param($stmt, 'iii', $phonenumber, $areacode, $phoneId);
		mysqli_stmt_execute($stmt);
		if(mysqli_stmt_error($stmt)){
			printf("Error:on add name %s.\n", mysqli_stmt_error($stmt));
		}
		mysqli_stmt_close($stmt); 
		return true;
	}
}
/////////      END OF -- update relationship info to ext table

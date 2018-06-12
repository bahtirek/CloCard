<legend>Company information</legend>
		
			<div>
				<label>Company Name :</label>
				<input type="text" name="companyname" <?=$readOnly?> value="<?=$card["companyname"]?>"/>
			</div>
			<div>
				<label>Company Name :</label>
				<input type="text" name="companyname2" <?=$readOnly?> value="<?= $card["companyname2"]?>"/>
			</div>
			<div>
				<label>Slogan :</label>
				<input type="text" name="slogan" <?=$readOnly?> value="<?=$card["slogan"] ?>"/>
			</div>			
			<div>
				<label>Address :</label>
				<input type="text" name="address" <?=$readOnly?> value="<?= $card["address"]?>"/>
			</div>
			<div>
				<label>Address line 2 :</label>
				<input type="text" name="address2" <?=$readOnly?> value="<?= $card["address2"]?>"/>
			</div>
			<div>
				<label>City :</label>
				<input type="text" name="city" <?=$readOnly?> value="<?= $card["city"]?>"/>
			</div>
			<div >
				<label>State :</label>
				<select name="state"   style="margin-right: 157px; margin-top: 3px;">
					<?foreach($states as $key => $val){
						if($key == $card["state"]){
							$stateSelection = "selected";
						}
						echo "<option value=\"$val\"", $stateSelection," >", $val,"</option>\n";
						$stateSelection="";
					}?>
				</select>
				<div></div>
			</div>
			<div style="margin-top: 3px;">
				<label >Zipcode :</label>
				<input type="text" name="zipcode" <?=$readOnly?> value="<?= $card["zipcode"]?>" style="width: 80px; margin-right: 220px"/>
			</div>
			<div>
				<label>E-mail :</label>
				<input type="text" name="emailcompany" <?=$readOnly?> value="<?= $card["emailcompany"]?>"/>
			</div>
			
			<div>
				<label>Website :</label>
				<input type="text" name="website" <?=$readOnly?> value="<?= $card["website"]?>"/>
			</div>			
			<div>
				<label>Facebook :</label>
				<input type="text" name="facebook" <?=$readOnly?> value="<?= $card["facebook"]?>"/>
			</div>
			<div>
				<label>Twitter :</label>
				<input type="text" name="twitter" <?=$readOnly?> value="<?= $card["twitter"]?>"/>
			</div>
			<h3 >List your...</h3>

			<div>
				<label>Description line 1 :</label>
				<input type="text" name="description1" <?=$readOnly?> value="<?= $card["description1"]?>"/>
			</div>
			<div>
				<label>Description line 2 :</label>
				<input type="text" name="description2" <?=$readOnly?> value="<?= $card["description2"]?>"/>
			</div>
			<div>
				<label>Description line 3 :</label>
				<input type="text" name="description3" <?=$readOnly?> value="<?= $card["description3"]?>"/>
			</div>
			<div>
				<label>Description line 4 :</label>
				<input type="text" name="description4" <?=$readOnly?> value="<?= $card["description4"]?>"/>
			</div>
			<div>
				<label>Description line 5 :</label>
				<input type="text" name="description5" <?=$readOnly?> value="<?= $card["description5"]?>"/>
			</div>
			<div>
				<label>Description line 6 :</label>
				<input type="text" name="description6" <?=$readOnly?> value="<?= $card["description6"]?>"/>
			</div>
			<div>
				<label>Description line 7 :</label>
				<input type="text" name="description7" <?=$readOnly?> value="<?= $card["description7"]?>"/>
			</div>
			<div>
				<label>Description line 8 :</label>
				<input type="text" name="description8" <?=$readOnly?> value="<?= $card["description8"]?>"/>
			</div>
			<div>
				<label>Description line 9 :</label>
				<input type="text" name="description9" <?=$readOnly?> value="<?= $card["description9"]?>"/>
			</div>
			<div>
				<label>Description line 10 :</label>
				<input type="text" name="description10" <?=$readOnly?> value="<?= $card["description10"]?>"/>
			</div>
			</br>
			<div>
				<label>About yourself</label>
				<textarea rows="10" cols= "44"  name="about"><?=""?> </textarea>
			</div>
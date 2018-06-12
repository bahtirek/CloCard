<legend>Business information</legend>
			<legend>Logo</legend>
			<div >
				<?if($card["logo"]){?>
				<img src="../<?=$card["logo"]?>"  alt="logo" class="logoupload">
				<?}?>
			</div>
			<div>
				<label>Business phone 1:</label>
					<select disabled name="ptype1" class="dropdown">
					<option ><?=$phone["ptype1"]?></option>
				</Select>
				<span> : </span>
				<input type="text" name="phone1" value ="<?=$phone["phone1"]?>" readonly class="typeText companyphone" maxlength="10"/>
			</div>
			<div>
				<label>Business phone 2:</label>
					<select disabled name="ptype1" class="dropdown">
					<option ><?=$phone["ptype2"]?></option>
				</Select>
				<span> : </span>
				<input type="text" name="phone1" value ="<?=$phone["phone2"]?>" readonly class="typeText companyphone" maxlength="10"/>
			</div>
			<div>
				<label>Business phone 3:</label>
					<select disabled name="ptype1" class="dropdown">
					<option ><?=$phone["ptype3"]?></option>
				</Select>
				<span> : </span>
				<input type="text" name="phone1" value ="<?=$phone["phone3"]?>" readonly class="typeText companyphone" maxlength="10"/>
			</div>
				
			<div>
				<label>Business Name :</label>
				<input type="text" name="companyname" readonly value="<?=$card["companyname"]?>"/>
			</div>
			<div>
				<label>Business Name :</label>
				<input type="text" name="companyname2" readonly value="<?= $card["companyname2"]?>"/>
			</div>
			<div>
				<label>Slogan :</label>
				<input type="text" name="slogan" readonly value="<?=$card["slogan"] ?>"/>
			</div>			
			<div>
				<label>Address :</label>
				<input type="text" name="address" readonly value="<?= $card["address"]?>"/>
			</div>
			<div>
				<label>Address line 2 :</label>
				<input type="text" name="address2" readonly value="<?= $card["address2"]?>"/>
			</div>
			<div>
				<label>City :</label>
				<input type="text" name="city" readonly value="<?= $card["city"]?>"/>
			</div>
			
			<div style="margin-top: 3px;">
				<label >State :</label>
				<input type="text" name="state" readonly value="<?= $states[$card["state"]]?>" style="width: 80px; margin-right: 220px"/>
			</div>
			<div style="margin-top: 3px;">
				<label >Zipcode :</label>
				<input type="text" name="zipcode" readonly value="<?= $card["zipcode"]?>" style="width: 80px; margin-right: 220px"/>
			</div>
			<div>
				<label>E-mail :</label>
				<input type="text" name="emailcompany" readonly value="<?= $card["emailcompany"]?>"/>
			</div>
			
			<div>
				<label>Website :</label>
				<input type="text" name="website" readonly value="<?= $card["website"]?>"/>
			</div>			
			<div>
				<label>Facebook :</label>
				<input type="text" name="facebook" readonly value="<?= $card["facebook"]?>"/>
			</div>
			<div>
				<label>Twitter :</label>
				<input type="text" name="twitter" readonly value="<?= $card["twitter"]?>"/>
			</div>
			<h3 >List your...</h3>

			<div>
				<label>Description line 1 :</label>
				<input type="text" name="description1" readonly value="<?= $card["description1"]?>"/>
			</div>
			<div>
				<label>Description line 2 :</label>
				<input type="text" name="description2" readonly value="<?= $card["description2"]?>"/>
			</div>
			<div>
				<label>Description line 3 :</label>
				<input type="text" name="description3" readonly value="<?= $card["description3"]?>"/>
			</div>
			<div>
				<label>Description line 4 :</label>
				<input type="text" name="description4" readonly value="<?= $card["description4"]?>"/>
			</div>
			<div>
				<label>Description line 5 :</label>
				<input type="text" name="description5" readonly value="<?= $card["description5"]?>"/>
			</div>
			<div>
				<label>Description line 6 :</label>
				<input type="text" name="description6" readonly value="<?= $card["description6"]?>"/>
			</div>
			<div>
				<label>Description line 7 :</label>
				<input type="text" name="description7" readonly value="<?= $card["description7"]?>"/>
			</div>
			<div>
				<label>Description line 8 :</label>
				<input type="text" name="description8" readonly value="<?= $card["description8"]?>"/>
			</div>
			<div>
				<label>Description line 9 :</label>
				<input type="text" name="description9" readonly value="<?= $card["description9"]?>"/>
			</div>
			<div>
				<label>Description line 10 :</label>
				<input type="text" name="description10" readonly value="<?= $card["description10"]?>"/>
			</div>
			</br>
			
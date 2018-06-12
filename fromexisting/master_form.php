<legend>Company information</legend>
			<label>Logo</label>
			<?if($card["logo"]){
				?>
				<div >
					<img src="../<?=$card["logo"]?>"  alt="logo" class="logoupload">
				</div>
				<?
			}?>
			
			<?if($card["companyname"]){
				?>
				<div>
				<label>Company Name :</label>
				<input type="text" name="companyname" readonly value="<?=$card["companyname"]?>"/>
				</div>
				<?
			}?>
			
			<?if($card["companyname2"]){
				?>
				<div>
				<label>Company Name :</label>
				<input type="text" name="companyname2" readonly value="<?= $card["companyname2"]?>"/>
				</div>
				<?
			}?>
			<?if($card["slogan"]){
				?>
				<div>
				<label>Slogan :</label>
				<input type="text" name="slogan" readonly value="<?=$card["slogan"] ?>"/>
				</div>
				<?
			}?>
			
			<?if($phone["phonestring1"]){
				?>
				<div>
				<label>Business phone 1:</label>
				<input type="text" name="phone1" readonly value ="<?=$phone["phonestring1"]?>" class="typeText companyphone" maxlength="10"/>
				</div>
				<?
			}?>
			
			<?if($phone["phonestring2"]){
				?>
				<div>
					<label>Business phone 2:</label>
					<input type="text" name="phone2" readonly value ="<?=$phone["phonestring2"]?>" class="typeText companyphone"/>
				</div>
				<?
			}?>
			<?if($phone["phonestring3"]){
				?>
				<div>
				<label>Business phone 3:</label>			
				<input type="text" name="phone3" readonly value ="<?=$phone["phonestring3"]?>" class="typeText companyphone"/>
				</div>
				<?
			}?>
			
			<?if($card["address"]){
				?>
				<div>
					<label>Address :</label>
					<input type="text" name="address" readonly value="<?= $card["address"]?>"/>
				</div>
				<?
			}?>
			<?if($card["address2"]){
				?>
				<div>
				<label>Address line 2 :</label>
				<input type="text" name="address2" readonly value="<?= $card["address2"]?>"/>
				</div>
				<?
			}?>
			
			<?if($card["city"]){
				?>
				<div>
				<label>City :</label>
				<input type="text" name="city" readonly value="<?= $card["city"]?>"/>
				</div>
				<?
			}?>
			
			<?if($card["state"]){
				?>
				<div >
				<label>State :</label>
					<?foreach($states as $key => $val){
						if($key == $card["state"]){
							?><input type="text" name="state" readonly value="<?= $val?>"/> <?
						}
					}?>
				</div>
				<?
			}?>
			
			<?if($card["zipcode"]){
				?>
				<div style="margin-top: 3px;">
				<label >Zipcode :</label>
				<input type="text" name="zipcode" readonly value="<?= $card["zipcode"]?>" style="width: 80px; margin-right: 220px"/>
				</div>
				<?
			}?>
			
			<?if($card["emailcompany"]){
				?>
				<div>
				<label>E-mail :</label>
				<input type="text" name="emailcompany" readonly value="<?= $card["emailcompany"]?>"/>
				</div>
				<?
			}?>
			
			<?if($card["website"]){
				?>
				<div>
				<label>Website :</label>
				<input type="text" name="website" readonly value="<?= $card["website"]?>"/>
				</div>
				<?
			}?>
			
			<?if($card["facebook"]){
				?>
				<div>
				<label>Facebook :</label>
				<input type="text" name="facebook" readonly value="<?= $card["facebook"]?>"/>
				</div>
				<?
			}?>			
			
			<?if($card["twitter"]){
				?>
				<div>
				<label>Twitter :</label>
				<input type="text" name="twitter" readonly value="<?= $card["twitter"]?>"/>
				</div>
				<?
			}?>
			
			
			<h3 >List your...</h3>
			<?if($card["description1"]){
				?>
				<div>
				<label>Description line 1 :</label>
				<input type="text" name="description1" readonly value="<?= $card["description1"]?>"/>
				</div>
				<?
			}?>
			
			<?if($card["description2"]){
				?>
				<div>
				<label>Description line 2 :</label>
				<input type="text" name="description2" readonly value="<?= $card["description2"]?>"/>
				</div>
				<?
			}?>
			
			<?if($card["description3"]){
				?>
				<div>
				<label>Description line 3 :</label>
				<input type="text" name="description3" readonly value="<?= $card["description3"]?>"/>
				</div>
				<?
			}?>
			
			<?if($card["description4"]){
				?>
				<div>
				<label>Description line 4 :</label>
				<input type="text" name="description4" readonly value="<?= $card["description4"]?>"/>
				</div>
				<?
			}?>
			
			<?if($card["description5"]){
				?>
				<div>
				<label>Description line 5 :</label>
				<input type="text" name="description5" readonly value="<?= $card["description5"]?>"/>
				</div>
				<?
			}?>
			
			<?if($card["description6"]){
				?>
				<div>
				<label>Description line 6 :</label>
				<input type="text" name="description6" readonly value="<?= $card["description6"]?>"/>
				</div>
				<?
			}?>
			
			<?if($card["description7"]){
				?>
				<div>
				<label>Description line 7 :</label>
				<input type="text" name="description7" readonly value="<?= $card["description7"]?>"/>
				</div>
				<?
			}?>
			
			<?if($card["description8"]){
				?>
				<div>
				<label>Description line 8 :</label>
				<input type="text" name="description8" readonly value="<?= $card["description8"]?>"/>
				</div>
				<?
			}?>
			
			<?if($card["description9"]){
				?>
				<div>
				<label>Description line 9 :</label>
				<input type="text" name="description9" readonly value="<?= $card["description9"]?>"/>
				</div>
				<?
			}?>
			
			<?if($card["description10"]){
				?>
				<div>
				<label>Description line 10 :</label>
				<input type="text" name="description10" readonly value="<?= $card["description10"]?>"/>
			</div>
				<?
			}?>
			
			</br>
			<?if($card["description11"]){
				?>
				<div>
				<label>About yourself</label>
				<textarea rows="10" cols= "44"  name="about"><?=$card["description11"]?> </textarea>
				</div>
				<?
			}?>
			
			
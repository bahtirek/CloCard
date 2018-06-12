<legend>Phone</legend>

	
		<div>
			<label>Business phone 1:</label>
			<select name="ptype1" class="dropdown">
			<?
				$ptype = $phone["ptype1"];
				foreach($phonetype as $key => $val){
					if($key == $ptype){
						$ptypeSelection = "selected";
					}
					echo "<option value=\"$key\"", $ptypeSelection," >", $key,"</option>\n";
					$ptypeSelection="";
					
			}?>
			</Select>
			<span> : </span>
			<input type="text" name="phone1" value ="<?=$phone["phone1"]?>" class="typeText companyphone" maxlength="10"/>
			
		</div>
		
		<div>
			<label>Business phone 2:</label>
			<select name="ptype2" size="1" class="dropdown">
			<?
				$ptype = $phone["ptype2"];
				foreach($phonetype as $key => $val){
					if($key == $ptype){
						$ptypeSelection = "selected";
					}
					echo "<option value=\"$key\"", $ptypeSelection," >", $key,"</option>\n";
					$ptypeSelection="";
					
			}?>
			</Select>
			<span> : </span>
			<input type="text" name="phone2" value ="<?=$phone["phone2"]?>" class="typeText companyphone"/>
			
		</div>
		<div>
			<label>Business phone 3:</label>			
			<select name="ptype3" size="1" class="dropdown">
			<?
				$ptype = $phone["ptype3"];
				foreach($phonetype as $key => $val){
					if($key == $ptype){
						$ptypeSelection = "selected";
					}
					echo "<option value=\"$key\"", $ptypeSelection," >", $key,"</option>\n";
					$ptypeSelection="";
					
			}?>
			</Select>
			<span> : </span>
			<input type="text" name="phone3" value ="<?=$phone["phone3"]?>" class="typeText companyphone"/>
			 
		</div>
		

			<h4></h4>
		<div>
			<label>Personal phone 1:</label>			
			<select name="ptype4" class="dropdown">
			<?
				$ptype = $phone["ptype4"];
				foreach($phonetype as $key => $val){
					if($key == $ptype){
						$ptypeSelection = "selected";
					}
					echo "<option value=\"$key\"", $ptypeSelection," >", $key,"</option>\n";
					$ptypeSelection="";
					
			}?>
			</Select>
			<span> : </span>
			<input type="text" name="phone4" value ="<?=$phone["phone4"]?>" class="typeText phone" />
			
			<input type="text" name="ext4" value ="<?=$phone["ext4"]?>" value placeholder="Ext" class="typeText ext"/> 
		</div>
		<div>
			<label>Personal phone 2:</label>			
			<select name="ptype5" size="1" class="dropdown">
			<?
				$ptype = $phone["ptype5"];
				foreach($phonetype as $key => $val){
					if($key == $ptype){
						$ptypeSelection = "selected";
					}
					echo "<option value=\"$key\"", $ptypeSelection," >", $key,"</option>\n";
					$ptypeSelection="";
					
			}?>
			</Select>
			<span> : </span>
			<input type="text" name="phone5" value ="<?=$phone["phone5"]?>" class="typeText phone"/>
			
			<input type="text" name="ext5" value ="<?=$phone["ext5"]?>" value placeholder="Ext" class="typeText ext"/> 
		</div>


		
		

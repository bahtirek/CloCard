<legend>Personal information</legend>
			<div>
				<label>First Name :</label>
				<input type="text" name="firstname" value="<?= $name["firstname"]?>"/>
			</div>
			<div>
				<label>Last Name :</label>
				<input type="text" name="lastname" value="<?= $name["lastname"]?>"/>
			</div>
			<div>
				<label>Position :</label>
				<input type="text" name="position" value="<?= $name["position"]?>"/>
			</div>
			<div>
				<label>E-mail :</label>
				<input type="text" name="emailpersonal" value="<?= $name["emailpersonal"]?>"/>
			</div>
			<div>
				<label>Personal webpage :</label>
				<input type="text" name="weblink" value="<?= $name["weblink"]?>"/>
			</div>
			<div>
				<label>Personal phone 1:</label>			
				<select name="ptype4" class="dropdown">
				<option value="Office">Phone</option>
				<option value="Cell">Cell</option>
				<option value="Phone">Office</option>
				<option value="Desk">Desk</option>
				</Select>
				<span> : </span>
				<input type="text" name="phone4" value="<?=$phone["phone4"]?>" class="typeText phone" maxlength="10"/>
				
				<input type="text" name="ext4" value="<?=$phone["ext4"]?>" value placeholder="Ext" class="typeText ext"/> 
			</div>
			<div>
				<label>Personal phone 2:</label>			
				<select name="ptype5" size="1" class="dropdown">
				<option value="Office">Phone</option>
				<option value="Cell">Cell</option>
				<option value="Phone">Office</option>
				<option value="Phone">Desk</option>
				</Select>
				<span> : </span>
				<input type="text" name="phone5" value="<?=$phone["phone5"]?>" class="typeText phone"/>
				<input type="text" name="ext5" value="<?=$phone["ext5"]?>" value placeholder="Ext" class="typeText ext"/> 
			</div>
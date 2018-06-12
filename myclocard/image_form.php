<legend>Logo</legend>
			<div >
				<?if ($_GET["cardreviewed"]=="edit"){
					if($card["logo"]){
						?><img src="../<?=$card["logo"]?>"  alt="logo" class="logoupload"><?
					}
				}else{
					if($card["logo"]){
					?><img src="../<?=$card["logo"]?>"  alt="logo" class="logoupload"><?
					}
				}?>
				<div>
					<?if($card["logo"]){?><input type="checkbox" name="logoremove" value="1">Remove Logo<?}?>
					<input type="file" name="image" />
				</div>
			</div>
			
<legend>Logo</legend>
			<div >
				<?if ($_GET["cardreviewed"]=="edit"){
					?><img src="<?=$card["logo"]?>"  alt="logo" class="logoupload">
					
					<?
				}?>
				<input type="file" name="image" />
			</div>
			
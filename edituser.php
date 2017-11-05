<div>
<?php
$userid = $_GET['UserID'];
$userquery = 'SELECT * FROM User INNER JOIN LanguageLink ON User.UserID = LanguageLink.UserID WHERE User.UserID = '.$userid.' LIMIT 1';
$userresult = $db->query($userquery);
while ($line = $userresult->fetchArray(SQLITE3_ASSOC)) {
	?>
	<form id="userformular" action="index.php?main=changeuser" method="POST">
		<fieldset id="collaborator">
			<input name="UserID" type="hidden" value="<?php echo $userid ?>">
			<input name="aktion" type="hidden" value="changename">
			<label for="UserForename">Vorname</label>
			<input type="text" name="UserForename" value="<?php echo $line['UserForename']; ?>">
			<label for="UserName">Name</label>
			<input type="text" name="UserName" value="<?php echo $line['UserName']; ?>">
			<button type="submit" name="action">Name ändern</button>
		</fieldset>
	</form>
	<ul class="Einrichtungen">
		<?php
		$facilityquery = "SELECT * FROM FacilityLink WHERE UserID =".$userid;
		$facilityresult = $db->query($facilityquery);
		while ($facilities = $facilityresult->fetchArray(SQLITE3_ASSOC)) {
			?>
			<li>
				<form class="einrichtungsformular" action="index.php?main=changeuser" method="POST">
					<fieldset class="einrichtungen">
						<input name="UserID" type="hidden" value="<?php echo $userid ?>">
						(<?php echo $facilities['FacilityID']; ?>)
						<input name="FacilityLinkID" type="hidden" value="<?php echo $facilities['FacilityLinkID']; ?>">
						<input name="aktion" type="hidden" value="changefacility">
						<label for="facility">Einrichtung</label>
						<select name="FacilityID" size="1">
							<?php
								foreach($einrichtungen as $EinrichtungsID => $einrichtung) {
									if ($einrichtungen[$facilities['FacilityID']]==$einrichtung) $selected=" selected";
									else unset($selected);
									echo '<option value='.$EinrichtungsID.' '.$selected.'>'.$einrichtung.'</option>';
								}
							?>
						</select>
						<button type="submit" name="action">Einrichtung ändern</button>
						<button type="submit" name="action" formaction="index.php?main=changeuser&aktion=deletefacility&FacilityLinkID=<?php echo $facilities['FacilityLinkID']; ?>">löschen</button>
					</fieldset>
				</form>
			</li>
		<?php } ?>
		<li>
			<form id="einrichtungsformular" action="index.php?main=changeuser" method="POST">
				<fieldset class="einrichtungen">
					<input name="UserID" type="hidden" value="<?php echo $userid ?>">
					<input name="aktion" type="hidden" value="newfacility">
					<label for="facility">Einrichtung</label>
					<select name="FacilityID" size="1">
						<?php
							foreach($einrichtungen as $EinrichtungsID => $einrichtung) {
								echo '<option value='.$EinrichtungsID.' '.$selected.'>'.$einrichtung.'</option>';
							}
						?>
					</select>
					<button type="submit" name="action">Einrichtung hinzufügen</button>
				</fieldset>
			</form>
		</li>
	</ul>	
	<ul class="LanguageSkills">
		<?php
		$languagequery = "SELECT * FROM LanguageLink WHERE UserID =".$userid;
		$languageresult = $db->query($languagequery);
		while ($languages = $languageresult->fetchArray(SQLITE3_ASSOC)) {
			?>
			<li>
				<form class="sprachenformular" action="index.php?main=changeuser" method="POST">
					<fieldset id="languages">
						<input name="UserID" type="hidden" value="<?php echo $userid ?>">
						(<?php echo $languages['LanguageLinkID']; ?>)
						<input name="LanguageLinkID" type="hidden" value="<?php echo $languages['LanguageLinkID']; ?>">
						<input name="aktion" type="hidden" value="changelanguage">
						<label for="language">Sprache</label>
						<select name="Sprache" size="1">
							<?php
								foreach($sprachen as $SprachID => $sprache) {
									if ($sprachen[$languages['LanguageID']]==$sprache) $selected=" selected";
									else unset($selected);
									echo '<option value='.$SprachID.' '.$selected.'>'.$sprache.'</option>';
								}
							?>
						</select>
						<label for="SkillLevel">Sprachlevel</label>
						<select name="SkillLevel" size="1">
							<?php
								foreach($sprachlevel as $level) {
									if ($languages['SkillLevel']==$level) $selected=" selected";
									else unset($selected);
									echo '<option '.$selected.'>'.$level.'</option>';
								}
							?>
						</select>
						<label for="zertifiziert">Zertifiziert</label>
						<input type="checkbox" name="zertifiziert" value="1" <?php if ($languages['zertifiziert']=="1") echo 'checked'; ?>>
						<button type="submit" name="action">Sprache ändern</button>
						<button type="submit" name="action" formaction="index.php?main=changeuser&aktion=deletelanguage&LanguageLinkID=<?php echo $languages['LanguageLinkID']; ?>">löschen</button>
					</fieldset>
				</form>
			</li>
		<?php } ?>
<?php } ?>
		<li>
			<form id="sprachenformular" action="index.php?main=changeuser" method="POST">
				<fieldset id="languages">
					<input name="UserID" type="hidden" value="<?php echo $userid ?>">
					<input name="aktion" type="hidden" value="newlanguage">
					<label for="language">Sprache</label>
					<select name="Sprache" size="1">
						<?php
							foreach($sprachen as $SprachID => $sprache) {
								echo '<option value='.$SprachID.'>'.$sprache.'</option>';
							}
						?>
					</select>
					<label for="SkillLevel">Sprachlevel</label>
					<select name="SkillLevel" size="1">
						<?php
							foreach($sprachlevel as $level) {
								echo '<option>'.$level.'</option>';
							}
						?>
					</select>
					<label for="zertifiziert">Zertifiziert</label>
					<input type="checkbox" name="zertifiziert" value="1">
					<button type="submit" name="action">Sprache hinzufügen</button>
				</fieldset>
			</form>
		</li>
	</ul>
<form id="userformular" action="index.php?main=changeuser" method="POST">
	<fieldset id="newcollaborator">
		<input name="aktion" type="hidden" value="newuser">
		<label for="UserForename">Vorname</label>
		<input type="text" name="UserForename" placeholder="Vorname">
		<label for="UserName">Name</label>
		<input type="text" name="UserName" placeholder="Nachname">
		<button type="submit" name="action">User anlegen</button>
	</fieldset>
</form>
<form id="facilityformular" action="index.php?main=changeuser" method="POST">
	<fieldset id="createfacility">
		<input name="aktion" type="hidden" value="createfacility">
		<label for="Facility">Einrichtung</label>
		<input type="text" name="Facility" placeholder="Einrichtung">
		<button type="submit" name="action">Einrichtung anlegen</button>
	</fieldset>
</form>
<form id="languageformular" action="index.php?main=changeuser" method="POST">
	<fieldset id="createlanguage">
		<input name="aktion" type="hidden" value="createlanguage">
		<label for="language">Sprache</label>
		<input type="text" name="LanguageNameShort" placeholder="Kurzbezeichnung">
		<input type="text" name="LanguageName" placeholder="Sprache">
		<button type="submit" name="action">Sprache anlegen</button>
	</fieldset>
</form>
</div>
<?php
$countresults = $db->query('SELECT COUNT(*) FROM User INNER JOIN LanguageLink ON User.UserID = LanguageLink.UserID WHERE User.UserID = '.$_GET['UserID'].' LIMIT 1');
while ($row = $countresults->fetchArray()) {
   if($row["COUNT(*)"]>0) $userquery = 'SELECT * FROM User INNER JOIN LanguageLink ON User.UserID = LanguageLink.UserID WHERE User.UserID = '.$_GET['UserID'].' LIMIT 1';
   else $userquery = 'SELECT * FROM User WHERE UserID='.$_GET['UserID'];
}
$userresult = $db->query($userquery);
while ($line = $userresult->fetchArray(SQLITE3_ASSOC)) {
	$userid = $line['UserID'];
	echo '<h2><div class="collaborator"><a href="?main=user&UserID='.$userid.'">'.$line['UserForename'].' '.$line['UserName'].'</a></div></h2>';	
	echo '<p>Einrichtung(en)</p>';
	echo '<ul class="Facilities">';
	$facilityquery = "SELECT * FROM FacilityLink WHERE UserID =".$userid;
	$facilityresult = $db->query($facilityquery);
	while ($facilities = $facilityresult->fetchArray(SQLITE3_ASSOC)) {
		echo '<li><a href="?main=facility&FacilityID='.$facilities['FacilityID'].'">'.$einrichtungen[$facilities['FacilityID']].'</a></li>';
	}
	echo '</ul>';	
	echo '<p>Sprache(n)</p>';
	echo spokenlanguages($userid,$sprachen);
}
echo '<a href="?main=edituser&UserID='.$userid.'">Edit</a>';
?>
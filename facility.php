<?php
$countquery = 'SELECT count(*) FROM User INNER JOIN FacilityLink ON User.UserID = FacilityLink.UserID WHERE FacilityLink.FacilityID = '.$_GET['FacilityID'];
$result = $db->query($countquery);
while ($number = $result->fetchArray(SQLITE3_ASSOC)) {
	$sum = $number['count(*)'];
}
echo $sum.' KollegInnen die in '.$einrichtungen[$_GET['FacilityID']].' arbeiten:';
$order = "ORDER by User.UserName asc";
$userquery = 'SELECT * FROM User INNER JOIN FacilityLink ON User.UserID = FacilityLink.UserID WHERE FacilityLink.FacilityID = '.$_GET['FacilityID'].' '.$order;
$userresult = $db->query($userquery);
?>
<ul class="collaborators">
	<?php
		while ($line = $userresult->fetchArray(SQLITE3_ASSOC)) {
			$userid = $line['UserID'];
			echo '<li><div class="collaborator"><a href="?main=user&UserID='.$userid.'">'.$line['UserForename'].' '.$line['UserName'].'</a>';
			echo facilities($userid,$einrichtungen);
			echo spokenlanguages($userid,$sprachen);
			echo '</div></li>';
		}
?>
</ul>
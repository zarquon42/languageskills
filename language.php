<?php
$countquery = 'SELECT count(*) FROM User INNER JOIN LanguageLink ON User.UserID = LanguageLink.UserID WHERE LanguageLink.LanguageID = '.$_GET['LanguageID'];
$result = $db->query($countquery);
while ($number = $result->fetchArray(SQLITE3_ASSOC)) {
	$sum = $number['count(*)'];
}
echo $sum.' KollegInnen die '.$sprachen[$_GET['LanguageID']].' sprechen:';
$order = "ORDER by User.UserName asc";
$userquery = 'SELECT * FROM User INNER JOIN LanguageLink ON User.UserID = LanguageLink.UserID WHERE LanguageLink.LanguageID = '.$_GET['LanguageID'].' '.$order;
$userresult = $db->query($userquery);
?>
<ul class="collaborators">
	<?php
		while ($line = $userresult->fetchArray(SQLITE3_ASSOC)) {
			$userid = $line['UserID'];
			echo '<li><div class="collaborator"><a href="?main=user&UserID='.$userid.'">'.$line['UserForename'].' '.$line['UserName'].'</a>';
			echo facilities($userid,$einrichtungen);
			echo spokenlanguages($userid,$sprachen);
			echo '</div>';
			echo '</li>';
		}
?>
</ul>
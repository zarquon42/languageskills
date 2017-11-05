<?php
$order = "ORDER by UserName asc";
$userquery = "SELECT * FROM User ".$order;
$results = $db->query($userquery);
?>
<ul class="collaborators">
	<?php
	while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
		$userid = $row['UserID'];
		echo '<li><div class="collaborator"><a href="?main=user&UserID='.$userid.'">'.$row['UserForename'].' '.$row['UserName'].'</a>';
		echo facilities($userid,$einrichtungen);
		echo spokenlanguages($userid,$sprachen);
		echo '</div></li>';
	}
	?>
</ul>
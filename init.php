<?php
@error_reporting(E_ALL ^ E_NOTICE);
setlocale (LC_ALL, 'de_DE');
$sprachlevel=array('-','A1','A2','B1','B2','C1','C2');
date_default_timezone_set('Europe/Berlin');
$dbfile="languageskills.db";
$alt=array('ˆ','‰','¸','÷','ƒ','‹','ﬂ',' & ');
$neu=array('&ouml;','&auml;','&uuml;','&Ouml;','&Auml;','&Uuml;','&szlig;',' &amp; ');
$db = new SQLite3($dbfile);
$results = $db->query("SELECT * FROM Language ORDER BY LanguageName ASC");
while ($row = $results->fetchArray()) {
	$sprachen[$row["LanguageID"]] = $row["LanguageName"];
}
$results = $db->query("SELECT * FROM Facility ORDER BY FacilityName ASC");
while ($row = $results->fetchArray()) {
	$einrichtungen[$row["FacilityID"]] = $row["FacilityName"];
}
// Wieviele Sprachen? 
$result = $db->query("SELECT count(*) FROM Language");
while ($number = $result->fetchArray(SQLITE3_ASSOC)) {
	$sprachanzahl=$number['count(*)'];
}
// Wieviele Kollegen insgesamt?
$result = $db->query("SELECT count(*) FROM User");
while ($number = $result->fetchArray(SQLITE3_ASSOC)) {
	$overview = $number['count(*)'].' KollegInnen und '.$sprachanzahl.' Sprachen';
}
if (isset($_GET['action'])) $action=$_GET['action'];
else $action="false";
if (isset($_GET['main'])) $main=$_GET['main'];
else $main = "home";
?>
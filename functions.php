<?php
function date_german2mysql($datum) {
  list($tag, $monat, $jahr) = explode(".", $datum);
  return sprintf("%04d-%02d-%02d", $jahr, $monat, $tag);
}
function spokenlanguages($user_id,$sprachen) {
	$sl = '<ul class="LanguageSkills">';
	$languagequery = "SELECT * FROM LanguageLink WHERE UserID = ".$user_id;
	$dbfile="languageskills.db";
	$db = new SQLite3($dbfile);
	$languageresult = $db->query($languagequery);
	while ($languages = $languageresult->fetchArray(SQLITE3_ASSOC)) {
			if ($languages['SkillLevel'] != "-") {
				if($languages['zertifiziert']=="1") $level.='*';
				else unset($level);
			}
		$sl .= '<li><a class="skill_'.$languages['SkillLevel'].'" href="?main=language&LanguageID='.$languages['LanguageID'].'">'.$sprachen[$languages['LanguageID']];
		if($languages['SkillLevel'] != "-") $sl .= ' '.$languages['SkillLevel'].$level;
		$sl .= '</a></li>';
	}
	$sl .= '</ul>';
	return $sl;
}
function facilities($user_id,$einrichtungen) {
	$f = '<ul class="Facilities">';
	$facilityquery = "SELECT * FROM FacilityLink WHERE UserID = ".$user_id;
	$dbfile="languageskills.db";
	$db = new SQLite3($dbfile);
	$facilityresult = $db->query($facilityquery);
	while ($facilities = $facilityresult->fetchArray(SQLITE3_ASSOC)) {
		$f .= '<li><a href="?main=facility&FacilityID='.$facilities['FacilityID'].'">'.$einrichtungen[$facilities['FacilityID']].'</a></li>';
	}
	$f .= '</ul>';	
	return $f;
}
?>
<?php
if($_POST['aktion']=="changename") {
	$sql = "UPDATE User SET UserName = '".$_POST['UserName']."' , UserForename = '".$_POST['UserForename']."' WHERE UserID='".$_POST['UserID']."'";	
}
if($_POST['aktion']=="changefacility") {
	$sql = "UPDATE FacilityLink SET FacilityID = '".$_POST['FacilityID']."' WHERE FacilityLinkID='".$_POST['FacilityLinkID']."'";	
}
if($_GET['aktion']=="deletefacility") {
	$sql = "DELETE FROM FacilityLink WHERE FacilityLinkID=".$_GET['FacilityLinkID'];
}
if($_POST['aktion']=="newfacility") {
	$sql = "INSERT INTO FacilityLink (UserID,FacilityID) VALUES ('".$_POST['UserID']."','".$_POST['FacilityID']."')";
}
if($_POST['aktion']=="changelanguage") {
	$sql = "UPDATE LanguageLink SET LanguageID = '".$_POST['Sprache']."' , SkillLevel = '".$_POST['SkillLevel']."' , zertifiziert = '".$_POST['zertifiziert']."' WHERE LanguageLinkID='".$_POST['LanguageLinkID']."'";	
}
if($_GET['aktion']=="deletelanguage") {
	$sql = "DELETE FROM LanguageLink WHERE LanguageLinkID=".$_GET['LanguageLinkID'];
}
if($_POST['aktion']=="newlanguage") {
	$sql = "INSERT INTO LanguageLink (UserID,LanguageID,SkillLevel,zertifiziert) VALUES ('".$_POST['UserID']."','".$_POST['Sprache']."','".$_POST['SkillLevel']."','".$_POST['zertifiziert']."')";
}
if($_POST['aktion']=="newuser") {
	$sql = "INSERT INTO User(UserName,UserForename) VALUES ('".$_POST['UserName']."','".$_POST['UserForename']."')";
}
if($_POST['aktion']=="createfacility") {
	$sql = "INSERT INTO Facility(FacilityName) VALUES ('".$_POST['Facility']."')";
}
if($_POST['aktion']=="createlanguage") {
	$sql = "INSERT INTO Language(LanguageNameShort,LanguageName) VALUES ('".$_POST['LanguageNameShort']."','".$_POST['LanguageName']."')";
}
echo '<p>'.$sql.'</p>'; 
if ($db->query($sql)) {
    echo "Query successful."; // Works
} else {
    echo "Query failed."; // Will also work
}
echo '<p><a href="index.php?main=user&UserID='.$_POST['UserID'].'">User aufrufen</a></p>';
?>
<?php
$PageName = "PAGE_DEV_PAGE_ADD";
include('../class/AddClass.php');
$AddObjects = array();
$TableName = "Pages";
$ObjectName = "Sayfa";
// Create "Add Objects"

$AddObjects[0] = new AddObject("PageName", "Sayfa Adı", InputTypes::Text, ObjectTypes::Common);
$AddObjects[1] = new AddObject("PageURL", "Sayfa Adresi", InputTypes::Text, ObjectTypes::Common);
$AddObjects[1]->PlaceHolder = "page.php";
$AddObjects[2] = new AddObject("PageDescription", "Sayfa Açıklaması", InputTypes::Text, ObjectTypes::Common);

?>

<?php include("../class/Add.php"); ?>

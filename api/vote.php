<?php 
include_once "../base.php";
$sub=$Que->find($_POST['subject']);
$sub['count']++;
$Que->save($sub);

$option=$Que->find($_POST['vote']);
$option['count']++;
$Que->save($option);
to("../index.php?do=result&id={$sub['id']}");

?>
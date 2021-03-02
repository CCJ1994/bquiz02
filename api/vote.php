<?php
include_once "../base.php" ;
$sub=$Que->find($_POST['snbject']);
$sub['count']++;
$Que->save($sub);

$opt=$Que->find($_POST['vote']);
$opt['count']++;
$Que->save($opt);

to("../index.php?do=result&id={$sub['id']}");
?>
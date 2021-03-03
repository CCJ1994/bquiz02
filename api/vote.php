<?php
include_once "../base.php";

$main=$Que->find($_POST['subject']);
$main['count']++;
$Que->save($main);

$opt=$Que->find($_POST['vote']);
$opt['count']++;
$Que->save($opt);

to("../index.php?do=result&id={$main['id']}");
?>
<?php
include_once "../base.php";
$row=$News->find($_GET['id']);
echo nl2br($row['text']);

?>
<?php
include_once "../base.php" ;
$news=$News->find(['id'=>$_GET['id']]);

echo nl2br($news['text']);
?>
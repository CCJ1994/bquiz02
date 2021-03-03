<?php
include_once "../base.php";

echo  $News->find($_GET['id'])['text'];


?>
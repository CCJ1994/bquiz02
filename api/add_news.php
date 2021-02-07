<?php
include_once "../base.php";
$News->save($_POST);
to("../backend.php?do=news");
?>
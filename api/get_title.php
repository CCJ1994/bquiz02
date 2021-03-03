<?php
include_once "../base.php";
$titles=$News->all(['type'=>$_GET['type']]);
foreach ($titles as $key => $title) {
  echo "<a href='javascript:getNews({$title['id']})' style='display:inline-block;'>{$title['title']}</a>";
}

?>
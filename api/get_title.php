<?php
include_once "../base.php";
$rows=$News->all(['type'=>$_GET['type']]);
foreach ($rows as $key => $row) {
  echo "<a href='javascript:getNews({$row['id']})' style='display:block'>{$row['title']}</a>";
}

?>
<?php
include_once "../base.php" ;
$news=$News->all(['type'=>$_GET['type']]);

foreach ($news as $key => $new) {
  echo "<a href='javascript:getNews({$new['id']})' style='display:inline-block;'>{$new['title']}</a>";
}
?>
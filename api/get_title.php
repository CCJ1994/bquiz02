
<?php 
include_once "../base.php";

$news=$News->all(['type'=>$_GET['type']]);
foreach ($news as $new) {
  echo "<a href='javascript:getNews({$new['id']})' style='display:block;'>{$new['title']}</a>";
}
?>

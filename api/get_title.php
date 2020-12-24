<?php
include_once "../base.php";

$type=$_GET['type'];
$news=$News->all(['type'=>$type]);

foreach($news as $n ){
  // echo "<a href='javascript:getNews({$n['id']})' style='display:inline-block;'>{$n['title']}</a>";
  $result[]=[
    'title'=>$n['title'],
    'id'=>$n['id']
];
}
echo json_encode($result);
?>
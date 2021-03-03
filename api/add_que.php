<?php
include_once "../base.php";
$sub=$_POST['subject'];
$Que->save(['text'=>$sub,'subject'=>0,'count'=>0]);
$main=$Que->find(['text'=>$sub]);
foreach ($_POST['opt'] as $key => $opt) {
  if(!empty($opt)){
    $Que->save(['text'=>$opt,'subject'=>$main['id'],'count'=>0]);
  }
}
to("../backend.php?do=que");
?>
<?php
include_once "../base.php";
$Que->save(['text'=>$_POST['subject'],'subject'=>0,'count'=>0]);

$main=$Que->find(['text'=>$_POST['subject']]);
foreach ($_POST['option'] as $key => $option) {
  if(!empty($option)){
    $Que->save(['text'=>$option,'subject'=>$main['id'],'count'=>0]);
  }
}
to("../backend.php?do=que");
?>
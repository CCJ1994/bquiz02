<?php
include_once "../base.php" ;
$sub=$_POST['subject'];
if(!empty($_POST['subject'])){

  $Que->save(['text'=>$sub,'subject'=>0,'count'=>0]);
}
foreach ($_POST['option'] as $key => $opt) {
  if(!empty($opt)){
    $main=$Que->find(['text'=>$sub]);
    $Que->save(['text'=>$opt,'subject'=>$main['id'],'count'=>0]);
  }
}
to("../backend.php?do=que");
?>
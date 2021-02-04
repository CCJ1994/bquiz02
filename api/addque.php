<?php
include_once "../base.php";
$Que->save(['text'=>$_POST['subject'],'subject'=>0]);
$que=$Que->find(['text'=>$_POST['subject']]);
foreach ($_POST['option'] as $option) {
  $Que->save(['text'=>$option,'subject'=>$que['id']]);
}
to("../backend.php?do=que");


?>
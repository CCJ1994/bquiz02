<?php
include_once "../base.php";
$chk=$Mem->find(['acc'=>$_POST['acc']]);
if($chk){
  echo 1;
}

?>
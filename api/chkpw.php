<?php
include_once "../base.php";

$chk=$Mem->find(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if($chk){
  echo 1;
  $_SESSION['login']=$_POST['acc'];
}

?>
<?php  
include_once "../base.php";
$chk=$Mem->find(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if($chk){
  $_SESSION['login']=$_POST['acc'];
  echo '1';
}

?>
<?php
include_once "../base.php";
$chk=$Mem->find($_POST);
if($chk){
  echo 1;
  $_SESSION['login']=$_POST['acc'];
}

?>
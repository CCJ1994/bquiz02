<?php
include_once "../base.php";
$chk=$Mem->find($_POST);
if($chk){
  echo $chk['pw'];
}else{
  echo "查無此資料";
}

?>
<?php
include_once "../base.php" ;
$chk=$Mem->find(['email'=>$_POST['email']]);
if($chk){
  echo $chk['pw'];
}else{
  echo "查無此資料";
}
?>
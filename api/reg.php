<?php  
include_once "../base.php";
print_r($_POST);
$Mem->save(['acc'=>$_POST['acc'],'pw'=>$_POST['pw'],'email'=>$_POST['email']]);
?>
<?php
include_once "../base.php";
foreach($_POST['del'] as $id){
  $chk=$Mem->del(['id'=>$id]);
}
to("../backend.php?do=admin");
?>
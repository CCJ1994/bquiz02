<?php
include_once "../base.php";
foreach ($_POST['id'] as $key => $id) {
  if(isset($_POST['del']) && in_array($id,$_POST['del'])){
    $Mem->del($id);
  }
}
to("../backend.php?do=admin");
?>
<?php
include_once "../base.php";
print_r($_POST);
foreach($_POST['id'] as $key=> $id){
  $sh=$Que->find(['id'=>$id]);
  
  switch ($sh['sh']) {
    case '1':
      $sh['sh']=0;
      $Que->save(['id'=>$id,'sh'=>$sh['sh']]);
      break;
      case '0':
        $sh['sh']=1;
        $Que->save(['id'=>$id,'sh'=>$sh['sh']]);
        break;
        
      }
}
to("../backend.php?do=que");

?>
<?php 
$sub=$Que->find($_GET['id']);
$options=$Que->all(['subject'=>$_GET['id']]);
?>

<form action="api/vote.php" method="post">
  <fieldset class="">
    <legend class="leng">目前位置：首頁 > 問卷調查 > <?=$sub['text'];?></legend>
    <h4><?=$sub['text'];?></h4>
    <table>
  
    <?php  
    foreach ($options as $key=> $option) { 
      $div=($sub['count']!=0)?$sub['count']:1;
      $rate=$option['count']/$div;
      ?>
    
    <tr>
      <td>
        <?=$key+1;?>. <?=$option['text']?>
      </td>
      <td>
      <div style="display:inline-block;background:#999;height:25px;;width:<?=100*$rate;?>px;"></div>
      <?=$option['count']?>票
      (<?=round($rate*100);?>%)
      </td>
    </tr>
    <?php } ?>
    </table>
    <div style="text-align:center;"><input type="button" value="返回" onclick="javescriot:location.href='?do=que'"></div>
  </fieldset>
</form>
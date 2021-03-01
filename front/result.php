<?php
$sub=$Que->find($_GET['id']);
$rows=$Que->all(['subject'=>$_GET['id']]);
?>
<fieldset>
  <legend>現在位置 : 首頁 > 問卷調查 > <?=$sub['text']?></legend>
  <h3><?=$sub['text']?></h3>
  <table>
    <?php 
    foreach($rows as $key => $row) { 
      $div=($sub['count'] != 0)?$sub['count']:1;
      $rate=$row['count']/$div; ?>
      
    <tr>
      <td width="50%"><?=($key+1).".".$row['text']?></td>
      <td>
        <div style="display:inline-block;background:#999;height:25px;width:<?=$rate*100;?>px;"></div>
        <?=$row['count']?>票（<?=round($rate*100)?>%）
      </td>
    </tr>
    <?php } ?>
      </table>
      <div style="text-align:center;"><input type="button" value="返回" onclick="javescript:location.href='?do=que'"></div>
</fieldset>
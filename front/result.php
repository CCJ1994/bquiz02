<?php 
$main=$Que->find($_GET['id']);
$rows=$Que->all(['subject'=>$_GET['id']]);
?>
<form action="api/vote.php" method="post">
  <fieldset class="">
    <legend class="">目前位置 : 首頁 > 問卷調查 > <?=$main['text']?></legend>
    <h3><?=$main['text']?></h3>
    <table>
      <?php
      foreach ($rows as $key => $row) { 
        $div=($main['count']!= 0)?$main['count']:1;
        $rate=$row['count']/$div;
        ?>
      <tr>
      <td width="50%">
        <div><?=($key+1).".".$row['text']?></div>
      </td>
      <td width="50%">
      <div style="display:flex;">
        <div style="width:<?=$rate*100?>%;height:25px;background:#999;"></div>
        <div style=""><?=$row['count']?>票(<?=round($rate*100)?>)%</div>
      </div>
        
      </td>
      </tr>
      <?php  }  ?>
        </table>
  <div class="ct"><input type="button" onclick="javascript:location.href='?do=que'" value="返回"></div>
  </fieldset>
</form>

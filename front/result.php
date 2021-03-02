<?php 
$main=$Que->find(['id'=>$_GET['id']]);
$rows=$Que->all(['subject'=>$_GET['id']])
?>
  <fieldset >
    <legend >目前位置:首頁 > 問卷調查 > <?=$main['text']?></legend>
    <h3><?=$main['text']?></h3>
    <table>
      <?php
      foreach ($rows as $key => $row) { 
        $div=($main['count']!=0)?$main['count']:1;
        $rate=$row['count']/$div ;?>
        <tr>
          <td width="50%"><?=($key+1).".".$row['text'];?></td>
          <td width="50%">
          <div>
            <div style="width:<?=$rate*100;?>%;display:inline-block;height:25px;background:#999;"></div>
            <div style="display:inline-block;">
            <?=$row['count'];?>票(<?=round($rate*100)?>%)
            </div>
          </div>
          </td>
        </tr>
      <?php  } ?>
      </table>
      <div class="ct"><button onclick="javascript:location.href='?do=que'">返回</button></div>
  </fieldset>

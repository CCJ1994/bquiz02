<?php 
$main=$Que->find(['id'=>$_GET['id']]);
$rows=$Que->all(['subject'=>$_GET['id']])
?>
  <form action="api/vote.php" method="post">
    <fieldset >
      <legend >目前位置:首頁 > 問卷調查 > <?=$main['text']?></legend>
      <h3><?=$main['text']?></h3>
      <table>
        <?php
        foreach ($rows as $key => $row) {
          $div=($main['count']!=0)?$main['count']:1;
          $rate=$row['count']/$div;?>
          <tr>
            <td><input type="radio" name="vote" value="<?=$row['id'];?>"><?=$row['text'];?></td>
          </tr>
        <?php  } ?>
        </table>
            <input type="hidden" name="subject" value="<?=$main['id'];?>">
        <div class="ct"><input type="submit" value="我要投票"></div>
    </fieldset>
  </form>

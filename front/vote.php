<?php 
$main=$Que->find($_GET['id']);
$rows=$Que->all(['subject'=>$_GET['id']]);
?>
<form action="api/vote.php" method="post">
  <fieldset class="">
    <legend class="">目前位置 : 首頁 > 問卷調查 > <?=$main['text']?></legend>
      <?php
      foreach ($rows as $key => $row) { ?>
        <div><input type="radio" name="vote" value="<?=$row['id']?>"><?=$row['text']?></div>
      <?php  }  ?>
      <input type="hidden" name="subject" value="<?=$main['id']?>">
  <div class="ct"><input type="submit" value="我要投票"></div>
  </fieldset>
</form>

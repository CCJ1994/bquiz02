<?php 
$sub=$Que->find($_GET['id']);
$options=$Que->all(['subject'=>$_GET['id']]);
?>

<form action="api/vote.php" method="post">
  <fieldset class="">
    <legend class="leng">目前位置：首頁 > 問卷調查 > <?=$sub['text'];?></legend>
    <h4><?=$sub['text'];?></h4>
    <?php  
    foreach ($options as $option) { ?>
    <ul style="list-style:none;">
      <li>
        <input type="radio" name="vote" value="<?=$option['id'];?>"><?=$option['text']?>
        <input type="hidden" name="subject" value="<?=$sub['id'];?>">
      </li>
    </ul>
    <?php } ?>
    <div style="text-align:center;"><input type="submit" value="我要投票"></div>
  </fieldset>
</form>
<form action="api/vote.php" method="post">
  <?php
  $sub=$Que->find(['id'=>$_GET['id']]);
  $options=$Que->all(['subject'=>$_GET['id']]);
  ?>
  <fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$sub['text'];?> </legend>
  <h4><?=$sub['text'];?></h4>
  <ul style="list-style:none;">
  
    <?php
  foreach ($options as $key => $option) {
    echo "<li><input type='radio' name='vote' value='{$option['id']}'>{$option['text']}</li>";
  }
  ?>
  </ul>
  <input type="hidden" name="subject" value="<?=$sub['id'];?>">
  <div class="ct"><input type="submit" value="我要投票"></div>
    </fieldset>
</form>

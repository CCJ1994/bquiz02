<form action="api/vote.php" method="post">
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
        <td><input type="radio" name="vote" value="<?=$row['id']?>"><?=$row['text']?></td>
        <input type="hidden" name="subject" value="<?=$sub['id']?>">
      </tr>
      <?php } ?>
        </table>
        <div style="text-align:center;"><input type="submit" value="我要投票"></div>
  </fieldset>
</form>
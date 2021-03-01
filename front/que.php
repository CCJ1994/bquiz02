<fieldset>
  <legend>現在位置 : 首頁 > 問卷調查</legend>
  <table width="100%">
    <tr class="">
      <td width="10%">編號</td>
      <td width="50%">問卷題目</td>
      <td width="15%">投票總數</td>
      <td width="10%">結果</td>
      <td width="15%">狀態</td>
    </tr>
    <?php 
    $rows=$Que->all(['subject'=>0]);
    foreach($rows as $key => $row) { ?>
      <tr class="">
      <td width="10%"><?=$key+1?></td>
      <td width="50%"><?=$row['text']?></td>
      <td width="15%"><?=$row['count']?></td>
      <td width="10%"><a href="?do=result&id=<?=$row['id']?>">結果</a></td>
      <?php if(empty($_SESSION['login'])){?>
      <td width="15%">請先登入</td>
      <?php }else{ ?>
      <td width="15%"><a href="?do=vote&id=<?=$row['id']?>">參與投票</a></td>
      <?php } ?>
    </tr>
    <?php } ?>
  </table>
</fieldset>

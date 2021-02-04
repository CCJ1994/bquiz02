<fieldset class="">
  <legend class="leng">目前位置：首頁 > 問卷調查</legend>
  <table>
    <tr>
      <td>編號</td>
      <td>問卷題目</td>
      <td>投票總數</td>
      <td>結果</td>
      <td>狀態</td>
    </tr>
    <?php
$que=$Que->all(['subject'=>0]);
foreach ($que as $key => $q) { ?>
    <tr>
      <td><?=$key+1;?></td>
      <td><?=$q['text'];?></td>
      <td><?=$q['count']?></td>
      <td><a href="?do=result&id=<?=$q['id'];?>">結果</a></td>
      <?php if(empty($_SESSION['login'])){?>
      <td>請先登入</td>
      <?php }else{ ?>
      <td><a href="?do=vote&id=<?=$q['id'];?>">參與投票</a></td>
      <?php } ?>
    </tr>

    <?php
}
?>
  </table>

</fieldset>
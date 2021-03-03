
<fieldset class="">
  <legend class="">目前位置 : 首頁 > 問卷調查</legend>
  <table width="100%">
    <tr class="">
      <td width="5%">編號</td>
      <td width="50%">問卷題目</td>
      <td width="15%">投票總數</td>
      <td width="15%">結果</td>
      <td width="15%">狀態</td>
    </tr>
    <?php
    $rows=$Que->all(['subject'=>0]);
    foreach ($rows as $key => $row) { ?>
    <tr class="">
      <td class=""><?=$key+1?></td>
      <td class=""><?=$row['text']?></td>
      <td><?=$row['count']?></td>
      <td>
        <a href="?do=result&id=<?=$row['id']?>">結果</a>
      </td>
      <td>
      <?php if(!empty($_SESSION['login'])){?>
        <a href="?do=vote&id=<?=$row['id']?>">參與投票</a>
        <?php }else{?>
        請先登入
        <?php }?>
      </td>
    </tr>
    <?php  }  ?>

  </table>
</fieldset>

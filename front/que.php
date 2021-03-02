
  <fieldset class="fei">
    <legend class="leng">目前位置:首頁 > 問卷調查</legend>
    <table>
      <tr>
        <td width="5%">編號</td>
        <td width="50%">問卷題目</td>
        <td width="15%">投票總數</td>
        <td width="15%">結果</td>
        <td width="15%">狀態</td>
      </tr>
      <?php
      $rows=$Que->all(['subject'=>0]);
      foreach ($rows as $key => $row) { ?>
        <tr>
          <td width="5%"><?=$key+1?></td>
          <td width="50%"><?=$row['text']?></td>
          <td width="15%"><?=$row['count']?></td>
          <td class="" width="15%">
            <a href="?do=result&id=<?=$row['id']?>">結果</a>
          </td>
          <td class="" width="15%">
            <?php 
            if(empty($_SESSION['login'])){ ?>
              請先登入
           <?php }else{ ?>
            <a href="?do=vote&id=<?=$row['id']?>">參與投票</a>
          <?php }
            ?>
          </td>
        </tr>
      <?php  } ?>
      </table>
  </fieldset>

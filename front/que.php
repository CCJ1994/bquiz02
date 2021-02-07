<fieldset>
  <legend>目前位置：首頁 > 問卷調查 </legend>
  <table>
    <tr>
      <td width="10%">編號</td>
      <td width="50%">問卷題目</td>
      <td width="15%">投票總數</td>
      <td width="10%">結果</td>
      <td width="15%">狀態</td>
    </tr>
    <?php
      $ques=$Que->all(['subject'=>0,'sh'=>1]);
      foreach ($ques as $key => $que) {
        ?>
        <tr>
          <td class="bg">
            <?=$key+1?>.
          </td>
          <td><?=$que['text'];?></td>
          <td class="ct">
          <?=$que['count'];?>
          </td>
          <td>
            <a href="?do=result&id=<?=$que['id'];?>">結果</a>
        </td>
          <td>
            <?php if(empty($_SESSION['login'])){
             echo "請先登入"; 
            }else{
              echo "<a href='?do=vote&id={$que['id']}'>參與投票</a>";
            }?>
        </td>
      </tr>
        <?php
      }
      ?>
      </tbody>
  </table>
  </fieldset>

<style>
.bg{
  background:lightgrey;
  padding:5px 10px;
}
</style>

  <fieldset>
  <legend>問卷列表</legend>
  <div><a href="?do=add_que"><button type="button">新增問卷</button></a></div>
  <table  width="98%">
    <tr class="ct">
      <td class="bg" width="60%">問卷名稱</td>
      <td class="bg" width="20%">投票數</td>
      <td class="bg" width="20%">開放</td>
    </tr>
    <?php
      $ques=$Que->all(['subject'=>0]);
      foreach ($ques as $key => $que) {
        ?>
        <tr>
        <td class="title"><?=$key+1;?>.<?=$que['text'];?></td>
          <td class="ct">
            <?=$que['count'];?>
          </td>
          <td class="ct">
            <?php if($que['sh']==1) { ?>
              <form action="api/swap.php" method="post">
                <input type="hidden" name="id[]" value="<?=$que['id'];?>">
                <input type="submit" value="開放">
              </form>
              <?php }else{ ?>
                <form action="api/swap.php" method="post">
                <input type="hidden" name="id[]" value="<?=$que['id'];?>">
                <input type="submit" value="關閉" >
              </form>
                <?php  }?>


          </td>
        </tr>
        <?php
      }
      ?>
      </tbody>
  </table>
  </fieldset>

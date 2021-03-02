<style>
  .bg{
    background:lightgrey;
  }
</style>

  <form action="api/edit_news.php" method="post">
    <table class="ct" width="100%" style="margin:auto;">
      <tr>
        <td width="5%">編號</td>
        <td width="55%">標題</td>
        <td width="15%">顯示</td>
        <td width="15%">刪除</td>
      </tr>
      <?php
      $all=$News->count();
      $div=3;
      $pages=ceil($all/$div);
      $now=(isset($_GET['p']))?$_GET['p']:1;
      $start=($now-1)*$div;
      $rows=$News->all("limit $start,$div");
      foreach ($rows as $key => $row) { ?>
        <tr>
        <td class="bg" width="5%"><?=$key+1+$start;?>.</td>
        <td width="55%"><?=$row['title'];?></td>
        <td width="15%"><input type="checkbox" name="sh[]" value="<?=$row['id']?>" <?=($row['sh']==1)?'checked':'';?>></td>
        <td width="15%"><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
        <input type="hidden" name="id[]" value="<?=$row['id']?>">
      </tr>
        <?php
      }
      ?>
      <tr>
        <td class="ct" colspan="4">
          <?php 
          if(($now-1)>0){ ?>
            <a href="?do=<?=$do?>&p=<?=$now-1?>"> < </a>
        <?php }
        $size="20px";
        for ($i=1; $i <= $pages ; $i++) { 
          if($now==$i){
            echo "<a href='?do=$do&p=$i' style='font-size:$size;'> $i </a>";
          }else{
            echo "<a href='?do=$do&p=$i' style='font-size:15px;'> $i </a>";
          }
        }
        if(($now+1)<=$pages){?>
        <a href="?do=<?=$do?>&p=<?=$now+1?>"> > </a>
        <?php } ?>
        </td>
      </tr>
      <tr>
        <td class="ct" colspan="4">
          <input type="submit" value="確認修改">
        </td>
      </tr>
    </table>
  </form>

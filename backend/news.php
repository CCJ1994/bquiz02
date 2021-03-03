<style>
.bg {
  background: lightgrey;
}
</style>
<form action="api/edit_news.php" method="post">
  <table width="100%">
    <tr class="ct">
      <td width="5%">編號</td>
      <td width="65%">標題</td>
      <td width="10%">顯示</td>
      <td width="10%">刪除</td>
    </tr>
    <?php
    $all=$News->count();
    $div=3;
    $pages=ceil($all/$div);
    $now=(isset($_GET['p']))?$_GET['p']:1;
    $start=($now-1)*$div;
    $rows=$News->all("limit $start,$div");
    foreach ($rows as $key => $row) { ?>
    <tr class="ct">
      <td class="bg"><?=$key+1+$start?></td>
      <td><?=$row['title']?></td>
      <td><input type="checkbox" name="sh[]" value="<?=$row['id']?>" <?=($row['sh']==1)?"checked":"";?>></td>
      <td><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
      <input type="hidden" name="id[]" value="<?=$row['id']?>">
    </tr>
    <?php  }  ?>
    <tr>
    <td colspan="4" class="ct"><input type="submit" value="確定修改"></td>
    </tr>
    <tr>
    <td colspan="4" class="ct">
    <?php
      if(($now-1)>0){ ?>
        <a href='?do=<?=$do?>&p=<?=$now-1?>'>
          < </a>
            <?php }
      $size="20px";
      for ($i=1; $i <=$pages ; $i++) { 
        if($now==$i){
          echo "<a style='font-size:$size;' href='?do=$do&p=$i'> $i </a>";
        }else{          
          echo "<a style='font-size:15px;' href='?do=$do&p=$i'> $i </a>";
        }
      }
      if(($now+1)<=$pages){ ?>
            <a href='?do=<?=$do?>&p=<?=$now+1?>'> > </a>
            <?php }
      ?>
    </td>
    </tr>

  </table>
</form>
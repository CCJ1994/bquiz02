<form action="api/edit_news.php" method="post">
  <fieldset class="">
  <legend class="leng">最新文章管理</legend>
  <table width="100%" style="text-align:center;">
  <tr>
    <td >編號</td>
    <td>標題</td>
    <td>顯示</td>
    <td>刪除</td>
  </tr>
  <?php
  $all=$News->count();
  $div=3;
  $pages=ceil($all/$div);
  $now=(isset($_GET['p']))?$_GET['p']:1;
  $start=($now-1)*$div;
  $news=$News->all(" limit $start,$div ");
  foreach ($news as $key=> $new) { ?>
  <tr>
    <td style="background:lightgrey;"><?=$start+$key+1;?></td>
    <td><?=$new['title'];?></td>
    <td><input type="checkbox" name="sh[]" value="<?=$new['id'];?>" <?=($new['sh']==1)?"checked":"";?>></td>
    <td><input type="checkbox" name="del[]" value="<?=$new['id'];?>"></td>
    <input type="hidden" name="id[]" value="<?=$new['id'];?>">
  </tr>
  <?php
  }
  ?>
  
    <tr>
      <td colspan="4">
      <?php
    if(($now-1)>0){
      echo "<a href='?do=news&p=".($now-1)."'> < </a>";
    }
    for ($i=1; $i <=$pages; $i++) { 
      $size=($i==$now)?"24px":"18px";
      echo "<a href='?do=news&p=$i' style='font-size:$size;'> $i </a>";
    }
    if(($now+1)<=$pages){
      echo "<a href='?do=news&p=".($now+1)."'> > </a>";
    }
    ?>
      </td>
    </tr>
    <tr>
      <td colspan="4">
        <input type="submit" value="確定修改">
      </td>
    </tr>
  </table>
  <?php ?>
  
  </fieldset>
</form>
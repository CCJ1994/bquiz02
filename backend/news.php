<style>
.bg{
  background:lightgrey;
  padding:5px 10px;
}
</style>
<form action="api/edit_news.php" method="post">
  <fieldset>
  <legend>最新文章管理</legend>
  <div><input type="button" onclick="op('#cover','#cvr','backend/add_news.php')" value="新增文章"></div>
  <table class="ct">
    <tr>
      <td width="20%">編號</td>
      <td width="60%">標題</td>
      <td width="10%">顯示</td>
      <td width="10%">刪除</td>
    </tr>
    <?php
      $count=$News->count();
      $div=5;
      $pages=ceil($count/$div);
      $now=(isset($_GET['p']))?$_GET['p']:1;
      $start=($now-1)*$div;
      $news=$News->all("limit $start,$div");
      foreach ($news as $key => $new) {
        ?>
        <tr>
          <td class="bg">
            <?=$key+1+$start;?>
          </td>
          <td class="title"><?=$new['title'];?></td>
          <td>
            <input type="checkbox" name="sh[]" value="<?=$new['id'];?>" <?=($new['sh']==1)?"checked":"";?>>
          </td>
          <td>
            <input type="checkbox" name="del[]" value="<?=$new['id'];?>">
          </td>
            <input type="hidden" name="id[]" value="<?=$new['id'];?>">
        </tr>
        <?php
      }
      ?>
      <tr>
        <td colspan="4">
        <?php
      if(($now-1)>0){ ?>
      <a href="?do=news&p=<?=$now-1;?>"> < </a>
    <?php  }
        for($i=1;$i<=$pages;$i++){
          $size=($i==$now)?"20px":"15px";
      echo "<a href='?do=news&p=$i' style='font-size:$size;'> $i </a>";
      }
      if(($now+1)<=$pages){ ?>
        <a href="?do=news&p=<?=$now+1;?>"> > </a>
      <?php } ?>
        </td>
      </tr>
      <tr>
      <td colspan="4"><input type="submit" value="確定修改"></td>
      </tr>
      </tbody>
  </table>
  </fieldset>
</form>
<form action="api/add_news.php" method="post">
<div id="cover" style="display:none; ">
	<div id="coverr">
    	<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>
        <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
    </div>
</div>
</form>
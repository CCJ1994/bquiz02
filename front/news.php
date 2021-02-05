<style>
.bg {
  background: lightgrey;
  padding: 10px;
}
.title{
  cursor:pointer;
}
.content{
  display:none;
}
</style>
<fieldset>
  <legend>目前位置:首頁 > 最新文章區</legend>
  <table>

    <tr>
      <th width="30%">標題</th>
      <th>內容</th>
    </tr>
    <?php 
    $count=$News->count(['sh'=>1]);
    $div=5;
    $pages=ceil($count/$div);
    $now=(isset($_GET['p']))?$_GET['p']:1;
    $start=($now-1)*$div;
    $rows=$News->all(['sh'=>1],"limit $start,$div");
    foreach ($rows as $key => $row) { ?>
    <tr>
      <td class="bg title">
        <?=$row['title'];?>
      </td>
      <td>
        <span class="tit"><?=mb_substr($row['text'],0,20);?>...</span>
        <span class="content"><?=$row['text'];?></span>
      </td>
    </tr>
    <?php }
    ?>
  </table>
  <?php
if(($now-1)>0){
  echo "<a href='index.php?do=news&p=".($now-1)."' > &lt; </a>";
}
for($i=1;$i<=$pages;$i++){
  $fontsize=($i==$now)?"28px":"18px";
  echo "<a href='index.php?do=news&p=$i' style='font-size:$fontsize'>$i</a>";
}
if(($now+1)<=$pages){
  echo "<a href='index.php?do=news&p=".($now+1)."' > &gt; </a>";
}
?>
</fieldset>
<script>
$(".title").on('click',function () {
  $(this).next().children(".content").toggle();
  $(this).next().children(".tit").toggle();
})
</script>
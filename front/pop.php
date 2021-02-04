<style>
.title{
  cursor:pointer;
  background:lightgrey;
}
.content{
  display:none;
}
</style>

<fieldset class="fei">
  <legend class="leng">目前位置：首頁 > 人氣文章區</legend>
  <table>
    <tr style="text-align:center;">
      <td width="25%">標題</td>
      <td >內容</td>
      <td >人氣</td>
    </tr>
    <?php
    $total=$News->count(['sh'=>1]);
    $div=5;
    $pages=ceil($total/$div);
    $now=(!empty($_GET['p']))?$_GET['p']:1;
    $start=($now-1)*$div;
    $rows=$News->all(['sh'=>1],"limit $start,$div");
    foreach ($rows as $row) {
    ?>
    <tr>
      <td class="title"><?=$row['title'];?></td>
      <td>
        <div class="tle"><?=mb_substr($row['text'],0,20,'utf8')."...";?></div>
        <div class="content"><?=nl2br($row['text'])."...";?></div>
      </td>
      <td>
      <span id="vie<?=$row['id']?>"><?=$row['good'];?></span>個人說<img src="icon/02B03.jpg" width="20">
      <?php
      if(!empty($_SESSION['login'])){
        $chk=$Log->count(['acc'=>$_SESSION['login'],'news'=>$row['id']]);
        if($chk){
          ?>
          <a href="#" id="good<?=$row['id'];?>" onclick="good('<?=$row['id'];?>','<?=$_SESSION['login'];?>','2')">收回讚</a>
      <?php
        }else{
          ?>
          <a href="#" id="good<?=$row['id'];?>" onclick="good('<?=$row['id'];?>','<?=$_SESSION['login'];?>','1')">讚</a>
          <?php
        }
      }
      ?>
      </td>
    </tr>
    <?php } ?>
  </table>
  <div>
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
  </div>
</fieldset>
<script>
  $(".title").on('click',function(){
    $(this).next().children('.tle').toggle();
    $(this).next().children('.content').toggle();
  })
</script>
<style>
.bg {
  background: lightgrey;
}

.content {
  display: none;
}
</style>
<fieldset>
  <legend>現在位置 : 首頁 > 人氣文章區</legend>
  <table width="100%">
    <tr class="ct">
      <td width="30%">標題</td>
      <td width="55%">內容</td>
      <td width="15%">人氣</td>
    </tr>
    <?php 
    $all=$News->count();
    $div=5;
    $pages=ceil($all/$div);
    $now=(isset($_GET['p']))?$_GET['p']:1;
    $start=($now-1)*$div;
    $rows=$News->all(['sh'=>1],"order by good desc limit $start,$div");
    foreach ($rows as $key => $row) { ?>
    <tr class="l">
      <td class="bg" width="30%"><?=$row['title']?></td>
      <td class="tt" width="55%">
        <div class="tit">
          <?=mb_substr($row['text'],0,15,"utf8")?>...
        </div>
        <div class="content" style="background:rgba(51,51,51,0.8); color:#FFF;height:350px; width:300px; position:absolute; display:none; z-index:9999; overflow-y:auto;">
        <div style="color:#0cf;"><?=$tstr[$row['type']];?></div>
          <div style="color:white;"><?=nl2br($row['text'])?></div>
        </div>
      </td>
      <td width="15%">
      <span id="vie<?=$row['id']?>"><?=$row['good'];?>個人説</span><span><img src="./icon/02B03.jpg" style="width:30px;"></span>
      <?php if(!empty($_SESSION['login'])){
        $chk=$Log->count(['acc'=>$_SESSION['login'],'news'=>$row['id']]);
        if($chk){ ?>
          
          <a href="" id="good<?=$row['id']?>" onclick="good('<?=$row['id']?>','<?=$_SESSION['login']?>','2')">收回讚</a>
      <?php }else{ ?>
          <a href="" id="good<?=$row['id']?>" onclick="good('<?=$row['id']?>','<?=$_SESSION['login']?>','1')">讚</a>

    <?php } ?>
      <?php }?>
      </td>
    </tr>
    <?php }?>
    <tr class="ct">
      <td colspan="4">

        <?php 
      if(($now-1)>0){?>
        <a href="index.php?do=<?=$do;?>&p=<?=$now-1;?>">
          < </a>
            <?php }
      $size="20px";
      for ($i=1; $i <=$pages ; $i++) { 
        if($now==$i){
          echo "<a style='font-size:$size;' href='index.php?do=$do&p=$i'> $i </a>";
        }else{
          echo "<a style='font-size:15px;' href='index.php?do=$do&p=$i'> $i </a>";
        }
      }  
      if(($now+1)<=$pages){  ?>
            <a href="index.php?do=<?=$do;?>&p=<?=$now+1;?>"> > </a>
            <?php } ?>
      </td>
    </tr>
  </table>
</fieldset>
<script>
$(".bg").hover(function() {
  $(this).next().children(".content").toggle();
})
$(".tt").hover(function() {
  $(this).children(".content").toggle();
})
</script>
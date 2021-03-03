<style>
.bg {
  background: lightgrey;
  cursor: pointer;
}

.content {
  display: none;
  z-index:9999;
  position:absolute;
  width:400px;
  height:300px;
  overflow-y:auto;
  background:#999;
  color:white;
}
</style>
<fieldset class="">
  <legend class="">目前位置 : 首頁 > 人氣文章區</legend>
  <table width="100%">
    <tr class="ct">
      <td width="30%">標題</td>
      <td width="50%">內容</td>
      <td width="20%">人氣</td>
    </tr>
    <?php
    $all=$News->count();
    $div=5;
    $pages=ceil($all/$div);
    $now=(isset($_GET['p']))?$_GET['p']:1;
    $start=($now-1)*$div;
    $rows=$News->all(['sh'=>1],"order by good desc limit $start,$div");
    foreach ($rows as $key => $row) { ?>
    <tr class="">
      <td class="bg"><?=$row['title']?></td>
      <td class="tt">
        <div class="tit"><?=mb_substr($row['text'],0,15,'utf8')?>...</div>
        <div class="content">
          <div style=" color:blue;">
          <?=$tstr[$row['type']]?>
          </div>
          <div>
          <?=$row['text']?>
          </div>
        </div>
      </td>
      <td>
        <?=$row['good']?>個人說<img src="./icon/02B03.jpg" style="width:20px;">
        <?php 
        if(!empty($_SESSION['login'])){ 
            $chk=$Log->find(['acc'=>$_SESSION['login'],'news'=>$row['id']]);
            if($chk){ ?>
        <a href="" id="good<?=$row['id']?>" onclick="good('<?=$row['id']?>','<?=$_SESSION['login']?>','2')">收回讚</a>
        <?php }else{ ?>
        <a href="" id="good<?=$row['id']?>" onclick="good('<?=$row['id']?>','<?=$_SESSION['login']?>','1')">讚</a>
        <?php  
          }  
    }
        ?>
      </td>
    </tr>
    <?php  }  ?>
    <tr>
      <td colspan="3" class="ct">
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
</fieldset>
<script>
$(".bg").hover(function () {
  $(this).next().children(".content").toggle();
})
$(".tt").hover(function () {
  $(this).children(".content").toggle();
})
</script>
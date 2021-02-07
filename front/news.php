<style>
.bg{
  background:lightgrey;
  padding:5px 10px;
  cursor:pointer;
}
.content{
  display:none;
}
</style>
<fieldset>
  <legend>目前位置：首頁 > 最新文章區</legend>
  <table width="100%" >
    <thead>
      <tr class="ct">
        <th width="30%">標題</th>
        <th width="60%">內容</th>
        <th width="10%"></th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $count=$News->count(['sh'=>1]);
    $div=5;
    $pages=ceil($count/$div);
    $now=(isset($_GET['p']))?$_GET['p']:1;
    $start=($now-1)*$div;
    $news=$News->all(['sh'=>1],"limit $start,$div");
    foreach ($news as $key => $new) {
      ?>
      <tr>
        <td class="bg title"><?=$new['title'];?></td>
        <td>
          <div class="tit"><?=mb_substr($new['text'],0,20,"utf8");?>...</div>
          <div class="content"><?=$new['text'];?></div>
        </td>
        <td>
        <?php if(!empty($_SESSION['login'])){ 
          $chk=$Log->count(['acc'=>$_SESSION['login'],'news'=>$new['id']]);
          if($chk){  ?>
          <a href="#" id="good<?=$new['id']?>" onclick="good('<?=$new['id'];?>','<?=$_SESSION['login'];?>','2')" >收回讚</a>
          <?php  }else{ ?>
          <a href="#" id="good<?=$new['id']?>" onclick="good('<?=$new['id'];?>','<?=$_SESSION['login'];?>','1')" >讚</a>
          <?php  }  
          }?>
        </td>
      </tr>

      <?php
    }
    ?>
    </tbody>
  </table>
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
</fieldset>
<script>
  $(".title").on('click',function(){
    $(this).next().children('.tit').toggle();
    $(this).next().children('.content').toggle();
  })
</script>
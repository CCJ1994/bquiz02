<style>
.bg {
  background: lightgrey;
  cursor: pointer;
}

.content {
  display: none;
}
</style>
<fieldset class="">
  <legend class="">目前位置 : 首頁 > 最新文章區</legend>
  <table width="100%">
    <tr class="ct">
      <td width="30%">標題</td>
      <td width="50%">內容</td>
      <td width="20%"></td>
    </tr>
    <?php
    $all=$News->count();
    $div=5;
    $pages=ceil($all/$div);
    $now=(isset($_GET['p']))?$_GET['p']:1;
    $start=($now-1)*$div;
    $rows=$News->all(['sh'=>1],"limit $start,$div");
    foreach ($rows as $key => $row) { ?>
    <tr class="ct">
      <td class="bg"><?=$row['title']?></td>
      <td>
        <div class="tit"><?=mb_substr($row['text'],0,15,'utf8')?>...</div>
        <div class="content"><?=$row['text']?></div>
      </td>
      <td>
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
$(".bg").on('click', function() {
  $(this).next().children(".tit").toggle();
  $(this).next().children(".content").toggle();
})
</script>
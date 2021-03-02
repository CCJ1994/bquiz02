<style>
.bg {
  background: lightgrey;
  padding: 5px;
  cursor: pointer;
}

.content {
  display: none;
  z-index:999;
  position:absolute;
  color:white;
  background:#999;
  width:400px;
  height:300px;
  overflow-y:auto;
}
</style>
<form action="api/add_que.php" method="post">
  <fieldset class="fei">
    <legend class="leng">目前位置:首頁 > 人氣文章區</legend>
    <table>
      <tr class="ct">
        <td width="30%">標題</td>
        <td width="50%">內容</td>
        <td width="20%">人氣</td>
      </tr>
      <?php
      $all=$News->count(['sh'=>1]);
      $div=5;
      $pages=ceil($all/$div);
      $now=(isset($_GET['p']))?$_GET['p']:1;
      $start=($now-1)*$div;
      $rows=$News->all(['sh'=>1],"order by good desc limit $start,$div");
      foreach ($rows as $key => $row) { ?>
      <tr>
        <td class="bg" width="30%"><?=$row['title'];?></td>
        <td class="tt" width="50%">
          <div class="tit">
            <?=mb_substr($row['text'],0,20,'utf8');?>...
          </div>
          <div class="content">
            <div style="color:#389be6;"><?=$tstr[$row['type']];?></div>
            <div><?=$row['text']?></div>
          </div>
        </td>
        <td width="20%">
          <div><span><?=$row['good']?>個人說</span><span><img src="./icon/02B03.jpg" width="25px" alt=""></span>
            <?php if(!empty($_SESSION['login'])){
            $chk=$Log->find(['acc'=>$_SESSION['login'],'news'=>$row['id']]);
            if($chk){?>
            <a href="" id="good<?=$row['id']?>" onclick="good('<?=$row['id']?>','<?=$_SESSION['login']?>','2')"> -收回讚
            </a>
            <?php 
            }else{ ?>
            <a href="" id="good<?=$row['id']?>" onclick="good('<?=$row['id']?>','<?=$_SESSION['login']?>','1')"> -讚 </a>
            <?php  }
        } ?>
          </div>
        </td>
      </tr>
      <?php
      }
      ?>
      <tr>
        <td class="ct" colspan="3">
          <?php 
          if(($now-1)>0){ ?>
          <a href="?do=<?=$do?>&p=<?=$now-1?>">
            < </a>
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

    </table>
  </fieldset>
</form>
<script>
  $(".bg").hover(function(){
    $(this).next().children(".content").toggle();
  })
  $(".tt").hover(function(){
    $(this).children(".content").toggle();
  })
</script>
<style>
.bg{
  background:lightgrey;
  width:40%;
  padding:5px 10px;
  cursor:pointer;
}
.content{
  display:none;
}
</style>
<fieldset>
  <legend>目前位置：首頁 > 最新文章區</legend>
  <table width="80%" >
    <thead>
      <tr class="ct">
        <th>標題</th>
        <th>內容</th>
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
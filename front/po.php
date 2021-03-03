<style>
  .nav{
    color:blue;
    cursor:pointer;
  }
</style>
<div>目前位置:首頁 > 分類網誌 > <span id="nav"></span></div>
<div width="100%">
<fieldset class=""  style="display:inline-block;width:15%;">
  <legend class="">分類網誌</legend>
  <div class="nav" onclick="nav(this)" id="t1">健康新知</div>
  <div class="nav" onclick="nav(this)" id="t2">菸害防治</div>
  <div class="nav" onclick="nav(this)" id="t3">癌症防治</div>
  <div class="nav" onclick="nav(this)" id="t4">慢性病防治</div>

</fieldset>
<fieldset class="" style="display:inline-block;vertical-align:top;width:40%;">
  <legend class="">文章列表</legend>
  <div class="detail"></div>

</fieldset>
</div>
<script>
$("#nav").html($("#t1").html());
getTitle(1);
function nav(type){
  let str=$(type).text();
  $("#nav").text(str);
  let t=$(type).attr("id").replace("t","");
  getTitle(t);
  
}

function getTitle(type){
  $.get('api/get_title.php',{type},function(detail){
    $(".detail").html(detail);
  })
}
function getNews(id){
  $.get('api/get_news.php',{id},function(news){
    $(".detail").html(news);
  })
}
</script>
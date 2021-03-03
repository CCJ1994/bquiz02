<style>
  .nav{
    color:blue;
    cursor:pointer;
  }
</style>
<div>目前位置 : 首頁 > 分類網誌 > <span id="nav"></span></div>
<fieldset class="" style="display:inline-block;width:30%;">
  <legend class="">分類網誌</legend>
  <div class="nav" onclick="nav(this)" id="n1">健康新知</div>
  <div class="nav" onclick="nav(this)" id="n2">菸害防治</div>
  <div class="nav" onclick="nav(this)" id="n3">癌症防治</div>
  <div class="nav" onclick="nav(this)" id="n4">慢性病防治</div>
</fieldset>
<fieldset class="" style="display:inline-block;width:50%;vertical-align:top;">
  <legend class="">文章列表</legend>
    <div class="detail"></div>
</fieldset>
<script>
  $("#nav").html($("#n1").text());
  getTitle(1);
  function nav(type) {
    $("#nav").html($(type).text());
    let n=$(type).attr("id").replace("n","");
    getTitle(n);
  }

  function getTitle(type) {
    $.get("api/get_title.php",{type},function (titles) {
        $(".detail").html(titles);
    })
  }
  function getNews(id) {
    $.get("api/get_news.php",{id},function (news) {
        $(".detail").html(news);
      })
  }
</script>
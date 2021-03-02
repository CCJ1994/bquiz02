<div>目前位置:首頁 > 分類網誌 > <span id="nav"></span></div>
<div width="100%">
<fieldset class=""  style="display:inline-block;width:15%;">
  <legend class="">分類網誌</legend>
  <div class="nav" data-nav="1" id="t1">健康新知</div>
  <div class="nav" data-nav="2" id="t2">菸害防治</div>
  <div class="nav" data-nav="3" id="t3">癌症防治</div>
  <div class="nav" data-nav="4" id="t4">慢性病防治</div>

</fieldset>
<fieldset class="" width="40%" style="display:inline-block;vertical-align:top;width:40%;">
  <legend class="">文章列表</legend>
  <div class="detail"></div>

</fieldset>
</div>
<script>
$("#nav").html($())
$(".nav").on('click',function(){
  $("#nav").text($(this).html());
  console.log($(this).data("nav"));
})
</script>
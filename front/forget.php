<form action="">
  <fieldset class="fei">
  <legend class="leng">忘記密碼</legend>
 
    <div class="">請輸入信箱以查詢密碼</ㄎ>
  
    <div><input type="email" name="email" id="email"></div>
    <div id="pw"></div>
    <div>
      <input type="button" value="尋找" onclick="findpw()">
    </div>
  
  </fieldset>
</form>
<script>
function findpw(){
  let email=$("#email").val();
  $.post("api/forget.php",{email},function(re){
      $("#pw").html(re);
  })
}
</script>
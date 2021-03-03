<form action="" method="">
  <fieldset class="fei">
  <legend class="leng">忘記密碼</legend>
    <div>請輸入信箱以查詢密碼</div>
    <input type="text" name="email" id="email">
    <div id="ans"></div>
    <input type="button" value="登入" onclick="findpw()">
  </fieldset>
</form>
<script>
  function findpw() {
    let 
    email=$("#email").val();
    $.post('api/findpw.php',{email},function(re) {
      $("#ans").html(re);
    })
  }
</script>
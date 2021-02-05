<form action="">
  <fieldset class="fei">
    <legend class="leng">忘記密碼</legend>
    <div>
      請輸入信箱以查詢密碼
    </div>
    <div>
      <input type="email" name="email" id="email">
    </div>
    <div id="pw"></div>
    <input type="button" value="尋找" onclick="find()">
  </fieldset>
</form>
<script>
  function find() {
    let email=$("#email").val();
    $.post('api/findpw.php',{email},function (res)  {
      $("#pw").html(res);
    });
  }
</script>
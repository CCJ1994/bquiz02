<fieldset class="fei">
  <legend class="leng">會員登入</legend>
  <form action="">
    <table width="100%">
      <tr>
        <td>帳號</td>
        <td><input type="text" name="acc" id="acc"></td>
      </tr>
      <tr>
        <td>密碼</td>
        <td><input type="password" name="pw" id="pw"></td>
      </tr>
      <tr>
        <td colspan="2" class="r">
          <a href="?do=forget">忘記密碼</a>｜
          <a href="?do=reg">尚未註冊</a>
        </td>
      </tr>
      <tr>
        <td class="l" colspan="2"><input onclick="login()" type="button" value="登入"><input type="reset" value="清除"></td>
      </tr>
    </table>
  </form>
</fieldset>
<script>
  function login(){
    let 
      acc=$("#acc").val(),
      pw=$("#pw").val();
      $.post('api/chkacc.php',{acc},function(re){
        if(parseInt(re)){
          $.post('api/chkpw.php',{acc,pw},function(res){
            if(parseInt(res)){
              if(acc=='admin'){
                location.href="backend.php";
              }else{
                location.href="index.php";
              }
            }else{
              alert("密碼錯誤");
              $("#acc,#pw").val("");
            }
          })
        }else{
          alert("查無帳號");
          $("#acc,#pw").val("");
        }
      })
  }
</script>
<style>
.bg{
  background:lightgrey;
  text-align:right;
  width:40%;
}
</style>
<form action="">
  <fieldset class="fei">
  <legend class="leng">會員登入</legend>
  <table width="100%">
  <tr>
    <td class="bg">帳號：</td>
    <td><input type="text" name="acc" id="acc"></td>
  </tr>
  <tr>
    <td class="bg">密碼：</td>
    <td><input type="password" name="pw" id="pw"></td>
  </tr>
  <tr>
  <td>
    <input type="button" value="登入" onclick="login()">
    <input type="reset" value="清除">
  </td>
  <td>
    <a href="?do=forget">忘記密碼</a>｜
    <a href="?do=reg">尚未註冊</a>
  </td>
  </tr>
  </table>
  </fieldset>
</form>
<script>
function login(){
  let 
  acc=$("#acc").val(),
  pw=$("#pw").val();
  $.post("api/chkacc.php",{acc},function(res){
    if(res=='1'){
      $.post("api/chkpw.php",{acc,pw},function(re){
        if(re=='1'){
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
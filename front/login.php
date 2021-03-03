<style>
.bg{
  background:lightgrey;
}
</style>
<form action="" method="">
  <fieldset class="fei">
  <legend class="leng">會員登入</legend>
    <table>
      <tr>
        <td class="l bg" style="width:200px;">帳號</td>
        <td><input type="text" name="acc" id="acc"></td>
      </tr>
      <tr>
        <td class="l bg" style="width:200px;">密碼</td>
        <td><input type="password" name="pw" id="pw"></td>
      </tr>
      <tr>
        <td class="r" colspan="2">
          <a href="?do=forget">忘記密碼</a>|
          <a href="?do=reg">尚未註冊</a>
        </td>
      </tr>
      <tr>
        <td class="l" colspan="2">
          <input type="button" value="登入" onclick="login()">
          <input type="reset" value="清除">
        </td>
      </tr>
    </table>
  </fieldset>
</form>
<script>
  function login() {
    let 
    acc=$("#acc").val(),
    pw=$("#pw").val();
    $.post('api/chkacc.php',{acc},function(re) {
      if(parseInt(re)){
        $.post('api/chkpw.php',{acc,pw},function (res) {
          if(parseInt(res)){
            if(acc=='admin'){
              location.href="backend.php";
            }else{
              location.href="index.php";
            }
          }else{
            alert("密碼錯誤");
          }
        })
      }else{
        alert("查無資料");
      }
    })
  }
</script>
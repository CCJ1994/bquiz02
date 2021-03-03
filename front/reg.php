<style>
.bg{
  background:lightgrey;
}
</style>
<form action="" method="">
  <fieldset class="fei">
  <legend class="leng">會員註冊</legend>
  <div style="color:red;">*請設定您要註冊的帳號及密碼(最長12個字元)</div>
    <table>
      <tr>
        <td class="l bg" style="width:200px;">STEP:1 帳號</td>
        <td><input type="text" name="acc" id="acc"></td>
      </tr>
      <tr>
        <td class="l bg" style="width:250px;">STEP:2 密碼</td>
        <td><input type="password" name="pw" id="pw"></td>
      </tr>
      <tr>
      <tr>
        <td class="l bg" style="width:250px;">STEP:3 再次確認密碼</td>
        <td><input type="password" name="pw2" id="pw2"></td>
      </tr>
      <tr>
      <tr>
        <td class="l bg" style="width:250px;">STEP:4 信箱(忘記密碼時使用)</td>
        <td><input type="text" name="email" id="email"></td>
      </tr>
      <tr>
        <td class="l" colspan="2">
          <input type="button" value="註冊" onclick="reg()">
          <input type="reset" value="清除">
        </td>
      </tr>
    </table>
  </fieldset>
</form>
<script>
  function reg() {
    let 
    acc=$("#acc").val(),
    pw=$("#pw").val();
    pw2=$("#pw2").val(),
    email=$("#email").val();
    if(acc=="" || pw=="" || pw2=="" || email=="" ){
      alert("不可空白");
    }else{
      if(pw != pw2){
        alert("密碼錯誤");
      }else{

        $.post('api/chkacc.php',{acc},function(re) {
          if(parseInt(re)){
            alert("帳號重複");
            
          }else{
            $.post('api/reg.php',{acc,pw,email},function (res) {
              alert("註冊完成，歡迎加入");
              location.href="index.php";
            })
          }
        })
      }
    }
  }
</script>
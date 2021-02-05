<style>
.hbg {
  background: #E0E0E0;
  width: 120px;
  text-align: center;
}
.bg {
  background: #E0E0E0;
  width: 120px;
  text-align: right;
}
</style>
<form action="api/delmem.php" method="post">
  <fieldset class="">
    <legend class="">帳號管理</legend>
    <div>
      <table style="margin:auto;width:80%;">
        <tr>
          <td class="hbg">帳號</td>
          <td class="hbg">密碼</td>
          <td class="hbg">刪除</td>
        </tr>
        <?php 
        $rows=$Mem->all();
        foreach ($rows as $key => $row) { 
          if($row['acc']!='admin'){ ?>
          
        <tr>
          <td class="ct"><?=$row['acc'];?></td>
          <td class="ct"><?=str_repeat("*",strlen($row['pw']));?></td>
          <td class="ct del"><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
          <input type="hidden" name="id[]" value="<?=$row['id'];?>">
        </tr>
      <?php } 
          }  ?>
      <tr class="ct">
        <td colspan="3">
          <input type="submit" value="確定刪除">
          <input type="reset" value="取消選取">
        </td>
      </tr>
      </table>
    </div>
    </form>
    <form action="">
    <div>
    <h1>新增會員</h1>
    <div style="color:red;">*請設定您要註冊的帳號及密碼(最長12個字元)</div>
    <table >
      <tr>
        <td class="bg">帳號:</td>
        <td><input type="text" name="acc" id="acc"></td>
      </tr>
      <tr>
        <td class="bg">密碼:</td>
        <td><input type="password" name="pw" id="pw"></td>
      </tr>
      <tr>
        <td class="bg">確認密碼:</td>
        <td><input type="password" name="pw2" id="pw2"></td>
      </tr>
      <tr>
        <td class="bg">信箱:</td>
        <td><input type="email" name="email" id="email"></td>
      </tr>
      <tr>
        <td>
          <input type="button" value="註冊" onclick="reg()">
          <input type="reset" value="清除">
        </td>
      </tr>
    </table>
    </div>
  </fieldset>
</form>
<script>
  function reg(){
    let 
      acc=$("#acc").val(),
      pw=$("#pw").val(),
      pw2=$("#pw2").val(),
      email=$("#email").val();
      if(acc=="" || pw=="" || pw2=="" || email==""){
        alert("不可空白");
      }else if(pw!=pw2){
        alert("密碼錯誤");
        $("#acc,#pw,#pw2,#email").val("");
      }else{
        $.post('api/chkacc.php',{acc},function(res){
          if(res=="1"){
            alert("帳號重複");
            $("#acc").val("");
          }else{
            $.post('api/reg.php',{acc,pw,email},function(){
              alert("註冊成功，歡迎加入");
              location.reload();
            })
          }
        });
      }
  }
</script>
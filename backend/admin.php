<fieldset>
<legend>帳號管理</legend>
<form action="api/deladmin.php" method="post">
<table style="width:50%;margin:auto;">
  <tr class="clo">
    <td>帳號</td>
    <td>密碼</td>
    <td>刪除</td>
  </tr>
  <?php
  // $mems=$Mem->all("where acc != 'admin'");
  $mems=$Mem->all();
  foreach($mems as $mem){
    if($mem['acc']!='admin'){
    
    ?>
  <tr>
  <td><?=$mem['acc'];?></td>
  <td><?=str_repeat("*",strlen($mem['pw']));?></td>
  <td><input type="checkbox" name="del[]" value="<?=$mem['id'];?>"></td>
</tr>
<?php
}
}
  ?>
</table>
<div class="cent ct">
<input type="submit" value="確定刪除">
<input type="reset" value="清空選取">
</div>
</form>
<form>
 <h1>新增會員</h1>
    <div style="color:red;">*請設定您要註冊的帳號及密碼(最長12個字元)</div>
    <table>
      <tr>
        <td class="clo">step1:登入帳號</td>
        <td><input type="text" name="acc" id="acc"></td>
      </tr>
      <tr>
        <td class="clo">step2:登入密碼</td>
        <td><input type="password" name="pw" id="pw"></td>
      </tr>
      <tr>
        <td class="clo">step3:再次確認密碼</td>
        <td><input type="password" name="pw2" id="pw2"></td>
      </tr>
      <tr>
        <td class="clo">step4:信箱(忘記密碼時使用)</td>
        <td><input type="text" name="email" id="email"></td>
      </tr>
      <tr>
        <td><input type="button" onclick="reg()" value="註冊"><input type="reset" value="清除"></td>
        <td></td>
      </tr>
    </table>
  
</form>
</fieldset>
<script>
function reg(){
  let acc=$("#acc").val();
  let pw=$("#pw").val();
  let pw2=$("#pw2").val();
  let email=$("#email").val();

  if(acc=="" || pw=="" || pw2=="" || email==""){
    alert("不可空白");
  }else if(pw!=pw2){
      alert("密碼錯誤");
  }else{
    $.post("api/chkacc.php",{acc},function(res){
      if(res=='1'){
        alert("帳號重複")
      }else{
        $.post("api/reg.php",{acc,pw,email},function(){
          location.reload();
        })
      }
    })
  }

}
</script>
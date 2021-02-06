<style>
.bg {
  background: lightgrey;
  text-align: right;
  width: 30%;
}

.hbg {
  background: lightgrey;
  text-align: center;
  width: 30%;
}
</style>
<fieldset class="">
  <legend class="leng">帳號管理</legend>
  <form action="api/del_mem.php" method="post">
    <table class="ct" style="margin:auto;width:70%;">
      <tr>
        <td class="hbg">帳號</td>
        <td class="hbg">密碼</td>
        <td class="hbg">刪除</td>
      </tr>
      <?php 
      $rows=$Mem->all();
      foreach ($rows as $row) {
        ?>
      <tr>
        <td><?=$row['acc'];?></td>
        <td><?=str_repeat("*",strlen($row['pw']));?></td>
        <td><input type="checkbox" name="del[]" id="del" value="<?=$row['id'];?>"></td>
      </tr>
      <?php
      }
    ?>
      <tr>
        <td colspan="3">
          <input type="submit" value="確定刪除">
          <input type="reset" value="清除選取">
        </td>
      </tr>
    </table>
  </form>
  <form action="">
    <div style="color:red;">*請輸入您要註冊的帳號及密碼（最長12個字元）</div>
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
        <td class="bg">確認密碼：</td>
        <td><input type="password" name="pw2" id="pw2"></td>
      </tr>
      <tr>
        <td class="bg">信箱：</td>
        <td><input type="email" name="email" id="email"></td>
      </tr>
      <tr>
        <td>
          <input type="button" value="新增" onclick="reg()">
          <input type="reset" value="清除">
        </td>
    </table>
</fieldset>
</form>
<script>
function reg() {
  let
    acc = $("#acc").val(),
    pw = $("#pw").val(),
    pw2 = $("#pw2").val(),
    email = $("#email").val();
  if (acc == "" || pw == "" || pw2 == "" || email == "") {
    alert("不可空白");
  } else if (pw != pw2) {
    alert("密碼錯誤");
    $("#pw,#pw2").val("");
  } else {
    $.post("api/chkacc.php", {
      acc
    }, function(res) {
      if (res == '1') {
        alert("帳號重複");
        $("#acc").val("");
      } else {
        $.post("api/reg.php", {
          acc,
          pw,
          email
        }, function() {
          alert("新增成功");
          location.href = "backend.php?do=admin";
        })
      }
    })
  }
}
</script>
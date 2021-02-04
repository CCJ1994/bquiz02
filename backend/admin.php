  <fieldset class="">
    <legend class="leng">帳號管理</legend>
    <form action="api/delmem.php" method="post">
      <table width="98%" class="ct">
        <tr>
          <td>帳號</td>
          <td>密碼</td>
          <td>刪除</td>
        </tr>
        <?php
      $rows=$Mem->all();
      foreach ($rows as $row) { 
        if($row['acc']!='admin'){
        ?>
        <tr>
          <td><?=$row['acc'];?></td>
          <td><?=str_repeat("*",strlen($row['pw']));?></td>
          <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
        </tr>
        <?php
     }
      }
      ?>
        <tr>
          <td colspan="3">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清空選取">
          </td>
        </tr>
      </table>
    </form>
    <form>
      <div style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</div>
      <table class="">
        <tr>
          <td>Step1:登入帳號</td>
          <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
          <td>Step2：登入密碼</td>
          <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
          <td>Step3:再次確認密碼</td>
          <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
          <td>Step4:信箱(忘記密碼時使用)</td>
          <td><input type="email" name="email" id="email"></td>
        </tr>
        <tr>
          <td>
            <input type="button" value="註冊" onclick="reg()">
            <input type="reset" value="清除">
          </td>
        </tr>
      </table>
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
    }else{
      $.post('api/chkacc.php',{acc},function(re){
        if(re=='1'){
          alert("帳號重複");
        }else{
          $.post('api/reg.php',{acc,pw,email},function(){
            alert("註冊完成，歡迎加入");
            location.href='backend.php?do=admin';
          })
        }
      })
    }
}
  </script>
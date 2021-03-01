<fieldset class="">
  <legend class="">帳號管理</legend>
  <form action="api/del.php" method="post">
  <table style="width:100%;" class="ct">
    <tr >
      <td>帳號</td>
      <td>密碼</td>
      <td>刪除</td>
    </tr>
    <?php $rows=$Mem->all();
    foreach ($rows as $key => $row) { 
      if($row['acc']!='admin'){?>
      <tr>
      <td><?=$row['acc'];?></td>
      <td><?=str_repeat("*",strlen($row['pw']));?></td>
      <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
      <input type="hidden" name="id[]" value="<?=$row['id'];?>">
    </tr>
    <?php 
      }
    }?>
    <tr>
        <td  colspan="3"><input type="submit" value="確定刪除"><input type="reset" value="清除選取"></td>
      </tr>
  </table>
  </form>
  <h3>新增會員</h3>
  <div style="color:red;">*請設定您要註冊的帳號及密碼（最長12個字元）</div>
  <form action="">
    <table width="100%">
      <tr>
        <td>STEP1:登入帳號</td>
        <td><input type="text" name="acc" id="acc"></td>
      </tr>
      <tr>
        <td>STEP2:密碼</td>
        <td><input type="password" name="pw" id="pw"></td>
      </tr>
      <tr>
        <td>STEP3:再次確認密碼</td>
        <td><input type="password" name="pw2" id="pw2"></td>
      </tr>
      <tr>
        <td>STEP4:信箱（忘記密碼時使用）</td>
        <td><input type="email" name="email" id="email"></td>
      </tr>
      <tr>
        <td class="l" colspan="2"><input onclick="reg()" type="button" value="註冊"><input type="reset" value="清除"></td>
      </tr>
    </table>
  </form>
</fieldset>
<script>
  function reg(){
    let 
      acc=$("#acc").val(),
      pw=$("#pw").val(),
      pw2=$("#pw2").val(),
      email=$("#email").val();
      if(acc=="" || pw=="" || pw2=="" || email == ""){
        alert("不可空白");
      }else{
        if(pw != pw2){
          alert("密碼錯誤");
          $("#pw,#pw2").val("");
        }else{
          $.post('api/chkacc.php',{acc},function(re){
            if(parseInt(re)){
              alert("帳號重複");
              $("#acc").val("");
            }else{
              $.post('api/reg.php',{acc,pw,email},function(re){
                alert("新增完成");
                location.href="backend.php?do=admin";
          })
            }
          })

        }
      }
  }
</script>
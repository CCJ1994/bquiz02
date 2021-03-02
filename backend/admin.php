<style>
  .bg{
    background:lightgrey;
  }
</style>
<fieldset class="">
  <legend class="">帳號管理</legend>
  <form action="api/del.php" method="post">
    <table width="100%" style="margin:auto;">
      <tr>
        <td class="bg ct">帳號</td>
        <td class="bg ct">密碼</td>
        <td class="bg ct">刪除</td>
      </tr>
      <?php 
      $rows=$Mem->all();
      foreach ($rows as $key => $row) { ?>
        <tr>
        <td class='ct'><?=$row['acc']?></td>
        <td class='ct'><?=str_repeat("*",strlen($row['pw']))?></td>
        <td class='ct'><input type='checkbox' value="<?=$row['id']?>" name='del[]'></td>
        <input type='hidden' value="<?=$row['id']?>" name='id[]'>
        </tr>
        <?php
      }
      ?>
      <tr>
        <td class="ct" colspan="3">
          <input type="submit" value="確認編輯">
          <input type="reset" value="清除選取">
        </td>
      </tr>
    </table>
  </form>
  <form action="" method="">
    <h3>新增會員</h3>
    <table>
      <tr>
        <td width="50%" class="bg l">STEP1:帳號</td>
        <td><input type="text" name="acc" id="acc"></td>
      </tr>
      <tr>
        <td width="50%" class="bg l">STEP2:密碼</td>
        <td><input type="password" name="pw" id="pw"></td>
      </tr>
      <tr>
        <td width="50%" class="bg l">STEP3:再次確認密碼</td>
        <td><input type="password" name="pw2" id="pw2"></td>
      </tr>
      <tr>
        <td width="50%" class="bg l">STEP4:信箱(忘記密碼時用)</td>
        <td><input type="text" name="email" id="email"></td>
      </tr>
      <tr>
        <td class="l" colspan="2">
          <input type="button" value="新增" onclick="reg()">
          <input type="reset" value="清除">
        </td>
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
      if(acc=="" || pw=="" || pw2=="" || email==""){
        alert("不可空白");
      }else{
        if(pw != pw2){
          alert("密碼錯誤");
          $("#pw,#pw2").val();

        }else{
          $.post('api/chkacc.php',{acc},function(re){
            if(parseInt(re)){
          alert("帳號重複");
          $("#acc").val();
        }else{
          $.post('api/reg.php',{acc,pw,email},function(res){
            alert("新增完成");
            location.href="backend.php?do=admin";
          })
        }
      })
        }
      }
      
  }
</script>
<fieldset class="fei">
  <legend class="leng">忘記密碼</legend>
  <table>
    <tr>
      <td>
        請輸入信箱以查詢密碼
      </td>
    </tr>
    <tr>
      <td>
        <input type="text" name="email" id="email">
      </td>
    </tr>
    <tr>
      <td><span id="result"></span></td>
    </tr>
    <tr>
      <td>
        <input type="button" value="尋找" onclick="findpw()">
      </td>
    </tr>
  </table>
</fieldset>
<script>
  function findpw(){
    let email=$("#email").val();
    $.post('api/forget.php',{email},function(re){
      $("#result").html(re);
    })
  }
</script>
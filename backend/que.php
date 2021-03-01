<form action="api/add_que.php" method="post">
  <fieldset class="fei">
    <legend class="leng">新增問卷</legend>
    <table>
      <tr>
        <td>問卷名稱</td>
        <td><input type="text" name="subject" id=""></td>
      </tr>
      <tr id="more">
        <td>選項</td>
        <td><input type="text" name="option[]" id=""></td>
        <td><input type="button" onclick="more()" value="更多"></td>
      </tr>
      <tr>
        <td><input type="submit" value="新增">｜<input type="reset" value="清空"></td>
      </tr>
    </table>
  </fieldset>
</form>
<script>
  function more(){
    $("#more").before(`
    <tr>
        <td>選項</td>
        <td><input type="text" name="option[]" id=""></td>
      </tr>
    `)
  }
</script>

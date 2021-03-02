<style>
  .bg{
    background:lightgrey;
  }
</style>
<form action="api/add_que.php" method="post">
  <fieldset class="fei">
  <legend class="leng">新增問卷</legend>
    <table>
      <tr>
        <td class="bg">問卷名稱</td>
        <td><input type="text" name="subject"></td>
      </tr>
      <tr id="more">
        <td colspan="2" class="bg">選項<input type="text" name="option[]"><button type="button" onclick="more()">更多</button></td>
      </tr>
      <tr>
        <td class="ct" colspan="4">
          <input type="submit" value="新增">
          <input type="reset" value="清空">
        </td>
      </tr>
    </table>
  </fieldset>
</form>
<script>
  function more(){
    $("#more").before(`
    <tr>
      <td colspan="2" class="bg">選項<input type="text" name="option[]"></td>
    </tr>
    `);
  }
</script>
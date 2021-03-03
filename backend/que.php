<style>
.bg{
  background:lightgrey;
}
</style>

<fieldset class="">
  <legend class="">新增問卷</legend>
  <form action="api/add_que.php" method="post">
    <table>
      <tr>
        <td class="bg">問卷名稱</td>
        <td><input type="text" name="subject" id=""></td>
      </tr>
      <tr id="more">
        <td class="bg" colspan='2'>
          選項<input type="text" name="opt[]" id="">
          <input type="button" value="更多" onclick="more()">
        </td>
      </tr>
      <tr>
        <td>
        <input type="submit" value="新增">|
        <input type="reset" value="清空">
        </td>
      </tr>
    </table>
  </form>
</fieldset>
<script>
  function more() {
    $("#more").before(`
    <tr>
      <td class="bg" colspan='2'>
        選項<input type="text" name="opt[]" id="">
      </td>
    </tr>
    `);
  }
</script>

<fieldset class="">
  <legend class="leng">新增問卷</legend>
  <form action="api/addque.php" method="post">
    <table width="98%">
      <tr>
        <td>問卷名稱<input type="text" name="subject"></td>
      </tr>
      <tr id="more">
        <td>選項
          <input type="text" name="option[]">
          <input type="button" value="更多" onclick="more()">
        </td>
      </tr>
      <tr>
        <td>
          <input type="submit" value="新增">
          <input type="reset" value="清空">
        </td>
    </table>
  </form>
</fieldset>
<script>
function more() {
  let option = `
      <tr>
        <td>
          選項<input type="text" name="option[]">
          <input type="button" value="更多" onclick="more()">
        </td>
      </tr>
      `;
  $("#more").after(option);

}
</script>
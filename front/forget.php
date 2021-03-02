<style>
  .bg{
    background:lightgrey;
  }
</style>

  <div>請輸入信箱以查詢密碼</div>
  <form action="" method="">
    <table>
      <tr>
        <td width="50%" ><input type="text" name="email" id="email"></td>
        <td></td>
      </tr>
      <tr>
        <td id="ans"></td>
      </tr>
      <tr>
        <td>
          <input type="button" value="尋找" onclick="findpw()">
        </td>
      </tr>
    </table>
  </form>
<script>
  function findpw(){
    let 
      email=$("#email").val();
      $.post('api/findpw.php',{email},function(re){
        $("#ans").html(re);
      })
  }
</script>
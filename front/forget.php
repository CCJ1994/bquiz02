  <form action="">
  <div class="">請輸入信箱以查詢密碼</div>
    <div><input style="width:400px;" type="text" name="email" id="email"></div>
    <div id="ans"></div>
    <div><input type="button" onclick="findpw()" value="尋找"></div>
<script>
  function findpw(){
    let email=$("#email").val();
      $.post('api/findpw.php',{email},function(re){
          $("#ans").html(re);
      })
  }
</script>
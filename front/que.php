<fieldset>
  <legend>目前位置：首頁 > 問卷調查</legend>
  <table>
  <thead>
    <tr>
      <td>編號</td>
      <td>問卷題目</td>
      <td>投票總數</td>
      <td>結果</td>
      <td>狀態</td>
    </tr>
  </thead>
<?php 
$ques=$Que->all(['subject'=>0]);
foreach($ques as $key=>$que){
?>
<tr>
      <td><?=$key+1;?>.</td>
      <td><?=$que['text'];?></td>
      <td><?=$que['count'];?></td>
      <td><a href="?do=result">結果</a></td>
      <td>
      <?php if(!empty($_SESSION['login'])){
      ?>
      <a href="?do=vote&id=<?=$que['id'];?>">參與投票</a>
      <?php
      }else{
        echo "請先登入";
      }
      }?>
      </td>
    </tr>



  </table>

</fieldset>
<?php
$id=$_GET['id'];
$subject=$Que->find($id);
$options=$Que->all(['subject'=>$id]);
?>
<fieldset>
  <legend>目前位置：首頁 > 問卷調查 > <?=$subject['text'];?></legend>
  <h2><?=$subject['text'];?></h2>
  <form action="api/vote.php" method="post">
  <table>  
<?php 
$options=$Que->all(['subject'=>$id]);
foreach($options as $key=>$option){
?>
<tr>
<td>
<input type="radio" name="vote" value="<?=$option['id']?>">
<?=$option['text'];?>
</td>
</tr>
      <?php
      }?>
      
    
  </table>
  <input type="hidden" name="subject" value="<?=$subject['id'];?>">
  <div class="ct"><input type="submit" value="我要投票"></div>
  </form>
  

</fieldset>
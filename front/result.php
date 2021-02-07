  <?php
  $sub=$Que->find(['id'=>$_GET['id']]);
  $options=$Que->all(['subject'=>$_GET['id']]);
  ?>
  <fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$sub['text'];?> </legend>
    <h4><?=$sub['text'];?></h4>

    <table>
      <?php
        foreach ($options as $key => $option) {
          $div=($sub['count'] != 0)?$sub['count']:1;
          $rate=$option['count']/$div;
          ?>
      <tr>
        <td width="50%">
          <?=($key+1);?>.<?=$option['text'];?>
        </td>
        <td >
          <div style="display:inline-block;height:25px;background:#999;width:<?=100*$rate;?>%"></div>
          <?=$option['count'];?>票(<?=round(($rate)*100);?>%)
        </td>
      </tr>
      <?php
        }
      ?>
    </table>

  </fieldset>
  <div class="ct"><a href="index.php?do=que"><button type="button">返回</button></a></div>
<?php
date_default_timezone_set("Asia/Taipei");

session_start();

class DB{
  protected $dsn="mysql:host=localhost;dbname=pra_db02;charset=utf8";
  protected $pdo="";
  protected $table="";
  function __construct($table){
    $this->pdo=new PDO($this->dsn,'root','');
    $this->table=$table;
  }
  function all(...$arg){
    $sql="select * from $this->table ";
    if(isset($arg[0])){
      if(is_array($arg[0])){
        foreach ($arg[0] as $key => $value) {
          $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        $sql .=" where ".implode(" && ",$tmp);
      }else{
        $sql .=$arg[0];
      }
    }
    if (isset($arg[1])){
      $sql .=$arg[1];
    }
    return $this->pdo->query($sql)->fetchAll();
  }
  function count(...$arg){
    $sql="select count(*) from $this->table ";
    if(isset($arg[0])){
      if(is_array($arg[0])){
        foreach ($arg[0] as $key => $value) {
          $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        $sql .=" where ".implode(" && ",$tmp);
      }else{
        $sql .=$arg[0];
      }
    }
    if (isset($arg[1])){
      $sql .=$arg[1];
    }
    return $this->pdo->query($sql)->fetchColumn();
  }
  function find($id){
    $sql="select * from $this->table ";
    if(isset($id)){
      if(is_array($id)){
        foreach ($id as $key => $value) {
          $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        $sql .=" where ".implode(" && ",$tmp);
      }else{
        $sql .=" where `id`='$id'";
      }
    }
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
  }
  function del($id){
    $sql="delete from $this->table ";
    if(isset($id)){
      if(is_array($id)){
        foreach ($id as $key => $value) {
          $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        $sql .=" where ".implode(" && ",$tmp);
      }else{
        $sql .=" where `id`='$id'";
      }
    }
    return $this->pdo->exec($sql);
  }
  function save($arr){
    if(isset($arr['id'])){
      foreach ($arr as $key => $value) {
        $tmp[]=sprintf("`%s`='%s'",$key,$value);
      }
      $sql="update $this->table set ".implode(',',$tmp)." where `id`='{$arr['id']}'";
    }else{
      $sql="insert into $this->table (`".implode("`,`",array_keys($arr))."`) values ('".implode("','",$arr)."')";
    }
    return $this->pdo->exec($sql);
  }
  function q($sql){
    return $this->pdo->query($sql)->fetchAll();
  }
}
function to($url){
  header("location:".$url);
}
$Mem=new DB('mem');
$Total=new DB('total');
$News=new DB('news');
$Que=new DB('que');
$Log=new DB('log');

$total=$Total->find(['date'=>date("Y-m-d")]);
if(empty($total) && empty($_SESSION['total'])){
  $Total->save(['date'=>date("Y-m-d"),'total'=>1]);
  $_SESSION['total']=1;
}else if(empty($total) && !empty($_SESSION['total'])){
  $Total->save(['date'=>date("Y-m-d"),'total'=>1]);
}else if(!empty($total) && empty($_SESSION['total'])){
  $total['total']++;
  $Total->save($total);
  $_SESSION['total']=1;
}
?>
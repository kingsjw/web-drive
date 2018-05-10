<?php
  session_start();
  $db = new pdo("mysql:host=127.0.0.1;dbname=0402;charset=utf8","root","");
  function str($str){
    $str = htmlspecialchars($str,ENT_QUOTES);
    $str = trim($str);
    $str = addslashes($str);
    return $str;
  }
  function move($loc){
    echo "<script>location.href='{$loc}';</script>";
  }
  function alert($msg){
    echo "<script>alert('{$msg}');</script>";
  }
  function back(){
    echo "<script>history.back();</script>";
  }
  function get_size($idx,$db){
    $size = 0;
    $sql = "SELECT * FROM files WHERE path='{$idx}'";
    $rs = $db->query($sql);
    foreach ($rs as $data) {
      if($data['folder'] == "0"){
        $size += $data['size'];
      }else {
        $size += get_size($data['idx'], $db);
      }
    }
    return $size;
  }
  function del_all($idx,$db){
    $sql = "SELECT * FROM files where path='{$idx}'";
    $rs = $db->query($sql);
    foreach ($rs as $data) {
      if($data['folder'] == 0){
        $sql = "DELETE FROM files WHERE idx='{$data['idx']}'";
        $db->query($sql);
        $sql = "DELETE FROM outside WHERE f_idx='{$data['idx']}'";
        $db->query($sql);
        $sql = "DELETE FROM inside WHERE f_idx='{$data['idx']}'";
        $db->query($sql);
      }else {
        del_all($data['idx'],$db);
      }
    }
    $sql = "DELETE FROM files WHERE idx='{$idx}'";
    $db->query($sql);
  }
  function mb($size_f){
    $size_f = $size_f/1024/1024;
    return number_format($size_f);
  }
?>

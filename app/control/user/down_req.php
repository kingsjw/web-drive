<?php
  if(isset($_GET['idx'])){
    $sql = "SELECT * FROM files WHERE idx='{$_GET['idx']}'";
    $rs = $db->query($sql)->fetch();
    $name = htmlspecialchars_decode($rs['f_name'],ENT_QUOTES);
    header("content-disposition: attachement; filename=\"{$name}\"");
    readfile($_SERVER['DOCUMENT_ROOT']."/public/data/{$rs['micro']}");

  }
  if(isset($_GET['i'])){
    if(!isset($_SESSION['user']['idx'])){
      alert("로그인한 사용자만 접근가능합니다.");
      move("/view/user/login");
      exit;
    }
    $sql = "SELECT * FROM inside WHERE idx='{$_GET['i']}'";
    $re = $db->query($sql)->fetch();
    $sql = "SELECT * FROM files WHERE idx='{$re['f_idx']}'";
    $rs = $db->query($sql)->fetch();
    $name = htmlspecialchars_decode($rs['f_name'],ENT_QUOTES);
    $sql = "UPDATE inside SET down_cnt=down_cnt+1 WHERE idx='{$_GET['i']}'";
    $db->query($sql);
    header("content-disposition: attachement; filename=\"{$name}\"");
    readfile($_SERVER['DOCUMENT_ROOT']."/public/data/{$rs['micro']}");
  }
  if(isset($_GET['q'])){
    $sql = "SELECT * FROM outside WHERE code='{$_GET['q']}'";
    $re = $db->query($sql)->fetch();
    $sql = "SELECT * FROM files WHERE idx='{$re['f_idx']}'";
    $rs = $db->query($sql)->fetch();
    $name = htmlspecialchars_decode($rs['f_name'],ENT_QUOTES);
    header("content-disposition: attachement; filename=\"{$name}\"");
    readfile($_SERVER['DOCUMENT_ROOT']."/public/data/{$rs['micro']}");
    $sql = "UPDATE outside SET down_cnt=down_cnt+1 WHERE code='{$_GET['q']}'";
    $db->query($sql);
  }
?>

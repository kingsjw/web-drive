<?php
  $sql = "SELECT * FROM files WHERE idx='{$_GET['idx']}'";
  $rs = $db->query($sql)->fetch();
  $k1 = ['A','B','C','D','E','F','G'];
  $k2 = ['A','B','C','D','E','F','G'];
  while (true) {
    $a = $k1[rand(0,5)];
    $b = $k2[rand(0,5)];
    $c = rand(10,99);
    $code = $a.$b.$c;
    $sql = "SELECT code FROM outside WHERE code='{$code}'";
    $re = $db->query($sql);
    if($re->rowCount() == 0) break;
  }
  $sql = "INSERT INTO outside SET f_idx={$rs['idx']}, u_idx='{$rs['u_idx']}',code='{$code}',wdate=now()";
  $db->query($sql);
  move("/");
?>

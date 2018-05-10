<?php
  $sql = "SELECT * FROM files WHERE idx='{$_GET['idx']}'";
  $rs = $db->query($sql)->fetch();
  $sql = "INSERT INTO inside SET f_idx={$rs['idx']}, u_idx='{$rs['u_idx']}',wdate=now()";
  $db->query($sql);
  move("/");
?>

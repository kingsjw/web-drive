<?php
  if($_GET['f_remove'] == "y"){
    del_all($_GET['idx'], $db);
    echo "a";
  }
  if($_GET['f_remove'] == "n"){
    $sql = "DELETE FROM files where idx='{$_GET['idx']}'";
    $db->query($sql);
  }
  move("/");
?>

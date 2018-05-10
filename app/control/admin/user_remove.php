<?php
  $sql = "DELETE FROM member WHERE idx='{$_GET['idx']}'";
  $db->query($sql);
  $sql = "DELETE FROM files WHERE u_idx='{$_GET['idx']}'";
  $db->query($sql);
  $sql = "DELETE FROM inside WHERE u_idx='{$_GET['idx']}'";
  $db->query($sql);
  $sql = "DELETE FROM outside WHERE u_idx='{$_GET['idx']}'";
  $db->query($sql);
  if($_SESSION['user']['idx'] == $_GET['idx']){
      unset($_SESSION['user']);
      alert("자신을 삭제하였으므로 로그아웃됩니다.");
      move("/view/user/login");
  }else {
    alert("삭제하였습니다.");
    move("/view/admin/user_management");
  }
?>

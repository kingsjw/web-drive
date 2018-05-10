<?php
  $userid = str($_POST['userid']);
  $userpw = str($_POST['userpw']);

  $sql = "SELECT * FROM member WHERE userid='{$userid}'";
  // echo $sql;
  $rs = $db->query($sql)->fetch();
  // echo $rs['salt'];
  $userpw_ok = hash("sha256", $userpw.$rs['salt']);
  $sql = "SELECT * FROM member WHERE userid='{$userid}' and userpw='{$userpw_ok}'";
  $re = $db->query($sql);
  // echo $sql;
  if($re->rowCount() == 0){
    alert("그런 아이디 혹은 비밀번호가 없네요");
    back();
  }else {
    alert("로그인 완료");
    $_SESSION['user'] = $re->fetch();
    move("/view/temp/main");
  }
?>

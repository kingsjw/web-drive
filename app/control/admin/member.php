<?php
  $userid = str($_POST['userid']);
  $username = str($_POST['username']);
  $userpw = str($_POST['userpw']);
  $userlevel = str($_POST['userlevel']);

  $sql = "SELECT * FROM member WHERE userid='{$userid}'";
  $rs = $db->query($sql);
  if($rs->rowCount() > 0){
    alert("중복아이디");
    back();
  }else {
    $k1 = ['A','B','C','D','E','F','G'];
    $k2 = ['A','B','C','D','E','F','G'];
    while (true) {
      $a = $k1[rand(0,5)];
      $b = $k2[rand(0,5)];
      $c = rand(10,99);
      $code = $a.$b.$c;
      $sql = "SELECT salt FROM member WHERE salt='{$code}'";
      $re = $db->query($sql);
      if($re->rowCount() == 0) break;
    }
    $userpw_ok = hash("sha256", $userpw.$code);
    $sql = "INSERT INTO member SET userid='{$userid}',userpw='{$userpw_ok}',username='{$username}',userlevel='{$userlevel}', salt='{$code}'";
    // echo $sql;
    $db->query($sql);
    move("/view/admin/user_management");
  }
?>

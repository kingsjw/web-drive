<?php
  $userid = str($_POST['userid']);
  $username = str($_POST['username']);
  $userpw = str($_POST['userpw']);
  $userlevel = str($_POST['userlevel']);
  $sql = "SELECT * FROM member WHERE idx <> {$_GET['idx']} and userid='{$userid}'";
  $rs = $db->query($sql);
  if($rs->rowCount() > 0){
    alert("중복아이디");
    back();
  }else {
    $sql = "SELECT * FROM member WHERE idx='{$_GET['idx']}'";
    $re = $db->query($sql)->fetch();
    $userpw_ok = hash("sha256",$userpw.$re['salt']);
    $sql = "UPDATE member SET userid='{$userid}',userpw='{$userpw_ok}',username='{$username}',userlevel='{$userlevel}' WHERE idx='{$_GET['idx']}'";
    $db->query($sql);
    alert("수정완료");
    move("/view/admin/user_management");
  }
?>

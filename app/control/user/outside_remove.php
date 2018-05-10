<?php
  // print_r($_POST['ch']);
  if(empty($_POST['ch']) || count($_POST['ch']) == 1 && $_POST['ch'][0] == "on"){
    alert("1개 이상에 파일을 선택해주세요");
    back();
  }
  else {
    foreach ($_POST['ch'] as $data) {
      $sql = "DELETE FROM outside WHERE idx='{$data}'";
      // echo $sql;
      $db->query($sql);
    }
    move("/view/user/outside");
  }
?>

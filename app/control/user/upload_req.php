<?php
  $file = !empty($_FILES['myfile']['tmp_name']) ? $_FILES['myfile'] : null;
  $filename = str($file['name']);
  $micro = microtime($file['name']);
  if(!$file){
    alert("파일을 선택해주세요");
    back();
  }else {
    move_uploaded_file($file['tmp_name'],$_SERVER['DOCUMENT_ROOT']."/public/data/{$micro}");
    $sql = "INSERT INTO files SET f_name='{$filename}',micro='{$micro}',u_idx='{$_SESSION['user']['idx']}',wdate=now(),edate=now(),path='{$_POST['path']}',folder=0,size='{$file['size']}'";
    $db->query($sql);
    move("/");
  }

?>

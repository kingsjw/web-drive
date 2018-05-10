<?php

    $filename = str($_POST['folder-name']);

    $sql = "INSERT INTO files SET f_name='{$filename}',u_idx='{$_SESSION['user']['idx']}',wdate=now(),edate=now(),path='{$_POST['path']}',folder=1";
    // echo $sql;
    $db->query($sql);
    move("/");


?>

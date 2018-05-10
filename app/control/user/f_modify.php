<?php
    $f_name = str($_POST['f-name']);
    $sql = "UPDATE files SET f_name='{$_POST['f-name']}', edate=now() WHERE idx='{$_POST['idx']}'";
    $db->query($sql);
    move("/");

?>

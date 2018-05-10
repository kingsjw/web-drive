<?php
  include($_SERVER['DOCUMENT_ROOT']."./app/model/lib.php");
  $get = isset($_GET['param']) ? explode("/",$_GET['param']) : null;
  $dir1 = isset($get[0]) ? $get[0] : null;
  $dir2 = isset($get[1]) ? $get[1] : null;
  $dir3 = isset($get[2]) ? $get[2] : null;
  if(!$dir1 || !$dir2 || !$dir3){
    $dir1 = "view";
    $dir2 = "temp";
    $dir3 = "main";
  }

  
  if(strcmp($dir1, "control") != 0){
    include($_SERVER['DOCUMENT_ROOT']."./app/view/temp/header.php");
  }
  include($_SERVER['DOCUMENT_ROOT']."./app/{$dir1}/{$dir2}/{$dir3}.php");
  if(strcmp($dir1, "control") != 0){
    include($_SERVER['DOCUMENT_ROOT']."./app/view/temp/footer.php");
  }
?>

<?php
  session_start() ;
  //destruction de toutes les variable de sessions
  session_unset() ;
  //destruction de la session
  session_destroy() ;
  $login = "";
  $passw = "";
 
  // header("location: ../index.php") ;
  ?><meta http-equiv="refresh" content="0; URL=../index.php"><?php
?>
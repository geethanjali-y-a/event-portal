<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


session_start();
   //unset($_SESSION['email']);
   
   unset($_SESSION['loggedin']);
   unset($_SESSION['uid']);
    unset($_SESSION['usn']);
   session_destroy();
  // session_close();
   echo "<script>window.location.replace('login.php')</script>";
   exit;
?>
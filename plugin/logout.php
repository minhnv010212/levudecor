<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   unset($_COOKIE['username']);
setcookie('username', null, -1, '/');    
unset($_COOKIE['password']);
setcookie('password', null, -1, '/');   
   header('Refresh: 0; URL ='.$_SERVER["HTTP_REFERER"].'?&rck=1');
?>
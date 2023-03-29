<?php
     session_start();
     session_destroy(); // destruyo la sesion


     //con die termino la ejecucion e inmediatamente despues ponemos una etiqueta de javascript en el cual redireccionaremos hacia la pagin login
     die("<script>location.href='login.php';</script>");
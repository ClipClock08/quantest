<?php
    //Запускаем сессию
    session_start();

    unset($_SESSION["email_admin"]);
    unset($_SESSION["password_admin"]);
    
    // Возвращаем пользователя на ту страницу, на которой он нажал на кнопку выход.
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ".$_SERVER["HTTP_REFERER"]);
?>
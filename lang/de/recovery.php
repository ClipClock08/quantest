 <?php

//Добавляем файл подключения к БД
require_once("dbconnect.php");

//Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
$_SESSION["error_messages"] = '';

//Объявляем ячейку для добавления успешных сообщений
$_SESSION["success_messages"] = '';


/*
    Проверяем была ли отправлена форма, то есть была ли нажата кнопка Войти. Если да, то идём дальше, если нет, то выведем пользователю сообщение об ошибке, о том, что он зашёл на эту страницу напрямую.
*/
if(isset($_POST["recoveryBtn"]) && !empty($_POST["recoveryBtn"])){

    $email = mysqli_real_escape_string($mysqli,$_POST['email']);
    
    $zapros = "SELECT `id` FROM `users` WHERE `email`='{$email}' LIMIT 1";
    
    $sql = mysqli_query($mysqli,$zapros) or die(mysqli_error());
    
    if (mysqli_num_rows($sql)==1)
    {
        $simv = array ("92", "83", "7", "66", "45", "4", "36", "22", "1", "0", 
                "k", "l", "m", "n", "o", "p", "q", "1r", "3s", "a", "b", "c", "d", "5e", "f", "g", "h", "i", "j6", "t", "u", "v9", "w", "x5", "6y", "z5");
        for ($k = 0; $k < 8; $k++)
        {
            shuffle ($simv);
            $string = $string.$simv[1];
        
        }   
        
        $pw= md5($string."top_secret");
        
        $zapros = "UPDATE `users` SET  `password`='{$pw}' WHERE `email`='{$email}' ";
        $sql = mysqli_query($mysqli,$zapros) or die(mysqli_error());
    
       
        mail($email, "Anfrage zur Wiederherstellung nach Passwort", "Guten Morgen. Dein neues Passwort: $string");
    }
    echo "Eine E-Mail wurde mit einem neuen Passwort an Ihren Posteingang gesendet.";
    
}
    

else{
    exit("<p><strong>Beachtung!</strong> Sie haben diese Seite direkt besucht, sodass keine Daten zu verarbeiten sind. Sie können zur <a href=".$address_site."> Startseite gehen </a>.</p>");
}


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
    
       
        mail($email, "Demande de récupération de mot de passe", "Bonjour. Votre nouveau mot de passe: $string");
    }
    echo "Un email a été envoyé dans votre boîte de réception avec un nouveau mot de passe.";
    
}
    

else{
    exit("<p><strong>Attention!</strong> Vous avez visité cette page directement, il n'y a donc pas de données à traiter. Vous pouvez aller à la <a href=".$address_site."> page d'accueil </a>.</p>");
}


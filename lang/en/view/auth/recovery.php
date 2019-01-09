 <?php

//Добавляем файл подключения к БД
require_once("../../../../dbconnect.php");

//Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
$_SESSION["error_messages"] = '';

//Объявляем ячейку для добавления успешных сообщений
$_SESSION["success_messages"] = '';


/*
    Проверяем была ли отправлена форма, то есть была ли нажата кнопка Войти. Если да, то идём дальше, если нет, то выведем пользователю сообщение об ошибке, о том, что он зашёл на эту страницу напрямую.
*/
if(isset($_POST["recoveryBtn"]) && !empty($_POST["recoveryBtn"])){


    if(isset($_POST["email"])){

        $email = mysqli_real_escape_string($mysqli,$_POST['email']);
        $_SESSION['email'] = $email;
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "en/recovery_pass.php");
        exit();
            
    }
    
}

elseif(isset($_POST["changePw"]) && !empty($_POST["changePw"])){
    
    //updating old password
    
    if(isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["rePassword"]) && !empty($_POST["rePassword"])){
    

        $pw = $_POST["password"];
        $rePw = $_POST["rePassword"];
        $email = $_SESSION['email'];
        if($pw == $rePw){
            
            $pw = htmlspecialchars($password, ENT_QUOTES);

            $pw = md5($password . "top_secret");
            
            $sql = "UPDATE users SET password='$pw' WHERE email='$email' ";

            if ($mysqli->query($sql) === TRUE) {
                echo "Record updated successfully";
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: " . $address_site . "en/recovery_pass.php");
                exit();
            } else {
                echo "Error updating record: " . $mysqli->error;
            }

            $mysqli->close();
            
        }else {
            echo "passwords doesn`t match";
        }
    } else{
        
        echo "chtoto ne tak";        
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "en/recovery_pass.php");
    
        //Останавливаем скрипт
        exit();
    }
}

else{
    exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");
}


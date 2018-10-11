<?php
require_once ("dbconnect.php");
//Добавляем файл подключения к БД
$user_id = $_SESSION['id'];
if(isset($_POST)) {
    $n = count($_POST);
}

/*for($i=0; $i<$N;$i++){
    print_r ($_POST['family_name'][$i]);
    echo "<br>";
}*/
//Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
$_SESSION["error_messages"] = '';

//Объявляем ячейку для добавления успешных сообщений
$_SESSION["success_messages"] = '';

/*
    Проверяем, была ли отправлена форма, то есть была ли нажата кнопка зарегистрироваться. Если да, то идём дальше, если нет, то выведем пользователю сообщение об ошибке, о том, что он зашёл на эту страницу напрямую.
*/
if (isset($_POST["add_candidates"]) && !empty($_POST["add_candidates"])) {

    /* Проверяем, если в глобальном массиве $_POST существуют данные отправленные из формы и заключаем переданные данные в обычные переменные.*/


    if (isset($_POST["family_name"])) {

        //Обрезаем пробелы с начала и с конца строки
        $family_name = $_POST["family_name"];

        //Проверяем переменную на пустоту
        if (!empty($family_name)) {
            for($i=0; $i<$n;$i++) {
                // Для безопасности, преобразуем специальные символы в HTML-сущности
                $family_name[$i] = htmlspecialchars($family_name[$i], ENT_QUOTES);
            }
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Enter your name</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "candidates_list.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except name</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "candidates_list.php");

        //Останавливаем скрипт
        exit();
    }




    if (isset($_POST["first_name"])) {

        //Обрезаем пробелы с начала и с конца строки
        $first_name= $_POST["first_name"];

        if (!empty($first_name)) {
            for($i=0; $i<$n;$i++) {
                // Для безопасности, преобразуем специальные символы в HTML-сущности
                $first_name[$i] = htmlspecialchars($first_name[$i], ENT_QUOTES);
            }
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Enter your firs name</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "candidates_list.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except first name</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "candidates_list.php");

        //Останавливаем  скрипт
        exit();
    }


    if (isset($_POST["born_date"])) {

        //Обрезаем пробелы с начала и с конца строки
        $born_date = $_POST["born_date"];

        if (!empty($born_date)) {
            for($i=0; $i<$n;$i++) {
                // Для безопасности, преобразуем специальные символы в HTML-сущности
                $born_date[$i] = htmlspecialchars($born_date[$i], ENT_QUOTES);
            }
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >specify born date</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "candidates_list.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except born_date</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "candidates_list.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["gender"])) {

        //Обрезаем пробелы с начала и с конца строки
        $gender = $_POST["gender"];

        if (!empty($gender)) {
            for($i=0; $i<$n;$i++) {
                // Для безопасности, преобразуем специальные символы в HTML-сущности
                $gender[$i] = htmlspecialchars($gender[$i], ENT_QUOTES);
            }
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Choose gender</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "candidates_list.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except gender</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "candidates_list.php");

        //Останавливаем  скрипт
        exit();
    }

    for($i = 0; $i < $n; $i++) {
        //Запрос на добавления пользователя в БД
        $result_query_insert = $mysqli->query("INSERT INTO `candidates` (user_id, family_name, first_name,born_date, gender) VALUES ($user_id,'" . $family_name[$i] . "','" . $first_name[$i] . "','".$born_date[$i]."','" . $gender[$i] . "')");
        if (!$result_query_insert) {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Error added in DB " . $mysqli->errno . " </p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "candidates_list.php");

            //Останавливаем  скрипт
            exit();
        } else {
            //Отправляем пользователя на страницу регистрации и убираем форму регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "candidates_list.php");
            $_SESSION["success_messages"] .= "<p class='success_message' >candidates added success</p>";
            exit();
        }

        //Закрываем подключение к БД
        $mysqli->close();
    }


} else {

    exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=" . $address_site . "> главную страницу </a>.</p>");
}

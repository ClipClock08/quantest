<?php
require_once ("../dbconnect.php");
//Добавляем файл подключения к БД
$user_id = $_SESSION['id'];
//print_r($_POST);

//Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
$_SESSION["error_messages"] = '';

//Объявляем ячейку для добавления успешных сообщений
$_SESSION["success_messages"] = '';

/*
    Проверяем, была ли отправлена форма, то есть была ли нажата кнопка зарегистрироваться. Если да, то идём дальше, если нет, то выведем пользователю сообщение об ошибке, о том, что он зашёл на эту страницу напрямую.
*/
if (isset($_POST["expert_conf"]) && !empty($_POST["expert_conf"])) {

    /* Проверяем, если в глобальном массиве $_POST существуют данные отправленные из формы и заключаем переданные данные в обычные переменные.*/


    if (isset($_POST["service"])) {

        //Обрезаем пробелы с начала и с конца строки
        $duties = trim($_POST["service"]);

        //Проверяем переменную на пустоту
        if (!empty($duties)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $duties = htmlspecialchars($duties, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Geben Sie Ihre Funktionen ein</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/de/config/expert_config.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Funktionen außer</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../lang/de/config/expert_config.php");

        //Останавливаем скрипт
        exit();
    }




    if (isset($_POST["fonction"])) {

        //Обрезаем пробелы с начала и с конца строки
        $service_sector = trim($_POST["fonction"]);

        if (!empty($service_sector) && $service_sector != '1') {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $service_sector = htmlspecialchars($service_sector, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Wählen Sie Ihre Dienstleistungen</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/de/config/expert_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Außer Dienstleistungen</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../lang/de/config/expert_config.php");

        //Останавливаем  скрипт
        exit();
    }


    if (isset($_POST["experience"])) {

        //Обрезаем пробелы с начала и с конца строки
        $experience = trim($_POST["experience"]);

        if (!empty($experience) && $experience != '1') {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $experience = htmlspecialchars($experience, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Wähle Erfahrung</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/de/config/expert_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Außer Erfahrung</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../lang/de/config/expert_config.php");

        //Останавливаем  скрипт
        exit();
    }



    //Запрос на добавления пользователя в БД
    $result_query_insert = $mysqli->query("INSERT INTO `expert_config` (user_id, duties,service_sector,experience) VALUES ($user_id,'".$duties."',$service_sector,$experience)");
    if (!$result_query_insert) {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Error added in DB ".$mysqli->errno." </p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../lang/de/config/expert_config.php");

        //Останавливаем  скрипт
        exit();
    } else {
        //Отправляем пользователя на страницу регистрации и убираем форму регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../lang/de/candidates_list.php");
        exit();
    }

    //Закрываем подключение к БД
    $mysqli->close();


} else {

    exit("<p><strong>Error!</strong> You visited this page directly, so there is no data to process. You can go на <a href=" . $address_site . "> home page </a>.</p>");
}

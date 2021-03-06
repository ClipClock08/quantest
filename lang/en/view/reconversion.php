<?php
require_once("../../../dbconnect.php");
//Добавляем файл подключения к БД
$user_id = $_SESSION['id'];


//Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
$_SESSION["error_messages"] = '';

//Объявляем ячейку для добавления успешных сообщений
$_SESSION["success_messages"] = '';


/*
    Проверяем, была ли отправлена форма, то есть была ли нажата кнопка зарегистрироваться. Если да, то идём дальше, если нет, то выведем пользователю сообщение об ошибке, о том, что он зашёл на эту страницу напрямую.
*/
if (isset($_POST["save01"]) && !empty($_POST["save01"])) {

    /* Проверяем, если в глобальном массиве $_POST существуют данные отправленные из формы и заключаем переданные данные в обычные переменные.*/


    if (isset($_POST["job"])) {

        //Обрезаем пробелы с начала и с конца строки
        $job = $_POST["job"];

        //Проверяем переменную на пустоту
        if (!empty($job)) {
            for ($i = 0; $i < count($job); $i++) {
                // Для безопасности, преобразуем специальные символы в HTML-сущности
                $job[$i] = htmlspecialchars($job[$i], ENT_QUOTES);
            }
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Job field is empty</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/en/reconversion_form.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except job field</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/en/reconversion_form.php");

        //Останавливаем скрипт
        exit();
    }


    if (isset($_POST["service_name"])) {

        //Обрезаем пробелы с начала и с конца строки
        $service_name = $_POST["service_name"];

        if (!empty($service_name)) {
            for ($i = 0; $i < count($service_name); $i++) {
                // Для безопасности, преобразуем специальные символы в HTML-сущности
                $service_name[$i] = htmlspecialchars($service_name[$i], ENT_QUOTES);
            }
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Enter name of service</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/en/reconversion_form.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except name of service</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/en/reconversion_form.php");

        //Останавливаем  скрипт
        exit();
    }


    if (isset($_POST["specify_function"])) {

        //Обрезаем пробелы с начала и с конца строки
        $specify_function = $_POST["specify_function"];

        if (!empty($specify_function)) {
            for ($i = 0; $i < count($specify_function); $i++) {
                // Для безопасности, преобразуем специальные символы в HTML-сущности
                $specify_function[$i] = htmlspecialchars($specify_function[$i], ENT_QUOTES);
            }
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Choose service name</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/en/reconversion_form.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except service name</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/en/reconversion_form.php");

        //Останавливаем  скрипт
        exit();
    }

    for ($i = 0; $i < count($job); $i++) {
        //Запрос на добавления пользователя в БД
        $result_query_insert = $mysqli->query("INSERT INTO `reconversion` (user_id, job, service_name, specify_function) VALUES ($user_id,'" . $job[$i] . "','" . $service_name[$i] . "','" . $specify_function[$i] . "')");
        if (!$result_query_insert) {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Error added in DB " . $mysqli->errno . " </p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/en/reconversion_form.php");

            //Останавливаем  скрипт
            exit();
        } else {
            //Отправляем пользователя на страницу регистрации и убираем форму регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/en/reconversion_form.php");
            //$_SESSION["success_messages"] .= "<p class='success_message' >candidates added success</p>";
            //exit();
        }


    }

    /* for reclassifield */
    if (isset($_POST["reclass_name"])) {

        //Обрезаем пробелы с начала и с конца строки
        $family_name = trim($_POST["reclass_name"]);

        if (!empty($family_name)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $family_name = htmlspecialchars($family_name, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Your Name</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/en/reconversion_form.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except name</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/en/reconversion_form.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["reclass_fisrt_name"])) {

        //Обрезаем пробелы с начала и с конца строки
        $first_name = trim($_POST["reclass_fisrt_name"]);

        if (!empty($first_name)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $first_name = htmlspecialchars($first_name, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Your First Name</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/en/reconversion_form.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except first name</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/en/reconversion_form.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["reclass_birth"])) {

        //Обрезаем пробелы с начала и с конца строки
        $birth_day = trim($_POST["reclass_birth"]);

        if (!empty($birth_day)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $birth_day = htmlspecialchars($birth_day, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Birth day</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/en/reconversion_form.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Birth day except</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/en/reconversion_form.php");

        //Останавливаем  скрипт
        exit();
    }
        $result_query_reclass = $mysqli->query("INSERT INTO `reclassified` (user_id, family_name, first_name, birth_day) VALUES ($user_id,'" . $family_name . "','" . $first_name . "','" . $birth_day . "')");
        if (!$result_query_reclass) {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Error added in DB " . $mysqli->errno . " </p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/en/reconversion_form.php");

            //Останавливаем  скрипт
            exit();
        } else {
            //Отправляем пользователя на страницу регистрации и убираем форму регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/en/reconversion_form.php");
            $_SESSION["success_messages"] .= "<p class='success_message' >info added success</p>";
            //exit();
        }

    //Закрываем подключение к БД
    $mysqli->close();

} else {

    exit("<p><strong>Warning!</strong> You visited this page directly, so there is no data to process. You can go to the <a href=". $address_site. "> home page </a>.</p>");
}

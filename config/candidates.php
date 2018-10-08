<?php
//Запускаем сессию
session_start();

//Добавляем файл подключения к БД
require_once("../dbconnect.php");

//Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
$_SESSION["error_messages"] = '';

//Объявляем ячейку для добавления успешных сообщений
$_SESSION["success_messages"] = '';

/*
    Проверяем, была ли отправлена форма, то есть была ли нажата кнопка зарегистрироваться. Если да, то идём дальше, если нет, то выведем пользователю сообщение об ошибке, о том, что он зашёл на эту страницу напрямую.
*/
if (isset($_POST["Continue"]) && !empty($_POST["Continue"])) {

    /* Проверяем, если в глобальном массиве $_POST существуют данные отправленные из формы и заключаем переданные данные в обычные переменные.*/

    if (isset($_POST["nomPoste"])) {

        //Обрезаем пробелы с начала и с конца строки
        $function = trim($_POST["nomPoste"]);

        //Проверяем переменную на пустоту
        if (!empty($function)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $function = htmlspecialchars($function, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Inpute your functions</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "manual_config.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Functions except</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "manual_config.php");

        //Останавливаем скрипт
        exit();
    }




    if (isset($_POST["fonction"])) {

        //Обрезаем пробелы с начала и с конца строки
        $service_sector = trim($_POST["fonction"]);

        if (!empty($service_sector)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $service_sector = htmlspecialchars($service_sector, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Choose your services</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "manual_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except services</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "manual_config.php");

        //Останавливаем  скрипт
        exit();
    }


    if (isset($_POST["fonction_exp"])) {

        //Обрезаем пробелы с начала и с конца строки
        $experience = trim($_POST["fonction_exp"]);

        if (!empty($experience)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $experience = htmlspecialchars($experience, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Choose experience</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "manual_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except experience</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "manual_config.php");

        //Останавливаем  скрипт
        exit();
    }


    if (isset($_POST["horaire"])) {

        //Обрезаем пробелы с начала и с конца строки
        $work_timetable = trim($_POST["horaire"]);

        if (!empty($work_timetable)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $work_timetable = htmlspecialchars($work_timetable, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Enter work timetable</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "manual_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except work timetable</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "manual_config.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["saison"])) {

        //Обрезаем пробелы с начала и с конца строки
        $season = trim($_POST["saison"]);

        if (!empty($season)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $season = htmlspecialchars($season, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Season</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "form_register.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except season</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "form_register.php");

        //Останавливаем  скрипт
        exit();
    }


    if (isset($_POST["telContact"])) {

        //Обрезаем пробелы с начала и с конца строки
        $social_environment = trim($_POST["telContact"]);

        if (!empty($social_environment)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $social_environment = htmlspecialchars($social_environment, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Your Phone</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "form_register.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Phone number except</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "form_register.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["password"])) {

        //Обрезаем пробелы с начала и с конца строки
        $password = trim($_POST["password"]);

        //Проверяем, совпадают ли пароли
        if (isset($_POST["confirm_password"])) {
            //Обрезаем пробелы с начала и с конца строки
            $confirm_password = trim($_POST["confirm_password"]);

            if ($confirm_password != $password) {
                // Сохраняем в сессию сообщение об ошибке.
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Passwords does not match</p>";

                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: " . $address_site . "form_register.php");

                //Останавливаем  скрипт
                exit();
            }

        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Repeat your password</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "form_register.php");

            //Останавливаем  скрипт
            exit();
        }

        if (!empty($password)) {
            $password = htmlspecialchars($password, ENT_QUOTES);

            //Шифруем папроль
            $password = md5($password . "top_secret");
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Your password</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "form_register.php");

            //Останавливаем  скрипт
            exit();
        }

    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except password field</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "form_register.php");

        //Останавливаем  скрипт
        exit();
    }

    //Удаляем пользователей из таблицы users, которые не подтвердили свою почту в течении сутки
    $query_delete_users = $mysqli->query("DELETE FROM `users` WHERE `email_status` = 0 AND `date_registration` < (NOW() - INTERVAL 1 DAY)");
    if (!$query_delete_users) {
        exit("<p><strong>Ошибка!</strong> Сбой при удалении просроченного аккаунта. Код ошибки: " . $mysqli->errno. "</p>");
    }
    //Запрос на добавления пользователя в БД
    $result_query_insert = $mysqli->query("INSERT INTO `users` (type_account, company_name, website, first_name, last_name, your_functions, email, phone, password) VALUES ('" . $type_account . "', '" . $company_name . "', '" . $website . "', '" . $first_name . "', '" . $last_name . "', '" . $your_functions . "', '" . $email . "', '" . $phone . "', '" . $password . "')");

    if (!$result_query_insert) {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на добавления пользователя в БД</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "form_register.php");

        //Останавливаем  скрипт
        exit();
    } else {
        //Удаляем пользователей из таблицы confirm_users, которые не подтвердили свою почту в течении сутки
        $query_delete_confirm_users = $mysqli->query("DELETE FROM `confirm_users` WHERE `date_registration` < (NOW() - INTERVAL 1 DAY)");
        if (!$query_delete_confirm_users) {
            exit("<p><strong>Ошибка!</strong> Сбой при удалении просроченного аккаунта(confirm). Код ошибки: " . $mysqli->errno . "</p>");
        }

        //Составляем зашифрованный и уникальный token
        $token = md5($email . time());
        //Добавляем данные в таблицу confirm_users
        $query_insert_confirm = $mysqli->query("INSERT INTO `confirm_users` (email, token) VALUES ('" . $email . "', '" . $token . "') ");

        if (!$query_insert_confirm) {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на добавления пользователя в БД (confirm)</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "form_register.php");

            //Останавливаем  скрипт
            exit();
        } else {


            // Сообщение
            $message = "Line 1\r\nLine 2\r\nLine 3";

            // На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
            $message = wordwrap($message, 70, "\r\n");

            // Отправляем
            mail('clipclock08@gmail.com', 'My Subject', $message);

            //Составляем заголовок письма
            $subject = "Подтверждение почты на сайте " . $_SERVER['HTTP_HOST'];

            //Устанавливаем кодировку заголовка письма и кодируем его
            $subject = "=?utf-8?B?" . base64_encode($subject) . "?=";

            //Составляем тело сообщения
            $message = 'Здравствуйте! <br/> <br/> Сегодня ' . date("d.m.Y", time()) . ', неким пользователем была произведена регистрация на сайте <a href="' . $address_site . '">' . $_SERVER['HTTP_HOST'] . '</a> используя Ваш email. Если это были Вы, то, пожалуйста, подтвердите адрес вашей электронной почты, перейдя по этой ссылке: <a href="' . $address_site . 'activation.php?token=' . $token . '&email=' . $email . '">' . $address_site . 'activation/' . $token . '</a> <br/> <br/> В противном случае, если это были не Вы, то, просто игнорируйте это письмо. <br/> <br/> <strong>Внимание!</strong> Ссылка действительна 24 часа. После чего Ваш аккаунт будет удален из базы.';

            //Составляем дополнительные заголовки для почтового сервиса mail.ru
            //Переменная $email_admin, объявлена в файле dbconnect.php
            //$headers = "FROM: $email_admin\r\nReply-to: $email_admin\r\nContent-type: text/html; charset=utf-8\r\n";
            $headers = array(
                'From' => 'clipclock08@gmail.com',
                'Reply-To' => 'clipclock08@gmail.com',
                'X-Mailer' => 'PHP/' . phpversion()
            );

            //Отправляем сообщение с ссылкой для подтверждения регистрации на указанную почту и проверяем отправлена ли она успешно или нет.
            if (mail($email, $subject, $message, $headers)) {
                $_SESSION["success_messages"] = "<h4 class='success_message'><strong>Регистрация прошла успешно!!!</strong></h4><p class='success_message'> Теперь необходимо подтвердить введенный адрес электронной почты. Для этого, перейдите по ссылке указанную в сообщение, которую получили на почту " . $email . " </p>";

                //Отправляем пользователя на страницу регистрации и убираем форму регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: " . $address_site . "manual_config.php?hidden_form=1");
                exit();

            } else {
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка при отправлении письма с сылкой подтверждения, на почту " . $email . $message ." </p>";
            }

            // Завершение запроса добавления пользователя в таблицу users
            //$result_query_insert->close();

            // Завершение запроса добавления пользователя в таблицу confirm_users
            //$query_insert_confirm->close();
        }
    }

    //Закрываем подключение к БД
    $mysqli->close();

    //Отправляем пользователя на страницу регистрации
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . $address_site . "manual_config.php");

    exit();

} else {

    exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=" . $address_site . "> главную страницу </a>.</p>");
}

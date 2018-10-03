<?php
//Запускаем сессию
session_start();

//Добавляем файл подключения к БД
require_once("dbconnect.php");

//Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
$_SESSION["error_messages"] = '';

//Объявляем ячейку для добавления успешных сообщений
$_SESSION["success_messages"] = '';

/*
    Проверяем, была ли отправлена форма, то есть была ли нажата кнопка зарегистрироваться. Если да, то идём дальше, если нет, то выведем пользователю сообщение об ошибке, о том, что он зашёл на эту страницу напрямую.
*/
if (isset($_POST["btn_submit_register"]) && !empty($_POST["btn_submit_register"])) {

    /* Проверяем, если в глобальном массиве $_POST существуют данные отправленные из формы и заключаем переданные данные в обычные переменные.*/

    if (isset($_POST["userPro"])) {

        //Обрезаем пробелы с начала и с конца строки
        $type_account = trim($_POST["userPro"]);

        //Проверяем переменную на пустоту
        if (!empty($type_account)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $type_account = htmlspecialchars($type_account, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose who are you</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "form_register.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Choice type</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "form_register.php");

        //Останавливаем скрипт
        exit();
    }



    if (isset($_POST["nomEntreprise"])) {

        //Обрезаем пробелы с начала и с конца строки
        $company_name = trim($_POST["nomEntreprise"]);

        if (!empty($company_name)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $company_name = htmlspecialchars($company_name, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Input company name</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "form_register.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except name of company</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "form_register.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["siteWeb"])) {

        //Обрезаем пробелы с начала и с конца строки
        $website = trim($_POST["siteWeb"]);

        if (!empty($website)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $wabsite = htmlspecialchars($website, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Specify your website</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "form_register.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Exept website field</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "form_register.php");

        //Останавливаем  скрипт
        exit();
    }


    if (isset($_POST["nomContact"])) {

        //Обрезаем пробелы с начала и с конца строки
        $first_name = trim($_POST["nomContact"]);

        if (!empty($first_name)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $first_name = htmlspecialchars($first_name, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Enter your name</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "form_register.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except name</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "form_register.php");

        //Останавливаем  скрипт
        exit();
    }


    if (isset($_POST["prenomContact"])) {

        //Обрезаем пробелы с начала и с конца строки
        $last_name = trim($_POST["prenomContact"]);

        if (!empty($last_name)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $last_name = htmlspecialchars($last_name, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Enter last name</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "form_register.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except last name</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "form_register.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["fonctionContact"])) {

        //Обрезаем пробелы с начала и с конца строки
        $your_functions = trim($_POST["fonctionContact"]);

        if (!empty($your_functions)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $your_functions = htmlspecialchars($your_functions, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Specefy your functions</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "form_register.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except functions</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "form_register.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["emailContact"])) {

        //Обрезаем пробелы с начала и с конца строки
        $email = trim($_POST["emailContact"]);

        if (!empty($email)) {


            $email = htmlspecialchars($email, ENT_QUOTES);

            // (3) Место кода для проверки формата почтового адреса и его уникальности

            //Проверяем формат полученного почтового адреса с помощью регулярного выражения
            $reg_email = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i";

            //Если формат полученного почтового адреса не соответствует регулярному выражению
            if (!preg_match($reg_email, $email)) {
                // Сохраняем в сессию сообщение об ошибке.
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Invalid email</p>";

                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: " . $address_site . "form_register.php");

                //Останавливаем  скрипт
                exit();
            }

            //Проверяем, нет ли уже такого адреса в БД.
            $result_query = $mysqli->query("SELECT `email` FROM `users` WHERE `email`='" . $email . "'");

            //Если кол-во полученных строк ровно единице, значит, пользователь с таким почтовым адресом уже зарегистрирован
            if ($result_query->num_rows == 1) {

                //Если полученный результат не равен false
                if (($row = $result_query->fetch_assoc()) != false) {

                    // Сохраняем в сессию сообщение об ошибке.
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Email already exist</p>";

                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: " . $address_site . "form_register.php");

                } else {
                    // Сохраняем в сессию сообщение об ошибке.
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >server error</p>";

                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: " . $address_site . "form_register.php");
                }

                /* закрытие выборки */
                $result_query->close();

                //Останавливаем  скрипт
                exit();
            }

            /* закрытие выборки */
            $result_query->close();
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Your Email</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "form_register.php");

            //Останавливаем  скрипт
            exit();
        }

    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except Email</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "form_register.php");

        //Останавливаем  скрипт
        exit();
    }


    if (isset($_POST["telContact"])) {

        //Обрезаем пробелы с начала и с конца строки
        $last_name = trim($_POST["telContact"]);

        if (!empty($last_name)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $last_name = htmlspecialchars($last_name, ENT_QUOTES);
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
    $query_delete_users = $mysqli->query("DELETE FROM `users` WHERE `email_status` = 0 AND `date_registration` < ( NOW() - INTERVAL 1 DAY )");
    if (!$query_delete_users) {
        exit("<p><strong>Ошибка!</strong> Сбой при удалении просроченного аккаунта. Код ошибки: " . $mysqli->errno . "</p>");
    }

    //Запрос на добавления пользователя в БД
    $result_query_insert = $mysqli->query("INSERT INTO `users` (first_name, last_name, email, password, date_registration) VALUES ('" . $first_name . "', '" . $last_name . "', '" . $email . "', '" . $password . "', NOW())");

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
        $query_delete_confirm_users = $mysqli->query("DELETE FROM `confirm_users` WHERE `date_registration` < ( NOW() - INTERVAL 1 DAY)");
        if (!$query_delete_confirm_users) {
            exit("<p><strong>Ошибка!</strong> Сбой при удалении просроченного аккаунта(confirm). Код ошибки: " . $mysqli->errno . "</p>");
        }

        //Составляем зашифрованный и уникальный token
        $token = md5($email . time());

        //Добавляем данные в таблицу confirm_users
        $query_insert_confirm = $mysqli->query("INSERT INTO `confirm_users` (email, token, date_registration) VALUES ('" . $email . "', '" . $token . "', NOW()) ");

        if (!$query_insert_confirm) {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на добавления пользователя в БД (confirm)</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "form_register.php");

            //Останавливаем  скрипт
            exit();
        } else {

            //Составляем заголовок письма
            $subject = "Подтверждение почты на сайте " . $_SERVER['HTTP_HOST'];

            //Устанавливаем кодировку заголовка письма и кодируем его
            $subject = "=?utf-8?B?" . base64_encode($subject) . "?=";

            //Составляем тело сообщения
            $message = 'Здравствуйте! <br/> <br/> Сегодня ' . date("d.m.Y", time()) . ', неким пользователем была произведена регистрация на сайте <a href="' . $address_site . '">' . $_SERVER['HTTP_HOST'] . '</a> используя Ваш email. Если это были Вы, то, пожалуйста, подтвердите адрес вашей электронной почты, перейдя по этой ссылке: <a href="' . $address_site . 'activation.php?token=' . $token . '&email=' . $email . '">' . $address_site . 'activation/' . $token . '</a> <br/> <br/> В противном случае, если это были не Вы, то, просто игнорируйте это письмо. <br/> <br/> <strong>Внимание!</strong> Ссылка действительна 24 часа. После чего Ваш аккаунт будет удален из базы.';

            //Составляем дополнительные заголовки для почтового сервиса mail.ru
            //Переменная $email_admin, объявлена в файле dbconnect.php
            $headers = "FROM: $email_admin\r\nReply-to: $email_admin\r\nContent-type: text/html; charset=utf-8\r\n";

            //Отправляем сообщение с ссылкой для подтверждения регистрации на указанную почту и проверяем отправлена ли она успешно или нет.
            if (mail($email, $subject, $message, $headers)) {
                $_SESSION["success_messages"] = "<h4 class='success_message'><strong>Регистрация прошла успешно!!!</strong></h4><p class='success_message'> Теперь необходимо подтвердить введенный адрес электронной почты. Для этого, перейдите по ссылке указанную в сообщение, которую получили на почту " . $email . " </p>";

                //Отправляем пользователя на страницу регистрации и убираем форму регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: " . $address_site . "form_register.php?hidden_form=1");
                exit();

            } else {
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка при отправлении письма с сылкой подтверждения, на почту " . $email . " </p>";
            }

            // Завершение запроса добавления пользователя в таблицу users
            $result_query_insert->close();

            // Завершение запроса добавления пользователя в таблицу confirm_users
            $query_insert_confirm->close();
        }
    }

    //Закрываем подключение к БД
    $mysqli->close();

    //Отправляем пользователя на страницу регистрации
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . $address_site . "form_register.php");

    exit();

}else{

    exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=" . $address_site . "> главную страницу </a>.</p>");
}
?>
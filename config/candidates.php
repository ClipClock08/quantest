<?php
require_once ("../dbconnect.php");
//Добавляем файл подключения к БД
$user_id = $_SESSION['id'];
print_r($_POST) ;
//Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
$_SESSION["error_messages"] = '';

//Объявляем ячейку для добавления успешных сообщений
$_SESSION["success_messages"] = '';

/*
    Проверяем, была ли отправлена форма, то есть была ли нажата кнопка зарегистрироваться. Если да, то идём дальше, если нет, то выведем пользователю сообщение об ошибке, о том, что он зашёл на эту страницу напрямую.
*/
if (isset($_POST["candidates"]) && !empty($_POST["candidates"])) {

    /* Проверяем, если в глобальном массиве $_POST существуют данные отправленные из формы и заключаем переданные данные в обычные переменные.*/

    if (isset($_POST["monPoste"])) {

        //Обрезаем пробелы с начала и с конца строки
        $function = trim($_POST["monPoste"]);

        //Проверяем переменную на пустоту
        if (!empty($function)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $function = htmlspecialchars($function, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Inpute your functions</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../config/manual_config.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Functions except</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

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
            header("Location: " . $address_site . "../config/manual_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except services</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

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
            header("Location: " . $address_site . "../config/manual_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except experience</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

        //Останавливаем  скрипт
        exit();
    }


    if (isset($_POST["work_time"])) {

        //Обрезаем пробелы с начала и с конца строки
        $work_timetable = trim($_POST["work_time"]);

        if (!empty($work_timetable)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $work_timetable = htmlspecialchars($work_timetable, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Enter work timetable</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../config/manual_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except work timetable</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

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


    if (isset($_POST["soc_env[]"])) {

        //Обрезаем пробелы с начала и с конца строки
        $social_environment = trim($_POST["soc_env[]"]);

        if (!empty($social_environment)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $social_environment = htmlspecialchars($social_environment, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Error</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../config/manual_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >small error</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["horaire"])) {

        //Обрезаем пробелы с начала и с конца строки
        $noise = trim($_POST["horaire"]);

        if (!empty($specification)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $specification = htmlspecialchars($specification, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Error</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../config/manual_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >small error</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["odeurs"])) {

        //Обрезаем пробелы с начала и с конца строки
        $olfactory = trim($_POST["odeurs"]);

        if (!empty($olfactory)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $olfactory = htmlspecialchars($olfactory, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Error</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../config/manual_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >small error</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["specification_phys"])) {

        //Обрезаем пробелы с начала и с конца строки
        $specification = trim($_POST["specification_phys"]);

        if (!empty($noise)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $noise = htmlspecialchars($noise, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Error</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../config/manual_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >small error</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["technicite[]"])) {

        //Обрезаем пробелы с начала и с конца строки
        $dominant_capacity = trim($_POST["technicite[]"]);

        if (!empty($dominant_capacity)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $dominant_capacity = htmlspecialchars($dominant_capacity, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Error</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../config/manual_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >small error</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["specification_cap"])) {

        //Обрезаем пробелы с начала и с конца строки
        $other_capacity = trim($_POST["specification_cap"]);

        if (!empty($other_capacity)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $other_capacity = htmlspecialchars($other_capacity, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Error</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../config/manual_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >small error</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["lighting"])) {

        //Обрезаем пробелы с начала и с конца строки
        $lighting = trim($_POST["lighting"]);

        if (!empty($lighting)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $lighting = htmlspecialchars($lighting, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Error</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../config/manual_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >small error</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["temperature"])) {

        //Обрезаем пробелы с начала и с конца строки
        $temperature = trim($_POST["temperature"]);

        if (!empty($temperature)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $temperature = htmlspecialchars($temperature, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Error</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../config/manual_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >small error</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

        //Останавливаем  скрипт
        exit();
    }


    //Запрос на добавления пользователя в БД
    $result_query_insert = $mysqli->query("INSERT INTO `manual_config` (user_id, duties,service_sector,experience,work_timetable,season,social_environment,noise,lighting,temperature,olfactory,odors,dominant_capacity,other_capacity) VALUES ('".$user_id."','".$duties."','".$service_sector."','".$experience."','".$work_timetable."','".$season."','".$social_environment."','".$noise."','".$lighting."','".$temperature."','".$olfactory."','".$odors."','".$dominant_capacity."','".$other_capacity."')");

    if (!$result_query_insert) {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на добавления пользователя в БД</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

        //Останавливаем  скрипт
        exit();
    } else {
            //Отправляем пользователя на страницу регистрации и убираем форму регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../config/candidates_list.php");
            exit();
    }

    //Закрываем подключение к БД
    $mysqli->close();


} else {

    exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=" . $address_site . "> главную страницу </a>.</p>");
}

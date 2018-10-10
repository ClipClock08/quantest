<?php
require_once ("../dbconnect.php");
//Добавляем файл подключения к БД
$user_id = $_SESSION['id'];
$soc = $_POST['soc_env'];
print_r($_POST);
echo "<br>";
echo "<br>";
print_r($soc);
//print_r($_SESSION);
//Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
$_SESSION["error_messages"] = '';

//Объявляем ячейку для добавления успешных сообщений
$_SESSION["success_messages"] = '';

/*
    Проверяем, была ли отправлена форма, то есть была ли нажата кнопка зарегистрироваться. Если да, то идём дальше, если нет, то выведем пользователю сообщение об ошибке, о том, что он зашёл на эту страницу напрямую.
*/
if (isset($_POST["candidates1"]) && !empty($_POST["candidates"])) {

    /* Проверяем, если в глобальном массиве $_POST существуют данные отправленные из формы и заключаем переданные данные в обычные переменные.*/


    if (isset($_POST["monPoste"])) {

        //Обрезаем пробелы с начала и с конца строки
        $duties = trim($_POST["monPoste"]);

        //Проверяем переменную на пустоту
        if (!empty($duties)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $duties = htmlspecialchars($duties, ENT_QUOTES);
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

        if (!empty($service_sector && $service_sector != '1')) {
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

        if (!empty($experience && $experience != '1')) {
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

        if (!empty($work_timetable && $work_timetable != '1')) {
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
        $season = htmlspecialchars($season, ENT_QUOTES);

    }
    else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except season</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

        //Останавливаем  скрипт
        exit();
    }


    if (isset($_POST["soc_env"])) {
        $social_environment = $_POST["soc_env"];
        foreach ($social_environment as $key){
            echo $key;
        }
        if (!empty($social_environment)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $social_environment = htmlspecialchars($social_environment, ENT_QUOTES);
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Chek Env Soc ".$social_environment."</p>";
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Except Env Soc ".$social_environment."</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../config/manual_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Empty chek list 1</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["horaire"])) {

        //Обрезаем пробелы с начала и с конца строки
        $noise = trim($_POST["horaire"]);

        if (!empty($noise && $noise != '1')) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $noise = htmlspecialchars($noise, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >select noise</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../config/manual_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >empty noise</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["odeurs"])) {

        //Обрезаем пробелы с начала и с конца строки
        $olfactory = trim($_POST["odeurs"]);

        if (!empty($olfactory && $olfactory != '1')) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $olfactory = htmlspecialchars($olfactory, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >empty olfactory</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../config/manual_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >select olfactory</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["specification_phys"])) {

        //Обрезаем пробелы с начала и с конца строки
        $specification = trim($_POST["specification_phys"]);

            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $specification = htmlspecialchars($specification, ENT_QUOTES);

    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >except specific</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["technicite"])) {

        //Обрезаем пробелы с начала и с конца строки
        $dominant_capacity = $_POST["technicite"];

        if (!empty($dominant_capacity)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $dominant_capacity = htmlspecialchars($dominant_capacity, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >except domin</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../config/manual_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >chek dominant</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["specification_cap"])) {

        //Обрезаем пробелы с начала и с конца строки
        $other_capacity = trim($_POST["specification_cap"]);


            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $other_capacity = htmlspecialchars($other_capacity, ENT_QUOTES);

    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >specification_cap error</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["lighting"])) {

        //Обрезаем пробелы с начала и с конца строки
        $lighting = trim($_POST["lighting"]);

        if (!empty($lighting && $lighting != '1')) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $lighting = htmlspecialchars($lighting, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >select lightning</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../config/manual_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >lighting error</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

        //Останавливаем  скрипт
        exit();
    }

    if (isset($_POST["temperature"])) {

        //Обрезаем пробелы с начала и с конца строки
        $temperature = trim($_POST["temperature"]);

        if (!empty($temperature && $temperature != '1')) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $temperature = htmlspecialchars($temperature, ENT_QUOTES);
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >empty temperature</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../config/manual_config.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >except temperature</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

        //Останавливаем  скрипт
        exit();
    }

    //Запрос с тремя таблицами для отображения опыта и сектора обслуживания
    //SELECT `services_sector`.service, `experience`.experience, duties FROM `manual_config` INNER JOIN `services_sector` ON `manual_config`.`service_sector` = `services_sector`.`id` INNER JOIN `experience` ON `manual_config`.`experience` = `experience`.`id`
    //Запрос на добавления пользователя в БД
    $result_query_insert = $mysqli->query("INSERT INTO `manual_config` (user_id, duties,service_sector,experience,work_timetable,social_environment,noise,lighting,temperature,olfactory, dominant_capacity) VALUES ('$user_id','".$duties."','$service_sector', '$experience','".$work_timetable."','".$social_environment."','".$noise."','".$lighting."','".$temperature."','".$olfactory."','".$dominant_capacity."')");
    $_SESSION["error_messages"] = $result_query_insert;
    if (!$result_query_insert) {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на добавления пользователя в БД ".$mysqli->errno."</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../config/manual_config.php");

        //Останавливаем  скрипт
        exit();
    } else {
            //Отправляем пользователя на страницу регистрации и убираем форму регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../candidates_list.php");
            exit();
    }

    //Закрываем подключение к БД
    $mysqli->close();


} else {

    exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=" . $address_site . "> главную страницу </a>.</p>");
}

<?php

   
   //Добавляем файл подключения к БД
    require_once("../dbconnect.php");

    //Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
    $_SESSION["error_messages"] = '';

    //Объявляем ячейку для добавления успешных сообщений
    $_SESSION["success_messages"] = '';

if(isset($_POST["saveResult"]) && !empty($_POST["saveResult"])){
    
     /*echo "<pre>";
     print_r($_POST);
     echo "</pre>";*/
    
    if (isset($_POST["company"]) && !empty($_POST["company"])) {

        //Обрезаем пробелы с начала и с конца строки
        $client_id = trim($_POST["company"]);

        //Проверяем переменную на пустоту
        if (!empty($client_id) && $client_id != '0') {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            
            $client_id = htmlspecialchars($client_id, ENT_QUOTES);
            $result = $mysqli->query("SELECT first_name, company_name, civilitye, last_name, your_functions, website  from users WHERE id = '$client_id'");
            $rows = mysqli_num_rows($result);
            
            
            $row = mysqli_fetch_row($result);
            
            $client_name = $row[0];
            $company_name = $row[1];
            $status = $row[2];
            $surname_client = $row[3];
            $client_function = $row[4];
            $website = $row[5];
            //print_r($client_name);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Empty company or agent</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except company`</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "admin/admin_reconversion.php");

        //Останавливаем скрипт
        exit();
    }
        
        
        
    if (isset($_POST["candidate"]) && !empty($_POST["candidate"])) {

        //Обрезаем пробелы с начала и с конца строки
        
        $candidate = trim($_POST["candidate"]);
        
        //Проверяем переменную на пустоту
        if (!empty($candidate) && $candidate != '1') {
            $candidate = explode(" ", $candidate);
            
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $name = htmlspecialchars($candidate[0], ENT_QUOTES);
            $surname = htmlspecialchars($candidate[1], ENT_QUOTES);
            
            //echo $name." - ".$surname;
            $result = $mysqli->query("SELECT id, birth_day from `reclassified` WHERE user_id = '$client_id' AND family_name='$name' AND first_name='$surname'");
            $rows = mysqli_num_rows($result);
            // print_r($rows);
            $row = mysqli_fetch_row($result);
            // print_r($row);
            
            $challenger_id = $row[0]; 
            $challenger_birthday = $row[1];
            
        } else {
            
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Empty candidate field</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except candidate name`</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "admin/admin_reconversion.php");

        //Останавливаем скрипт
        exit();
    }
    
     if (isset($_POST["jobs"]) && !empty($_POST["jobs"])) {

        //Обрезаем пробелы с начала и с конца строки
        $jobs = trim($_POST["jobs"]);

        //Проверяем переменную на пустоту
        if (!empty($jobs) && $jobs != '1') {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $job = htmlspecialchars($jobs, ENT_QUOTES);
            
            $result = $mysqli->query("SELECT service_name, specify_function FROM `reconversion` WHERE user_id = '$client_id' AND job='$jobs' ");
            
            $rows = mysqli_num_rows($result);
            $row = mysqli_fetch_row($result);
            
            $service = $row[0];
            $job_status =$row[1];
            
        } else {
            
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Empty job field</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except job`</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "admin/admin_reconversion.php");

        //Останавливаем скрипт
        exit();
    }
        
    

        
     if (isset($_POST["interest"]) && !empty($_POST["interest"])) {

        //Обрезаем пробелы с начала и с конца строки
        $interest = trim($_POST["interest"]);

        //Проверяем переменную на пустоту
        if (!empty($interest)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $interest = htmlspecialchars($interest, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose interest</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except interest`</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");
    
            //Останавливаем скрипт
            exit();
        }
        
        if (isset($_POST["medium_term"]) && !empty($_POST["medium_term"])) {

        //Обрезаем пробелы с начала и с конца строки
        $medium_term = trim($_POST["medium_term"]);

        //Проверяем переменную на пустоту
        if (!empty($medium_term)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $medium_term = htmlspecialchars($medium_term, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Medium-term satisfaction</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Medium-term satisfaction</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");
    
            //Останавливаем скрипт
            exit();
        }
        
     if (isset($_POST["long_term"]) && !empty($_POST["long_term"])) {

        //Обрезаем пробелы с начала и с конца строки
        $long_term = trim($_POST["long_term"]);

        //Проверяем переменную на пустоту
        if (!empty($long_term)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $long_term = htmlspecialchars($long_term, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Long-term satisfaction</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Long-term satisfaction</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");
    
            //Останавливаем скрипт
            exit();
        }
        
     if (isset($_POST["physical_adequacy"]) && !empty($_POST["physical_adequacy"])) {

        //Обрезаем пробелы с начала и с конца строки
        $physical_adequacy = trim($_POST["physical_adequacy"]);

        //Проверяем переменную на пустоту
        if (!empty($physical_adequacy)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $physical_adequacy = htmlspecialchars($physical_adequacy, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Physical adequacy</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Physical adequacy</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");
    
            //Останавливаем скрипт
            exit();
        }
        
         if (isset($_POST["behavioral_adequacy"]) && !empty($_POST["behavioral_adequacy"])) {

        //Обрезаем пробелы с начала и с конца строки
        $behavioral_adequacy = trim($_POST["behavioral_adequacy"]);

        //Проверяем переменную на пустоту
        if (!empty($behavioral_adequacy)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $behavioral_adequacy = htmlspecialchars($behavioral_adequacy, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Behavioral adequacy</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Behavioral adequacy</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");
    
            //Останавливаем скрипт
            exit();
        }
        
          if (isset($_POST["ability_to_adapt"]) && !empty($_POST["ability_to_adapt"])) {

        //Обрезаем пробелы с начала и с конца строки
        $ability_to_adapt = trim($_POST["ability_to_adapt"]);

        //Проверяем переменную на пустоту
        if (!empty($ability_to_adapt)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $ability_to_adapt = htmlspecialchars($ability_to_adapt, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Ability to adapt</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>ExceptAbility to adapt</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");
    
            //Останавливаем скрипт
            exit();
        }
        
          if (isset($_POST["quality_work"]) && !empty($_POST["quality_work"])) {

        //Обрезаем пробелы с начала и с конца строки
        $quality_work = trim($_POST["quality_work"]);

        //Проверяем переменную на пустоту
        if (!empty($quality_work)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $quality_work = htmlspecialchars($quality_work, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Quality of work</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Quality of work</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");
    
            //Останавливаем скрипт
            exit();
        }
        
          if (isset($_POST["care_productivity"]) && !empty($_POST["care_productivity"])) {

        //Обрезаем пробелы с начала и с конца строки
        $care_productivity = trim($_POST["care_productivity"]);

        //Проверяем переменную на пустоту
        if (!empty($care_productivity)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $care_productivity = htmlspecialchars($care_productivity, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Care and productivity</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Care and productivity</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");
    
            //Останавливаем скрипт
            exit();
        }
        
      if (isset($_POST["speed_adaptation"]) && !empty($_POST["speed_adaptation"])) {

        //Обрезаем пробелы с начала и с конца строки
        $speed_adaptation = trim($_POST["speed_adaptation"]);

        //Проверяем переменную на пустоту
        if (!empty($speed_adaptation)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $speed_adaptation = htmlspecialchars($speed_adaptation, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>ChooseSpeed of adaptation</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Speed of adaptation</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");
    
            //Останавливаем скрипт
            exit();
        }
        
          if (isset($_POST["potential_evolution"]) && !empty($_POST["potential_evolution"])) {

        //Обрезаем пробелы с начала и с конца строки
        $potential_evolution = trim($_POST["potential_evolution"]);

        //Проверяем переменную на пустоту
        if (!empty($potential_evolution)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $potential_evolution = htmlspecialchars($potential_evolution, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Potential for evolution</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Potential for evolution</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");
    
            //Останавливаем скрипт
            exit();
        }
        
         if (isset($_POST["harmony"]) && !empty($_POST["harmony"])) {

        //Обрезаем пробелы с начала и с конца строки
        $harmony = trim($_POST["harmony"]);

        //Проверяем переменную на пустоту
        if (!empty($harmony)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $harmony = htmlspecialchars($harmony, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose harmony</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except harmony</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");
    
            //Останавливаем скрипт
            exit();
        }
        
          if (isset($_POST["availability"]) && !empty($_POST["availability"])) {

        //Обрезаем пробелы с начала и с конца строки
        $availability = trim($_POST["availability"]);

        //Проверяем переменную на пустоту
        if (!empty($availability)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $availability = htmlspecialchars($availability, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose availability</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except availability</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_reconversion.php");
    
            //Останавливаем скрипт
            exit();
        }
    
    
    $_SESSION['candidate_id'] = $challenger_id;
    //Запрос с тремя таблицами для отображения опыта и сектора обслуживания
    //SELECT `services_sector`.service, `experience`.experience, duties FROM `manual_config` INNER JOIN `services_sector` ON `manual_config`.`service_sector` = `services_sector`.`id` INNER JOIN `experience` ON `manual_config`.`experience` = `experience`.`id`
    //Запрос на добавления пользователя в БД
    
    //echo "INSERT INTO `admin_reconversion` (client_name, client_company, status_civ, surname_client, client_function, website_client, challenger_id, challenger_name, challenger_surname, challenger_birthday, job, service, job_status, interest, medium_term, long_term, physical_adequacy, behavioral_adequacy, ability_to_adapt, quality_work, care_productivity, speed_adaptation, potential_evolution, harmony, availability) VALUES ('$client_name', '$company_name', '$status', '$surname_client', '$client_function','$website' , '$challenger_id', '$name', '$surname', '$challenger_birthday', '$job', '$service', '$job_status', '$interest', '$medium_term', '$long_term', '$physical_adequacy', '$behavioral_adequacy', '$ability_to_adapt', '$quality_work', '$care_productivity', '$speed_adaptation', '$potential_evolution', '$harmony', '$availability')";
    
    $result_query_insert = $mysqli->query("INSERT INTO `admin_reconversion` (client_name, client_company, status_civ, surname_client, client_function, website_client, challenger_id, challenger_name, challenger_surname, challenger_birthday, job, service, job_status, interest, medium_term, long_term, physical_adequacy, behavioral_adequacy, ability_to_adapt, quality_work, care_productivity, speed_adaptation, potential_evolution, harmony, availability) VALUES ('$client_name', '$company_name', '$status', '$surname_client', '$client_function','$website' , '$challenger_id', '$name', '$surname', '$challenger_birthday', '$job', '$service', '$job_status', '$interest', '$medium_term', '$long_term', '$physical_adequacy', '$behavioral_adequacy', '$ability_to_adapt', '$quality_work', '$care_productivity', '$speed_adaptation', '$potential_evolution', '$harmony', '$availability')");
    if (!$result_query_insert) {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на добавления пользователя в БД ".$mysqli->errno."</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "admin/admin_reconversion.php");

        //Останавливаем  скрипт
        exit();
    } else {
            //Отправляем На страницу результатов
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/test_result_Reconversion.php");
            exit();
    }

    //Закрываем подключение к БД
    $mysqli->close();
    
}
else{
    exit("<p><strong>Warning!</strong> You visited this page directly, so there is no data to process. You can go to <a href='index.php'> Main page </a>.</p>");
}


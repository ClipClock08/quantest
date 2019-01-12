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
            //print_r($client_id);
            $result = $mysqli->query("SELECT first_name, company_name, civility, last_name, your_functions, website, type_account,email  from users WHERE id = '$client_id'");
            $rows = mysqli_num_rows($result);
            
            $row = mysqli_fetch_row($result);
            //print_r($row);
            $client_name = $row[0];
            $company_name = $row[1];
            $status = $row[2];
            $surname_client = $row[3];
            $client_function = $row[4];
            $website = $row[5];
            $type_account = $row[6];
            $email = $row[7];
            //print_r($client_name);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Empty company or agent</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except company`</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "admin/admin_recrutement.php");

        //Останавливаем скрипт
        exit();
    }
        
        
        
    
     if (isset($_POST["jobs"]) && !empty($_POST["jobs"])) {

        //Обрезаем пробелы с начала и с конца строки
        $jobs = trim($_POST["jobs"]);

        //Проверяем переменную на пустоту
        if (!empty($jobs) && $jobs != '1') {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $jobs = htmlspecialchars($jobs, ENT_QUOTES);
            
            $result = $mysqli->query("SELECT service_sector, experience FROM `expert_config` WHERE user_id = '$client_id' AND duties='$jobs' ");
            
            $rows = mysqli_num_rows($result);
            $row = mysqli_fetch_row($result);
            
            $service = $row[0];
            $job_status =$row[1];
            
        } else {
            
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Empty job field</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except job`</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "admin/admin_recrutement.php");

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
            $result = $mysqli->query("SELECT id, born_date from `candidates` WHERE user_id = '$client_id' AND family_name='$name' AND first_name='$surname'");
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
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except candidate name`</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "admin/admin_recrutement.php");

        //Останавливаем скрипт
        exit();
    }
        

        
     if (isset($_POST["identite"]) && !empty($_POST["identite"])) {

        //Обрезаем пробелы с начала и с конца строки
        $identity = trim($_POST["identite"]);

        //Проверяем переменную на пустоту
        if (!empty($identity)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $identity = htmlspecialchars($identity, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose identity</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except identity`</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");
    
            //Останавливаем скрипт
            exit();
        }
        
        if (isset($_POST["civil"]) && !empty($_POST["civil"])) {

        //Обрезаем пробелы с начала и с конца строки
        $civil_status = trim($_POST["civil"]);

        //Проверяем переменную на пустоту
        if (!empty($civil_status)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $civil_status = htmlspecialchars($civil_status, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose civil status</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except civil status</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");
    
            //Останавливаем скрипт
            exit();
        }
        
     if (isset($_POST["stuides"]) && !empty($_POST["stuides"])) {

        //Обрезаем пробелы с начала и с конца строки
        $studies = trim($_POST["stuides"]);

        //Проверяем переменную на пустоту
        if (!empty($studies)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $studies = htmlspecialchars($studies, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose studies</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except studies</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");
    
            //Останавливаем скрипт
            exit();
        }
        
     if (isset($_POST["experience"]) && !empty($_POST["experience"])) {

        //Обрезаем пробелы с начала и с конца строки
        $prof_exp = trim($_POST["experience"]);

        //Проверяем переменную на пустоту
        if (!empty($prof_exp)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $prof_exp = htmlspecialchars($prof_exp, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose proffesional experience</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except proffesional experience</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");
    
            //Останавливаем скрипт
            exit();
        }
        
         if (isset($_POST["religious"]) && !empty($_POST["religious"])) {

        //Обрезаем пробелы с начала и с конца строки
        $religious_extremism = trim($_POST["religious"]);

        //Проверяем переменную на пустоту
        if (!empty($religious_extremism)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $religious_extremism = htmlspecialchars($religious_extremism, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose relegious extremism</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except relegious extremism</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");
    
            //Останавливаем скрипт
            exit();
        }
        
          if (isset($_POST["antiwestern"]) && !empty($_POST["antiwestern"])) {

        //Обрезаем пробелы с начала и с конца строки
        $antiwestern_extremism = trim($_POST["antiwestern"]);

        //Проверяем переменную на пустоту
        if (!empty($antiwestern_extremism)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $antiwestern_extremism = htmlspecialchars($antiwestern_extremism, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Anti-Western extremism</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Anti-Western extremism</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");
    
            //Останавливаем скрипт
            exit();
        }
        
          if (isset($_POST["physical_state"]) && !empty($_POST["physical_state"])) {

        //Обрезаем пробелы с начала и с конца строки
        $physical_state = trim($_POST["physical_state"]);

        //Проверяем переменную на пустоту
        if (!empty($physical_state)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $physical_state = htmlspecialchars($physical_state, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Physical state</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Physical state</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");
    
            //Останавливаем скрипт
            exit();
        }
        
          if (isset($_POST["psycho_state"]) && !empty($_POST["psycho_state"])) {

        //Обрезаем пробелы с начала и с конца строки
        $psychological_state = trim($_POST["psycho_state"]);

        //Проверяем переменную на пустоту
        if (!empty($psychological_state)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $psychological_state = htmlspecialchars($psychological_state, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Psychological state</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Psychological state</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");
    
            //Останавливаем скрипт
            exit();
        }
        
      if (isset($_POST["alcohol"]) && !empty($_POST["alcohol"])) {

        //Обрезаем пробелы с начала и с конца строки
        $alcohol = trim($_POST["alcohol"]);

        //Проверяем переменную на пустоту
        if (!empty($alcohol)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $alcohol = htmlspecialchars($alcohol, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Free of addictions</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Free of addictions</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");
    
            //Останавливаем скрипт
            exit();
        }
        
          if (isset($_POST["integrity"]) && !empty($_POST["integrity"])) {

        //Обрезаем пробелы с начала и с конца строки
        $integrity = trim($_POST["integrity"]);

        //Проверяем переменную на пустоту
        if (!empty($integrity)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $integrity = htmlspecialchars($integrity, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Integrity</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Integrity</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");
    
            //Останавливаем скрипт
            exit();
        }
        
         
          if (isset($_POST["summary_exp"]) && !empty($_POST["summary_exp"])) {

        //Обрезаем пробелы с начала и с конца строки
        $summary_exp = trim($_POST["summary_exp"]);

        //Проверяем переменную на пустоту
        if (!empty($summary_exp)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $summary_exp = htmlspecialchars($summary_exp, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Studies and and experience to assume</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Studies and and experience to assume</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");
    
            //Останавливаем скрипт
            exit();
        }
        
          if (isset($_POST["safety"]) && !empty($_POST["safety"])) {

        //Обрезаем пробелы с начала и с конца строки
        $safety = trim($_POST["safety"]);

        //Проверяем переменную на пустоту
        if (!empty($safety)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $safety = htmlspecialchars($safety, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Naturalness in safety matter</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Naturalness in safety matter</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");
    
            //Останавливаем скрипт
            exit();
        }
        
    if (isset($_POST["quality"]) && !empty($_POST["quality"])) {

        //Обрезаем пробелы с начала и с конца строки
        $quality = trim($_POST["quality"]);

        //Проверяем переменную на пустоту
        if (!empty($quality)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $quality = htmlspecialchars($quality, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Quality of his/ her work in this function</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Quality of his/ her work in this function</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "admin/admin_recrutement.php");

        //Останавливаем скрипт
        exit();
    }
    
    if (isset($_POST["organization"]) && !empty($_POST["organization"])) {

        //Обрезаем пробелы с начала и с конца строки
        $organization = trim($_POST["organization"]);

        //Проверяем переменную на пустоту
        if (!empty($organization)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $organization = htmlspecialchars($organization, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Natural sense of organization</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Natural sense of organization</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "admin/admin_recrutement.php");

        //Останавливаем скрипт
        exit();
    }
    
    if (isset($_POST["terms_of_work"]) && !empty($_POST["terms_of_work"])) {

        //Обрезаем пробелы с начала и с конца строки
        $terms_of_work = trim($_POST["terms_of_work"]);

        //Проверяем переменную на пустоту
        if (!empty($terms_of_work)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $terms_of_work = htmlspecialchars($terms_of_work, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Naturalness in terms of work rate</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Naturalness in terms of work rate</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "admin/admin_recrutement.php");

        //Останавливаем скрипт
        exit();
    }
    
    if (isset($_POST["responsibilities"]) && !empty($_POST["responsibilities"])) {

        //Обрезаем пробелы с начала и с конца строки
        $responsibilities = trim($_POST["responsibilities"]);

        //Проверяем переменную на пустоту
        if (!empty($responsibilities)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $responsibilities = htmlspecialchars($responsibilities, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Naturalness in responsibilities</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Naturalness in responsibilities</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "admin/admin_recrutement.php");

        //Останавливаем скрипт
        exit();
    }
    
    if (isset($_POST["initiative"]) && !empty($_POST["initiative"])) {

        //Обрезаем пробелы с начала и с конца строки
        $initiative = trim($_POST["initiative"]);

        //Проверяем переменную на пустоту
        if (!empty($initiative)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $initiative = htmlspecialchars($initiative, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Naturalness for initiative</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Naturalness for initiative</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "admin/admin_recrutement.php");

        //Останавливаем скрипт
        exit();
    }
    
    if (isset($_POST["social_behavior"]) && !empty($_POST["social_behavior"])) {

        //Обрезаем пробелы с начала и с конца строки
        $social_behavior = trim($_POST["social_behavior"]);

        //Проверяем переменную на пустоту
        if (!empty($social_behavior)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $social_behavior = htmlspecialchars($social_behavior, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Naturalness in social behavior</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Naturalness in social behavior</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "admin/admin_recrutement.php");

        //Останавливаем скрипт
        exit();
    }
    
    if (isset($_POST["motivation"]) && !empty($_POST["motivation"])) {

        //Обрезаем пробелы с начала и с конца строки
        $motivation = trim($_POST["motivation"]);

        //Проверяем переменную на пустоту
        if (!empty($motivation)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $motivation = htmlspecialchars($motivation, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Motivation and interest</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Motivation and interest</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "admin/admin_recrutement.php");

        //Останавливаем скрипт
        exit();
    }
    
    if (isset($_POST["professional_availability"]) && !empty($_POST["professional_availability"])) {

        //Обрезаем пробелы с начала и с конца строки
        $professional_availability = trim($_POST["professional_availability"]);

        //Проверяем переменную на пустоту
        if (!empty($professional_availability)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $professional_availability = htmlspecialchars($professional_availability, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Naturalness in terms of professional availability</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Naturalness in terms of professional availability</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "admin/admin_recrutement.php");

        //Останавливаем скрипт
        exit();
    }
    
    if (isset($_POST["attendance_and_punctuality"]) && !empty($_POST["attendance_and_punctuality"])) {

        //Обрезаем пробелы с начала и с конца строки
        $attendance_and_punctuality = trim($_POST["attendance_and_punctuality"]);

        //Проверяем переменную на пустоту
        if (!empty($attendance_and_punctuality)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $attendance_and_punctuality = htmlspecialchars($attendance_and_punctuality, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Naturalness in attendance and punctuality at work</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Naturalness in attendance and punctuality at work</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "admin/admin_recrutement.php");

        //Останавливаем скрипт
        exit();
    }
    
    if (isset($_POST["training"]) && !empty($_POST["training"])) {

        //Обрезаем пробелы с начала и с конца строки
        $training = trim($_POST["training"]);

        //Проверяем переменную на пустоту
        if (!empty($training)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $training = htmlspecialchars($training, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Natural aptitude for training</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Natural aptitude for training</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "admin/admin_recrutement.php");

        //Останавливаем скрипт
        exit();
    }
    
    if (isset($_POST["command"]) && !empty($_POST["command"])) {

        //Обрезаем пробелы с начала и с конца строки
        $command = trim($_POST["command"]);

        //Проверяем переменную на пустоту
        if (!empty($command)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $command = htmlspecialchars($command, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Choose Natural ability for command</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/admin_recrutement.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Natural ability for command</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "admin/admin_recrutement.php");

        //Останавливаем скрипт
        exit();
    }
    
    
        
         

    //Запрос с тремя таблицами для отображения опыта и сектора обслуживания
    //SELECT `services_sector`.service, `experience`.experience, duties FROM `manual_config` INNER JOIN `services_sector` ON `manual_config`.`service_sector` = `services_sector`.`id` INNER JOIN `experience` ON `manual_config`.`experience` = `experience`.`id`
    //Запрос на добавления пользователя в БД
    /*echo "<pre>";
    echo "INSERT INTO `admin_selection` (
        `client_name`, `client_company`, `type_account`,`status_civ`,
        `surname_client`, `client_function`, `website_client`,
        `challenger_id`, `challenger_name`, `challenger_surname`,
        `challenger_birthday`, `job`, `service`,
        `job_status`,`identity`,`civil_status`,
        `studies`,`prof_exp`,`religious_extremism`,
        `antiwestern_extremism`,`physical_state`,`psychological_state`,
        `alcohol`,`integrity`,
        `summary_exp`,`safety`,`quality`,
        `organization`,`terms_of_work`,`responsibilities`,
        `initiative`,`social_behavior`,`motivation`,
        `professional_availability`,`attendance_and_punctuality`,
        `training`,`command`
    ) 
    VALUES (
        '$client_name', '$company_name', '$type_account', '$status', 
        '$surname_client', '$client_function','$website' ,
        '$challenger_id', '$name', '$surname', 
        '$challenger_birthday','$jobs', '$service',
        '$job_status','$identity', '$civil_status',
        '$studies','$prof_exp', '$religious_extremism',
        '$antiwestern_extremism','$physical_state', '$psychological_state',
        '$alcohol','$integrity', '$summary_exp',
        '$safety','$quality', '$organization', 
        '$terms_of_work','$responsibilities', '$initiative',
        '$social_behavior', '$motivation', '$professional_availability', 
        '$attendance_and_punctuality','$training', '$command'
        )";
    echo "</pre>";*/
    
    $result_query_insert = $mysqli->query(
    "INSERT INTO `admin_selection` (
        `client_name`, `client_company`, `type_account`,`status_civ`,
        `surname_client`, `client_function`, `website_client`,
        `challenger_id`, `challenger_name`, `challenger_surname`,
        `challenger_birthday`, `job`, `service`,
        `job_status`,`identity`,`civil_status`,
        `studies`,`prof_exp`,`religious_extremism`,
        `antiwestern_extremism`,`physical_state`,`psychological_state`,
        `alcohol`,`integrity`,
        `summary_exp`,`safety`,`quality`,
        `organization`,`terms_of_work`,`responsibilities`,
        `initiative`,`social_behavior`,`motivation`,
        `professional_availability`,`attendance_and_punctuality`,
        `training`,`command`, `email_client`
    ) 
    VALUES (
        '$client_name', '$company_name', '$type_account', '$status', 
        '$surname_client', '$client_function','$website' ,
        '$challenger_id', '$name', '$surname', 
        '$challenger_birthday','$jobs', '$service',
        '$job_status','$identity', '$civil_status',
        '$studies','$prof_exp', '$religious_extremism',
        '$antiwestern_extremism','$physical_state', '$psychological_state',
        '$alcohol','$integrity', '$summary_exp',
        '$safety','$quality', '$organization', 
        '$terms_of_work','$responsibilities', '$initiative',
        '$social_behavior', '$motivation', '$professional_availability', 
        '$attendance_and_punctuality','$training', '$command', '$email'
        )"
    );
    
    
    if (!$result_query_insert) {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Error added in DB ".$mysqli->errno."</p>";
        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "admin/admin_recrutement.php");

        //Останавливаем  скрипт
        exit();
    } else {
            //Отправляем На страницу результатов
            $_SESSION["success_messages"] = 'test added';
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/test_result_Recrutement.php");
            exit();
    }

    //Закрываем подключение к БД
    $mysqli->close();
    
}
else{
    exit("<p><strong>Warning!</strong> You visited this page directly, so there is no data to process. You can go to <a href='index.php'> Main page </a>.</p>");
}


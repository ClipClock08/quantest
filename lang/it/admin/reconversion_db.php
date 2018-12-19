<?php

   
   //Добавляем файл подключения к БД
    require_once("../dbconnect.php");

    //Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
    $_SESSION["error_messages"] = '';

    //Объявляем ячейку для добавления успешных сообщений
    $_SESSION["success_messages"] = '';

 if(isset($_POST["getList"]) && !empty($_POST["getList"])){

    
    
    if (isset($_POST["nomClient"])) {

       $first_name = $_POST['nomClient'];
        $_SESSION['clientName'] = $first_name;
        //Проверяем переменную на пустоту
        if (!empty( $first_name)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $first_name = htmlspecialchars( $first_name, ENT_QUOTES);
                
            $result = $mysqli->query("SELECT id FROM `users` WHERE first_name='$first_name'");
    
            if($result)
            {
                $rows = mysqli_num_rows($result); // количество полученных строк
                
                for ($i = 0 ; $i < $rows ; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                    
                $id = implode("," , $row);
                    
                }
                $_SESSION['id'] = $id;
                
                $result2 = $mysqli->query("SELECT reclassified.family_name FROM `reclassified` INNER JOIN users ON reclassified.user_id = users.id WHERE users.id = '$id'");
                
                if($result2)
                {
                    $rows = mysqli_num_rows($result2); // количество полученных строк
                    for ($i = 0 ; $i < $rows ; ++$i)
                    {
                        $row = mysqli_fetch_row($result2);
                        for ($j = 0 ; $j < 1 ; ++$j) { 
                            $cand_arr[$i] = $row[$j];
                        }
                                
                    }
                    
                    // очищаем результат
                    mysqli_free_result($result2);
                }
                
            // очищаем результат
            mysqli_free_result($result);
            $_SESSION['candidates'] = $cand_arr;
            
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
            }
            
                
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Client name empty</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Empty name field</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/it/admin/admin_reconversion.php");

        //Останавливаем скрипт
        exit();
    }
    
 }
elseif(isset($_POST["choose"]) && !empty($_POST["choose"])){
    
   if (isset($_POST["selectCandidates"])) {


       $family_name = $_POST['selectCandidates'];
        //Проверяем переменную на пустоту
        if (!empty( $family_name)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $family_name = htmlspecialchars( $family_name, ENT_QUOTES);
                
            $result = $mysqli->query("SELECT *  FROM `reclassified` WHERE family_name='$family_name'");
    
            if($result)
            {
                $rows = mysqli_num_rows($result); // количество полученных строк
                
               for ($i = 0 ; $i < $rows ; ++$i){
                   
                    $row = mysqli_fetch_row($result);
                            $_SESSION['challenger'] = $row;
                                
                }
            // очищаем результат
            mysqli_free_result($result);
            
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
            }
            
                
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Client name empty</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Empty name field</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/it/admin/admin_reconversion.php");

        //Останавливаем скрипт
        exit();
    }
    
}
elseif(isset($_POST["saveResult"]) && !empty($_POST["saveResult"])){
    
    if (isset($_SESSION["clientName"]) && !empty($_SESSION["clientName"])) {

        //Обрезаем пробелы с начала и с конца строки
        $client_name = trim($_SESSION["clientName"]);

        //Проверяем переменную на пустоту
        if (!empty($client_name)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $client_name = htmlspecialchars($client_name, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Empty company or agent</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except client name`</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

        //Останавливаем скрипт
        exit();
    }
        
        
     if (isset($_SESSION['challenger'][0]) && !empty($_SESSION['challenger'][0])) {

        //Обрезаем пробелы с начала и с конца строки
        $challenger_id = trim($_SESSION['challenger'][0]);

        //Проверяем переменную на пустоту
        if (!empty($challenger_id)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $challenger_id = htmlspecialchars($challenger_id, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Empty challenger id</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except challenger_id`</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

        //Останавливаем скрипт
        exit();
    }
        
     if (isset($_SESSION["challenger"][2]) && !empty($_SESSION["challenger"][2])) {

        //Обрезаем пробелы с начала и с конца строки
        $challenger_name = trim($_SESSION["challenger"][2]);

        //Проверяем переменную на пустоту
        if (!empty($challenger_name)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $challenger_name = htmlspecialchars($challenger_name, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Empty first name</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except first name`</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

        //Останавливаем скрипт
        exit();
    }

        
    if (isset($_SESSION['challenger'][3]) && !empty($_SESSION['challenger'][3])) {

        //Обрезаем пробелы с начала и с конца строки
        $challenger_surname = trim($_SESSION['challenger'][3]);

        //Проверяем переменную на пустоту
        if (!empty($challenger_surname)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $challenger_surname = htmlspecialchars($challenger_surname, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Empty surname</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except surname`</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

        //Останавливаем скрипт
        exit();
    }
    
    if (isset($_SESSION['challenger'][4]) && !empty($_SESSION['challenger'][4])) {

        //Обрезаем пробелы с начала и с конца строки
        $challenger_birthday = trim($_SESSION['challenger'][4]);

        //Проверяем переменную на пустоту
        if (!empty($challenger_birthday)) {
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $challenger_birthday = htmlspecialchars($challenger_birthday, ENT_QUOTES);
        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Empty surname</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


    } else {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except surname`</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

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
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except interest`</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");
    
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
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Medium-term satisfaction</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");
    
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
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Long-term satisfaction</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");
    
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
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Physical adequacy</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");
    
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
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Behavioral adequacy</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");
    
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
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>ExceptAbility to adapt</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");
    
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
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Quality of work</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");
    
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
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Care and productivity</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");
    
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
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Speed of adaptation</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");
    
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
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except Potential for evolution</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");
    
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
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except harmony</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");
    
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
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

            //Останавливаем скрипт
            exit();
        }


        } else {
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Except availability</p>";
    
            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");
    
            //Останавливаем скрипт
            exit();
        }
        
    //Запрос с тремя таблицами для отображения опыта и сектора обслуживания
    //SELECT `services_sector`.service, `experience`.experience, duties FROM `manual_config` INNER JOIN `services_sector` ON `manual_config`.`service_sector` = `services_sector`.`id` INNER JOIN `experience` ON `manual_config`.`experience` = `experience`.`id`
    //Запрос на добавления пользователя в БД
    
    $result_query_insert = $mysqli->query("INSERT INTO `admin_reconversion` (client_name, challenger_id, challenger_name, challenger_surname, challenger_birthday, interest, medium_term, long_term, physical_adequacy, behavioral_adequacy, ability_to_adapt, quality_work, care_productivity, speed_adaptation, potential_evolution, harmony, availability) VALUES ('$client_name', '$challenger_id', '$challenger_name', '$challenger_surname', '$challenger_birthday', '$interest', '$medium_term', '$long_term', '$physical_adequacy', '$behavioral_adequacy', '$ability_to_adapt', '$quality_work', '$care_productivity', '$speed_adaptation', '$potential_evolution', '$harmony', '$availability')");
    $_SESSION["error_messages"] = $result_query_insert;
    if (!$result_query_insert) {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на добавления пользователя в БД ".$mysqli->errno."</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "../lang/it/admin/admin_reconversion.php");

        //Останавливаем  скрипт
        exit();
    } else {
            //Отправляем На страницу результатов
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "../lang/it/admin/test_result.php");
            exit();
    }

    //Закрываем подключение к БД
    $mysqli->close();
    
}
else{
    exit("<p><strong>Ошибка!</strong> You visited this page directly, so there is no data to process. You can go to <a href=".$address_site."> Main page </a>.</p>");
}


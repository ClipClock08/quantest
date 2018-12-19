<?php
require_once ("dbconnect.php");
//Add a file to connect to the database
$user_id = $_SESSION['id'];
//We declare a cell to add errors that may occur during form processing.
$_SESSION["error_messages"] = '';

//Declare a cell to add successful messages
$_SESSION["success_messages"] = '';

/*
    Check if the form has been submitted, that is, if the button was pressed. If yes, then go ahead, if not, then we will display to the user an error message, that he went to this page directly.
*/
if (isset($_POST["upload"]) && !empty($_POST["upload"])) {
    $uploaddir = 'uploads/';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    
    echo '<pre>';
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        echo "The file has been successfully downloaded.\n";
    } else {
        echo "Possible attack using file downloads!\n";
    }
    
  
    
    
    echo 'Some debug info:';
    print_r($_FILES);
    
    print "</pre>";
    
    $file_name = $_FILES['userfile']['name'];
    
    $path = 'https://quantest.eu/lang/en/uploads/'.$file_name;
    echo $path;

    //Alternately, we get the lines and display them in the browser.
    $descriptor = fopen($path, 'r');
    if ($descriptor) {
        while (($string = fgets($descriptor)) !== false) {
            echo $string;
        }
        fclose($descriptor);
    
    } else {
        echo "\n Unable to open the specified file!";
    }
    

}

elseif (isset($_POST["add_candidates"]) && !empty($_POST["add_candidates"])) {

    /* We check if in the global $ _POST array there is data sent from the form and we conclude the transferred data in ordinary variables.*/


    if (isset($_POST["family_name"])) {

        //We cut the spaces from the beginning and from the end of the line
        $family_name = $_POST["family_name"];
     
        if(!empty($family_name)){
            $n = count($family_name);
        }

        //Checking the variable for emptiness
        if (!empty($family_name)) {
            for($i=0; $i < $n; $i++) {
                // For security, we convert special characters into HTML entities.
                $family_name[$i] = htmlspecialchars($family_name[$i], ENT_QUOTES);
            }
        } else {
            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Please enter the name of the candidate</p>";

            //We return the user to the candidates registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/en/candidates_list.php");

            //Removable script
            exit();
        }


    } else {
        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except name</p>";

        //We return the user to the candidates registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/en/candidates_list.php");

        //Removable script
        exit();
    }




    if (isset($_POST["first_name"])) {

        //We cut the spaces from the beginning and from the end of the line
        $first_name= $_POST["first_name"];

        if (!empty($first_name)) {
            for($i=0; $i<$n;$i++) {
                // For security, we convert special characters into HTML entities.
                $first_name[$i] = htmlspecialchars($first_name[$i], ENT_QUOTES);
            }
        } else {

            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Please enter the family name of the candidate</p>";

            //We return the user to the registration page of the candidates
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/en/candidates_list.php");

            //Removable script
            exit();
        }
		

    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except first name</p>";

        //We return the user to the candidates registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/en/candidates_list.php");

        //Removable script
        exit();
    }


    if (isset($_POST["born_date"])) {

        //We cut the spaces from the beginning and from the end of the line
        $born_date = $_POST["born_date"];

        if (!empty($born_date)) {
            for($i=0; $i<$n;$i++) {
                // For security, we convert special characters into HTML entities.
                $born_date[$i] = htmlspecialchars($born_date[$i], ENT_QUOTES);
            }
        } else {

            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >specify born date</p>";

            //We return the user to the candidates registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/en/candidates_list.php");

            //Removable script
            exit();
        }


    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except born_date</p>";

        //We return the user to the candidates registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/en/candidates_list.php");

        //Removable script
        exit();
    }

    if (isset($_POST["gender"])) {

        //We cut the spaces from the beginning and from the end of the line
        $gender = $_POST["gender"];

        if (!empty($gender)) {
            for($i=0; $i<$n;$i++) {
                // For security, we convert special characters into HTML entities.
                $gender[$i] = htmlspecialchars($gender[$i], ENT_QUOTES);
            }
        } else {

            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Choose gender</p>";

            //We return the user to the candidates registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/en/candidates_list.php");

            //Removable script
            exit();
        }


    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except gender</p>";

        //We return the user to the candidates registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/en/candidates_list.php");

        //Removable script
        exit();
    }
    
    /*
	if (isset($_POST["cv_status"])) {

        //Обрезаем пробелы с начала и с конца строки
        $cv_status= $_POST["cv_status"];

        if (!empty($cv_status)) {
            for($i=0; $i<$n;$i++) {
                // Для безопасности, преобразуем специальные символы в HTML-сущности
                $cv_status[$i] = htmlspecialchars($cv_status[$i], ENT_QUOTES);
            }
        } else {

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Choose CV</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/en/candidates_list.php");

            //Останавливаем  скрипт
            exit();
        }

    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except CV</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/en/candidates_list.php");

        //Останавливаем  скрипт
        exit();
    }
    */
    
    for($i = 0; $i < $n; $i++) {
        //Request to add a candidate to the database
        $result_query_insert = $mysqli->query("INSERT INTO `candidates` (user_id, family_name, first_name, born_date, gender, language) VALUES ($user_id,'" . $family_name[$i] . "','" . $first_name[$i] . "','".$born_date[$i]."','" . $gender[$i] . "', 'English')");
        if (!$result_query_insert) {
            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Error added in DB " . $mysqli->errno . " </p>";

            //We return the user to the candidates registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/en/candidates_list.php");

            //Removable script
            exit();
        } else {
            //We send the user to the registration page and remove the registration form
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/en/candidates_list.php");
            //$_SESSION["success_messages"] .= "<p class='success_message' >candidates added success</p>";
            //exit();
        }

        //Close the connection to the database

    }
    $_SESSION["success_messages"] .= "<p class='success_message' >candidates added success</p>";
    $mysqli->close();

} else {

    exit("<p><strong>Oops!</strong> The requested page is accessible when the user is logged on. To do this, please visit the <a href=". $address_site. "> home page </a>.</p>");
}

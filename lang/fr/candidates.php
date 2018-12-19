<?php
require_once ("dbconnect.php");
//Ajouter un fichier pour se connecter à la base de données
$user_id = $_SESSION['id'];
//Nous déclarons une cellule pour ajouter des erreurs pouvant survenir lors du traitement du formulaire.
$_SESSION["error_messages"] = '';

//Déclarer une cellule pour ajouter les messages réussis
$_SESSION["success_messages"] = '';

/*
    Vérifiez si le formulaire a été soumis, c'est-à-dire si vous avez appuyé sur le bouton. Si oui, alors allez-y, sinon, nous afficherons à l'utilisateur un message d'erreur indiquant qu'il s'est directement rendu sur cette page.
*/
if (isset($_POST["upload"]) && !empty($_POST["upload"])) {
    $uploaddir = 'uploads/';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    
    echo '<pre>';
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        echo "Le fichier a été téléchargé avec succès.\n";
    } else {
        echo "Impossible d'ouvrir le fichier spécifié!\n";
    }
    
  
    
    
    echo 'Quelques informations de débogage:';
    print_r($_FILES);
    
    print "</pre>";
    
    $file_name = $_FILES['userfile']['name'];
    
    $path = 'https://quantest.eu/lang/fr/uploads/'.$file_name;
    echo $path;

    //Alternativement, nous obtenons les lignes et les affichons dans le navigateur
    $descriptor = fopen($path, 'r');
    if ($descriptor) {
        while (($string = fgets($descriptor)) !== false) {
            echo $string;
        }
        fclose($descriptor);
    
    } else {
        echo "\n Impossible d'ouvrir le fichier spécifié";
    }
    

}

elseif (isset($_POST["add_candidates"]) && !empty($_POST["add_candidates"])) {

    /* Nous vérifions si le tableau global $ _POST contient des données envoyées à partir du formulaire et nous concluons les données transférées dans des variables ordinaires.*/


    if (isset($_POST["family_name"])) {

        //Nous coupons les espaces au début et à la fin de la ligne.
        $family_name = $_POST["family_name"];
     
        if(!empty($family_name)){
            $n = count($family_name);
        }

        //Vérification de la variable pour la vacuité
        if (!empty($family_name)) {
            for($i=0; $i < $n; $i++) {
                // Pour des raisons de sécurité, nous convertissons des caractères spéciaux en entités HTML.
                $family_name[$i] = htmlspecialchars($family_name[$i], ENT_QUOTES);
            }
        } else {
            // Enregistrez le message d'erreur dans la session.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Veuillez entrer le nom du candidat</p>";

            //Nous renvoyons l'utilisateur à la page d'inscription des candidats
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/candidates_list.php");

            //Script amovible
            exit();
        }


    } else {
        // Enregistrez le message d'erreur dans la session.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Except name</p>";

        //Nous renvoyons l'utilisateur à la page d'inscription des candidats
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/fr/candidates_list.php");

        //Script amovible
        exit();
    }




    if (isset($_POST["first_name"])) {

        //Nous coupons les espaces au début et à la fin de la ligne.
        $first_name= $_POST["first_name"];

        if (!empty($first_name)) {
            for($i=0; $i<$n;$i++) {
                // Pour des raisons de sécurité, nous convertissons des caractères spéciaux en entités HTML.
                $first_name[$i] = htmlspecialchars($first_name[$i], ENT_QUOTES);
            }
        } else {

            // Enregistrez le message d'erreur dans la session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Veuillez entrer le prénom du candidat</p>";

            //Nous renvoyons l'utilisateur à la page d'inscription des candidats
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/candidates_list.php");

            //Script amovible
            exit();
        }


    } else {

        // Enregistrez le message d'erreur dans la session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except first name</p>";

        //Enregistrez le message d'erreur dans la session.
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/fr/candidates_list.php");

        //Script amovible
        exit();
    }


    if (isset($_POST["born_date"])) {

        //Nous coupons les espaces au début et à la fin de la ligne.
        $born_date = $_POST["born_date"];

        if (!empty($born_date)) {
            for($i=0; $i<$n;$i++) {
                // Для безопасности, преобразуем специальные символы в HTML-сущности
                $born_date[$i] = htmlspecialchars($born_date[$i], ENT_QUOTES);
            }
        } else {

            // Enregistrez le message d'erreur dans la session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Veuillez entrer la date de naissance du candidat</p>";

            //Nous renvoyons l'utilisateur à la page d'inscription des candidats
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/candidates_list.php");

            //Script amovible
            exit();
        }


    } else {

        // Enregistrez le message d'erreur dans la session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except born_date</p>";

        //Nous renvoyons l'utilisateur à la page d'inscription des candidats
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/fr/candidates_list.php");

        //Script amovible
        exit();
    }

    if (isset($_POST["gender"])) {

        //Nous coupons les espaces au début et à la fin de la ligne.
        $gender = $_POST["gender"];

        if (!empty($gender)) {
            for($i=0; $i<$n;$i++) {
                // Pour des raisons de sécurité, nous convertissons des caractères spéciaux en entités HTML.
                $gender[$i] = htmlspecialchars($gender[$i], ENT_QUOTES);
            }
        } else {

            // Enregistrez le message d'erreur dans la session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Veuillez cocher le genre du candidat</p>";

            //Nous renvoyons l'utilisateur à la page d'inscription des candidats
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/candidates_list.php");

            //Script amovible
            exit();
        }


    } else {

        // Enregistrez le message d'erreur dans la session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except gender</p>";

        //Nous renvoyons l'utilisateur à la page d'inscription des candidats
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/fr/candidates_list.php");

        //Script amovible
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
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Enter your first name</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/candidates_list.php");

            //Останавливаем  скрипт
            exit();
        }


    } else {

        // Enregistrez le message d'erreur dans la session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Except first name</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/fr/candidates_list.php");

        //Script amovible
        exit();
    }
    
    */
    for($i = 0; $i < $n; $i++) {
        //Demande d'ajout un candidat dans la base de données
        $result_query_insert = $mysqli->query("INSERT INTO `candidates` (user_id, family_name, first_name, born_date, gender, language) VALUES ($user_id,'" . $family_name[$i] . "','" . $first_name[$i] . "','".$born_date[$i]."','" . $gender[$i] . "', 'French')");
        if (!$result_query_insert) {
            // Enregistrez le message d'erreur dans la session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Oops! Une erreur c\'est produite lors de la tentative d\'ajout dans la base des données." . $mysqli->errno . " </p>";

            //Nous renvoyons l'utilisateur à la page d'inscription des candidats
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/candidates_list.php");

            //Script amovible
            exit();
        } else {
            //Nous envoyons l'utilisateur à la page d'inscription et retirons le formulaire d'inscription des candidats
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/candidates_list.php");
            //$_SESSION["success_messages"] .= "<p class='success_message' >Candidat(s) ajouté(s) avec succès!</p>";
            //exit();
        }

        //Fermer la connexion à la base de données

    }
    $mysqli->close();

} else {

    exit("<p><strong>Oops!</strong> La page demandée est accessible lorsque l\'utilisateur est connecté. Pour ce faire, veuillez visiter la  <a href=". $address_site. "> page d\'accueil </a>.</p>");
}

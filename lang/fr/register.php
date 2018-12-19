<?php
//Add a file to connect to the database
require_once("dbconnect.php");

//We declare a cell to add errors that may occur during form processing.
$_SESSION["error_messages"] = '';

//Declare a cell to add successful messages
$_SESSION["success_messages"] = '';

/*
    We check if the form has been sent, that is, if the button to register was pressed. If yes, then go ahead, if not, then we will display to the user an error message, that he went to this page directly.
*/
if (isset($_POST["btn_submit_register"]) && !empty($_POST["btn_submit_register"])) {

    /* We check if in the global $ _POST array there is data sent from the form and we conclude the transferred data in ordinary variables.*/

    if (isset($_POST["userPro"])) {

        //We cut the spaces from the beginning and from the end of the line.
        $type_account = trim($_POST["userPro"]);

        //Checking the variable for emptiness
        if (!empty($type_account)) {
            // For security, we convert special characters into HTML entities.
            $type_account = htmlspecialchars($type_account, ENT_QUOTES);
        } else {
            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>SVP, êtes-vous un employeur ou une agence?</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/form_register.php");

            //Removable script
            exit();
        }


    } else {
        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Choisissez</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/fr/form_register.php");

        //Removable script
        exit();
    }


    if (isset($_POST["nomEntreprise"])) {

        //We cut the spaces from the beginning and from the end of the line.
        $company_name = trim($_POST["nomEntreprise"]);

        if (!empty($company_name)) {


            $company_name = htmlspecialchars($company_name, ENT_QUOTES);

            //Check whether there is already such an address in the database.
            $result_query = $mysqli->query("SELECT `company_name` FROM `users` WHERE `company_name`='" . $company_name . "'");

            //If the number of received lines is exactly one, then the user with this email address is already registered
            if ($result_query->num_rows == 1) {

                //If the result is not false
                if (($row = $result_query->fetch_assoc()) != false) {

                    // Save the error message to the session.
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Cette entreprise existe déjà</p>";

                    //We return the user to the registration page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: " . $address_site . "lang/fr/form_register.php");

                } else {
                    // Save the error message to the session.
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >server error</p>";

                    //We return the user to the registration page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: " . $address_site . "lang/fr/form_register.php");
                }

                /* sample close */
                $result_query->close();

                //Removable script
                exit();
            }

            /* sample close */
            $result_query->close();
        } else {
            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' Nom entreprise</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/form_register.php");

            //Removable script
            exit();
        }

    } else {
        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Nom entreprise manquant</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/fr/form_register.php");

        //Removable script
        exit();
    }


    if (isset($_POST["siteWeb"])) {

        //We cut the spaces from the beginning and from the end of the line.
        $website = trim($_POST["siteWeb"]);

        if (!empty($website)) {
            // For security, we convert special characters into HTML entities.
            $wabsite = htmlspecialchars($website, ENT_QUOTES);
        } else {

            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Nom du site entreprise </p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/form_register.php");

            //Removable script
            exit();
        }


    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Nom site entreprise manquant</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/fr/form_register.php");

        //Removable script
        exit();
    }


    if (isset($_POST["nomContact"])) {

        //We cut the spaces from the beginning and from the end of the line.
        $first_name = trim($_POST["nomContact"]);

        if (!empty($first_name)) {
            // For security, we convert special characters into HTML entities.
            $first_name = htmlspecialchars($first_name, ENT_QUOTES);
        } else {

            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Veuillez indiquer votre prénom</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/form_register.php");

            //Removable script
            exit();
        }


    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Prénom manquant</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/fr/form_register.php");

        //Removable script
        exit();
    }


    if (isset($_POST["prenomContact"])) {

        //We cut the spaces from the beginning and from the end of the line.
        $last_name = trim($_POST["prenomContact"]);

        if (!empty($last_name)) {
            // For security, we convert special characters into HTML entities.
            $last_name = htmlspecialchars($last_name, ENT_QUOTES);
        } else {

            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Veuillez indiquer votre nom</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/form_register.php");

            //Removable script
            exit();
        }


    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Nom manquant</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/fr/form_register.php");

        //Removable script
        exit();
    }
    
     if (isset($_POST["civilitye"])) {

        //We cut the spaces from the beginning and from the end of the line.
        $civilitye = trim($_POST["civilitye"]);

        //Checking the variable for emptiness
        if (!empty($civilitye)) {
            // For security, we convert special characters into HTML entities.
            $civilitye = htmlspecialchars($civilitye, ENT_QUOTES);
        } else {
            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Votre civilité</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/form_register.php");

            //Removable script
            exit();
        }


        } else {
            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Civilité manquante</p>";
    
            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/form_register.php");
    
            //Removable script
            exit();
        }

    if (isset($_POST["fonctionContact"])) {

        //We cut the spaces from the beginning and from the end of the line.
        $your_functions = trim($_POST["fonctionContact"]);

        if (!empty($your_functions)) {
            // For security, we convert special characters into HTML entities.
            $your_functions = htmlspecialchars($your_functions, ENT_QUOTES);
        } else {

            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Votre fonction</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/form_register.php");

            //Removable script
            exit();
        }


    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Fonction manquante</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/fr/form_register.php");

        //Removable script
        exit();
    }

    if (isset($_POST["emailContact"])) {

        //We cut the spaces from the beginning and from the end of the line.
        $email = trim($_POST["emailContact"]);

        if (!empty($email)) {


            $email = htmlspecialchars($email, ENT_QUOTES);

            // (3) Place code to verify the format of the mailing address and its uniqueness

            //Check the format of the received email address using a regular expression.
            $reg_email = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i";

            //If the format of the received postal address does not match the regular expression
            if (!preg_match($reg_email, $email)) {
                // Save the error message to the session.
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Adresse email invalide</p>";

                //We return the user to the registration page
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: " . $address_site . "lang/fr/form_register.php");

                //Removable script
                exit();
            }

            //Check whether there is already such an address in the database.
            $result_query = $mysqli->query("SELECT `email` FROM `users` WHERE `email`='" . $email . "'");

            //If the number of received lines is exactly one, then the user with this email address is already registered
            if ($result_query->num_rows == 1) {

                //If the result is not false
                if (($row = $result_query->fetch_assoc()) != false) {

                    // Save the error message to the session.
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Cette adresse email existe déjà</p>";

                    //We return the user to the registration page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: " . $address_site . "lang/fr/form_register.php");

                } else {
                    // Save the error message to the session.
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >server error</p>";

                    //We return the user to the registration page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: " . $address_site . "lang/fr/form_register.php");
                }

                /* sample close */
                $result_query->close();

                //Removable script
                exit();
            }

            /* sample close */
            $result_query->close();
        } else {
            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Votre adresse email</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/form_register.php");

            //Removable script
            exit();
        }

    } else {
        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Adresse email manquante</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/fr/form_register.php");

        //Removable script
        exit();
    }

/*
    if (isset($_POST["telContact"])) {

        //We cut the spaces from the beginning and from the end of the line.
        $phone = trim($_POST["telContact"]);

    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Phone number except</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/fr/form_register.php");

        //Removable script
        exit();
    }
	*/

    if (isset($_POST["password"])) {

        //We cut the spaces from the beginning and from the end of the line.
        $password = trim($_POST["password"]);

        //Check if passwords match.
        if (isset($_POST["confirm_password"])) {
            //We cut the spaces from the beginning and from the end of the line.
            $confirm_password = trim($_POST["confirm_password"]);

            if ($confirm_password != $password) {
                // Save the error message to the session.
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Erreur de mot de passe</p>";

                //We return the user to the registration page
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: " . $address_site . "lang/fr/form_register.php");

                //Removable script
                exit();
            }

        } else {
            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Retapez votre mot de passe</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/form_register.php");

            //Removable script
            exit();
        }

        if (!empty($password)) {
            $password = htmlspecialchars($password, ENT_QUOTES);

            //Encrypt paprol
            $password = md5($password . "top_secret");
        } else {
            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Votre mot de passe</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/form_register.php");

            //Removable script
            exit();
        }

    } else {
        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Mot de passe manquant</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/fr/form_register.php");

        //Removable script
        exit();
    }
    
    if (isset($_POST["sales"])) {

        //We cut the spaces from the beginning and from the end of the line.
        $sales = trim($_POST["sales"]);

        if (!empty($sales)) {
            // For security, we convert special characters into HTML entities.
            $sales = htmlspecialchars($sales, ENT_QUOTES);
        } else {

            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Veuillez accepter les conditions de vente</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/form_register.php");

            //Removable script
            exit();
        }


    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Veuillez cocher les conditions de vente</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/fr/form_register.php");

        //Removable script
        exit();
    }
    
     if (isset($_POST["privacy"])) {

        //We cut the spaces from the beginning and from the end of the line.
        $privacy = trim($_POST["privacy"]);

        if (!empty($privacy)) {
            // For security, we convert special characters into HTML entities.
            $privacy = htmlspecialchars($privacy, ENT_QUOTES);
        } else {

            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Veuillez accepter les règles de confidentialité</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/form_register.php");

            //Removable script
            exit();
        }


    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Veuillez cocher les règles de confidentialité</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/fr/form_register.php");

        //Removable script
        exit();
    }

    //We delete users from the users table, which have not confirmed their mail within 24 hours.
    $query_delete_users = $mysqli->query("DELETE FROM `users` WHERE `email_status` = 0 AND `date_registration` < (NOW() - INTERVAL 1 DAY)");
    if (!$query_delete_users) {
        exit("<p><strong><b>Oops !</b></strong> Impossible d'effacer le compte périmé. Error code: " . $mysqli->errno. "</p>");
    }
    //Request to add a user to the database
    $result_query_insert = $mysqli->query("INSERT INTO `users` (type_account, company_name, website, first_name, last_name, civilitye, your_functions, email, password, sales_chbox, privacy_chbox) VALUES ('" . $type_account . "', '" . $company_name . "', '" . $website . "', '" . $first_name . "', '" . $last_name . "', '" . $civilitye. "', '" . $your_functions . "', '" . $email . "','" . $password . "', '" . $sales. "', '" . $privacy."')");

    if (!$result_query_insert) {
        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Désolés! Une erreur s'est produite dans le processus d'ajout de vos informations dans notre base de données. SVP, veuillez recommencer ou nous transmettre vos informations par courriel. Merci beaucoup. </p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/fr/form_register.php");

        //Removable script
        exit();
    } else {
        //We remove users from the confirm_users table that did not confirm their email within 24 hours.
        $query_delete_confirm_users = $mysqli->query("DELETE FROM `confirm_users` WHERE `date_registration` < (NOW() - INTERVAL 1 DAY)");
        if (!$query_delete_confirm_users) {
            exit("<p><strong><b>Oops !</b></strong> Impossible d'effacer le compte périmé. Error code: " . $mysqli->errno . "</p>");
        }

        //We make an encrypted and unique token
        $token = md5($email . time());
        //Adding data to the table confirm_users
        $query_insert_confirm = $mysqli->query("INSERT INTO `confirm_users` (email, token) VALUES ('" . $email . "', '" . $token . "') ");

        if (!$query_insert_confirm) {
            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Une erreur s'est produite lors de l'ajout de vos informations dans notre base de données  (confirmation)</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/fr/form_register.php");

            //Removable script
            exit();
        } else {
                
                
            
        /* recipients */
        $to= $email;

        /* topic / subject */
        $subject = "Confirmation Quantest";

            /* message */
            $message = '
            <html>
            <head>
             <title>Votre compte utilisateur a été créé </title>
            </head>
            <body>
            <p> Bonjour! <br/> <br/> Aujourd\'hui ' . date("d.m.Y", time()) . ', Votre adresse email a été utilisée pour un enregistrement sur l\'interface de notre Système Expert <a href="' . $address_site . '">' . $_SERVER['HTTP_HOST'] . '</a>. Si c\'était vous, SVP, veuillez cliquer sur le lien ci-après afin de valider votre compte utilisateur. <a href="' . $address_site . '/lang/fr/activation.php?token=' . $token . '&email=' . $email . '">' . $address_site . 'lang/fr/activation/' . $token . '</a> <br/> <br/> Sinon vous pouvez ignorer ce courriel. <br/> <br/> <strong>Attention!</strong> Le lien de validation doit être cliqué endeans 24 heures. Après ce délai les données enregistrées seront effacées de la base de données.</p>
            </body>
            </html>
            ';
            
            /* To send HTML mail you can set the Content-type header. */
            $headers= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
            
            /* additional caps */
            $headers .= "From: Quantest <amaindroite@gmail.com>\r\n";
            $headers .= 'Cc: amaindroite@gmail.com\r\n';
        
            //We send a message with a link to confirm the registration to the specified mail and check whether it was sent successfully or not.
            if (mail($to, $subject, $message, $headers)) {
                $_SESSION["success_messages"] = "<h4 class='success_message'><strong>Félicitations! L'enregistrement a été complété avec succès. </strong></h4><p class='success_message'> Il vous reste simplement à valider votre adresse en cliquant sur le lien que nous vous avons envoyé ici: " . $email . " </p>";

                //We send the user to the registration page and remove the registration form
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: " . $address_site . "lang/fr/form_register.php?hidden_form=1");
                exit();

            } else {
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Désolés! Votre adresse email n'a pas été confirmée dans les 24h de son envoi. SVP, veuillez relancer votre enregistrement et valider votre adresse email dans les 24h. Merci de votre compréhension." . $email . $message ." </p>";
            }

            // Completion of the request to add a user to the users table
            //$result_query_insert->close();

            // Completion of the request to add a user to the confirm_users table
            //$query_insert_confirm->close();
        }
    }

    //Close the connection to the database
    $mysqli->close();

    //We send the user to the registration page
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . $address_site . "lang/fr/form_register.php");

    exit();

} else {

    exit("<p><strong>Oops!</strong> La page demandée ne peut être consultée hors connexion. S'il vous plaît, veuillez revenir sur la <a href=" . $address_site . "> page d\'accueil </a> et vous connecter.</p>");
}

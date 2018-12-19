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
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Per favore, sei un datore di lavoro o un'agenzia?</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/it/form_register.php");

            //Removable script
            exit();
        }


    } else {
        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Scegli se Datore di lavoro o sua Agenzia</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/it/form_register.php");

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
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Il nome dell'Azienda già esiste</p>";

                    //We return the user to the registration page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: " . $address_site . "lang/it/form_register.php");

                } else {
                    // Save the error message to the session.
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >server error</p>";

                    //We return the user to the registration page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: " . $address_site . "lang/it/form_register.php");
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
            $_SESSION["error_messages"] .= "<p class='mesage_error' Nome Azienda</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/it/form_register.php");

            //Removable script
            exit();
        }

    } else {
        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Nome azienda mancante</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/it/form_register.php");

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
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Nome sito Azienda o Agenzia </p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/it/form_register.php");

            //Removable script
            exit();
        }


    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Il nome del sito è mancante</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/it/form_register.php");

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
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Digita il tuo nome</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/it/form_register.php");

            //Removable script
            exit();
        }


    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Nome mancante</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/it/form_register.php");

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
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Digita il tuo cognome</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/it/form_register.php");

            //Removable script
            exit();
        }


    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Cognoe mancante</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/it/form_register.php");

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
            $_SESSION["error_messages"] .= "<p class='mesage_error'>La tua civiltà</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/it/form_register.php");

            //Removable script
            exit();
        }


        } else {
            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Civile mancante</p>";
    
            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/it/form_register.php");
    
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
            $_SESSION["error_messages"] .= "<p class='mesage_error' >La tua funzione</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/it/form_register.php");

            //Removable script
            exit();
        }


    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Funzione mancante</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/it/form_register.php");

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
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Indirizzo email non valido</p>";

                //We return the user to the registration page
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: " . $address_site . "lang/it/form_register.php");

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
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Questo indirizzo email è già registrato</p>";

                    //We return the user to the registration page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: " . $address_site . "lang/it/form_register.php");

                } else {
                    // Save the error message to the session.
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >server error</p>";

                    //We return the user to the registration page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: " . $address_site . "lang/it/form_register.php");
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
            $_SESSION["error_messages"] .= "<p class='mesage_error' >La tua email professionale</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/it/form_register.php");

            //Removable script
            exit();
        }

    } else {
        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Indirizzo email mancante</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/it/form_register.php");

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
        header("Location: " . $address_site . "lang/it/form_register.php");

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
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Password errata</p>";

                //We return the user to the registration page
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: " . $address_site . "lang/it/form_register.php");

                //Removable script
                exit();
            }

        } else {
            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Ridigita la password</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/it/form_register.php");

            //Removable script
            exit();
        }

        if (!empty($password)) {
            $password = htmlspecialchars($password, ENT_QUOTES);

            //Encrypt paprol
            $password = md5($password . "top_secret");
        } else {
            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >La tua password</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/it/form_register.php");

            //Removable script
            exit();
        }

    } else {
        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Password mancante</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/it/form_register.php");

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
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Pregasi accettare le condizioni di vendita</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/it/form_register.php");

            //Removable script
            exit();
        }


    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Pregasi cliccare casella condizioni di vendita</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/it/form_register.php");

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
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Pregasi accettare le regole sulla privacy</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/it/form_register.php");

            //Removable script
            exit();
        }


    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Pregasi cliccare sulla casella privacy</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/it/form_register.php");

        //Removable script
        exit();
    }

    //We delete users from the users table, which have not confirmed their mail within 24 hours.
    $query_delete_users = $mysqli->query("DELETE FROM `users` WHERE `email_status` = 0 AND `date_registration` < (NOW() - INTERVAL 1 DAY)");
    if (!$query_delete_users) {
        exit("<p><strong><b>Oops !</b></strong> Impossibile eliminare l'account scaduto. Error code: " . $mysqli->errno. "</p>");
    }
    //Request to add a user to the database
    $result_query_insert = $mysqli->query("INSERT INTO `users` (type_account, company_name, website, first_name, last_name, civilitye, your_functions, email, password, sales_chbox, privacy_chbox) VALUES ('" . $type_account . "', '" . $company_name . "', '" . $website . "', '" . $first_name . "', '" . $last_name . "', '" . $civilitye. "', '" . $your_functions . "', '" . $email . "','" . $password . "', '" . $sales. "', '" . $privacy."')");

    if (!$result_query_insert) {
        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Sorry! Si è verificato un errore nel processo di aggiunta delle tue informazioni nel database. Per favore, riprova o inviale tramite email. Provvederemo a risolvere. </p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/it/form_register.php");

        //Removable script
        exit();
    } else {
        //We remove users from the confirm_users table that did not confirm their email within 24 hours.
        $query_delete_confirm_users = $mysqli->query("DELETE FROM `confirm_users` WHERE `date_registration` < (NOW() - INTERVAL 1 DAY)");
        if (!$query_delete_confirm_users) {
            exit("<p><strong><b>Oops !</b></strong> Impossibile eliminare l'account scaduto (riconferma). Error code: " . $mysqli->errno . "</p>");
        }

        //We make an encrypted and unique token
        $token = md5($email . time());
        //Adding data to the table confirm_users
        $query_insert_confirm = $mysqli->query("INSERT INTO `confirm_users` (email, token) VALUES ('" . $email . "', '" . $token . "') ");

        if (!$query_insert_confirm) {
            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Si è verificato un errore durante la trasmissione dati verso il server. </p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/it/form_register.php");

            //Removable script
            exit();
        } else {
                
                
            
        /* recipients */
        $to= $email;

        /* topic / subject */
        $subject = "Conferma Quantest";

            /* message */
            $message = '
            <html>
            <head>
             <title>Il tuo Account Quantest è stato creato </title>
            </head>
            <body>
            <p> Salve! <br/> <br/> Today ' . date("d.m.Y", time()) . ', La tua email è stata utilizzata per una iscrizione sul nostro Sistema Esperto <a href="' . $address_site . '">' . $_SERVER['HTTP_HOST'] . '</a>. Se sei stato (stata) tu, puoi cliccare sul link a seguito per convalidare il tuo account utente. <a href="' . $address_site . '/lang/it/activation.php?token=' . $token . '&email=' . $email . '">' . $address_site . 'lang/it/activation/' . $token . '</a> <br/> <br/> Nel caso contrario puoi ignorare questa email. <br/> <br/> <strong>Attenzione!</strong> Il link è valido per 24 ore. A tempo scaduto senza convalida i dati registrati saranno automaticamente cancellati.</p>
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
                $_SESSION["success_messages"] = "<h4 class='success_message'><strong>Complimenti! La registrazione è avvenuta con successo. </strong></h4><p class='success_message'> Ora devi confermare l'indirizzo email inserito. Per fare questo, per favore, clicca sul link nel messaggio che hai ricevuto per posta: " . $email . " </p>";

                //We send the user to the registration page and remove the registration form
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: " . $address_site . "lang/it/form_register.php?hidden_form=1");
                exit();

            } else {
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Spiacenti! La tua email non è stata confermata entro 24 ore come previsto. Puoi nuovamente rilanciare la registrazione e convalidare la tua email nel miglior tempo entro 24 ore. Grazie per la tua comprensione" . $email . $message ." </p>";
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
    header("Location: " . $address_site . "lang/it/form_register.php");

    exit();

} else {

    exit("<p><strong>Oops!</strong> La pagina richiesta non è disponibile offline. Pregasi ritornare ed accedervi tramite la <a href=" . $address_site . "> Home </a>.</p>");
}

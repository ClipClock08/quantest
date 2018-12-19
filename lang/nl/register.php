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
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Alsjeblieft, ben jij een werkgever of een agentuur?</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/nl/form_register.php");

            //Removable script
            exit();
        }


    } else {
        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Kiezen</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/nl/form_register.php");

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
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Bedrijfsnaam bestaat al</p>";

                    //We return the user to the registration page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: " . $address_site . "lang/nl/form_register.php");

                } else {
                    // Save the error message to the session.
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >server error</p>";

                    //We return the user to the registration page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: " . $address_site . "lang/nl/form_register.php");
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
            $_SESSION["error_messages"] .= "<p class='mesage_error' Naam van bedrijf</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/nl/form_register.php");

            //Removable script
            exit();
        }

    } else {
        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Behalve bedrijfsnaam</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/nl/form_register.php");

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
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Geef de website van het bedrijf op </p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/nl/form_register.php");

            //Removable script
            exit();
        }


    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Behalve website veld</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/nl/form_register.php");

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
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Vul alstublieft uw voornaam in</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/nl/form_register.php");

            //Removable script
            exit();
        }


    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Behalve voonaam</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/nl/form_register.php");

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
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Vul alstublieft uw naam in</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/nl/form_register.php");

            //Removable script
            exit();
        }


    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Behalve naam</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/nl/form_register.php");

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
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Civility status</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/nl/form_register.php");

            //Removable script
            exit();
        }


        } else {
            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Behalve civility</p>";
    
            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/nl/form_register.php");
    
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
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Uw functie</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/nl/form_register.php");

            //Removable script
            exit();
        }


    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Behalve functie</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/nl/form_register.php");

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
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Ongeldige e-mail</p>";

                //We return the user to the registration page
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: " . $address_site . "lang/nl/form_register.php");

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
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >E-mail bestaat al</p>";

                    //We return the user to the registration page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: " . $address_site . "lang/nl/form_register.php");

                } else {
                    // Save the error message to the session.
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >server error</p>";

                    //We return the user to the registration page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: " . $address_site . "lang/nl/form_register.php");
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
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Uw professionele e-mailadres</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/nl/form_register.php");

            //Removable script
            exit();
        }

    } else {
        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Behalve Email</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/nl/form_register.php");

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
        header("Location: " . $address_site . "lang/nl/form_register.php");

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
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Ongeldig wachtwoord</p>";

                //We return the user to the registration page
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: " . $address_site . "lang/nl/form_register.php");

                //Removable script
                exit();
            }

        } else {
            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Herhaal uw wachtwoord</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/nl/form_register.php");

            //Removable script
            exit();
        }

        if (!empty($password)) {
            $password = htmlspecialchars($password, ENT_QUOTES);

            //Encrypt paprol
            $password = md5($password . "top_secret");
        } else {
            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Uw wachtwoord</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/nl/form_register.php");

            //Removable script
            exit();
        }

    } else {
        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Behalve wachtwoordveld</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/nl/form_register.php");

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
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Alstublieft, lees en accepteer regels voor verkoop</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/nl/form_register.php");

            //Removable script
            exit();
        }


    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Behalve vuile checkbox</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/nl/form_register.php");

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
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Alstublieft, lees en accepteer regels voor privacy</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/nl/form_register.php");

            //Removable script
            exit();
        }


    } else {

        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Behalve privacy-checkbox</p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/nl/form_register.php");

        //Removable script
        exit();
    }

    //We delete users from the users table, which have not confirmed their mail within 24 hours.
    $query_delete_users = $mysqli->query("DELETE FROM `users` WHERE `email_status` = 0 AND `date_registration` < (NOW() - INTERVAL 1 DAY)");
    if (!$query_delete_users) {
        exit("<p><strong><b>Oops !</b></strong> Verwijderen van verlopen account is mislukt. Error code: " . $mysqli->errno. "</p>");
    }
    //Request to add a user to the database
    $result_query_insert = $mysqli->query("INSERT INTO `users` (type_account, company_name, website, first_name, last_name, civilitye, your_functions, email, password, sales_chbox, privacy_chbox) VALUES ('" . $type_account . "', '" . $company_name . "', '" . $website . "', '" . $first_name . "', '" . $last_name . "', '" . $civilitye. "', '" . $your_functions . "', '" . $email . "','" . $password . "', '" . $sales. "', '" . $privacy."')");

    if (!$result_query_insert) {
        // Save the error message to the session.
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Sorry! Er is een fout opgetreden tijdens het toevoegen van uw gegevens aan onze database. Probeer het opnieuw of stuur ons uw informatie per e-mail. Heel hartelijk bedankt. </p>";

        //We return the user to the registration page
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "lang/nl/form_register.php");

        //Removable script
        exit();
    } else {
        //We remove users from the confirm_users table that did not confirm their email within 24 hours.
        $query_delete_confirm_users = $mysqli->query("DELETE FROM `confirm_users` WHERE `date_registration` < (NOW() - INTERVAL 1 DAY)");
        if (!$query_delete_confirm_users) {
            exit("<p><strong><b>Oops !</b></strong> Verwijderen van verlopen account is mislukt. Error code: " . $mysqli->errno . "</p>");
        }

        //We make an encrypted and unique token
        $token = md5($email . time());
        //Adding data to the table confirm_users
        $query_insert_confirm = $mysqli->query("INSERT INTO `confirm_users` (email, token) VALUES ('" . $email . "', '" . $token . "') ");

        if (!$query_insert_confirm) {
            // Save the error message to the session.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Sorry! Er is een fout opgetreden tijdens het toevoegen van uw gegevens aan onze database. Probeer het opnieuw.</p>";

            //We return the user to the registration page
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "lang/nl/form_register.php");

            //Removable script
            exit();
        } else {
                
                
            
        /* recipients */
        $to= $email;

        /* topic / subject */
        $subject = "Quantest confirmed";

            /* message */
            $message = '
            <html>
            <head>
             <title>Uw QUANTEST-gebruikersaccount is aangemaakt </title>
            </head>
            <body>
            <p> Hallo! <br/> <br/> Vandaag ' . date("d.m.Y", time()) . ', Iemand heeft zich geregistreerd op de interface van het expertsysteem.
 <a href="' . $address_site . '">' . $_SERVER['HTTP_HOST'] . ' gebruikmakend van uw email.</a>. Als jij het was, klik dan op de onderstaande link om je gebruikersaccount te valideren. <a href="' . $address_site . '/lang/nl/activation.php?token=' . $token . '&email=' . $email . '">' . $address_site . 'lang/nl/activation/' . $token . '</a> <br/> <br/> Anders negeer je deze e-mail als je dat niet was. <br/> <br/> <strong>Waarschuwing!</strong> De link is 24 uur geldig. Hierna wordt uw account uit de database verwijderd.</p>
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
                $_SESSION["success_messages"] = "<h4 class='success_message'><strong>Gefeliciteerd! Registratie succesvol afgerond! </strong></h4><p class='success_message'> Nu moet je het ingevoerde e-mailadres bevestigen. Klik hiervoor op de link in het bericht dat u per post hebt ontvangen: " . $email . " </p>";

                //We send the user to the registration page and remove the registration form
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: " . $address_site . "lang/nl/form_register.php?hidden_form=1");
                exit();

            } else {
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Sorry! Uw e-mailadres is niet binnen 24 uur na verzending bevestigd. Start uw registratie opnieuw en bevestig uw e-mailadres binnen 24 uur. Bedankt voor uw begrip." . $email . $message ." </p>";
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
    header("Location: " . $address_site . "lang/nl/form_register.php");

    exit();

} else {

    exit("<p><strong>Oops!</strong> De gevraagde pagina kan niet offline worden bekeken. Ga alstublieft terug naar de <a href=" . $address_site . "> startpagina </a> en log in.</p>");
}

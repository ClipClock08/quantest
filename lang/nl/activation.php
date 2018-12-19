<?php 


//Ajouter un utilisateur pour se connecter à la base de données

require_once("dbconnect.php");


//Vérifie s'il existe une variable de token dans le tableau GET global.

if(isset($_GET['token']) && !empty($_GET['token'])){

    $token = $_GET['token'];

}else{

    exit("<p><strong>Oops! De verificatiecode ontbreekt.</strong> <br/> Alsjeblieft, valideer de validatielink verzonden naar het e-mailadres aangegeven tijdens registratie.</p>");

}



//Vérifie s'il existe une variable de courrier électronique dans le tableau GET global.

if(isset($_GET['email']) && !empty($_GET['email'])){

    $email = $_GET['email'];

}else{

    exit("<p><strong>Oops! Het e-mailadres ontbreekt.</strong></p>");

}



//Nous supprimons les utilisateurs de la table users qui n'ont pas confirmé leur courrier dans les 24 heures.

$query_delete_users = $mysqli->query("DELETE FROM `users` WHERE `email_status` = 0 AND `date_registration` < ( NOW() - INTERVAL 1 DAY )");

if(!$query_delete_users){

    exit("<p><strong>Oops! De tijd om uw registratie te valideren is verlopen. Voer uw registratie opnieuw uit en klik binnen 24 uur op de bevestigingslink. Code erreur: ".$mysqli->errno."</p>");

}


//Nous supprimons les utilisateurs de la table confirm_users, qui n'ont pas confirmé leur courrier dans les 24h.

$query_delete_confirm_users = $mysqli->query("DELETE FROM `confirm_users` WHERE `date_registration` < ( NOW() - INTERVAL 1 DAY)");

if(!$query_delete_confirm_users){

    exit("<p><strong>Oops</strong> Het verlopen account is niet verwijderd. Code erreur: ".$mysqli->errno."</p>");

}



//Make a request to select a token from the confirm_users table
$query_select_user = $mysqli->query("SELECT `token` FROM `confirm_users` WHERE `email` = '".$email."'");


//If there are no errors in the request
if(($row = $query_select_user->fetch_assoc()) != false){


    //Si tel utilisateur existe. If such user exists
    if($query_select_user->num_rows == 1){

        //Vérifier si le token correspond. Check if token matches. 
        if($token == $row['token']){

            //Nous mettons à jour le statut de l'adresse postale 
            $query_update_user = $mysqli->query("UPDATE `users` SET `email_status` = 1 WHERE `email` = '".$email."'");

            if(!$query_update_user){

                exit("<p><strong>Oops! Kan de status van het e-mailadres van de gebruiker niet bijwerken.</strong> Code erreur: ".$mysqli->errno."</p>");

            }else{

                //Supprimer les données utilisateur de la table temporaire confirm_users
                $query_delete = $mysqli->query("DELETE FROM `confirm_users` WHERE `email` = '".$email."'");

                if(!$query_delete){

                    exit("<p><strong>Oops!</strong> Niet in staat om de gebruikersgegevens van de tijdelijke tabel te verwijderen. Code erreur: ".$mysqli->errno."</p>");

                }else{

                    //Connecting caps. Casquettes de connexion.
                    require_once("header_q.php");

                        //We display a message that the mail has been successfully confirmed.
                        echo '<h1 class="success_message text_center">Email adres succesvol geverifieerd!</h1>';
                        echo '<p class="text_center">U kunt nu <a href="form_auth.php">inloggen</a> op uw account..</p>';

                    //Se connecter au footer
                    require_once("footer.php");
                }

                // Abandon of the request to delete data from the table confirm_users
                //$query_delete->close();
            }

            // Achèvement de l'état de la demande de mise à jour de l'adresse postale
            //$query_update_user->close();



        }else{ //if($token == $row['token'])
            exit("<p><strong>Oops!</strong> Ongeldige verificatiecode.</p>");
        }

    }else{ //if($query_select_user->num_rows == 1)
        exit("<p><strong>Oops! Deze gebruiker is onbekend.</strong> </p>");
    }

}else{ //if(($row = $query_select_user->fetch_assoc()) != false)
    //Sinon, s'il y a des erreurs dans la requête à la base de données
    exit("<p><strong>Oops! Het is niet gelukt om een gebruiker in de database te selecteren. </strong></p>");
}


// Achèvement de la demande de sélection de l'utilisateur à partir de la table users
//$query_select_user->close();

//Fermer la connexion à la base de données
$mysqli->close();

?>
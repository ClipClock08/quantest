<?php

    //Add a file to connect to the database
    require_once("dbconnect.php");

    //We declare a cell to add errors that may occur during form processing.
    $_SESSION["error_messages"] = '';

    //Declare a cell to add successful messages
    $_SESSION["success_messages"] = '';


    /*
        Check if the form has been submitted, that is, if the Enter button has been clicked. If yes, then we go further, if not, then we will display to the user an error message, that he went to this page directly.
    */
    if(isset($_POST["submitButtonName"]) && !empty($_POST["submitButtonName"])){


        //(2) Place to handle mailing address
            if(isset($_POST["email"])){

                //We cut the spaces from the beginning and from the end of the line.
                $email = trim($_POST["email"]);

                if(!empty($email)){
                    $email = htmlspecialchars($email, ENT_QUOTES);

                    //Check the format of the received email address using a regular expression.
                    $reg_email = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i";

                    //If the format of the received postal address does not match the regular expression
                    if( !preg_match($reg_email, $email)){
                        // Save the error message to the session. 
                        $_SESSION["error_messages"] .= "<p class='mesage_error' >You entered an incorrect email</p>";
                        
                        //We return the user to the login page
                        header("HTTP/1.1 301 Moved Permanently");
                        header("Location: ".$address_site."lang/nl/form_auth.php");

                        //Removable script
                        exit();
                    }

                }else{
                    // Save the error message to the session. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >The field for entering the mailing address (email) should not be empty.</p>";
                    
                    //We return the user to the registration page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."lang/nl/form_register.php");

                    //Removable script
                    exit();
                }
                

            }else{
                // Save the error message to the session. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Missing Email field</p>";
                
                //We return the user to the login page
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."lang/nl/form_auth.php");

                //Removable script
                exit();
            }

            
             //(3) Password processing location
            if(isset($_POST["password"])){

                //We cut the spaces from the beginning and from the end of the line.
                $password = trim($_POST["password"]);

                if(!empty($password)){
                    $password = htmlspecialchars($password, ENT_QUOTES);

                    //Encrypt password
                    $password = md5($password."top_secret");
                }else{
                    // Save the error message to the session. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Password</p>";
                    
                    //We return the user to the registration page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."lang/nl/form_auth.php");

                    //Removable script
                    exit();
                }
                
            }else{
                // Save the error message to the session. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Missing password field</p>";
                
                //We return the user to the registration page
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."lang/nl/form_auth.php");

                //Removable script
                exit();
            }
            
            //We delete users from the users table, which have not confirmed their mail within 24 hours.
            $query_delete_users = $mysqli->query("DELETE FROM `users` WHERE `email_status` = 0 AND `date_registration` < ( NOW() - INTERVAL 1 DAY )");
            if(!$query_delete_users){
                exit("<p><strong>Error!</strong> Failed to delete expired account. Error code: ".$mysqli->errno."</p>");
            }


            //We remove users from the confirm_users table that did not confirm their email within 24 hours.
            $query_delete_confirm_users = $mysqli->query("DELETE FROM `confirm_users` WHERE `date_registration` < ( NOW() - INTERVAL 1 DAY )");
            if(!$query_delete_confirm_users){
                exit("<p><strong>Error!</strong> Failed to delete expired account(confirm). Error code: ".$mysqli->errno."</p>");
            }

            // (4) Place for making a query to the database
             // Request to the database on the user's sample.
            $result_query_select = $mysqli->query("SELECT * FROM `users` WHERE email = '".$email."' AND password = '".$password."'");

            if(!$result_query_select){
                // Save the error message to the session. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Request failed to fetch user from DB</p>";
                
                //We return the user to the registration page

                //Removable script
                exit();
            }else{

                //We check if there is no user in the database with such data, then we display an error message
                if($result_query_select->num_rows == 1){
                    
                    //Check whether the specified email is confirmed
                    while(($row = $result_query_select->fetch_assoc()) !=false){
                        
                        //If email is not confirmed
                        if((int)$row["email_status"] == 0){

                            // Save the error message to the session. 
                            $_SESSION["error_messages"] = "<p class='mesage_error' >You are registered, but your email address is not confirmed. To confirm your mail, follow the link from the email you received after registration..</p>
                                <p><strong>Attention!</strong> The link to confirm the mail is valid 24 hours from the time of registration. If you do not confirm your email during this time, your account will be deleted..</p>";

                            
                            //We return the user to the login page
                            header("HTTP/1.1 301 Moved Permanently");
                            header("Location: ".$address_site."lang/nl/form_auth.php");

                            //Removable script
                            exit();

                        }else{
                            //place to add data to the session
                             // If the entered data coincides with the data from the database, then save the login and password to the array of sessions.
                            $_SESSION['email'] = $email;
                            $_SESSION['password'] = $password;

                            //We return the user to the main page
                            header("HTTP/1.1 301 Moved Permanently");
                            header("Location: ".$address_site."../indexNL.php");

                            //Removable script
                            exit();
                        }

                    }


                    

                }else{
                    
                    // Save the error message to the session. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Incorrect username and / or password</p>";
                    
                    //We return the user to the login page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."lang/nl/form_auth.php");

                    //Removable script
                    exit();
                }
            }

        }


    else{
        exit("<p><strong>Oops!</strong> You visited this page directly, so there is no data to process. You can go to <a href=".$address_site."> Main page </a>.</p>");
    }


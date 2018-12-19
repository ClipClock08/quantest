<?php

    //Add a file to connect to the database
    require_once("../dbconnect.php");

    //We declare a cell to add errors that may occur during form processing.
    $_SESSION["error_messages"] = '';

    //Declare a cell to add successful messages
    $_SESSION["success_messages"] = '';


    /*
        Check if the form has been submitted, that is, if the Enter button has been clicked. If yes, then go ahead, if not, then we will display to the user an error message, that he went to this page directly.
    */
    if(isset($_POST["submitButtonName"]) && !empty($_POST["submitButtonName"])){


        //(2) Place to handle postal address
            if(isset($_POST["email"])){

                //We cut the spaces from the beginning and from the end of the line
                $email = trim($_POST["email"]);

                if(!empty($email)){
                    $email = htmlspecialchars($email, ENT_QUOTES);

                    //Check the format of the received email address using a regular expression.
                    $reg_email = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i";

                    //If the format of the received postal address does not match the regular expression
                    if( !preg_match($reg_email, $email)){
                        // Save the error message to the session. 
                        $_SESSION["error_messages"] .= "<p class='mesage_error' >Incorrect email</p>";
                        
                        //We return the user to the login page
                        header("HTTP/1.1 301 Moved Permanently");
                        header("Location: ".$address_site."admin/admin_auth.php");

                        //Removable script
                        exit();
                    }

                }

            }else{
                // Save the error message to the session. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Input Email</p>";
                
                //We return the user to the login page
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."admin/admin_auth.php");

                //Removable script
                exit();
            }

            
             //(3) Password processing location
            if(isset($_POST["password"])){

                //We cut the spaces from the beginning and from the end of the line
                $password = trim($_POST["password"]);

                if(!empty($password)){
                    $password = htmlspecialchars($password, ENT_QUOTES);

                    //Encrypt password
                    $password = md5($password."top_secret");
                }else{
                    // Save the error message to the session.
                    $_SESSION["error_messages"] .= "<p class='mesage_error' ><b>Oops! Veuillez taper votre password..</b></p>";
                    
                    //We return the user to the registration page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."admin/admin_auth.php");

                    //Removable script
                    exit();
                }
                
            }else{
                // Save the error message to the session. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Missing password field !</p>";
                
                //We return the user to the registration page
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."admin/admin_auth.php");

                //Removable script
                exit();
            }
    
            //Request to the database on the user's selection.
            $result_query_select = $mysqli->query("SELECT * FROM `admin` WHERE email = '".$email."' AND password = '".$password."'");

            if(!$result_query_select){
                // Save the error message to the session. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Request failed to fetch user from DB</p>";
                
                //We return the user to the registration page

                //Removable script
                exit();
            }else{

                //We check if there is no user in the database with such data, then we display an error message
                if($result_query_select->num_rows == 1){
                    
                    
                       
                            //place to add data to the session
                            // If the entered data coincides with the data from the database, then we save the login and password into an array of sessions.
                            $_SESSION['email'] = $email;
                            $_SESSION['password'] = $password;

                            //We return the user to the main page
                            header("HTTP/1.1 301 Moved Permanently");
                            header("Location: ".$address_site."admin/");         

                }else{
                    
                    // Save the error message to the session. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error' ><b>Incorrect username and / or password</b></p>";
                    
                    //We return the user to the login page
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."admin/admin_auth.php");

                    //Removable script
                    exit();
                }
            }

        }


    else{
        exit("<p><strong>Oops!</strong> The requested page is only accessible when the user is logged on. Please, visit the <a href='index.php'> Main page </a> and log in.</p>");
    }


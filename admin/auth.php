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

if (isset($_POST["submitButtonName"]) && !empty($_POST["submitButtonName"])) {

    //(2) Place to handle mailing address
    if (isset($_POST["email"])) {

        //We cut the spaces from the beginning and from the end of the line.
        $email = trim($_POST["email"]);

        if (!empty($email)) {
            $email = htmlspecialchars($email, ENT_QUOTES);

            //Check the format of the received email address using a regular expression.
            $reg_email = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i";


            //(3) Password processing location
            if (isset($_POST["password"])) {

                //We cut the spaces from the beginning and from the end of the line.
                $password = trim($_POST["password"]);

                // (4) Place for making a query to the database
                //Request to the database on the user's selection.
                $result_query_select = $mysqli->query("SELECT * FROM `users` WHERE email = '" . $email . "' AND password = '" . $password . "'");

            } else {

                //Проверяем, если в базе нет пользователя с такими данными, то выводим сообщение об ошибке
                if ($result_query_select->num_rows == 1) {

                    //Проверяем, подтвержден ли указанный email
                    while (($row = $result_query_select->fetch_assoc()) != false) {
                        $_SESSION['name'] = $row["first_name"];
                        $_SESSION['surname'] = $row["last_name"];
                        $_SESSION['id'] = $row['id'];

                        //If email is not confirmed
                        if ((int)$row["email_status"] == 0) {
                            // Save the error message to the session.
                            $_SESSION["error_messages"] = "<p class='mesage_error' >You are registered, but your email address is not confirmed. To confirm your mail, follow the link from the email you received after registration..</p>
                                    <p><strong>Attention!</strong> The link to confirm the mail is valid 24 hours from the time of registration. If you do not confirm your email during this time, your account will be deleted..</p>";


                            //We return the user to the login page
                            header("HTTP/1.1 301 Moved Permanently");
                            header("Location: " . $address_site . "lang/en/view/auth/form_auth.php");

                            //Removable script
                            exit();


                        } else {
                            //место для добавления данных в сессию
                            // Если введенные данные совпадают с данными из базы, то сохраняем логин и пароль в массив сессий.
                            $_SESSION['email'] = $email;
                            $_SESSION['password'] = $password;

                            //Возвращаем пользователя на главную страницу
                            header("HTTP/1.1 301 Moved Permanently");
                            header("Location: " . $address_site . "index.php");

                            //Removable script
                            exit();
                        }

                    }


                }
            }

        }

    }
}


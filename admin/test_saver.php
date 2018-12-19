<?php
    
    require("../dbconnect.php");

    unset($_SESSION["challenger"]);
    unset($_SESSION["challenger_rec"]);
    
    if(isset($_POST['btnSaveReconversion']) && !empty($_POST['btnSaveReconversion'])){
        echo "<pre>";
            //print_r($_SESSION['rec_save']);
        echo "</pre>";
        $info = $_SESSION['rec_save'];
        
        //sending email
        
        $to = $_SESSION['email'];

        /* тема/subject */
        $subject = "Quantest confirmed";

        /* сообщение */
        $message = '
        <html>
        <head>
         <title>Quantest</title>
        </head>
        <body>
        <p>Best HR Assistant <br/>for Successful Recruiters!!</p>
        <p> Hello! <br/> <br/> Today ' . date("d.m.Y", time()) . ', your test has been completed. <a href="' . $address_site . '">' . $_SERVER['HTTP_HOST'] . '</a> using your email. </p>
        <pre> $info  </pre>
        </body>
        </html>
        ';
        
        /* Для отправки HTML-почты вы можете установить шапку Content-type. */
        $headers= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        
        /* дополнительные шапки */
        $headers .= "From: Quantest <amaindroite@gmail.com>\r\n";
        $headers .= 'Cc: amaindroite@gmail.com\r\n';
    
        
        if (mail($to, $subject, $message, $headers)) {
            $_SESSION["success_messages"] = "<h4 class='success_message'><strong>Test completed successfully!!!</strong></h4><p class='success_message'> You received in the mail " . $email . " </p>";

            //Отправляем пользователя на страницу регистрации и убираем форму регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $address_site . "admin/test_saver_php");
            exit();

        } else {
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Error while sending email with confirmation link to email " . $email ." </p>";
        }

    }
?>

ici sera le traitement de l'ajout d'informations sur le compte d'utilisateur
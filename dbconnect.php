<?php
    // Specify the encoding
    header('Content-Type: text/html; charset=utf-8');

    $server = "localhost"; /* hostname, if we work on a local server, then we specify localhost */
    $username = "alex"; /* DB username */
    $password = ""; /* Database user password, if the user does not have a password then leave empty */
    $database = "quantest_test"; /* The name of the database you created */
 
    // Connecting to the database via MySQLi
    $mysqli = new mysqli($server, $username, $password, $database);

    // Connecting to the database via MySQLi 
    if (mysqli_connect_errno()) {
        echo "<p><strong>Error connecting to the database</strong>. Error description: ".mysqli_connect_error()."</p>";
        exit();
    }
   
    session_start();
    
    // Set the connection encoding
    $mysqli->set_charset('utf8');

    //For convenience, we will add a variable here that will contain the name of our site.
    $address_site = "https://quantest.eu/";

    //Email address of the site administrator
    $email_admin = "amaindroite@gmail.com";
?>
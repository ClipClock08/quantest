<?php

$path = $_SERVER['SCRIPT_NAME'];


require("C:\OSPanel\domains\quantest.loc/dbconnect.php");


/*echo "<pre>";
print_r($_SESSION);
echo "</pre>";*/
if ($path == "/" || $path == "/index.php") {

    $pathEn = $address_site . "index.php";

    $pathFr = $address_site . "indexFR.php";

    $pathDe = $address_site . "indexDE.php";

    $pathIt = $address_site . "indexIT.php";

    $pathNl = $address_site . "indexNL.php";

} else {
    $pathEn = $address_site . $path;
    //echo "Оригинал: {$path} <hr />\n";

    //path to French languages
    $pathFr = substr_replace($path, 'fr', 6, 2);
    $pathFr = $address_site . $pathFr;
    //echo $pathFr."<br/>";

    //path to Deutch languages
    $pathDe = substr_replace($path, 'de', 6, 2);
    $pathDe = $address_site . $pathDe;
    //echo $pathDe."<br/>";

    //path to IT languages
    $pathIt = substr_replace($path, 'it', 6, 2);
    $pathIt = $address_site . $pathIt;
    //echo $pathIt."<br/>";

    //path to NL languages
    $pathNl = substr_replace($path, 'nl', 6, 2);
    $pathNl = $address_site . $pathNl;
    //echo $pathNl."<br/>";
}
?>

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="<?php echo($pageTitle); ?>">
    <meta name="description" content="<?php echo($pageDescription); ?>">
    <link rel="stylesheet" href="<?php echo $address_site; ?>css/quantest.css"/>
    <link rel="stylesheet" href="<?php echo $address_site; ?>css/popup.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $address_site; ?>js/script.js"></script>
    <script src="<?php echo $address_site; ?>js/myModal.js"></script>
    <link rel="shortcut icon" type="image/png" href="https://quantest.eu/img/favicon.jpg"/>

    <style>
        * {
            box-sizing: border-box;
        }
    </style>
</head>


<div id="bloc_page">
    <div align="right">
        <nav><a href="<?php echo $pathEn; ?>">EN</a> | <a href="<?php echo $pathFr; ?>">FR</a> | <a
                    href="<?php echo $pathDe; ?>">DE</a> | <a href="<?php echo $pathNl; ?>">NL</a> | <a
                    href="<?php echo $pathIt; ?>">IT</a></nav>
        <?php
        //Check whether the user is authorized.
        if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {
            // if not, then display the block with links to the registration and authorization page
            ?>
            <a href="<?php echo $address_site; ?>lang/en/view/auth/form_register.php">Registration</a> | <a
                    href="<?php echo $address_site; ?>lang/en/view/auth/form_auth.php">Log in</a>
            <div id="auth_data"></div>
            <?php
        } else {
            //If the user is authorized, then output the link Logout
            ?><a href="<?php echo $address_site; ?>lang/en/view/profile.php">Hello! <img
                    src="<?php echo $address_site; ?>img/profile.png">
            <b><?php echo $_SESSION['name'] . " " . $_SESSION['surname']; ?></b></a> | <a
                    href="<?php echo $address_site; ?>lang/en/view/auth/logout.php">Log out</a>

            <?php
        }
        ?>
    </div>
    <div id="bloc_page">
        <header>
            <div id="titre_principal">
                <div id="logo">
                    <a href="<?php echo $address_site; ?>">
                        <img src="<?php echo $address_site; ?>img/logoQuantestPlat.jpg" alt="Logo Quantest"/>
                    </a>
                </div>
                <div id="h2">

                    <h2>Best HR Assistant
                        <br>for Successful Recruiters!</h2>
                </div>

            </div>

            <nav>
                <ul>
                    <li><a href="<?php echo $address_site; ?>lang/en/view/expert_config.php">RECRUITMENT</a></li>
                    <li><a href="<?php echo $address_site; ?>lang/en/view/reconversion_form.php">RETRAINING</a></li>
                    <li><a href="<?php echo $address_site; ?>lang/en/view/reconversion_form.php"><b>Calculate and
                                order</b></a></li>

                </ul>
            </nav>
        </header>
    </div>
    <div class="wrapper">
        <div>
            <body>


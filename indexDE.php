<?php
include("lang/de/header_q.php");
/*
if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
    exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");
}
else{

    $email = $_SESSION["email"];
    $password = $_SESSION["password"];
    $user = $mysqli->query("SELECT `id` FROM `users` WHERE `email`='" . $email . "' AND `password`='" . $password . "'");
    $id_user = mysqli_fetch_array($user);
    $_SESSION['id'] = $id_user['id'];
}

//print_r($_SESSION) ;
*/
?>
    <div align="center">
        <h1>Expertensystem für Ihre Auswahl des besten Kandidaten <br>oder der beste Job, den ein Mitarbeiter erneuern
            kann</h1>
        <h2>Melden Sie sich an und starten Sie QUANTEST um die besten Mitarbeiter auszuw&auml;hlen
            <br>oder die neue ideale Position f&uuml;r einen Mitarbeiter umgliedern</h2>

        <p>
        <h2>Sie k&ouml;nnen zwischen <strong>Rekrutierungstest</strong> oder <strong>Requalifikationstest</strong>
        </h2></p>
        <br>
        <a href="<?php echo $address_site; ?>lang/de/config/expert_config.php"><img
                    src="<?php echo $address_site;?>img/recruitment.jpg" border="1" alt="Rekrutierungstest"
                    name="Rekrutierungstest"></a><img src="<?php echo $address_site;?>img/spacer.gif" height="25" border="0">ODER<img
                src="<?php echo $address_site;?>img/spacer.gif" height="25" border="0"> <a
                href="<?php echo $address_site;?>lang/de/reconversion_form.php"> <img
                    src="<?php echo $address_site;?>img/reconversion.jpg" border="1" alt="Requalifikationstest"
                    name="Requalifikationstest"></a></div>


    <br/>
    <br/>
    <br/>
    <br/>
<?php

include_once("lang/de/footer.php");
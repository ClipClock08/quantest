<?php
include("lang/nl/header_q.php");
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
        <h1>Expert systeem voor het selecteren van de beste kandidaat<br> of de beste positie voor een werknemer te
            herclassificeren</h1>
        <h2>Log in en lanceer QUANTEST om het beste personeel te kiezen<br>
            of de nieuwe ideale positie voor een werknemer te herclassificeren </h2>

        <p>
        <h2>U kunt kiezen tussen <strong>Rekruteringstest</strong> of <strong>Reconversietest</strong></h2></p>
        <br>
        <a href="<?php echo $address_site; ?>lang/nl/config/expert_config.php"><img
                    src="<?php echo $address_site; ?>img/recruitment.jpg" border="1" alt="Rekruteringstest"
                    name="Rekruteringstest"></a><img src="<?php echo $address_site; ?>img/spacer.gif" height="25"
                                                     border="0">OF<img src="<?php echo $address_site; ?>img/spacer.gif"
                                                                       height="25" border="0"> <a
                href="<?php echo $address_site; ?>lang/nl/reconversion_form.php"> <img
                    src="<?php echo $address_site;?>img/reconversion.jpg" border="1" alt="Reconversietest"
                    name="Reconversietest"></a></div>

    <br/>
    <br/>
    <br/>
    <br/>

<?php

include_once("lang/nl/footer.php");
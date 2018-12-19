<?php
include ("header_q.php");
require_once("dbconnect.php");
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

?>

<div align="center">
    <h1>Willkommen an der Schnittstelle f&uuml;r die personalauswahl:<br> <strong>rekrutierung</strong> oder <strong>umschulung</strong></h1>
    <h2>Starten Sie QUANTEST und finden Sie das beste Personal <br>oder den neuen idealen Posten f&uuml;r einen neu einzustufenden Mitarbeiter</h2>
   
   <p> <h2>W&auml;hle zwischen <strong>Rekrutierungstest</strong> oder <strong>Requalifikationstest</strong></h2></p>
	<br>
	<a href="https://quantest.eu/lang/de/config/expert_config.php"><img src="https://quantest.eu/img/recruitment.jpg" border="1" alt="Rekrutierungstest" name="Rekrutierungstest"></a><img src="https://quantest.eu/img/spacer.gif" height="25" border="0">ODER<img src="https://quantest.eu/img/spacer.gif" height="25" border="0"> <a href="https://quantest.eu/lang/de/reconversion_form.php"> <img src="https://quantest.eu/img/reconversion.jpg" border="1" alt="Requalifikationstest" name="Requalifikationstest"></a></div>
<br/>
    <br/>
    <br/>
    <br/>
<?php




include_once ("footer.php");
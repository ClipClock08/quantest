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
    <h1>Welkom bij de Interface voor personeelsselectie: <br><strong>werving</strong> of <strong>reconversie</strong></h1>
    <h2>Start QUANTEST en vind de beste bijdrage aan te werven golfreizen <br>of de ideale positie om te worden toegewezen aan een interne</h2>
    <br>
	<a href="https://quantest.online/lang/nl/config/expert_config.php"><img src="https://quantest.online/img/recruitment.jpg" border="1" alt="Rekruteringstest" name="Rekruteringstest"></a><img src="https://quantest.online/img/spacer.gif" height="25" border="0">OF<img src="https://quantest.online/img/spacer.gif" height="25" border="0"> <a href="https://quantest.online/lang/nl/reconversion_form.php"> <img src="https://quantest.online/img/reconversion.jpg" border="1" alt="Reconversietest" name="Reconversietest"></a></div>

<br/>
    <br/>
    <br/>
    <br/>
<?php




include_once ("footer.php");
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
    <h1>Bienvenue sur l'interface pour la sélection du personnel: <br><strong>recrutement</strong> ou <strong>reconversion</strong></h1>
    <h2>Lancez QUANTEST et trouvez le meilleur personnel <br> ou le nouveau poste idéal pour un collaborateur &agrave; reclasser</h2>
   
   <p> <h2>Choisissez entre <strong>test de recrutement</strong> ou <strong>test de reconversion</strong></h2></p>
	<br>

	<a href="https://quantest.eu/lang/fr/config/expert_config.php"><img src="https://quantest.eu/img/recruitment.jpg" border="1" alt="Test de recrutement" name="Test de recrutement"></a><img src="https://quantest.eu/img/spacer.gif" height="25" border="0">OU<img src="https://quantest.eu/img/spacer.gif" height="25" border="0"> <a href="https://quantest.eu/lang/fr/reconversion_form.php"> <img src="https://quantest.eu/img/reconversion.jpg" border="1" alt="Test de reconversion professionnelle" name="Test de reconversion professionnelle"></a></div>

<br/>
    <br/>
    <br/>
    <br/>
<?php




include_once ("footer.php");
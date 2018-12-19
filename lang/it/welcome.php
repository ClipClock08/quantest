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
    <h1>Benvenuto sull'interfaccia per la selezione del personale: <br><strong>reclutamento</strong> o <strong>riqualificazione</strong></h1>
    <h2>Lancia QUANTEST e trova il miglior collaboratore da assumere <br>o il nuovo impiego ideale per un membro dello staff da riqualificare</h2><br>
   <a href="https://quantest.eu/lang/it/config/expert_config.php"><img src="https://quantest.eu/img/recruitment.jpg" border="1" alt="Test di reclutamento" name="Test di reclutamento"></a><img src="https://quantest.eu/img/spacer.gif" height="25" border="0">Oppure<img src="https://quantest.eu/img/spacer.gif" height="25" border="0"> <a href="https://quantest.eu/lang/it/reconversion_form.php"> <img src="https://quantest.eu/img/reconversion.jpg" border="1" alt="Test di riqualificazione" name="Test di riqualificazione"></a></div>
<br/>
    <br/>
    <br/>
    <br/>
<?php




include_once ("footer.php");
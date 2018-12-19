<?php

$pageTitle = 'Test per la selezione di personale da reclutare o da riqualificare | QUANTEST';
$pageDescription = 'Questo sistema esperto verifica e confronta automaticamente i candidati sul tuo elenco per garantirti la migliore selezione di reclutamento. Ti consente inoltre di riorganizzare con successo il lavoro della tua azienda determinando il posto ideale per ciascuno dei suoi dipendenti.';

include ("lang/it/header_q.php");
/*require_once("dbconnect.php");
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
    <h1>Sistema esperto per la selezione del miglior candidato <br>o del miglior posto per un dipendente da riqualificare</h1>
    <h2>Accedi e lancia QUANTEST per scegliere il miglior collaboratore da assumere <br>o l'impiego ideale per un membro dello staff da riqualificare </h2>
   
   <p> <h2>Puoi scegliere tra <strong>test di reclutamento</strong> o <strong>test di riqualificazione</strong></h2></p>
	<br>
	<a href="https://quantest.eu/lang/it/config/expert_config.php"><img src="https://quantest.eu/img/recruitment.jpg" border="1" alt="Test di reclutamento" name="Test di reclutamento"></a><img src="https://quantest.eu/img/spacer.gif" height="25" border="0">Oppure<img src="https://quantest.eu/img/spacer.gif" height="25" border="0"> <a href="https://quantest.eu/lang/it/reconversion_form.php"> <img src="https://quantest.eu/img/reconversion.jpg" border="1" alt="Test di riqualificazione" name="Test di riqualificazione"></a></div>
<br/>
    <br/>
    <br/>
    <br/>
<?php




include_once ("lang/it/footer.php");
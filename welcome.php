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

print_r($_SESSION) ;

?>

<div align="center">
    <h3>Welcome !</h3>
    <p>Launch QUANTEST and find your best employees or partners</p>
    <p>choose the type of test:</p>
    <button class="button" type="button" id="hiring" onclick="goHiring()">Hiring selection</button>
    <button class="button button--inverted" type="button" id="proffesional" onclick="goProff()">Professional reconversion</button>
</div>
<br/>
    <br/>
    <br/>
    <br/>
<?php




include_once ("footer.php");
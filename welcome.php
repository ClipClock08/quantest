<?php
include ("header_q.php");
require_once("dbconnect.php");
if(isset($_POST["btn_submit_auth"]) && !empty($_POST["btn_submit_auth"])){

} else {

    exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=" . $address_site . "> главную страницу </a>.</p>");
}
?>

<div align="center">
    <h3>Welcome !</h3>
    <p>Launch QUANTEST and find your best employees or partners</p>
    <p>choose the type of test:</p>
    <button class="button" type="button" id="hiring" onclick="goHiring()">Hiring selection</button>
    <button class="button button--inverted" type="button" id="proffesional" onclick="goProff()">Professional reconversion</button>
</div>

<?php




include_once ("footer.php");
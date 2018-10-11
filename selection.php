<?php
include ("header_q.php");
if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
    exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");
}
?>

    <div align="center">
        <h3>Hiring selection test</h3>
        <p>Choose your configuration mode</p>
        <button class="button" type="button" id="manual" onclick="manual()">Manual (semi-automatic)</button> or
        <button class="button button--inverted" type="button" id="expert" onclick="expert()">Expert System (recommended)</button>

    </div>


<?php




include_once ("footer.php");
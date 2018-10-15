<?php
//Подключение шапки
require_once("header_q.php");
?>


<form action="recovery.php" method="post">
    <table border="0" cellpadding="2" cellspacing="2" width="400">
        <input type="text" name="email" placeholder="your email address.." size="24">
        <p><input type="submit" name="recoveryBtn" value="Recovery"></p>

</form>

<?php

//Подключение подвала
require_once("footer.php");
?>

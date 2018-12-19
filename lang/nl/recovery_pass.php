<?php
//Подключение шапки
require_once("header_q.php");
?>

<div>
    <form name="form1" method="post" action="recovery.php">
            <p>
                <i>Email </i><input type="text" name="email" size="30" />
            </p>
            <p>
                <input type="submit" name="recoveryBtn" value="Wachtwoord herstellen" size="30">
            </p>
    </form>
</div>
<?php

//Подключение подвала
require_once("footer.php");
?>
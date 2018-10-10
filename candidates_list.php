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
<table border="0" cellpadding="5" cellspacing="2" width="943">
    <tr height="9">
        <td width="744" valign="top" align="left" height="9"></td>
        <td align="left" valign="top" width="16" height="9"></td>
        <td align="center" valign="middle" height="9" width="145"></td>
    </tr>
    <tr>
        <td valign="top" align="left" width="744">
            <table border="0" cellpadding="0" cellspacing="2" width="650" align="center">
                <tr>
                    <td>
                        <div align="center">
                            <h2>List the candidates to test or download the list from... <input type="file" name="Browse..." size="16"></h2>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form name="FormName" action="login.php" method="post">
                            <div align="center">
                                <table cellspacing="2" cellpadding="2" border="0" width="550" align="center">
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td colspan="4">
                                            <div align="center"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#006400">
                                            <div align="center">
                                                <font color="white">ID</font></div>
                                        </td>
                                        <td bgcolor="#006400" width="222">
                                            <div align="center">
                                                <font color="white">Family name:</font></div>
                                        </td>
                                        <td bgcolor="#006400" width="222">
                                            <div align="center">
                                                <font color="white">First name:</font></div>
                                        </td>
                                        <td bgcolor="#006400" width="50">
                                            <div align="center">
                                                <font color="white">Born:</font></div>
                                        </td>
                                        <td bgcolor="#006400" width="45">
                                            <div align="center">
                                                <font color="white">M/ F</font></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#ffffcc">1</td>
                                        <td bgcolor="#ffffcc" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#ffffcc" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#ffffcc" width="50"><input name="anniversaire" type="date"></td>
                                        <td bgcolor="#ffffcc" width="45"><input type="text" name="textfieldName" size="8" width="20"></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#efefbf">2</td>
                                        <td bgcolor="#efefbf" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#efefbf" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#ffffcc" width="50"><input name="anniversaire" type="date"></td>
                                        <td bgcolor="#efefbf" width="45"><input type="text" name="textfieldName" size="8"></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#ffffcc">3</td>
                                        <td bgcolor="#ffffcc" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#ffffcc" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#ffffcc" width="50"><input name="anniversaire" type="date"></td>
                                        <td bgcolor="#ffffcc" width="45"><input type="text" name="textfieldName" size="8"></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#efefbf">4</td>
                                        <td bgcolor="#efefbf" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#efefbf" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#ffffcc" width="50"><input name="anniversaire" type="date"></td>
                                        <td bgcolor="#efefbf" width="45"><input type="text" name="textfieldName" size="8"></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#ffffcc">5</td>
                                        <td bgcolor="#ffffcc" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#ffffcc" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#ffffcc" width="50"><input name="anniversaire" type="date"></td>
                                        <td bgcolor="#ffffcc" width="45"><input type="text" name="textfieldName" size="8"></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#efefbf">6</td>
                                        <td bgcolor="#efefbf" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#efefbf" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#ffffcc" width="50"><input name="anniversaire" type="date"></td>
                                        <td bgcolor="#efefbf" width="45"><input type="text" name="textfieldName" size="8"></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#ffffcc">7</td>
                                        <td bgcolor="#ffffcc" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#ffffcc" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#ffffcc" width="50"><input name="anniversaire" type="date"></td>
                                        <td bgcolor="#ffffcc" width="45"><input type="text" name="textfieldName" size="8"></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#efefbf">8</td>
                                        <td bgcolor="#efefbf" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#efefbf" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#ffffcc" width="50"><input name="anniversaire" type="date"></td>
                                        <td bgcolor="#efefbf" width="45"><input type="text" name="textfieldName" size="8"></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#ffffcc">9</td>
                                        <td bgcolor="#ffffcc" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#ffffcc" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#ffffcc" width="50"><input name="anniversaire" type="date"></td>
                                        <td bgcolor="#ffffcc" width="45"><input type="text" name="textfieldName" size="8"></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#efefbf">10</td>
                                        <td bgcolor="#efefbf" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#efefbf" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#ffffcc" width="50"><input name="anniversaire" type="date"></td>
                                        <td bgcolor="#efefbf" width="45"><input type="text" name="textfieldName" size="8"></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#ffffcc">11</td>
                                        <td bgcolor="#ffffcc" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#ffffcc" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#ffffcc" width="50"><input name="anniversaire" type="date"></td>
                                        <td bgcolor="#ffffcc" width="45"><input type="text" name="textfieldName" size="8"></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#efefbf">12</td>
                                        <td bgcolor="#efefbf" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#efefbf" width="222"><input type="text" name="textfieldName" size="30"></td>
                                        <td bgcolor="#ffffcc" width="50"><input name="anniversaire" type="date"></td>
                                        <td bgcolor="#efefbf" width="45"><input type="text" name="textfieldName" size="8"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <div align="left">
                                                <font color="red"><a href="(Empty Reference!)">Add lines..</a> </font><br>
                                                <br>
                                                <input type="submit" name="submitButtonName" value="Save"><br>
                                                <br>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </td>
                </tr>
            </table>


<?php

include_once ("footer.php");
<?php
include ("header_q.php");
require_once("dbconnect.php");
if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
    exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");
}

//print_r($_SESSION) ;

?>
    <div class="block_for_messages">
        <?php
        //Если в сессии существуют сообщения об ошибках, то выводим их
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];

            //Уничтожаем ячейку error_messages, чтобы сообщения об ошибках не появились заново при обновлении страницы
            unset($_SESSION["error_messages"]);
        }

        //Если в сессии существуют радостные сообщения, то выводим их
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];

            //Уничтожаем ячейку success_messages,  чтобы сообщения не появились заново при обновлении страницы
            unset($_SESSION["success_messages"]);
        }
        ?>
    </div>

<table border="0" cellpadding="5" cellspacing="2" width="943" align="center">
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
                        <form name="candidates_list" action="candidates.php" method="post">
                            <div align="center">
                                <table cellspacing="2" cellpadding="2" border="0" width="550" align="center" id="add_line">
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
                                        <td bgcolor="#006400" width="100">
                                            <div align="center">
                                                <font color="white">Male/ Female</font></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#ffffcc">1</td>
                                        <td bgcolor="#ffffcc" width="222"><input type="text" name="family_name[0]" size="30"></td>
                                        <td bgcolor="#ffffcc" width="222"><input type="text" name="first_name[0]" size="30"></td>
                                        <td bgcolor="#ffffcc" width="50"><input name="born_date[0]" type="date"></td>
                                        <td bgcolor="#ffffcc" width="45">
                                            <input type="radio" name="gender[0]" id="" value="M">M
                                        <input type="radio" name="gender[0]" value="F">F</td>
                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                        <div align="left">
                            <input type="button" type="button" onclick="add_candidat_line();" value="Добавить элемент">
                            <br>
                            <input type="submit" name="add_candidates" value="Save"><br>
                            <br>
                        </div>
                        </form>
                    </td>
                </tr>
            </table>


<?php

include_once ("footer.php");
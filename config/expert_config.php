<?php
include ("header_q.php");
require_once("../dbconnect.php");
//if (isset($_POST["btn_submit_register"]) && !empty($_POST["btn_submit_register"])) {
//
//
//
//
//} else {
//
//    exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=" . $address_site . "> главную страницу </a>.</p>");
//}
?>
    <table border="0" cellpadding="5" cellspacing="2" width="961">
        <tr height="26">
            <td width="460" valign="top" align="left" height="26"></td>
            <td align="left" valign="top" width="81" height="26"></td>
            <td align="center" valign="middle" height="26" width="382"></td>
        </tr>
        <tr>
            <td valign="top" align="left" colspan="2">
                <div align="center">
                    <p><div align="center">
                        <h2>Hiring selection test</h2>
                        <h3>Configuration mode by the expert system</h3>
                    </div>
                    <form name="exigences" action="candidates.htm" method="post">
                        <div align="left">
                            <fieldset><legend>Identification of the function to be filled</legend>
                                <label for="nomPoste">Name of the function: <input type="text" id="nomPoste" name="monPoste" placeholder="type the name..." size="39"> </label>
                                <label for="service">Service: <select name="fonction" id="fonction">
                                        <option value="1">select...</option>
                                        <option value="2">HR Service</option>
                                        <option value="6">Accouting</option>
                                        <option value="3">Purchases</option>
                                        <option value="4">Commercial</option>
                                        <option value="4">Production</option>
                                        <option value="5">Maintenance</option>
                                        <option value="5">Data processing, IT</option>
                                        <option value="5">design office/ R&D</option>
                                        <option value="5">Other service</option>
                                    </select><br>


                                    Status of the function: <select name="fonction" id="fonction">
                                        <option value="1">select...</option>
                                        <option value="2">Senior manager</option>
                                        <option value="3">Middle management</option>
                                        <option value="4">Employee</option>
                                        <option value="5">Salaried</option>
                                        <option value="6">Trainee/ Student</option>
                                    </select></fieldset><br>

                            <input name="candidates.htm" value="Continue" type="submit">
                            </label></div>
                        </label>
                    </form>
            <td>
                <h4>Allows you to automatically configure the requirements of the function.</h4>
            </td>







            </body>

            </td>
        </tr>
    </table>

<?php
/**
 * Created by PhpStorm.
 * User: alexdev
 * Date: 05.10.18
 * Time: 12:51
 */
include ("footer.php");
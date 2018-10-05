<?php
include ("header_q.php");
//require_once("dbconnect.php");
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

    <div align="center">
        <h2>Professional reconversion test</h2><h3>Configure the options for professional reconversion</h3>
        <div align="center">
            <form action="login.php" method="post" name="exigences">
                <div align="center">
                    <table border="0" width="650" cellspacing="2" cellpadding="2">
                        <tbody>
                        <tr>
                            <td colspan="2">
                                <fieldset>
                                    <legend><b>Generalities of the option of JOB 1</b></legend>
                                    <table border="0" cellspacing="2" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td valign="middle" width="241">
                                                <div align="left">
                                                    Title of Job 1:</div>
                                            </td>
                                            <td width="437"><input name="textfieldName" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" width="241">
                                                <div align="left">Service name:</div>
                                            </td>
                                            <td width="437"><input name="textfieldName" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="top" width="241">
                                                <div align="left">
                                                    Specify the function:</div>
                                            </td>
                                            <td width="437"><select id="fonction" name="statutFonction">
                                                    <option value="1">select...</option>
                                                    <option value="2">Manager</option>
                                                    <option value="3">Middle management</option>
                                                    <option value="4">Employee</option>
                                                    <option value="5">Salaried</option>

                                                </select></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" valign="top">
                                <div style="text-align: left;" align="right">
                                    <fieldset>
                                        <legend><b>Generalities of the option of JOB 2</b></legend>
                                        <table border="0" cellspacing="2" cellpadding="0">
                                            <tbody>
                                            <tr>
                                                <td valign="middle" width="241">
                                                    <div align="left">
                                                        Title of Job 2:</div>
                                                </td>
                                                <td width="437"><input name="textfieldName" size="50" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td valign="top" width="241">
                                                    <div align="left">Not the same service? <br>Type it:</div>
                                                </td>
                                                <td valign="bottom" width="437"><input name="textfieldName" size="50" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td valign="middle" width="241">
                                                    <div align="left">
                                                        Specify the function:</div>
                                                </td>
                                                <td width="437"><select id="fonction" name="statutFonction">
                                                        <option value="1">select...</option>
                                                        <option value="2">Manager</option>
                                                        <option value="3">Middle management</option>
                                                        <option value="4">Employee</option>
                                                        <option value="5">Salaried</option>

                                                    </select></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </fieldset>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <fieldset>
                                    <legend><b>Generalities of the option of JOB 3</b></legend>
                                    <table border="0" cellspacing="2" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td valign="middle" width="241">
                                                <div align="left">
                                                    Title of Job 3:</div>
                                            </td>
                                            <td width="437"><input name="textfieldName" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="top" width="241">
                                                <div align="left">Not the same service? <br>Type it:</div>
                                            </td>
                                            <td valign="bottom" width="437"><input name="textfieldName" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" width="241">
                                                <div align="left">
                                                    Specify the function:</div>
                                            </td>
                                            <td width="437"><select id="fonction" name="statutFonction">
                                                    <option value="1">select...</option>
                                                    <option value="2">Manager</option>
                                                    <option value="3">Middle management</option>
                                                    <option value="4">Employee</option>
                                                    <option value="5">Salaried</option>

                                                </select></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="(Empty Reference!)"><font size="2">Insert an additional job option</font></a></td>
                        </tr>
                        <tr>
                            <td colspan="2" valign="top">
                                <fieldset>
                                    <legend><b> Identity of the employee to be reclassified </b></legend>
                                    <table border="0" cellspacing="2" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td valign="middle" width="241">
                                                <div align="left">
                                                    Family name:</div>
                                            </td>
                                            <td width="437"><input name="textfieldName" size="24" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" width="241">
                                                <div align="left">
                                                    First name:</div>
                                            </td>
                                            <td valign="top" width="437"><input name="textfieldName" size="24" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" width="241">
                                                <div align="left">
                                                    Birth date:</div>
                                            </td>
                                            <td width="437"><input name="anniversaire" type="date"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top"><input name="save01" type="submit" value="Validate"></td>
                            <td valign="top"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>


<?php




include_once ("footer.php");
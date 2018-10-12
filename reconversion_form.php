<?php
include ("header_q.php");
if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
    exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");
}

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

    <div align="center">
        <h2>Professional reconversion test</h2><h3>Configure the options for professional reconversion</h3>
        <div align="center">
            <form action="reconversion.php" method="post" name="exigences">
                <div align="center">
                    <table border="0" width="650" cellspacing="2" cellpadding="2" id="add_job">
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
                                            <td width="437"><input name="job[0]" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" width="241">
                                                <div align="left">Service name:</div>
                                            </td>
                                            <td width="437"><input name="service_name[0]" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="top" width="241">
                                                <div align="left">
                                                    Specify the function:</div>
                                            </td>
                                            <td width="437">
                                                <select id="fonction" name="specify_function[0]">
                                                    <option value="1">select...</option>
                                                    <option value="manager">Manager</option>
                                                    <option value="midle_management">Middle management</option>
                                                    <option value="Employee">Employee</option>
                                                    <option value="Salaried">Salaried</option>

                                                </select>
                                            </td>
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
                                                <td width="437"><input name="job[1]" size="50" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td valign="top" width="241">
                                                    <div align="left">Not the same service? <br>Type it:</div>
                                                </td>
                                                <td valign="bottom" width="437"><input name="service_name[1]" size="50" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td valign="middle" width="241">
                                                    <div align="left">
                                                        Specify the function:</div>
                                                </td>
                                                <td width="437"><select id="fonction" name="specify_function[1]">
                                                        <option value="1">select...</option>
                                                        <option value="manager">Manager</option>
                                                        <option value="midle_management">Middle management</option>
                                                        <option value="Employee">Employee</option>
                                                        <option value="Salaried">Salaried</option>

                                                    </select></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </fieldset>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div>
                    <input type="button" onclick="add_job()" value="Insert an additional job option">
                </div>
                <div>
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
                                    <td width="437"><input name="reclass_name" size="24" type="text"></td>
                                </tr>
                                <tr>
                                    <td valign="middle" width="241">
                                        <div align="left">
                                            First name:</div>
                                    </td>
                                    <td valign="top" width="437"><input name="reclass_fisrt_name" size="24" type="text"></td>
                                </tr>
                                <tr>
                                    <td valign="middle" width="241">
                                        <div align="left">
                                            Birth date:</div>
                                    </td>
                                    <td width="437"><input name="reclass_birth" type="date"></td>
                                </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <br>
                    </td>
                </div>
                <div>
                    <div valign="top"><input name="save01" type="submit" value="Validate"></div>
                    <div valign="top"></div>
                </div>
            </form>
        </div>
    </div>


<?php




include_once ("footer.php");
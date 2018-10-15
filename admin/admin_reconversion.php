<?php
include("header_q.php");
require_once("../dbconnect.php");
if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {

} else {

    exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=" . $address_site . "> главную страницу </a>.</p>");
}
?>
    <div class="block_for_messages">
        <?php
        //Если в сессии существуют сообщения об ошибках, то выводим их
        if (isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])) {
            echo $_SESSION["error_messages"];

            //Уничтожаем ячейку error_messages, чтобы сообщения об ошибках не появились заново при обновлении страницы
            unset($_SESSION["error_messages"]);
        }

        //Если в сессии существуют радостные сообщения, то выводим их
        if (isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])) {
            echo $_SESSION["success_messages"];

            //Уничтожаем ячейку success_messages,  чтобы сообщения не появились заново при обновлении страницы
            unset($_SESSION["success_messages"]);
        }
        ?>
    </div>

    <div align="center">
        <h2>Admin professional reconversion test</h2>
        <form name="adminClients" action="form_admin.php" method="post">
            <fieldset>
                <legend> Encoding the values of the reconversion test</legend>
                <label for="nomPoste">Client name: <input type="text" id="nomClient" name="nomClient"
                                                          placeholder="select the client from the list"> </label> <label
                        for="nomTest">Test of selected client: <input type="text" id="id_test" name="monTest"
                                                                      placeholder="select the test from the list">

                </label>List of the candidates evaluated by this test: <select name="selectCandidat" size="1"></select>
                <p></p>
            </fieldset>
            <hr>
            <p></p>
            <h2>Evaluation sheet of <input type="text" id="candidat_id" name="candidat_id"
                                           placeholder="id+ first and last name"></h2>
            <h3>Professional reconversion test</h3>
            <div align="left">
                <fieldset>
                    <legend> Interest for the employee</legend>
                    <label>
                        <ol>
                            <li type="1">Personal interest: <select name="selectName" width="45" size="1">
                                    <option value="1">select..</option>
                                    <option value="2">Insufficient</option>
                                    <option value="3">Limit</option>
                                    <option value="4">Good</option>
                                    <option value="5">Very good</option>
                                    <option value="6">Excellent</option>

                                </select>
                            <li type="1">Medium-term satisfaction: <select name="selectName" width="45" size="1">
                                    <option value="1">select..</option>
                                    <option value="2">Insufficient</option>
                                    <option value="3">Limit</option>
                                    <option value="4">Good</option>
                                    <option value="5">Very good</option>
                                    <option value="6">Excellent</option>

                                </select>
                            <li type="1">Long-term satisfaction: <select name="selectName" width="45" size="1">
                                    <option value="1">select..</option>
                                    <option value="2">Insufficient</option>
                                    <option value="3">Limit</option>
                                    <option value="4">Good</option>
                                    <option value="5">Very good</option>
                                    <option value="6">Excellent</option>

                                </select>
                            <li type="1">Physical adequacy: <select name="selectName" width="45" size="1">
                                    <option value="1">select..</option>
                                    <option value="2">Insufficient</option>
                                    <option value="3">Limit</option>
                                    <option value="4">Good</option>
                                    <option value="5">Very good</option>
                                    <option value="6">Excellent</option>

                                </select>
                            <li type="1">Behavioral adequacy: <select name="selectName" width="45" size="1">
                                    <option value="1">select..</option>
                                    <option value="2">Insufficient</option>
                                    <option value="3">Limit</option>
                                    <option value="4">Good</option>
                                    <option value="5">Very good</option>
                                    <option value="6">Excellent</option>

                                </select>
                            <li type="1">Ability to adapt: <select name="selectName" width="45" size="1">
                                    <option value="1">select..</option>
                                    <option value="2">Insufficient</option>
                                    <option value="3">Limit</option>
                                    <option value="4">Good</option>
                                    <option value="5">Very good</option>
                                    <option value="6">Excellent</option>

                                </select>

                        </ol>
                    </label>
                </fieldset>

                <fieldset>
                    <legend> Interest for the employer</legend>
                    <ol>
                        <li type="1">Quality of work: <select name="selectName" width="45" size="1">
                                <option value="1">select..</option>
                                <option value="2">Insufficient</option>
                                <option value="3">Limit</option>
                                <option value="4">Good</option>
                                <option value="5">Very good</option>
                                <option value="6">Excellent</option>

                            </select>
                        <li type="1">Care and productivity: <select name="selectName" width="45" size="1">
                                <option value="1">select..</option>
                                <option value="2">Insufficient</option>
                                <option value="3">Limit</option>
                                <option value="4">Good</option>
                                <option value="5">Very good</option>
                                <option value="6">Excellent</option>

                            </select>
                        <li type="1">Speed of adaptation: <select name="selectName" width="45" size="1">
                                <option value="1">select..</option>
                                <option value="2">Insufficient</option>
                                <option value="3">Limit</option>
                                <option value="4">Good</option>
                                <option value="5">Very good</option>
                                <option value="6">Excellent</option>

                            </select>
                        <li type="1">Potential for evolution: <select name="selectName" width="45" size="1">
                                <option value="1">select..</option>
                                <option value="2">Insufficient</option>
                                <option value="3">Limit</option>
                                <option value="4">Good</option>
                                <option value="5">Very good</option>
                                <option value="6">Excellent</option>

                            </select>
                        <li type="1">Harmony with future colleagues: <select name="selectName" width="45" size="1">
                                <option value="1">select..</option>
                                <option value="2">Insufficient</option>
                                <option value="3">Limit</option>
                                <option value="4">Good</option>
                                <option value="5">Very good</option>
                                <option value="6">Excellent</option>

                            </select>
                        <li type="1">Professional availability: <select name="selectName" width="45" size="1">
                                <option value="1">select..</option>
                                <option value="2">Insufficient</option>
                                <option value="3">Limit</option>
                                <option value="4">Good</option>
                                <option value="5">Very good</option>
                                <option value="6">Excellent</option>

                            </select>

                        </li>

                    </ol>
                </fieldset>

                </fieldset></fieldset></div>
            <p><input name="saveResult" value="Save" type="submit"> The registration must produce the results sheet to
                be given to the client</p>
        </form>
    </div>

<?php

include("footer.php");
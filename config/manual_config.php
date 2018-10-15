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

    <table border="0" cellpadding="5" cellspacing="2" width="960">
        <tr>
            <td width="460" valign="top" align="left" height="26"></td>
            <td align="left" valign="top" width="291" height="26"></td>
            <td align="center" valign="middle" height="26" width="382"></td>
        </tr>
        <tr>
            <td valign="top" align="left" colspan="2">
                <div align="center">
                    <p></p>
                    <div align="center">
                        <h2>Job Selection Test</h2>
                        <h3>Configure the specificities of the function</h3>
                    </div>
                    <form name="exigences" action="manual_config_db.php" method="post">
                        <div align="left">
                            <fieldset>
                                <legend>Identification of the function to be filled</legend>
                                <label for="nomPoste">Name of the function: <input type="text" id="nomPoste"
                                                                                   name="monPoste"
                                                                                   placeholder="type the name..."
                                                                                   size="39" required> </label>
                                <label for="service">Service:
                                    <select name="fonction" id="fonction">
                                        <option value="1">select...</option>
                                        <option value="2">HR Service</option>
                                        <option value="3">Accouting</option>
                                        <option value="4">Purchases</option>
                                        <option value="5">Commercial</option>
                                        <option value="6">Production</option>
                                        <option value="7">Maintenance</option>
                                        <option value="8">Data processing, IT</option>
                                        <option value="9">design office/ R&D</option>
                                        <option value="10">Other service</option>
                                    </select><br>


                                    Status of the function:
                                    <select name="fonction_exp" id="fonction_exp">
                                        <option value="1">select...</option>
                                        <option value="2">Senior manager</option>
                                        <option value="3">Middle management</option>
                                        <option value="4">Employee</option>
                                        <option value="5">Salaried</option>
                                        <option value="6">Trainee/ Student</option>
                                    </select>
                            </fieldset>
                            <br>
                            <fieldset>
                                <legend>Work timetable and seasons</legend>
                                <label for="work_time">Work timetable:
                                    <select name="work_time" id="horaire">
                                        <option value="1">select...</option>
                                        <option value="Office hours">Office hours</option>
                                        <option value="Free schedule">Free schedule</option>
                                        <option value="Night schedule">Night schedule</option>
                                        <option value="Schedule in 2 teams (no night)">Schedule in 2 teams (no night)</option>
                                        <option value="Schedule in 3 teams (night included)Horaire">Schedule in 3 teams (night included)Horaire</option>
                                    </select>
                                </label>
                                <label for="saison">If seasonal work, indicate the season:
                                    <select name="saison">
                                        <option value="1">select...</option>
                                        <option value="Spring">Spring</option>
                                        <option value="Summer">Summer</option>
                                        <option value="Autumn">Autumn</option>
                                        <option value="Winter">Winter</option>
                                    </select>
                                </label>
                            </fieldset>

                            <fieldset>
                                <legend>Social environment of work</legend>
                                <div align="center">
                                    <table border="0" cellpadding="2" cellspacing="4">
                                        <tr>
                                            <td>
                                                <label class="container">Alone<input type="checkbox"  name="soc_env[]" value="Alone"> <span
                                                            class="checkmark"></span>
                                                </label>
                                                <label class="container">
                                                    As a team<input type="checkbox" name="soc_env[]" value="team"> <span
                                                            class="checkmark"></span>
                                                </label>
                                                <label class="container">With
                                                    subordinates <input type="checkbox" name="soc_env[]" value="suborditanes"> <span class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="container">With women
                                                    <input type="checkbox" value="withWomen"> <span
                                                            class="checkmark"></span>
                                                </label>
                                                <label class="container">With
                                                    mens <input type="checkbox" name="soc_env[]" value="withMan"> <span class="checkmark"></span>
                                                </label>
                                                <label
                                                        class="container">With colleagues <input type="checkbox" name="soc_env[]" value="colleagues"> <span
                                                            class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="container">
                                                    With customers <input type="checkbox" name="soc_env[]" value="customers"> <span
                                                            class="checkmark"></span>
                                                </label>
                                                <label class="container">With
                                                    superiors <input type="checkbox" name="soc_env[]" value="superiors"> <span
                                                            class="checkmark"></span>
                                                </label>
                                                <label class="container">In
                                                    the crowds <input type="checkbox" name="soc_env[]" value="crowds"> <span
                                                            class="checkmark"></span>
                                                </label>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Physiological environment</legend>
                                <div align="left">
                                    <label for="bruit">Noise:
                                        <select name="horaire" id="bruit">
                                            <option value="1">select...</option>
                                            <option value="PeacefulPlace">Peaceful place</option>
                                            <option value="very_noisy">Noisy place to very noisy</option>
                                            <option value="Idk">I dont know</option>
                                        </select>
                                    </label>
                                    <label for="eclairage">Lighting:
                                        <select name="lighting">
                                            <option value="1">select...</option>
                                            <option value="acceptable">Optimal to acceptable</option>
                                            <option value="Little">Little light</option>
                                            <option value="Idk">I dont know</option>
                                        </select>
                                    </label>
                                    <label for="temperature">Temperature:
                                        <select
                                                name="temperature">
                                            <option value="1">select...</option>
                                            <option value="individual">Adjustable individual comfort</option>
                                            <option value="Standardized">Standardized common comfort</option>
                                            <option value="Refrigerated">Refrigerated local (products)</option>
                                            <option value="Air_libre">Air libre exterieure</option>
                                        </select>
                                    </label>
                                    <label for="odeurs">Olfactory:
                                        <select name="odeurs">
                                            <option value="1">select...</option>
                                            <option value="No_specific">No specific odors</option>
                                            <option value="Idk">I dont know</option>
                                            <option value="Specific">Specific odors (specify here below)</option>
                                        </select>
                                    </label>
                                    <p>
                                        <input type="text" id="odeurs" name="specification_phys"
                                              placeholder="specify which odors..">
                                    </p>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Dominant capacity needed</legend>
                                <div align="center">
                                    <table border="0" cellpadding="2" cellspacing="4">
                                        <tr>
                                            <td>
                                                <label class="container">Manual ability
                                                    <input type="checkbox" name="technicite[]" value="ability"> <span
                                                            class="checkmark"></span>
                                                </label>
                                                <label class="container">Reaction
                                                    speed
                                                    <input type="checkbox" name="technicite[]" value="reaction_speed"> <span
                                                            class="checkmark"></span>
                                                </label>
                                                <label class="container">Stress
                                                    resistance
                                                    <input type="checkbox" name="technicite[]" value="stress_res"> <span
                                                            class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="container">Creativity
                                                    <input type="checkbox" name="technicite[]" value="creativity"> <span
                                                            class="checkmark"></span>
                                                </label>
                                                <label class="container">Discernment
                                                    <input
                                                            type="checkbox" name="technicite[]" value="discernment"> <span
                                                            class="checkmark"></span>
                                                </label>
                                                <label class="container">Perseverance
                                                    <input type="checkbox" name="technicite[]" value="perseverance"> <span
                                                            class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="container">Enthusiasm
                                                    <input type="checkbox" name="technicite[]" value="enthusiasm"> <span
                                                            class="checkmark"></span>
                                                </label>
                                                <label class="container">Logic
                                                    <input type="checkbox" name="technicite[]" value="Logic"> <span
                                                            class="checkmark"></span>
                                                </label>
                                                <label class="container">Realism
                                                    <input type="checkbox" name="technicite[]" value="realism">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <label for="technicite">Other capacity: </label>
                                <p>
                                    <input type="text" id="technicite" name="specification_cap" placeholder="specify..">
                                </p>
                            </fieldset>
                            <input name="candidates" value="Continue" type="submit"></div>
                    </form>
                </div>
            </td>
            <td valign="top">
                <h4>Allows to manually configure the requirements of the function.</h4>
                <h4>The &quot;Continue&quot; button calls the &quot;Candidates&quot; page to register people to
                    test.</h4>
                <h3></h3>
            </td>
        </tr>
    </table>
<?php

include("footer.php");
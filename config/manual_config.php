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
<table border="0" cellpadding="5" cellspacing="2" width="960">
    <tr height="26">
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
                                </select></fieldset><br> <fieldset><legend>Work timetable and seasons </legend> <label for="horaire">Work timetable: <select name="horaire" id="horaire">
                                    <option value="1">select...</option>
                                    <option value="2">Office hours</option>
                                    <option value="3">Free schedule</option>
                                    <option value="4">Night schedule</option>
                                    <option value="5">Schedule in 2 teams (no night)</option>
                                    <option value="6">Schedule in 3 teams (night included)Horaire</option></label>
                            </select> <label for="saison">If seasonal work, indicate the season: <select name="saison">
                                    <option value="1">select...</option>
                                    <option value="2">Spring</option>
                                    <option value="3">Summer</option>
                                    <option value="4">Automn</option>
                                    <option value="5">Winter</option>
                                </select></fieldset></label>
                        <fieldset>
                            <legend for="environnementSocial">Social environment of work </legend>
                            <div align="center">
                                <table border="0" cellpadding="2" cellspacing="4">
                                    <tr>
                                        <td><label class="container">Alone<input type="checkbox"> <span class="checkmark"></span></label> <label class="container">As a team<input type="checkbox"> <span class="checkmark"></span></label> <label class="container"><input type="checkbox"> <span class="checkmark"></span></label> <label class="container"><input type="checkbox"> <span class="checkmark"></span></label> <label class="container">With subordinates <input type="checkbox"> <span class="checkmark"></span></label></td>
                                        <td><label class="container">With women <input type="checkbox"> <span class="checkmark"></span></label><label class="container">With mens <input type="checkbox"> <span class="checkmark"></span></label><label class="container">With colleagues <input type="checkbox"> <span class="checkmark"></span></label></td>
                                        <td><label class="container">With customers <input type="checkbox"> <span class="checkmark"></span></label><label class="container">With superiors <input type="checkbox"> <span class="checkmark"></span></label><label class="container">In the crowds <input type="checkbox"> <span class="checkmark"></span></label></td>
                                    </tr>
                                </table>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Physiological environment </legend>
                            <div align="left">
                                <label for="bruit">Noise: <select name="horaire" id="bruit">
                                        <option value="1">select...</option>
                                        <option value="2">Peaceful place</option>
                                        <option value="3">Noisy place to very noisy</option>
                                        <option value="4">I dont know</option>&gt;</label>
                                </select> <label for="eclairage">Lighting: <select name="&eacute;clairage">
                                        <option value="1">select...</option>
                                        <option value="2">Optimal to acceptable</option>
                                        <option value="3">Little light</option>
                                        <option value="4">I dont know</option>
                                    </select></label> <label for="temperature">Temperature: <select name="temperature">
                                        <option value="1">select...</option>
                                        <option value="2">Adjustable individual comfort</option>
                                        <option value="3">Standardized common comfort</option>
                                        <option value="4">Refrigerated local (products)</option>
                                        <option value="5">Air libre ext&eacute;rieure</option>
                                    </select></label> <label for="odeurs">Olfactory: <select name="odeurs">
                                        <option value="1">select...</option>
                                        <option value="2">No specific odors</option>
                                        <option value="3">I dont know</option>
                                        <option value="4">Specific odors (specify here below)</option>
                                    </select></label>
                                <p><input type="text" id="odeurs" name="specification" placeholder="specify which odors.."></legend></p>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend for="technicite">Dominant capacity needed </legend>
                            <div align="center">
                                <table border="0" cellpadding="2" cellspacing="4">
                                    <tr>
                                        <td><label class="container">Manual ability <input type="checkbox"> <span class="checkmark"></span></label><label class="container">Reaction speed <input type="checkbox"> <span class="checkmark"></span></label><label class="container">Stress resistance <input type="checkbox"> <span class="checkmark"></span></label></td>
                                        <td><label class="container">Creativity<input type="checkbox"> <span class="checkmark"></span></label> <label class="container">Discernment<input type="checkbox"> <span class="checkmark"></span></label> </label><label class="container">Perseverance<input type="checkbox"> <span class="checkmark"></span></label></td>
                                        <td><label class="container">Enthusiasm<input type="checkbox"> <span class="checkmark"></span></label><label class="container">Logic<input type="checkbox"> <span class="checkmark"></span></label><label class="container">Realism<input type="checkbox"> <span class="checkmark"></span></label></td>
                                    </tr>
                                </table>
                            </div>
                            <label for="technicite">Other capacity: </label>
                            <p><input type="text" id="technicite" name="specification" placeholder="specify.."></p>
                            </legend>
                        </fieldset>
                        <input name="candidates.htm" value="Continue" type="submit"></div>
                </form>
            </div>
        </td>
        <td valign="top">
            <h4>Allows to manually configure the requirements of the function.</h4>
            <h4>The &quot;Continue&quot; button calls the &quot;Candidates&quot; page to register people to test.</h4>
            <h3></h3>
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
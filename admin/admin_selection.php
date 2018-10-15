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
			<h2>Admin of hiring selection tests</h2>
			<form name="adminClients" action="formAdmin.php" method="post">
				<fieldset>
					<legend>Encoding the values of a job selection test </legend> <label for="nomPoste">Client name: <input type="text" id="nomClient" name="nomClient" placeholder="select the client from the list"> </label> <label for="nomTest">Test of selected client: <input type="text" id="id_test" name="monTest" placeholder="select the test from the list">

					</label>List of candidates evaluated by this test: <select name="selectCandidat" size="1"></select>
					<p></p>
				</fieldset>
				<hr>
				<p></p>
				<h2>Evaluation sheet of <input type="text" id="candidat_id" name="candidat_id" placeholder="id + first and last name"></h2>
				<h3>Hiring Selection Test</h3>
				<div align="left">
					<fieldset><legend> Veracity of the information declared by the candidate </legend> <label>
					<ol>
						<li type="1">Identity:<input type="radio" value="radioValue" name="identite"> Ok<input type="radio" value="radioValue" name="identite"> No<input type="radio" value="radioValue" name="identite">No quite...
						<li type="1">Civil status: <input type="radio" value="radioValue" name="civil"> Ok<input type="radio" value="radioValue" name="civil"> No<input type="radio" value="radioValue" name="civil">No quite...
						<li type="1">Studies: <input type="radio" value="radioValue" name="etudes"> Ok<input type="radio" value="radioValue" name="etudes"> No<input type="radio" value="radioValue" name="etudes">No quite...
						<li type="1">Professional experience: <input type="radio" value="radioValue" name="experience"> Ok<input type="radio" value="radioValue" name="experience"> No<input type="radio" value="radioValue" name="experience">No quite...</label></fieldset>
					</ol>
					<fieldset>
						<legend> Presumptions </legend>
						<ol>
							<li>Religious extremism: <select name="selectName" width="45" size="1">
									<option value="1">No</option>
									<option value="2">Insignificant</option>
									<option value="3">Cognitive position taking (passive)</option>
									<option value="4">Operational position statement (active)</option>
									<option value="5">Person agitated in a critical position</option>
								</select>
							<li>Anti-Western extremism: <select name="selectName" width="45" size="1">
									<option value="1">No</option>
									<option value="2">Insignificant</option>
									<option value="3">Cognitive position taking (passive)</option>
									<option value="4">Operational position statement (active)</option>
									<option value="5">Person agitated in a critical position</option>
								</select>
						</ol>
					</fieldset>

					<fieldset>
						<legend> Personal sphere:</legend><label>
						<ol>
							<li type="1">Physical state: <select name="selectName" width="45" size="1">
									<option value="1">select...</option>
									<option value="2">< 5.000 UB</option>
									<option value="3">from 5.001 to 6.490 UB</option>
									<option value="4">from 6.500 to; 7.000 UB</option>
									<option value="5">> 7.000 UB</option>
								</select>
							<li type="1">Psychological state: <select name="selectName" width="45" size="1">
									<option value="1">select..</option>
									<option value="2">< 4.000 UB</option>
									<option value="3">4.001 &agrave; 5.000 UB</option>
									<option value="4">5.001 &agrave; 6.500 UB</option>
									<option value="5">> 6.500 UB</option>
								</select>
							<li type="1">Free of addictions (alcohol,..): <select name="selectName" width="45" size="1">
									<option value="1">select..</option>
									<option value="2">No</option>
									<option value="3">Not significant</option>
									<option value="4">Appreciate without being dependent</option>
									<option value="5">Light dependence</option>
									<option value="6">Significant dependence</option>
								</select>
							<li type="1">Integrity: <select name="selectName" width="45" size="1">
									<option value="1">select..</option>
									<option value="2">Honest person</option>
									<option value="3">He can grant himself freedoms</option>
									<option value="4">Risk of deviance</option>
									<option value="5">Fallacious integrity</option>
								</select>
								<li type="1">Morality: <select name="selectName" width="45" size="1">
									<option value="1">select..</option>
									<option value="3">Solid moral values</option>
									<option value="4">Moderately satisfactory</option>
									<option value="5">Moderately questionable</option>
									<option value="6">Fallacious morality</option>
								</select></label>

							</legend>
						</ol>
					</fieldset>

					<fieldset>
						<legend>Professional sphere:</legend><label>
						<ol>
							<li type="1"> Studies and and experience to assume this function: <select name="selectName" width="45" size="1">
									<option value="1">select..</option>
									<option value="2">1. Insufficient preparation (studies or useful experience)</option>
									<option value="3">2. Gaps in current preparation</option>
									<option value="4">3. Sufficient preparation  </option>
									<option value="5">4. Good preparation </option>
									<option value="6">5. Excellent preparation </option>
								</select>
							<li type="1"> Naturalness in safety matter: <br><select name="selectName" width="45" size="1">
									<option value="1">select..</option>
									<option value="2">1. Proceeds no matter how with risk taking</option>
									<option value="3">2. Often violates safety instructions</option>
									<option value="4">3. Works safely without specially caring for others</option>
									<option value="5">4. Works safely and provides for the safety of others</option>
									<option value="6">5. Excellent security guarantor </option>
							</select>
								<li type="1"> Quality of his/ her work in this function: <select name="selectName" width="45" size="1">
									<option value="1">select..</option>
									<option value="2">1. Many things to complain and inadequate care</option>
									<option value="3">2. Care and unstable care, variable reliability</option>
									<option value="4">3. Work reasonably performed. Few remarks to make</option>
									<option value="5">4. Reliable work, we can trust him</option>
									<option value="6">5. Careful work of the best quality</option>
								</select>
								<li type="1"> Natural sense of organization: <select name="selectName" width="45" size="1">
									<option value="1">select..</option>
									<option value="2">1. Without order or method. Potentially dangerous</option>
									<option value="3">2. Order and method at the limit of the acceptable. Must be monitored</option>
									<option value="4">3. Orderly and methodical</option>
									<option value="5">4. Organization and exemplary work</option>
									<option value="6">5. Demonstrates remarkable organizational ability </option>
								</select>
								<li type="1"> Naturalness in terms of work rate: <select name="selectName" width="45" size="1">
									<option value="1">select..</option>
									<option value="2">1. Insufficient speed of intervention and reaction</option>
									<option value="3">2. Slowness at the limit of the acceptable </option>
									<option value="4">3. Reasonable work rate</option>
									<option value="5">4. Achieves above average speed</option>
									<option value="6">5. Excels in the use of time available</option>
								</select>
								<li type="1"> Naturalness in responsibilities: <select name="selectName" width="45" size="1">
									<option value="1">select..</option>
									<option value="2">1. Assuming responsibility is the least of the worries</option>
									<option value="3">2. Does what he can, but it must be followed</option>
									<option value="4">3. In normal conditions it does what it takes </option>
									<option value="5">4. Reliable, assumes no need to monitor he/ she</option>
									<option value="6">6. Excellent autonomy and judicious steps</option>
								</select>
								<li type="1"> Naturalness for initiative: <select name="selectName" width="45" size="1">
									<option value="1">select..</option>
									<option value="2">1. You have to be constantly behind to tell what to do </option>
									<option value="3">2. Limited motivation for initiative, must be stimulated</option>
									<option value="4">3. Does and manage well</option>
									<option value="5">4. Faced with unexpected situations he succeeds very well </option>
									<option value="6">5. Creative and innovative  </option>
								</select>

								<li type="1"> Naturalness in social behavior: <select name="selectName" width="45" size="1">
									<option value="1">select..</option>
									<option value="2">1. At first it does not arrange with anyone </option>
									<option value="3">2. Behavior and social fingering at the limit of acceptable </option>
									<option value="4">3. Correct social behavior </option>
									<option value="5">4. Good ability for communication, easily integrates</option>
									<option value="6">5. Excellent communicator, everyone looking for it </option>
								</select>
								<li type="1"> Motivation and interest in investing in this function: <select name="selectName" width="45" size="1">
									<option value="1">select..</option>
									<option value="2">1. The work related to this function is the least of its interests </option>
									<option value="3">2. Limited interest, risk of a short-term departure  </option>
									<option value="4">3. Good motivation to invest in this function </option>
									<option value="5">4. Very motivated by this function </option>
									<option value="6">5. Investing in this function satisfies a real passion </option>
								</select>
								<li type="1"> Naturalness in terms of professional availability: <select name="selectName" width="45" size="1">
									<option value="1">select..</option>
									<option value="2">1. Reluctant against any work outside the hours </option>
									<option value="3">2. Readily dissociates to participate after hours </option>
									<option value="4">3. Accepte parfois de travailler en dehors des heures</option>
									<option value="5">4. Disponibilit&eacute; sup&eacute;rieure &agrave; la moyenne</option>
									<option value="6">5. On peut toujours compter sur lui</option>
								</select>

								<li type="1"> Naturalness in attendance and punctuality at work: <select name="selectName" width="45" size="1">
									<option value="1">select..</option>
									<option value="2">1. On ne peut pas compter sur lui</option>
									<option value="3">2. Compter sur lui c&#039;est prendre un risque</option>
									<option value="4">3. Se situe dans la moyenne g&eacute;n&eacute;rale</option>
									<option value="5">4. Tr&egrave;s fiable</option>
									<option value="6">5. S&#039;il n&#039;est pas l&agrave; ce qu&#039;il lui est arriv&eacute; un gros probl&egrave;me</option>

								</select>
								<li type="1"> Natural aptitude for training: <select name="selectName" width="45" size="1">
									<option value="1">select..</option>
									<option value="2">1. R&eacute;calcitrant pour montrer aux autres</option>
									<option value="3">2. Se limite &agrave; montrer l&#039;essentiel et en garde pour lui</option>
									<option value="4">3. On peut lui confier la formation de nouveaux collaborateurs</option>
									<option value="5">4. Il transmet ais&eacute;ment ses connaissances </option>
									<option value="6">5. Sens tr&egrave;s d&eacute;velopp&eacute; pour transmettre ses connaissances</option>
								</select>

							<li type="1"> Natural ability for command: <select name="selectName" width="45" size="1">
									<option value="1">select..</option>
									<option value="2">1. Il n&#039;a pas d&#039;autorit&eacute; et il s&#039;y prend tr&egrave;s mal</option>
									<option value="3">2. Ne r&eacute;ussit pas bien dans le r&ocirc;le d&#039;influence</option>
									<option value="4">3. Parvient g&eacute;n&eacute;ralement &agrave; faire passer ses instructions  </option>
									<option value="5">4. Il est tr&egrave;s bon pour influencer et exercer l&#039;autorit&eacute; </option>
									<option value="6">5. Aptitude naturelle au commandement</option>
								</select></label></legend>
						</ol>
					</fieldset>
					</fieldset></div>
				<p><input name="saveResult" value="Save" type="submit"> The registration must produce the results sheet to be given to the client</p>
			</form>
		</div>

		<?php

        include("footer.php");
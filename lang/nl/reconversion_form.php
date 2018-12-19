<script>
        window.onload = function () {
            document.getElementById('add_job').addEventListener('click', delItem);
            function delItem (e) {
                if (e.target.className == 'cancel') {
                    var del = e.target;
                    var elem = del.previousSibling;
                    elem.remove();
                    del.remove();
                }
            }
        }
</script>

<?php
include ("header_q.php");
/*
if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
    exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");
}*/

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

     <h1>Test voor een professionele reconversie</h12>
	 <h2>Configureer de testopties van professioneel reconversie</h2>
     
           <p> <form action="reconversion.php" method="post" name="exigences">
                
                    <table border="0" width="650" cellspacing="2" cellpadding="2" id="add_job">
                        <tbody>
                        <tr>
                            <td colspan="2">
                                <fieldset>
                                    <legend><b>Algemeenheden van de optie TAAK 1</b></legend>
                                    <table border="0" cellspacing="2" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td valign="middle" width="241">
                                                <div align="left">
                                                    Titel van de taak:</div>
                                            </td>
                                            <td width="437"><input name="job[0]" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" width="241">
                                                <div align="left">Naam van de dienst:</div>
                                            </td>
                                            <td width="437"><input name="service_name[0]" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="top" width="241">
                                                <div align="left">
                                                    Status van de functie:</div>
                                            </td>
                                            <td width="437">
                                                <select id="fonction" name="specify_function[0]">
                                                    <option value="1">selecteer...</option>
                                                    <option value="manager">Senior manager</option>
                                                    <option value="midle_management">Gemiddeld manager</option>
                                                    <option value="Employee">Werknemer</option>
                                                    <option value="Salaried">Arbeider</option>

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
                                    <legend><b>Algemeenheden van de optie TAAK 2</b></legend>
                                    <table border="0" cellspacing="2" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td valign="middle" width="241">
                                                <div align="left">
                                                    Titel van de taak:</div>
                                            </td>
                                            <td width="437"><input name="job[0]" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" width="241">
                                                <div align="left">Naam van de dienst:</div>
                                            </td>
                                            <td width="437"><input name="service_name[0]" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="top" width="241">
                                                <div align="left">
                                                    Status van de functie:</div>
                                            </td>
                                            <td width="437">
                                                <select id="fonction" name="specify_function[0]">
                                                    <option value="1">selecteer...</option>
                                                    <option value="manager">Senior manager</option>
                                                    <option value="midle_management">Gemiddeld manager</option>
                                                    <option value="Employee">Werknemer</option>
                                                    <option value="Salaried">Arbeider</option>

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
                <div>
                  <p>  <input type="button" onclick="add_job()" value="Voeg een extra taakoptie in"></p>
                </div>
                <div>
                    <td colspan="2" valign="top">
                        <fieldset>
                            <legend><b> Identiteit van de werknemer die moet worden  </b></legend>
                            <table border="0" cellspacing="2" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td valign="middle" width="241">
                                        <div align="left">
                                            Naam:</div>
                                    </td>
                                    <td width="437"><input name="reclass_name" size="24" type="text"></td>
                                </tr>
                                <tr>
                                    <td valign="middle" width="241">
                                        <div align="left">
                                            Voornaam:</div>
                                    </td>
                                    <td valign="top" width="437"><input name="reclass_fisrt_name" size="24" type="text"></td>
                                </tr>
                                <tr>
                                    <td valign="middle" width="241">
                                        <div align="left">
                                            Geboortedatum:</div>
                                    </td>
                                    <td width="437"><input name="reclass_birth" type="date"></td>
                                </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <br>
                    </td>
                </div>
              Door op "Registreer" te klikken, worden de vaardigheden van deze medewerker getest volgens de vereisten van de aangegeven optionele posities. Het resultaat van de test, in overeenstemming met uw bestelling, zal zichtbaar zijn op uw persoonlijke pagina (profiel).
                    <p> <?php
                        if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
                           echo "<div valign='top'><a class='buttonuch' href='#popup1'> Registreer </a></div>";
                        }else{
                            echo "<div valign='top'><input name='save01' type='submit' value='Validate'></div>";
                        }
                    ?>
                    <div id="popup1" class="overlay">
        	<div class="popup">
        		<h2>Beste Bezoeker,</h2>
        		<a class="close" href="#">&times;</a>
                <div class="content">
        	        <p>Deze functie is actief wanneer u bent aangemeld. Log in of registreer <a href="https://quantest.eu/lang/nl/form_auth.php">Log in</a> of <a href="https://quantest.eu/lang/nl/form_register.php"> registreer</a></p>
        		</div>
                    	</div>
                    </div>
                    
                </div>
            </form>
			
			<?php


include_once ("footer.php");
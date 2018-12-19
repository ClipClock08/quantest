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

    
        <h1>Test f&uuml;r eine professionelle Umstellung</h1>
		<h2>Konfigurieren Sie die Optionen für die professionelle Rekonvertierung</h2>
     
           <p> <form action="reconversion.php" method="post" name="exigences">
            <table border="0" width="650" cellspacing="2" cellpadding="2" id="add_job">
                        <tbody>
                        <tr>
                            <td colspan="2">
                                <fieldset>
                                    <legend><b>Allgemeines der Option von JOB 1</b></legend>
                                    <table border="0" cellspacing="2" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td valign="middle" width="241">
                                               Titel der Arbeitsstation:
                                            </td>
                                            <td width="437"><input name="job[0]" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" width="241">
                                                Name des Dienstes:
                                            </td>
                                            <td width="437"><input name="service_name[0]" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="top" width="241">
                                            Status der Funktion:
                                            </td>
                                            <td width="437">
                                                <select id="fonction" name="specify_function[0]">
                                                    <option value="1">auszuw&auml;hlen...</option>
                                                    <option value="manager">Senior manager</option>
                                                    <option value="midle_management">Mittleres manager</option>
                                                    <option value="Employee">Mitarbeiter</option>
                                                    <option value="Salaried">Arbeiter</option>

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
                                    <legend><b>Allgemeines der Option von JOB 2</b></legend>
                                    <table border="0" cellspacing="2" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td valign="middle" width="241">
                                               Titel der Arbeitsstation:
                                            </td>
                                            <td width="437"><input name="job[0]" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" width="241">
                                                Name des Dienstes:
                                            </td>
                                            <td width="437"><input name="service_name[0]" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="top" width="241">
                                            Status der Funktion:
                                            </td>
                                            <td width="437">
                                                <select id="fonction" name="specify_function[0]">
                                                    <option value="1">auszuw&auml;hlen...</option>
                                                    <option value="manager">Senior manager</option>
                                                    <option value="midle_management">Mittleres manager</option>
                                                    <option value="Employee">Mitarbeiter</option>
                                                    <option value="Salaried">Arbeiter</option>

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
            
             
                  <p> <input type="button" onclick="add_job()" value="F&uuml;gen Sie eine zus&auml;tzliche Joboption ein"></p>
              
                <div>
                    <td colspan="2" valign="top">
                        <fieldset>
                            <legend><b> Identit&auml;t des zu klassifizierenden Mitarbeiters </b></legend>
                            <table border="0" cellspacing="2" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td valign="middle" width="241">
                                        <div align="left">
                                            Name:</div>
                                    </td>
                                    <td width="437"><input name="reclass_name" size="24" type="text"></td>
                                </tr>
                                <tr>
                                    <td valign="middle" width="241">
                                     Vorname:
                                    </td>
                                    <td valign="top" width="437"><input name="reclass_fisrt_name" size="24" type="text"></td>
                                </tr>
                                <tr>
                                    <td valign="middle" width="241">
                                   Geburtsdatum:
                                    </td>
                                    <td width="437"><input name="reclass_birth" type="date"></td>
                                </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <br>
                    </td>
                </div>
    
Durch Klicken auf "Speichern" werden die F&auml;higkeiten dieses Mitarbeiters entsprechend den Anforderungen der angegebenen optionalen Positionen getestet. Das Testergebnis wird in &Uuml;bereinstimmung mit Ihrer Bestellung auf Ihrer pers&ouml;nlichen Seite (Profil) sichtbar.

                 <p><?php
                        if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
                           echo "<div valign='top'><a class='buttonuch' href='#popup1'>Speichern</a></div>";
                        }else{
                            echo "<div valign='top'><input name='save01' type='submit' value='Validate'></div>";
                        }
                    ?>
                    <div id="popup1" class="overlay">
                    	<div class="popup">
                    		<h2>Lieber Benutzer,</h2>
        		<a class="close" href="#">&times;</a>
                <div class="content">
        	        <p>Diese Funktion ist aktiv, wenn Sie verbunden sind. Bitte, <a href="https://quantest.eu/lang/de/form_auth.php">verbinden</a> oder <a href="https://quantest.eu/lang/de/form_register.php">registrieren</a></p>
        		</div>
                    	</div>
                    </div>
                    
                </div>
            </form><?php

include_once ("footer.php");
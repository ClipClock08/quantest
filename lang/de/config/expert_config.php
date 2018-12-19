<?php
include ("header_q.php");
/*if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
    exit("<p><strong>Error! </strong> You visited this page directly, so there is no data to process. You can go to the <a href=".$address_site."> home page </a>.</p>");
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

    <table border="0" cellpadding="5" cellspacing="2" width="655">
	<tr>
		<td valign="top" align="left" colspan="2">
               
                  <h1>Auswahltest f&uuml;r eine Rekrutierung </h1>
                        <h2>Die Anforderungen an die Funktion werden automatisch vom QUANTEST-Expertensystem festgelegt</h2>
                    
                  <p>  <form name="exigences" action="expert_config_db.php" method="post">
                        <div align="left">
                            <fieldset>
                                <legend><b>Identifikation der auszufüllenden Funktion</b></legend>
                             <p> Titel der Funktion: <input type="text" id="service" name="service" placeholder="type the name..." required size="39"></p>
                               <p>  <label for="service">Dienst:
                                   <select name="fonction" id="fonction">
                                        <option value="1">w&auml;hlen Sie aus....</option>
                                        <option value="2">HR-Service, Personalabteilung</option>
                                        <option value="3">Buchhaltung</option>
                                        <option value="4">Einkaufen</option>
                                        <option value="5">Kommerziell</option>
                                        <option value="6">Produktion</option>
                                        <option value="7">Wartung</option>
                                        <option value="8">Informatik</option>
                                        <option value="9">Ingenieurbüro, F&E</option>
                                        <option value="10">Anderer Dienst? Spezifizieren =></option>
                                    </select> <input type="text" id="service" name="other_service" placeholder="spezifizieren..."  size="30"></p>

										Status der Funktion:
                                    <select name="experience" id="fonction_exp">
                                        <option value="1">w&auml;hlen Sie aus....</option>
                                        <option value="2">Senior Manager</option>
                                        <option value="3">Middle Manager</option>
                                        <option value="4">Mitarbeiter</option>
                                        <option value="5">Arbeiter</option>
                                        <option value="6">Praktikant / Student</option>
                                    </select></label>
                            </fieldset><br>
Mit einem Klick auf "Fortsetzen" gelangen Sie in das Formular zur Registrierung der Kandidaten zum Testen.


                           <p> <?php
                                if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
                                   echo "<div valign='top'><a class='buttonuch' href='#popup1'> Fortsetzen </a></div>";
                                }else{
                                    echo "<input name='expert_conf' value='Continue' type='submit'>";
                                }
                            ?></p>
                        </div>
                </form></p>
	</tr>
</table>
        
        <div id="popup1" class="overlay">
        	<div class="popup">
        		<h2>Lieber Benutzer,</h2>
        		<a class="close" href="#">&times;</a>
                <div class="content">
        	        <p>Diese Funktion ist aktiv, wenn Sie verbunden sind. Bitte, <a href="https://quantest.eu/lang/de/form_auth.php">verbinden</a> oder <a href="https://quantest.eu/lang/de/form_register.php">registrieren</a></p>
        		</div>
        	</div>
        </div>
        


<?php
/**
 * Created by PhpStorm.
 * User: alexdev
 * Date: 05.10.18
 * Time: 12:51
 */
include ("footer.php");
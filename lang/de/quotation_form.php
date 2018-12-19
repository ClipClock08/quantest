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
        //If there are error messages in the session, then output them
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];

            //Destroy the error_messages cell so that error messages do not reappear when the page is updated.
            unset($_SESSION["error_messages"]);
        }

        //If there are joyful messages in the session, then output them
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];

            //Destroy the success_messages cell so that messages do not reappear when the page is updated.
            unset($_SESSION["success_messages"]);
        }
	
        ?>
    </div>
<h1>Den Preis zu berechnen und ihre Teste zu bestellen? Nichts einfacheres! </h1>
    <table border="0" width="700" cellspacing="2" cellpadding="2" id="add_job">
<form action="quotationRecruitment.php" method="post" name="exigences"></form>
	<tbody>
		<tr>
			<td colspan="2">
				<fieldset>
					<legend><b>KOSTENANSCHLAG für einen EINSTELLUNGSTEST</b></legend>
					<table border="0" cellspacing="2" cellpadding="0">
						<tbody>
							<tr>
								<td valign="middle" width="173">
									<div align="left">
										Titel der Position:</div>
								</td>
								<td><input name="job[0]" placeholder="Beispiel: kaufmännischer Direktor." size="50" type="text"></td>
							</tr>
							<tr>
								<td valign="top" width="173">
									<div align="left">
										Positionsstatus:</div>
								</td>
								<td><select name="experience" id="fonction_exp">
                                        <option value="1">w&auml;hlen Sie aus....</option>
                                        <option value="2">Senior Manager</option>
                                        <option value="3">Middle Manager</option>
                                        <option value="4">Mitarbeiter</option>
                                        <option value="5">Arbeiter</option> 
                                    </select></td>
							</tr>
							<tr>
								<td valign="top" width="173">
									<div align="left">
										Kandidaten zum Testen:
										</div>
								</td>
								<td><input type="text" placeholder="1,2,3,.." id="nbCandidats" name="nbCandidates" size="4"></td>
							</tr>
						</tbody>
					</table>
				</fieldset>
			</td>
			<td><b>Nettopreis:</b><br>
				<input type="text" name="textfieldName" size="4"> <br>
				<br> <button class="button">Jetzt bestellen!</button></td>
		</tr>
		</form>
	</tbody>
</table>
<p></p><p><?php
                        if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
                           echo "<div valign='top'><a class='buttonuch' href='#popup1'>Berechnen Sie den Preis</a></div>";
                        }else{
                            echo "<div valign='top'><input name='save01' type='submit' value='Berechnen Sie den Preis'></div>";
                        }
                    ?><br>
<table border="0" width="700" cellspacing="2" cellpadding="2" id="add_job">
	<form action="quotationRecruitment.php" method="post" name="exigences"></form>
	<tbody>
		<tr>
			<td colspan="2">
				<fieldset>
					<legend><b>KOSTENANSCHLAG für einen UMSTELLUNGSTEST</b></legend>
					<table border="0" cellspacing="2" cellpadding="0">
						<tbody>
							<tr>
								<td valign="top" width="298">
									<div align="left">
										Mitarbeiter, die neu klassifiziert werden sollen:</div>
								</td>
								<td width="75"><input type="text" placeholder="1,2,3,.." id="nbCandidates" name="specification_cap" size="4"></td>
							</tr>
							<tr>
								<td valign="top" width="298">
									<div align="left">
										Umgliederungsmöglichkeiten:</div>
								</td>
								<td width="75"><input type="text" placeholder="1,2,3,.." id="nbCandidates" name="specification_cap" size="4"></td>
							</tr>
						</tbody>
					</table>
				</fieldset>
			</td>
			<td><b>Nettopreis:</b><br><input type="text" name="textfieldName" size="4"><br>
				<br><button class="button">Jetzt bestellen!</button></td>
			</td>
		</tr>
		</form>
	</tbody>
</table>
                        <br>
                        <b>Umzuordnender Mitarbeiter</b>= Anzahl der Personen, die für die gleiche Position getestet werden sollen.
<b>Beispiel:</b> Vorschau der Fähigkeiten von 4 Personen auf 6 Positionen. Wir testen jede der 4 Personen anhand der 6 möglichen Reklassifizierungsoptionen. Einfach und schnell bestellen Sie bitte für jede Ihrer Kombinationen einen separaten Test. 
                    <p><?php
                        if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
                           echo "<div valign='top'><a class='buttonuch' href='#popup1'>Berechnen Sie den Preis</a></div>";
                        }else{
                            echo "<div valign='top'><input name='save01' type='submit' value='Berechnen Sie den Preis'></div>";
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


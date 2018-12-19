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
<h1>Calcolare il prezzo e ordinare un test? Niente di più semplice! </h1>
    <table border="0" width="700" cellspacing="2" cellpadding="2" id="add_job">
<form action="quotationRecruitment.php" method="post" name="exigences"></form>
	<tbody>
		<tr>
			<td colspan="2">
				<fieldset>
					<legend><b>PREVENTIVO per un TEST DI ASSUNZIONE</b></legend>
					<table border="0" cellspacing="2" cellpadding="0">
						<tbody>
							<tr>
								<td valign="middle" width="181">
									<div align="left">
										</div>
								</td>
								<td><input name="job[0]" placeholder="es: direttore commerciale" size="50" type="text"></td>
							</tr>
							<tr>
								<td valign="top" width="181">
									<div align="left">
										Statuto sociale:</div>
								</td>
								<td>
                                    <select name="fonction_exp" id="fonction_exp">
                                        <option value="1">seleziona..</option>
                                        <option value="2">Quadro superiore</option>
                                        <option value="3">Quadro medio</option>
                                        <option value="4">Impiegato</option>
                                        <option value="5">Operaio</option>
                                        <option value="6">Apprendista/ Studente</option>
                                    </select></td>
							</tr>
							<tr>
								<td valign="top" width="181">
									<div align="left">
										Candidati per testare:
										</div>
								</td>
								<td><input type="text" placeholder="1,2,3,.." id="nbCandidats" name="nbCandidates" size="4"></td>
							</tr>
						</tbody>
					</table>
				</fieldset>
			</td>
			<td><b>PREZZO</b>: <input type="text" name="textfieldName" size="4"> <br>
				netto<br>
				<br> <button class="button">Ordina adesso! </button></td>
		</tr>
		</form>
	</tbody>
</table>
<p></p><p><?php
                        if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
                           echo "<div valign='top'><a class='buttonuch' href='#popup1'> Calcola il prezzo</a></div>";
                        }else{
                            echo "<div valign='top'><input name='save01' type='submit' value='Calcola il prezzo'></div>";
                        }
                    ?><br>
<table border="0" width="700" cellspacing="2" cellpadding="2" id="add_job">
	<form action="quotationRecruitment.php" method="post" name="exigences"></form>
	<tbody>
		<tr>
			<td colspan="2">
				<fieldset>
					<legend><b>PREVENTIVO per un TEST DI RICONVERSIONE</b></legend>
					<table border="0" cellspacing="2" cellpadding="0">
						<tbody>
							<tr>
								<td valign="top" width="288">
									<div align="left">
										Collaboratore(i) da riclassificare:</div>
								</td>
								<td width="75"><input type="text" placeholder="1,2,3,.." id="nbCandidates" name="specification_cap" size="4"></td>
							</tr>
							<tr>
								<td valign="top" width="288">
									<div align="left">
										Opzioni di riclassificazione:</div>
								</td>
								<td width="75"><input type="text" placeholder="1,2,3,.." id="nbCandidates" name="specification_cap" size="4"></td>
							</tr>
						</tbody>
					</table>
				</fieldset>
			</td>
			<td><b>PREZZO: </b><input type="text" name="textfieldName" size="4"> <br>
				netto<br>
				<br><button class="button">Ordina adesso! </button></td>
			</td>
		</tr>
		</form>
	</tbody>
</table>
                        <br>
                        <b>Collaboratore(i) da riclassificare</b> = numero di persone da testare sugli stessi diversi posti disponibili.
<b>Esempio:</b> testare le capacità di 4 persone in ognuno di 6 posti disponibili. Testiamo ognuna delle 4 persone su ognuno dei 6 posti possibili. Semplice e veloce, si prega di ordinare un test per ciascun caso.. 
                    <p><?php
                        if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
                           echo "<div valign='top'><a class='buttonuch' href='#popup1'> Calcola il prezzo</a></div>";
                        }else{
                            echo "<div valign='top'><input name='save01' type='submit' value='Calcola il prezzo'></div>";
                        }
                    ?>
                    <div id="popup1" class="overlay">
        	<div class="popup">
        		<h2>Gentile Utente,</h2>
        		<a class="close" href="#">&times;</a>
                <div class="content">
        	        <p>Questa funzionalit&agrave; &egrave; attiva solo quando sei connesso. <a href="https://quantest.eu/lang/it/form_auth.php">Connettiti</a> o <a href="https://quantest.eu/lang/it/form_register.php">registrati</a></p>
        		</div>
                    	</div>
                    </div>
                    
                </div>
            </form><?php
			
		


include_once ("footer.php");


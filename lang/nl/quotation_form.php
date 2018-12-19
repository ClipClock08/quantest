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
<h1>Bereken de prijs en bestel uw testen? Niets gemakkelijker!</h1>
    <table border="0" width="700" cellspacing="2" cellpadding="2" id="add_job">
<form action="quotationRecruitment.php" method="post" name="exigences"></form>
	<tbody>
		<tr>
			<td colspan="2">
				<fieldset>
					<legend><b>KOSTENRAMING voor een AANWERVINGS-TEST</b></legend>
					<table border="0" cellspacing="2" cellpadding="0">
						<tbody>
							<tr>
								<td valign="middle" width="183">
									<div align="left">
										Titel van de functie:</div>
								</td>
								<td><input name="job[0]" placeholder="voorbeeld: commercieel directeur" size="50" type="text"></td>
							</tr>
							<tr>
								<td valign="top" width="183">
									<div align="left">
										Positie status:</div>
								</td>
								<td><select name="experience" id="fonction_exp">
                                        <option value="1">selecteer..</option>
                                        <option value="2">Senior manager</option>
                                        <option value="3">Middle manager</option>
                                        <option value="4">Werknemer</option>
                                        <option value="5">Arbeider</option>
                                   </select></td>
							</tr>
							<tr>
								<td valign="top" width="183">
									<div align="left">
										Kandidaten om te testen:
										</div>
								</td>
								<td><input type="text" placeholder="1,2,3,.." id="nbCandidats" name="nbCandidates" size="4"></td>
							</tr>
						</tbody>
					</table>
				</fieldset>
			</td>
			<td><b>Nettoprijs:</b> <input type="text" name="textfieldName" size="4"><br>
				<br> <button class="button">Bestel nu!</button></td>
		</tr>
		</form>
	</tbody>
</table>
<p></p><p><?php
                        if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
                           echo "<div valign='top'><a class='buttonuch' href='#popup1'>Bereken de prijs</a></div>";
                        }else{
                            echo "<div valign='top'><input name='save01' type='submit' value='Bereken de prijs'></div>";
                        }
                    ?><br>
<table border="0" width="700" cellspacing="2" cellpadding="2" id="add_job">
	<form action="quotationRecruitment.php" method="post" name="exigences"></form>
	<tbody>
		<tr>
			<td colspan="2">
				<fieldset>
					<legend><b>KOSTENRAMING voor een RECONVERSIE-TEST</b></legend>
					<table border="0" cellspacing="2" cellpadding="0">
						<tbody>
							<tr>
								<td valign="top" width="367">
									<div align="left">
										Medewerker(s) herclassificeren:</div>
								</td>
								<td width="75"><input type="text" placeholder="1,2,3,.." id="nbCandidates" name="specification_cap" size="4"></td>
							</tr>
							<tr>
								<td valign="top" width="367">
									<div align="left">
										Herclassificatie-opties:</div>
								</td>
								<td width="75"><input type="text" placeholder="1,2,3,.." id="nbCandidates" name="specification_cap" size="4"></td>
							</tr>
						</tbody>
					</table>
				</fieldset>
			</td>
			<td><b>Nettoprijs:</b> <input type="text" name="textfieldName" size="4"><br>
				<br><button class="button">Bestel nu!</button></td>
			</td>
		</tr>
		</form>
	</tbody>
</table>
                        <br>
                        <b>Medewerker(s) herclassificeren </b>= aantal personen dat moet worden getest voor dezelfde functie (s). Voorbeeld: een voorbeeld van de vaardigheden van 4 personen op 6 posities. We testen elk van de 4 personen op de 6 mogelijke herklasseringsopties. Eenvoudig en snel, bestel een aparte test voor elk van uw combinaties. 
                    <p><?php
                        if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
                           echo "<div valign='top'><a class='buttonuch' href='#popup1'>Bereken de prijs</a></div>";
                        }else{
                            echo "<div valign='top'><input name='save01' type='submit' value='Bereken de prijs'></div>";
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
            </form><?php
			
		


include_once ("footer.php");


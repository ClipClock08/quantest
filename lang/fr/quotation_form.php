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
<h1>Calculer le prix et commander vos tests? Rien de plus simple! </h1>
    <table border="0" width="784" cellspacing="2" cellpadding="2" id="add_job">
<form action="quotationRecruitment.php" method="post" name="exigences"></form>
	<tbody>
		<tr>
			<td colspan="2">
				<fieldset>
					<legend><b>DEVIS pour un TEST de RECRUTEMENT</b></legend>
					<table border="0" cellspacing="2" cellpadding="0">
						<tbody>
							<tr>
								<td valign="middle" width="180">
									<div align="left">
										Intitul&eacute; du poste:</div>
								</td>
								<td><input name="job[0]" placeholder="ex: directeur du service commercial" size="50" type="text"></td>
							</tr>
							<tr>
								<td valign="top" width="180">
									<div align="left">
										Statut du poste:</div>
								</td>
								<td><select id="fonction" name="specify_function[0]">
										<option value="1">s&eacute;lectionnez...</option>
										<option value="manager">Cadre sup&eacute;rieur</option>
										<option value="midle_management">Cadre moyen</option>
										<option value="Employee">Employ&eacute;</option>
										<option value="Salaried">Salari&eacute;</option>
									</select></td>
							</tr>
							<tr>
								<td valign="top" width="180">
									<div align="left">
										Candidats &agrave; tester:
										</div>
								</td>
								<td><input type="text" placeholder="1,2,3,.." id="nbCandidats" name="nbCandidates" size="4"></td>
							</tr>
						</tbody>
					</table>
				</fieldset>
			</td>
			<td><b>PRIX</b>: <input type="text" name="textfieldName" size="4"> net<br>
				<br> <button class="button">Commandez maintenant! </button></td>
		</tr>
		</form>
	</tbody>
</table>
<p></p><p><?php
                        if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
                           echo "<div valign='top'><a class='buttonuch' href='#popup1'> Calculer le prix</a></div>";
                        }else{
                            echo "<div valign='top'><input name='save01' type='submit' value='Calculer le prix'></div>";
                        }
                    ?><br>
<table border="0" width="700" cellspacing="2" cellpadding="2" id="add_job">
	<form action="quotationRecruitment.php" method="post" name="exigences"></form>
	<tbody>
		<tr>
			<td colspan="2">
				<fieldset>
					<legend><b>DEVIS pour un TEST de RECONVERSION</b></legend>
					<table border="0" cellspacing="2" cellpadding="0">
						<tbody>
							<tr>
								<td valign="top" width="200">
									<div align="left">
										Collaborateur(s) &agrave; reclasser:</div>
								</td>
								<td width="75"><input type="text" placeholder="1,2,3,.." id="nbCandidates" name="specification_cap" size="4"></td>
							</tr>
							<tr>
								<td valign="top" width="200">
									<div align="left">
										Options de reclassement:</div>
								</td>
								<td width="75"><input type="text" placeholder="1,2,3,.." id="nbCandidates" name="specification_cap" size="4"></td>
							</tr>
						</tbody>
					</table>
				</fieldset>
			</td>
			<td><b>PRIX: </b><input type="text" name="textfieldName" size="4"> net<br>
				<br><button class="button">Commandez maintenant! </button></td>
			</td>
		</tr>
		</form>
	</tbody>
</table>
                        <br>
                        <b>Collaborateur(s) à reclasser</b> = nombre de personnes à tester pour le(s) même(s) poste(s).<br> <b>Exemple:</b> prévisualiser les aptitudes de 4 personnes sur 6 postes. Nous testons chacune des 4 personnes sur les 6 options de reclassement possible. Simple et rapide, veuillez commander un test distinct pour chacune de vos combinaisons. 
                    <p><?php
                        if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
                           echo "<div valign='top'><a class='buttonuch' href='#popup1'> Calculer le prix</a></div>";
                        }else{
                            echo "<div valign='top'><input name='save01' type='submit' value='Calculer le prix'></div>";
                        }
                    ?>
                    <div id="popup1" class="overlay">
                    	<div class="popup">
                    		<h2>Cher Utilisateur,</h2>
        		<a class="close" href="#">&times;</a>
                <div class="content">
        	        <p>Cette fonctionnalit&eacute; est active lorsque vous &ecirc;tes connect&eacute;. Veuillez vous <a href="https://quantest.eu/lang/fr/form_auth.php">connecter</a> ou vous <a href="https://quantest.eu/lang/fr/form_register.php">enregistrer</a></p>
        		</div>
                    	</div>
                    </div>
                    
                </div>
            </form><?php
			
		


include_once ("footer.php");


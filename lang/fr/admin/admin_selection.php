<?php

include("header_q.php");

if (isset($_SESSION["email"]) && !empty($_SESSION["password"])) {

    
    $result = $mysqli->query("SELECT first_name FROM `users`");
    
    if($result)
    {
        $rows = mysqli_num_rows($result); // количество полученных строк
     
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            for ($j = 0 ; $j < 1 ; ++$j) { 
                $myStr[$i] = $row[$j];
            }
        }
     
         $myStr = implode("," , $myStr);
        // очищаем результат
         mysqli_free_result($result);
    
    }
    } else {

       exit("<p><strong>Mistake! </strong> You visited this page directly, so there is no data to process. You can go to <a href=". $address_site. "> Home page </a>.</p>");
    }


?>

<script> 
    var candidates = "<?php echo $myStr; ?>"
    
    $( function() {
        var arr = candidates.split(',');
        $( "#nomClient" ).autocomplete({
        source: arr
        });
    });
    
</script>
  
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
			<h1>Test de s&eacute;lection pour le recrutement de personnel</h1>
			<form name="adminClients" action="selection_db.php" method="post">
				<fieldset>
					<legend>Encodage du r&eacute;sultat du test de s&eacute;eacute;lection suivant: </legend> <label for="nomPoste">Nom du Client: <input type="text" id="nomClient" class="autocomplete" name="nomClient" placeholder="select the client from the list"> </label> <label for="nomTest">
					    Modalit&eacute; choisie: <select name="typeOfTest" >
					        <option value="Manual">Configuration manuelle</option>
					        <option value="Expert">Configuration par le syst&egrave;me expert</option>
					    </select>
					    </label>
					    
    	<script>
		    $( "#nomClient" ).change(function() {
		        var name = $("#nomClient").val();
            });
		</script>
		        
		        <p>
		
		            <?php if(isset($_SESSION["candidates"]) && !empty($_SESSION["candidates"])){
    		               echo '<select name="selectCandidates" id="selectCandidates">';
    		               foreach ($_SESSION["candidates"] as $value) {
                                echo '<option value="'.$value.'">'.$value.'</option>';
                            }
                            echo '</select>';
                            echo '<p><button name="choose" id="choose" value="thisCandidat">Choose</button></p>'; 
		            } 
		            ?>
		            
	                <button name="getList" id="list_btn" value="get_list">Liste</button> 
		            
				</p>
				
				</fieldset>
				<hr>
				<p></p>
				<h1>Fiche d'&eacute;valuation de: 
				    <?php if(isset($_SESSION["challenger"]) && !empty($_SESSION["challenger"])){
    		               
                                echo "id = ".$_SESSION['challenger'][0]." + ". $_SESSION["family_name"]." ". $_SESSION["challenger"][1];
		            }
		            else{
		                echo '<h2> Choose candidate! </h2>';
		            }
		            ?>
	            </h1>
				<h2>R&eacute;sultat du test d'&eacute;valuation</h2>
				<div align="left">
					<fieldset><legend> V&eacute;rification de la v&eacute;racit&eacute; des informations g&eacute;n&eacute;riques d&eacute;clar&eacute;es par le candidat </legend> 
    					<label>
        					<ol>
        						<li type="1"> Identit&eacute;: <input type="radio" value="1" name="identite"> Ok <input type="radio" value="2" name="identite"> Non <input type="radio" value="3" name="identite">Pas tout à fait..
        						<li type="1"> &eacute;tat civil: <input type="radio" value="1" name="civil"> Ok <input type="radio" value="2" name="civil"> Non<input type="radio" value="3" name="civil">Pas tout à fait..
        						<li type="1"> &eacute;tudes: <input type="radio" value="1" name="stuides"> Ok <input type="radio" value="2" name="stuides"> Non<input type="radio" value="3" name="stuides">Pas tout à fait..
        						<li type="1"> Exp&eacute;rience professionnelle: <input type="radio" value="1" name="experience"> Ok<input type="radio" value="2" name="experience">Non <input type="radio" value="3" name="experience"> Pas tout à fait..
        					</ol>
    					</label>
				    </fieldset>
					<fieldset>
						<legend> Pr&eacute;somptions </legend>
						<ol>
							<li>Extr&eacute;misme religieux: <select name="religious" width="45" size="1">
									<option value="1">N&eacute;ant</option>
									<option value="2">Insignifiant</option>
									<option value="3">Prise de position cognitive (passive)</option>
									<option value="4">Prise de position active (op&eacute;rative)</option>
									<option value="5">Personne agit&eacute;e en position critique</option>
								</select>
							<li>Extr&eacute;misme anti-occidental:: <select name="antiwestern" width="45" size="1">
									<option value="1">N&eacute;ant</option>
									<option value="2">Insignifiant</option>
									<option value="3">Prise de position cognitive (passive)</option>
									<option value="4">Prise de position active (op&eacute;rative)</option>
									<option value="5">Personne agit&eacute;e en position critique</option>
								</select>
						</ol>
					</fieldset>

					<fieldset>
						<legend> Sp&egrave;re personnelle:</legend><label>
						<ol>
							<li type="1">Condition physique: <select name="physical_state" width="45" size="1">
									<option value="1">s&eacute;lectionner...</option>
									<option value="2">< 5.000 UB</option>
									<option value="3">from 5.001 to 6.490 UB</option>
									<option value="4">from 6.500 to 7.000 UB</option>
									<option value="5">> 7.000 UB</option>
								</select>
							<li type="1">Condition psychologique: <select name="psycho_state" width="45" size="1">
									<option value="1">s&eacute;lectionner...</option>
									<option value="2">< 4.000 UB</option>
									<option value="3"> 4.001 &agrave; 5.000 UB</option>
									<option value="4"> 5.001 &agrave; 6.500 UB</option>
									<option value="5">> 6.500 UB</option>
								</select>
							<li type="1">D&eacute;pendances (alcool,..): <select name="alcohol" width="45" size="1">
									<option value="1">s&eacute;lectionner...</option>
									<option value="2">Aucune</option>
									<option value="3">Non significative</option>
									<option value="4">Appr&eacute;cie sans en d&eacute;pendre</option>
									<option value="5">D&eacute;pendance l&eacute;g&egrave;re</option>
									<option value="6">D&eacute;pendance significative</option>
								</select>
							<li type="1">Int&eacute;grit&eacute;: <select name="integrity" width="45" size="1">
									<option value="1">s&eacute;lectionner...</option>
									<option value="2">Sujet int&egrave;gre</option>
									<option value="3">Peut s&#039;accorder des libert&eacute;s</option>
									<option value="4">Risque de d&eacute;viance</option>
									<option value="5">Int&eacute;grit&eacute; fallacieuse</option>
								</select>
								<li type="1">Morality: <select name="morality" width="45" size="1">
									<option value="1">s&eacute;lectionner...</option>  
									<option value="2">Valeurs morales solides</option>
									<option value="3">Moyennement satisfaisante</option>
									<option value="4">Moyennement discutable</option>
									<option value="5">Morale fallacieuse</option>
								</select></label>

							</legend>
						</ol>
					</fieldset>

					<fieldset>
						<legend>Sp&egrave;re professionnelle:</legend><label>
						<ol>
							<li type="1"> &Eacute;tudes et exp&eacute;rience h&eacute;rit&eacute;e pour s&#039;assumer dans cette fonction: <select name="summary_exp" width="45" size="1">
									<option value="1">s&eacute;lectionner...</option> 
									<option value="2">1. Pr&eacute;paration insuffisante (&eacute;tudes et/ou exp&eacute;rience utile)</option>
									<option value="3">2. Lacunes dans sa pr&eacute;paration actuelle</option>
									<option value="4">3. Pr&eacute;paration suffisante  </option>
									<option value="5">4. Bonne pr&eacute;paration </option>
									<option value="6">5. Excellente pr&eacute;paration </option>
								</select>
							<li type="1"> Son naturel en mati&egrave;re de s&eacute;curit&eacute;: <br><select name="safety" width="45" size="1">
									<option value="1">s&eacute;lectionner...</option> 
									<option value="2">1. Proc&egrave;de n&#039;importe comment avec prise de risques</option>
									<option value="3">2. Souvent en infraction par rapport aux consignes de s&eacute;curit&eacute;</option>
									<option value="4">3. Travaille en s&eacute;curit&eacute; sans sp&eacute;cialement s&#039;occuper des autres</option>
									<option value="5">4. Travaille en s&eacute;curit&eacute; et il est pr&eacute;voyant de la s&eacute;curit&eacute; des autres</option>
									<option value="6">5. Excellent garant de la s&eacute;curit&eacute; </option>
							</select>
								<li type="1"> Qualit&eacute; de son travail dans cette fonction: <select name="quality" width="45" size="1">
									<option value="1">s&eacute;lectionner...</option> 
									<option value="2">1. Beaucoup &agrave; redire et soins insuffisants</option>
									<option value="3">2. Minutie et soins instables, fiabilit&eacute; variable.</option>
									<option value="4">3. Travail raisonnablement effectu&eacute;. Peu de remarques &agrave; faire</option>
									<option value="5">4. Travail fiable, on peut lui faire confiance.</option>
									<option value="6">5. Travail soign&eacute; de la meilleure qualit&eacute;</option>
								</select>
								<li type="1"> Sens naturel en mati&egrave;re d&#039;organisation: <select name="organization" width="45" size="1">
									<option value="1">s&eacute;lectionner...</option> 
									<option value="2">1. Sans ordre ni m&eacute;thode. Potentiellement dangereux</option>
									<option value="3">2. Ordre et m&eacute;thode aux limites de l&#039;acceptable. Il faut le surveiller</option>
									<option value="4">3. Ordonn&eacute; et m&eacute;thodique</option>
									<option value="5">4. S&#039;organise et travaille de mani&egrave;re exemplaire</option>
									<option value="6">5. Fait preuve d&#039;une capacit&eacute; d&#039;organisation remarquable </option>
								</select>
								<li type="1"> Son naturel en mati&egrave;re de cadence de travail: <select name="terms_of_work" width="45" size="1">
									<option value="1">s&eacute;lectionner...</option> 
									<option value="2">1. Vitesse d&#039;intervention et de r&eacute;action insuffisantes</option>
									<option value="3">2. Lenteur &agrave; la limite de l&#039;acceptable </option>
									<option value="4">3. Cadence de travail raisonnable</option>
									<option value="5">4. R&eacute;alise &agrave; une vitesse sup&eacute;rieure &agrave; la moyenne</option>
									<option value="6">5. Excelle dans l&#039;exploitation du temps &agrave; sa disposition</option>
								</select>
								<li type="1"> Son naturel en mati&egrave;re des responsabilit&eacute;s: <select name="responsibilities" width="45" size="1">
									<option value="1">s&eacute;lectionner...</option> 
									<option value="2">1. Assumer une responsabilit&eacute; est le moindre de ses soucis</option>
									<option value="3">2. Fait ce qu&#039;il peut mais il faut le suivre</option>
									<option value="4">3. Dans les conditions normales il fait ce qu&#039;il faut </option>
									<option value="5">4. Fiable, il assume sans qu&#039;il soit n&eacute;cessaire de le surveiller</option>
									<option value="6">6. Excellente autonomie et prise de dispositions judicieuses</option>
								</select>
								<li type="1"> Son naturel en mati&egrave;re d&#039;initiative: <select name="initiative" width="45" size="1">
									<option value="1">s&eacute;lectionner...</option> 
									<option value="2">1. Il faut &ecirc;tre constamment derri&egrave;re pour lui dire ce qu&#039;il doit faire </option>
									<option value="3">2. Motivation d&#039;entreprendre limit&eacute;e, il faut le stimuler</option>
									<option value="4">3. Il se d&eacute;brouille bien</option>
									<option value="5">4. Fait face aux situations impr&eacute;vues et il s&#039;en sort tr&egrave;s bien  </option>
									<option value="6">5. Cr&eacute;atif et innovant  </option>
								</select>

								<li type="1"> Son naturel en mati&egrave;re de comportement social: <select name="social_behavior" width="45" size="1">
									<option value="1">s&eacute;lectionner...</option> 
									<option value="2">1. A priori il ne s&#039;arrange avec personne </option>
									<option value="3">2. Comportement et doigt&eacute; social &agrave; la limite de l&#039;acceptable</option>
									<option value="4">3. Comportement social correct</option>
									<option value="5">4. Bonne aptitude pour la communication, s&#039;int&egrave;gre facilement</option>
									<option value="6">5. Excellent communicateur, tout le monde le recherche</option>
								</select>
								<li type="1"> Sa motivation et int&eacute;r&ecirc;t pour s&#039;investir dans cette fonction: <select name="motivation" width="45" size="1">
									<option value="1">s&eacute;lectionner...</option> 
									<option value="2">1. Le travail relatif &agrave; cette fonction est le moindre de ses int&eacute;r&ecirc;ts</option>
									<option value="3">2. Son int&eacute;r&ecirc;t est limit&eacute;, risque de d&eacute;part &agrave; court terme.  </option>
									<option value="4">3. Bonne motivation pour s&#039;investir dans cette fonction</option>
									<option value="5">4. Tr&egrave;s motiv&eacute; par cette fonction</option>
									<option value="6">5. S&#039;investir dans cette fonction satisfait une v&eacute;ritable passion  </option>
								</select>
								<li type="1"> Son naturel en mati&egrave;re de disponibilit&eacute; professionnelle: <select name="professional_availability" width="45" size="1">
									<option value="1">s&eacute;lectionner...</option> 
									<option value="2">1. Rechigne contre tout travail en dehors des heures</option>
									<option value="3">2. Se dissocie facilement de participer en dehors des heures</option>
									<option value="4">3. Accepte parfois de travailler en dehors des heures</option>
									<option value="5">4. Disponibilit&eacute; sup&eacute;rieure &agrave; la moyenne</option>
									<option value="6">5. On peut toujours compter sur lui</option>
								</select>

								<li type="1"> Son naturel en mati&egrave;re d&#039;assiduit&eacute; et de ponctualit&eacute; au travail: <select name="attendance_and_punctuality" width="45" size="1">
									<option value="1">s&eacute;lectionner...</option>
									<option value="2">1. On ne peut pas compter sur lui</option>
									<option value="3">2. Compter sur lui c&#039;est prendre un risque</option>
									<option value="4">3. Se situe dans la moyenne g&eacute;n&eacute;rale</option>
									<option value="5">4. Tr&egrave;s fiable</option>
									<option value="6">5. S&#039;il n&#039;est pas l&agrave; ce qu&#039;il lui est arriv&eacute; un gros probl&egrave;me</option>

								</select>
								<li type="1"> Aptitude naturelle en mati&egrave;re de formation: <select name="training" width="45" size="1">
									<option value="1">s&eacute;lectionner...</option>
									<option value="2">1. R&eacute;calcitrant pour montrer aux autres</option>
									<option value="3">2. Se limite &agrave; montrer l&#039;essentiel et en garde pour lui</option>
									<option value="4">3. On peut lui confier la formation de nouveaux collaborateurs</option>
									<option value="5">4. Il transmet ais&eacute;ment ses connaissances </option>
									<option value="6">5. Sens tr&egrave;s d&eacute;velopp&eacute; pour transmettre ses connaissances</option>
								</select>

							<li type="1"> Aptitude naturelle pour le commandement: <select name="command" width="45" size="1">
									<option value="1">s&eacute;lectionner...</option>
									<option value="2">1. Il n&#039;a pas d&#039;autorit&eacute; et il s&#039;y prend tr&egrave;s mal</option>
									<option value="3">2. Ne r&eacute;ussit pas bien dans le r&ocirc;le d&#039;influence</option>
									<option value="4">3. Parvient g&eacute;n&eacute;ralement &agrave; faire passer ses instructions  </option>
									<option value="5">4. Il est tr&egrave;s bon pour influencer et exercer l&#039;autorit&eacute; </option>
									<option value="6">5. Aptitude naturelle au commandement</option>
								</select></label></legend>
						</ol>
					</fieldset>
					</fieldset></div>
				<p><input name="saveResult" value="Enregistrer" type="submit"> L'enregistrement transmet les s&eacute;lections sur la fiche individuelle du candidat test&eacute;.</p>
			</form>
		</div>
		
	
   
		<?php

        include("footer.php");
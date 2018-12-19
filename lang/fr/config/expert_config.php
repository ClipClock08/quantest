<?php
include ("header_q.php");
/*if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
    exit("<p><strong>Error! </strong> You visited this page directly, so there is no data to process. You can go to the <a href=".$address_site."> home page </a>.</p>");
}*/
?>
    <div class="block_for_messages">
        <?php
        //If there are error messages in the session, then output them
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];

            //Destroy the error_messages cell so that error messages do not reappear when the page is updated.
            unset($_SESSION["error_messages"]);
        }

        //If there are success messages in the session, then output them
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];

            //Destroy the success_messages cell so that messages do not reappear when the page is updated.
            unset($_SESSION["success_messages"]);
        }
        ?>
    </div>

   <table border="0" cellpadding="5" cellspacing="2" width="647">
	<tr>
		<td valign="top" align="left" colspan="2">
            
                  <h1>Test de s&eacute;lection pour un recrutement</h1>
                       <h2>Les exigences de la fonction seront automatiquement d&eacute;termin&eacute;es par le syst&egrave;me expert QUANTEST</h2>
                  
                    <p> <form name="exigences" action="expert_config_db.php" method="post">
                        <div align="left">
                            <fieldset>
                                <legend><b>Identifiez la fonction &agrave; pourvoir</b></legend>
                               <p> <label for="service">Intitul&eacute; de la fonction: <input type="text" id="nomPoste"
                                                                                   name="service"
                                                                                   placeholder="sp&eacute;cifiez.."
                                                                                   size="39" required> </label></p>
                               <p>  <label for="service">Service:
                                   <select name="fonction" id="fonction">
                                        <option value="1">s&eacute;lectionnez..</option>
                                        <option value="2">Service du personnel, RH</option>
                                        <option value="3">Comptabilit&eacute;</option>
                                        <option value="4">Achats</option>
                                        <option value="5">Commercial</option>
                                        <option value="6">Production</option>
                                        <option value="7">Maintenance</option>
                                        <option value="8">Informatique</option>
                                        <option value="9">Bureau d&#039;&eacute;tudes/ R&D</option>
                                        <option value="10">Autre service? Sp&eacute;cifiez =></option>
                                    </select></label> <input type="text" id="#" name="other_service" placeholder="sp&eacute;cifiez le service..." size="30"></p>
Statut de la fonction:
                                   <select name="experience" id="fonction_exp">
                                        <option value="1">s&eacute;lectionnez..</option>
                                        <option value="2">Cadre sup&eacute;rieur</option>
                                        <option value="3">Cadre moyen</option>
                                        <option value="4">Employ&eacute;</option>
                                        <option value="5">Ouvrier</option>
                                        <option value="6">Stagiaire/ &Eacute;tudiant</option>
                                    </select></p>
                            </fieldset>
                            <br>
                        En cliquant sur "Continuer" vous acc&eacute;dez au formulaire pour l'enregistrement des candidats &agrave; tester.<p>
                            <?php
                                if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
                                   echo "<div valign='top'><a class='buttonuch' href='#popup1'> Continuer </a></div>";
                                }else{
                                    echo "<input name='expert_conf' value='Continuer' type='submit'>";
                                }
                            ?></p>
                        </div>
                </form>
	</tr>
</table>
        
        <div id="popup1" class="overlay">
        	<div class="popup">
        		<h2>Cher Utilisateur,</h2>
        		<a class="close" href="#">&times;</a>
                <div class="content">
        	        <p>Cette fonctionnalit&eacute; est active lorsque vous &ecirc;tes connect&eacute;. Veuillez vous <a href="https://quantest.eu/lang/fr/form_auth.php">connecter</a> ou vous <a href="https://quantest.eu/lang/fr/form_register.php">enregistrer</a></p>
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
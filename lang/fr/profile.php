<?php
/**
 * Created by PhpStorm.
 * User: alexdev
 * Date: 08.10.18
 * Time: 11:21
 * $string = unserialize( base64_decode( $string ) );
 * 
 */
include("header_q.php");
unset ($_SESSION['rec_save']);
unset ($_SESSION['[selection_save]']);

if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
    exit("<p><strong>Oops!</strong> La page demandée ne peut être visualisée hors connexion. SVP, veuillez visiter la <a href=".$address_site."> page d'accueil</a> pour vous connecter ou vous enregistrer.</p>");
} else {
    
    $id_client = $_SESSION['id'];
    $email = $_SESSION['email'];
    
?>

<table border="0" cellpadding="2" cellspacing="2">
            <tr>
                <td>
                    <fieldset>
                        <legend><h2><b>Votre profil Client</b></h2></legend><br>
                        <table border="0" cellpadding="3" cellspacing="3" width="750">
                            <tbody>
						<tr>
							<td valign="top" width="241">Statut Client:</td>
							<td width="342"><b>Employeur</b></td>
						</tr>
						<tr>
                                <td valign="top" width="241">
                                    <div align="left">Prénom:</div>
                                </td>
                                <td width="342"><b>Angelo</b></td>
                            </tr>
                            <tr>
                                <td width="241">
                                    <div align="left">Nom:</div>
                                </td>
                                <td width="342"><b>CARUSO</b></td>
                            </tr>
						<tr>
							<td valign="top" width="241">Fonction dans l'entreprise:</td>
							<td><b>Manager</b></td>
						</tr>
						<tr>
							<td valign="top" width="241">Nom de l'Entreprise:</td>
							<td><b>QUANTEST</b></td>
						</tr>
						<tr>
							<td valign="top" width="241">Adresse email professionnelle :</td>
							<td><b>amaindroite@gmail.com</b></td>
						</tr>
						<tr>
							<td valign="top" width="241">Site Web de l'Entreprise:</td>
						
                           
                                <td valign="top"><b>quantest.eu</b></td>
                            </tr>
                            </tbody>
                        </table>
                    </fieldset>
			 <br> <fieldset>
                        <legend><h2><b>Aperçu de vos tests commandés</b></h2></legend><br>
                        <table border="1" cellpadding="3" cellspacing="3" width="750">
                            <tbody>
						<tr>
							<td valign="top" width="97">Date</td>
							<td width="93"><b>Type de test</b></td>
							<td width="290"><b>Nom du test ou du candidat</b></td>
							<td width="107"><b>Nbre</b></td>
							<td width="222"><b>Statut du test (3)</b></td>
							<td width="222"><b>Affichage</b></td>
						</tr>
						<tr>
                                <td valign="top" width="97">
                                    <div align="left">
									j/m/année</div>
                                </td>
                                <td width="93">Recrutement</td>
							<td width="290">Enmployé du service achats</td>
							<td width="107">32 candidats</td>
							<td width="222">En attente..</td>
							<td width="222">Afficher candidats</td>
						</tr>
                            <tr>
                                <td width="97">
                                    <div align="left">
									j/m/année</div>
                                </td>
                                <td width="93">Reconversion</td>
							<td width="290">Albert Einstein</td>
							<td width="107">3 postes en option</td>
							<td width="222">En cours..</td>
							<td width="222">Afficher </td>
						</tr>
						<tr>
							<td valign="top" width="97">
									j/m/année</td>
							<td width="93">Reconversion</td>
							<td width="290">Robert de Niro</td>
							<td width="107">6 postes en option</td>
							<td width="222">Effectué!</td>
							<td width="222">Afficher le résultat <br>Télécharger le résultat (pdf)<br> Imprimer fiche(s) du résultat</td>
						</tr>
					</tbody>
                        </table>
                    </fieldset>
			
                </td>
            </tr>
        </table>
		
		
  
<?php

include_once ("footer.php");
}
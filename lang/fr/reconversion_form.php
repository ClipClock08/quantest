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

    <h1>Test pour une reconversion professionnelle</h1>
	<h2>Introduisez les généralit&eacute;s des fonctions disponibles pour le collaborateur &agrave; reclasser</h2>
       
          <p>  <form action="reconversion.php" method="post" name="exigences">
              <table border="0" width="650" cellspacing="2" cellpadding="2" id="add_job">
                        <tbody>
                        <tr>
                            <td colspan="2">
                                <fieldset>
                                    <legend><b>Configurez l'OPTION n°1</b></legend>
                                    <table border="0" cellspacing="2" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td valign="middle" width="241">
                                                <div align="left">
                                                    Intitul&eacute; du poste:</div>
                                            </td>
                                            <td width="437"><input name="job[0]" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" width="241">
                                                <div align="left">Nom du Service:</div>
                                            </td>
                                            <td width="437"><input name="service_name[0]" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="top" width="241">
                                                <div align="left">
                                                    Statut de la fonction:</div>
                                            </td>
                                            <td width="437">
                                                <select id="fonction" name="specify_function[0]">
                                                    <option value="1">s&eacute;lectionnez...</option>
                                                    <option value="manager">Cadre sup&eacute;rieur</option>
                                                    <option value="midle_management">Cadre moyen</option>
                                                    <option value="Employee">Employ&eacute;</option>
                                                    <option value="Salaried">Salari&eacute;</option>

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
                                <fieldset>
                                    <legend><b>Configurez l'OPTION n° 2</b></legend>
                                    <table border="0" cellspacing="2" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td valign="middle" width="241">
                                                <div align="left">
                                                    Intitul&eacute; du poste:</div>
                                            </td>
                                            <td width="437"><input name="job[0]" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" width="241">
                                                <div align="left">Nom du Service:</div>
                                            </td>
                                            <td width="437"><input name="service_name[0]" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="top" width="241">
                                                <div align="left">
                                                    Statut de la fonction:</div>
                                            </td>
                                            <td width="437">
                                                <select id="fonction" name="specify_function[0]">
                                                    <option value="1">s&eacute;lectionnez...</option>
                                                    <option value="manager">Cadre sup&eacute;rieur</option>
                                                    <option value="midle_management">Cadre moyen</option>
                                                    <option value="Employee">Employ&eacute;</option>
                                                    <option value="Salaried">Salari&eacute;</option>

                                                </select>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                              
                            </td>
                        </tr>

                        </tbody>
                    </table>
              <p> <input type="button" onclick="add_job()" value="Ajouter une option de poste"><br></p>
                
                <div>
                    <td colspan="2" valign="top">
                        <fieldset>
                            <legend><b> Identifiez le collaborateur &agrave; reclasser </b></legend>
                            <table border="0" cellspacing="2" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td valign="middle" width="241">
                                        <div align="left">
                                            Nom:</div>
                                    </td>
                                    <td width="437"><input name="reclass_name" size="24" type="text"></td>
                                </tr>
                                <tr>
                                    <td valign="middle" width="241">
                                        <div align="left">
                                            Pr&eacute;nom:</div>
                                    </td>
                                    <td valign="top" width="437"><input name="reclass_fisrt_name" size="24" type="text"></td>
                                </tr>
                                <tr>
                                    <td valign="middle" width="241">
                                        <div align="left">
                                            Date de naissance:</div>
                                    </td>
                                    <td width="437"><input name="reclass_birth" type="date"></td>
                                </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <br>
                        En cliquant sur "Enregistrer" les aptitudes de ce collaborateur seront testées selon les exigences des postes en option indiqués.<br>Le résultat du test, en accord avec votre cammande, sera visible sur votre page personnelle (profil).
                    <p><?php
                        if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
                           echo "<div valign='top'><a class='buttonuch' href='#popup1'> Enregistrer </a></div>";
                        }else{
                            echo "<div valign='top'><input name='save01' type='submit' value='Validate'></div>";
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


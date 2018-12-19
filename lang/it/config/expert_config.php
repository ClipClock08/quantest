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

    <table border="0" cellpadding="5" cellspacing="2" width="642">
	<tr>
		<td valign="top" align="left" colspan="2">
               
                    
                       <h1>Test di selezione per un reclutamento </h1>
                        <h2>I requisiti della funzione saranno automaticamente stabiliti dal sistema esperto QUANTEST</h2>
                    
                 <p>  <form name="exigences" action="expert_config_db.php" method="post">
                         <fieldset>
                                <legend><b>Identifica la funzione da ricoprire </b></legend>
                                <p> <label for="service">Titolo della funzione: 
                                <input type="text" id="service" name="service" placeholder="type the name..." required size="39">
                                </label></p>
                               <p> <label for="service">Servizio:
                                    <select name="fonction" id="fonction">
                                        <option value="1">seleziona..</option>
                                        <option value="2">Servizio HR, risorse umane</option>
                                        <option value="3">Contabilità</option>
                                        <option value="4">Acquisti</option>
                                        <option value="5">Commerciale</option>
                                        <option value="6">Produzione</option>
                                        <option value="7">Manutenzione</option>
                                        <option value="8">Informatica</option>
                                        <option value="9">Progettazione e ricerca</option>
                                        <option value="10">Altro servizio? Specificalo =></option>
                                    </select></label> <input type="text" id="service" name="service" placeholder="specifica il servizio..." size="30"></p>


                                    Statuto della funzione:
                                    <select name="fonction_exp" id="fonction_exp">
                                        <option value="1">seleziona..</option>
                                        <option value="2">Quadro superiore</option>
                                        <option value="3">Quadro medio</option>
                                        <option value="4">Impiegato</option>
                                        <option value="5">Operaio</option>
                                        <option value="6">Apprendista/ Studente</option>
                                    </select>
                            </fieldset><br>
Cliccando su "Continua" accedi al modulo per l'introduzione dei candidati da testare.<p>
                            <?php
                                if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
                                   echo "<div valign='top'><a class='buttonuch' href='#popup1'> Continua </a></div>";
                                }else{
                                    echo "<input name='expert_conf' value='Continue' type='submit'>";
                                }
                            ?></p>
                        </div>
                </form>
	</tr>
</table>
        
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

<?php
/**
 * Created by PhpStorm.
 * User: alexdev
 * Date: 05.10.18
 * Time: 12:51
 */
include ("footer.php");
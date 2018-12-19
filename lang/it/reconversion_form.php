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

  <h1>Test per una riqualificazione professionale</h1>
		<h2>Introduci le generalit&agrave; delle possibili funzioni per il collaboratore disponibile</h2>
       
           <p> <form action="reconversion.php" method="post" name="exigences">
               <table border="0" width="650" cellspacing="2" cellpadding="2" id="add_job">
                        <tbody>
                        <tr>
                            <td colspan="2">
                                <fieldset>
                                    <legend><b>Generalità opzione posto Lavoro n°1 </b></legend>
                                    <table border="0" cellspacing="2" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td valign="middle" width="241">
                  Nome del posto di lavoro:
                                            </td>
                                            <td width="437"><input name="job[0]" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" width="241">
                                               Nome del Servizio:
                                            </td>
                                            <td width="437"><input name="service_name[0]" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="top" width="241">
                                              Specifica statuto funzione:
                                            </td>
                                            <td width="437">
                                                <select id="fonction" name="specify_function[0]">
                                                    <option value="1">seleziona...</option>
                                                    <option value="manager">Quadro superiore</option>
                                                    <option value="midle_management">Quadro medio</option>
                                                    <option value="Employee">Stipendiato</option>
                                                    <option value="Salaried">Operaio</option>

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
                            <legend><b>Generalità opzione posto Lavoro n°2 </b></legend>
                                    <table border="0" cellspacing="2" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td valign="middle" width="241">
                  Nome del posto di lavoro:
                                            </td>
                                            <td width="437"><input name="job[0]" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" width="241">
                                               Nome del Servizio:
                                            </td>
                                            <td width="437"><input name="service_name[0]" size="50" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td valign="top" width="241">
                                              Specifica statuto funzione:
                                            </td>
                                            <td width="437">
                                                <select id="fonction" name="specify_function[0]">
                                                    <option value="1">seleziona...</option>
                                                    <option value="manager">Quadro superiore</option>
                                                    <option value="midle_management">Quadro medio</option>
                                                    <option value="Employee">Stipendiato</option>
                                                    <option value="Salaried">Operaio</option>

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
              
              
                   <p> <input type="button" onclick="add_job()" value="Inserisci l'opzione di un altro posto di lavoro"></p>
             
                <div>
                    <td colspan="2" valign="top">
                        <fieldset>
                            <legend><b> Generalità del collaboratore da riqualificare </b></legend>
                            <table border="0" cellspacing="2" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td valign="middle" width="241">
                                     
                                            Cognome:
                                    </td>
                                    <td width="437"><input name="reclass_name" size="24" type="text"></td>
                                </tr>
                                <tr>
                                    <td valign="middle" width="241">
                                      
                                            Nome:
                                    </td>
                                    <td valign="top" width="437"><input name="reclass_fisrt_name" size="24" type="text"></td>
                                </tr>
                                <tr>
                                    <td valign="middle" width="241">
                                  
                                            Data di nascita:
                                    </td>
                                    <td width="437"><input name="reclass_birth" type="date"></td>
                                </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <br>
                    </td>
                </div>
                Cliccando su "Salva" le abilità di questo dipendente saranno valutate in base ai requisiti degli impieghi opzionali indicati.<br> Il risultato del test, in accordo con il tuo ordine, sarà visibile sulla tua pagina personale (profilo).
                   
            </form></p> <p> <?php
                        if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
                           echo "<div valign='top'><a class='buttonuch' href='#popup1'>Salva</a></div>";
                        }else{
                            echo "<div valign='top'><input name='save01' type='submit' value='Validate'></div>";
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
            </form>
			
			<?php
include_once ("footer.php");
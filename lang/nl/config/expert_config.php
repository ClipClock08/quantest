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

    <table border="0" cellpadding="5" cellspacing="2" width="640">
	<tr>
		<td valign="top" align="left" colspan="2">
               
                  
                        <h1>Selectietest voor een werving</h1>
                        <h2>De vereisten van de functie worden automatisch vastgesteld door het QUANTEST expertsysteem.</h2>
                   
                     <p> <form name="exigences" action="expert_config_db.php" method="post">
                       
                            <fieldset>
                                <legend><b> Identificatie van de functie die moet worden </b></legend>
                              <p>  <label for="service">Functietitel: <input type="text" id="nomPoste"
                                                                                   name="service"
                                                                                   placeholder="specificeren.."
                                                                                   size="39" required> </label></p>
                              <p>  <label for="service">Dienst:
                                    <select name="fonction" id="fonction">
                                        <option value="1">selecteer..</option>
                                        <option value="2">PersoneelsDienst, HR</option>
                                        <option value="3">Accouting</option>
                                        <option value="4">Aankopen</option>
                                        <option value="5">Commerci&euml;le</option>
                                        <option value="6">Productie</option>
                                        <option value="7">Onderhoud</option>
                                        <option value="8">Informatica</option>
                                        <option value="9">Studiebureau, O&O</option>
                                        <option value="10">Other dienst? Specificeren =></option>
                                    </select></label> <input type="text" id="nomPoste" name="service" placeholder="specificeren.." size="30" ></p>

   Status van de functie:
                                    <select name="experience" id="fonction_exp">
                                        <option value="1">selecteer..</option>
                                        <option value="2">Senior manager</option>
                                        <option value="3">Middle manager</option>
                                        <option value="4">Werknemer</option>
                                        <option value="5">Arbeider</option>
                                        <option value="6">Stagiair / student</option>
                                    </select>
                            </fieldset>
<p>Door op "Doorgaan" te klikken, krijgt u toegang tot het formulier waarmee kandidaten kunnen worden getest.</p>
                            <?php
                                if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
                                   echo "<div valign='top'><a class='buttonuch' href='#popup1'> Doorgaan </a></div>";
                                }else{
                                    echo "<input name='expert_conf' value='Continue' type='submit'>";
                                }
                            ?></p>
                        </div>
                </form></p>
	</tr>
</table>
        
        <div id="popup1" class="overlay">
        	<div class="popup">
        		<h2>Beste Bezoeker,</h2>
        		<a class="close" href="#">&times;</a>
                <div class="content">
        	        <p>Deze functie is actief wanneer u bent aangemeld. Log in of registreer <a href="https://quantest.eu/lang/nl/form_auth.php">Log in</a> of <a href="https://quantest.eu/lang/nl/form_register.php"> registreer</a></p>
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
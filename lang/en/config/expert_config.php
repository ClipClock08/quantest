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
<!--<div class="box">-->
    <table border="0" cellpadding="5" cellspacing="2" width="631">
	<tr>
		<td valign="top" align="left" colspan="2">
                
                   <h1>Selection test for a recruitment</h1>
                          <h2>The requirements of the function will be automatically established by the expert system QUANTEST</h2>
                    
                   <p> <form name="exigences" action="expert_config_db.php" method="post">
                        <div align="left">
                            <fieldset>
                               <legend><b>Identification of the function to be filled</b></legend>
                               <p> <label for="service">Name of the function:
                                    <input type="text" id="service" name="service" placeholder="type the name..." required size="39">
                                </label><br/>
                              <p>  <label for="service">Service:
                                    <select name="fonction" id="fonction">
                                        <option value="1">select...</option>
                                        <option value="2">HR Service</option>
                                        <option value="6">Accouting</option>
                                        <option value="3">Purchases</option>
                                        <option value="4">Commercial</option>
                                        <option value="4">Production</option>
                                        <option value="5">Maintenance</option>
                                        <option value="5">Data processing, IT</option>
                                        <option value="5">Office of studies/ R&D</option>
                                        <option value="5">Other service? Specify =></option> </select> 
										
                                  <input type="text" id="service" name="other_service" placeholder="specify the service..." size="30">
                                </label></p>
                              <p>  <label for="status">Status of the function:
                                    <select name="experience" id="experience">
                                        <option value="1">select...</option>
                                        <option value="2">Senior manager</option>
                                        <option value="3">Middle manager</option>
                                        <option value="4">Employee</option>
                                        <option value="5">Worker</option>
                                        <option value="6">Trainee/ Student</option>
                                    </select>
                                </label></p>
                            </fieldset><br>
By clicking on "Continue" you access the form to register the candidates to test.<p>
                            <?php
                                if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
                                   echo "<div valign='top'><a class='buttonuch' href='#popup1'> Continue </a></div>";
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
        		<h2>Dear User,</h2>
        		<a class="close" href="#">&times;</a>
                <div class="content">
        	        <p>This feature is active when you are connected. Please, <a href="https://quantest.eu/lang/en/form_auth.php">connect</a> or <a href="https://quantest.eu/lang/en/form_register.php">register</a></p>
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
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
			<h2>Admin professional reconversion test</h2>
			<form name="adminClients" action="reconversion_db.php" method="post">
				<fieldset>
					<legend>Encoding the values of a job selection test </legend> <label for="nomPoste">Client name: <input type="text" id="nomClient" class="autocomplete" name="nomClient" placeholder="select the client from the list"> </label>
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
		            
	                <button name="getList" id="list_btn" value="get_list">Get list</button> 
		            
				</p>
				
				</fieldset>
				<hr>
				<p></p>
				<h2>Evaluation sheet of  
				    <?php if(isset($_SESSION["challenger"]) && !empty($_SESSION["challenger"])){
    		               
                                echo "id = ".$_SESSION['challenger'][0]." + ". $_SESSION["challenger"][2]." ". $_SESSION["challenger"][3]." ". $_SESSION["challenger"][4];
		            }
		            else{
		                echo '<h2> Choose candidate! </h2>';
		            }
		            ?>
	            </h2>
            <h3>Professional reconversion test</h3>
            <div align="left">
                <fieldset>
                    <legend> Interest for the employee</legend>
                    <label>
                        <ol>
                            <li type="1">Personal interest: <select name="interest" width="45" size="1">
                                    <option value="1">select..</option>
                                    <option value="2">Insufficient</option>
                                    <option value="3">Limit</option>
                                    <option value="4">Good</option>
                                    <option value="5">Very good</option>
                                    <option value="6">Excellent</option>

                                </select>
                            <li type="1">Medium-term satisfaction: <select name="medium_term" width="45" size="1">
                                    <option value="1">select..</option>
                                    <option value="2">Insufficient</option>
                                    <option value="3">Limit</option>
                                    <option value="4">Good</option>
                                    <option value="5">Very good</option>
                                    <option value="6">Excellent</option>

                                </select>
                            <li type="1">Long-term satisfaction: <select name="long_term" width="45" size="1">
                                    <option value="1">select..</option>
                                    <option value="2">Insufficient</option>
                                    <option value="3">Limit</option>
                                    <option value="4">Good</option>
                                    <option value="5">Very good</option>
                                    <option value="6">Excellent</option>

                                </select>
                            <li type="1">Physical adequacy: <select name="physical_adequacy" width="45" size="1">
                                    <option value="1">select..</option>
                                    <option value="2">Insufficient</option>
                                    <option value="3">Limit</option>
                                    <option value="4">Good</option>
                                    <option value="5">Very good</option>
                                    <option value="6">Excellent</option>

                                </select>
                            <li type="1">Behavioral adequacy: <select name="behavioral_adequacy" width="45" size="1">
                                    <option value="1">select..</option>
                                    <option value="2">Insufficient</option>
                                    <option value="3">Limit</option>
                                    <option value="4">Good</option>
                                    <option value="5">Very good</option>
                                    <option value="6">Excellent</option>

                                </select>
                            <li type="1">Ability to adapt: <select name="ability_to_adapt" width="45" size="1">
                                    <option value="1">select..</option>
                                    <option value="2">Insufficient</option>
                                    <option value="3">Limit</option>
                                    <option value="4">Good</option>
                                    <option value="5">Very good</option>
                                    <option value="6">Excellent</option>

                                </select>

                        </ol>
                    </label>
                </fieldset>

                <fieldset>
                    <legend> Interest for the employer</legend>
                    <ol>
                        <li type="1">Quality of work: <select name="quality_work" width="45" size="1">
                                <option value="1">select..</option>
                                <option value="2">Insufficient</option>
                                <option value="3">Limit</option>
                                <option value="4">Good</option>
                                <option value="5">Very good</option>
                                <option value="6">Excellent</option>

                            </select>
                        <li type="1">Care and productivity: <select name="care_productivity" width="45" size="1">
                                <option value="1">select..</option>
                                <option value="2">Insufficient</option>
                                <option value="3">Limit</option>
                                <option value="4">Good</option>
                                <option value="5">Very good</option>
                                <option value="6">Excellent</option>

                            </select>
                        <li type="1">Speed of adaptation: <select name="speed_adaptation" width="45" size="1">
                                <option value="1">select..</option>
                                <option value="2">Insufficient</option>
                                <option value="3">Limit</option>
                                <option value="4">Good</option>
                                <option value="5">Very good</option>
                                <option value="6">Excellent</option>

                            </select>
                        <li type="1">Potential for evolution: <select name="potential_evolution" width="45" size="1">
                                <option value="1">select..</option>
                                <option value="2">Insufficient</option>
                                <option value="3">Limit</option>
                                <option value="4">Good</option>
                                <option value="5">Very good</option>
                                <option value="6">Excellent</option>

                            </select>
                        <li type="1">Harmony with future colleagues: <select name="harmony" width="45" size="1">
                                <option value="1">select..</option>
                                <option value="2">Insufficient</option>
                                <option value="3">Limit</option>
                                <option value="4">Good</option>
                                <option value="5">Very good</option>
                                <option value="6">Excellent</option>

                            </select>
                        <li type="1">Professional availability: <select name="availability" width="45" size="1">
                                <option value="1">select..</option>
                                <option value="2">Insufficient</option>
                                <option value="3">Limit</option>
                                <option value="4">Good</option>
                                <option value="5">Very good</option>
                                <option value="6">Excellent</option>

                            </select>

                        </li>

                    </ol>
                </fieldset>

                </fieldset></fieldset></div>
            <p><input name="saveResult" value="Save" type="submit"> The registration must produce the results sheet to
                be given to the client</p>
        </form>
    </div>

<?php

include("footer.php");
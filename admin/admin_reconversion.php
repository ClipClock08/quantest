<?php
include("header_admin.php");
/*
if (isset($_SESSION["email"]) && !empty($_SESSION["password"])) {

    
    $result = $mysqli->query("SELECT id, company_name FROM `users`");
    
    if($result)
    {
        $rows = mysqli_num_rows($result); // number of rows received
     
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            //print_r($row);
            for ($j = 0 ; $j < 2 ; ++$j) { 
                if($j/2 == 0)
                    $id_client[$i] = $row[$j];
                else
                    $company[$i] = $row[$j];
            }
        }
     
         //print_r($id_client);
         // print_r($company);
        // clear the result
         mysqli_free_result($result);
    
    }
} else {
    exit("<p><strong>Mistake! </strong> You visited this page directly, so there is no data to process. You can go to <a href='index.php'> Home page </a>.</p>");
}

*/
?>
    <div class="block_for_messages">
        <?php
        //If there are error messages in the session, then output them
        if (isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])) {
            echo $_SESSION["error_messages"];

            //Destroy the error_messages cell so that error messages do not reappear when the page is updated.
            unset($_SESSION["error_messages"]);
        }

        //If there are success messages in the session, then output them
        if (isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])) {
            echo $_SESSION["success_messages"];

            //Destroy the success_messages cell so that messages do not reappear when the page is updated.
            unset($_SESSION["success_messages"]);
        }

        ?>
    </div>

<div align="center">
		
	<h1>Admin test de reconversion</h1>

<table border="0" cellpadding="0" cellspacing="2" width="650">
			
			<form name="adminClients" action="reconversion_db.php" method="post">
				<fieldset>
					<legend>Info of a job selection test </legend> 
					<label for="nomPoste">
					    Client company:
					    <select name="company" id="company">
					        <option value="0">select..</option>
                            <?php 
                                for($i = 0; $i < count($company); $i++){
                                    echo "<option value = '$id_client[$i]'> $company[$i] </option>";
                                }
                            ?>					    
					    </select>  
					    
					    Candidate of the employee:
					    <select name="candidate" id="reclass">
					        				    
					    </select>  
					    
					    Job:
					    <select name="jobs" id="job">
					        					    
					    </select>  
			        </label>
				                
				</fieldset>
				
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

               </div>
        <p> <legend><h2>Language of the Client:</h2</legend>
                    <label>
			 <select name="clientLanguage" width="45">
                                <option value="1">select..</option>
                                <option value="2">EN</option>
                                <option value="3">DE</option>
                                <option value="4">FR</option>
                                <option value="5">NL</option>
                                <option value="6">IT</option>

                            </select> <input name="button" value="SEND to Result Reconversion" type="submit">

                        </p>
        </form>
 </table>



<script>
    //id for getting info from current company
    $('#company').on('change', function() {
        var clientID = $("#company option:selected").val();
        $("#job").empty(); // clear last select
        $.ajax({
            method: 'POST',
            url: 'ajax/getReclass.php',
            data: {
               client_id : clientID
            },
            dataType: 'html',
            }).done(function (response) {
                $('#reclass').html(response);
        });
    });
    
    $('#reclass').on('change', function() {
        var clientID = $("#company option:selected").val();
        $.ajax({
            method: 'POST',
            url: 'ajax/getReclassJobs.php',
            data: {
            client_id : clientID
            },
            dataType: 'html',
            }).done(function (response) {
                $('#job').html(response);
        });
    });

</script>
<?php

include("footer.php");
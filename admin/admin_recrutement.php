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
    exit("<p><strong>Mistake! </strong> You visited this page directly, so there is no data to process. You can go to <a href='index.php' >Home page </a>.</p>");
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

        <h1>Admin Test de recrutement</h1>

        <table border="0" cellpadding="0" cellspacing="2" width="650">
            <tr>
                <td>
                    <div align="center">
                        <form name="adminClients" action="recrutement_db.php" method="post">
                            <fieldset>
                                <legend>Encoding the values of a job selection test</legend>
                                <label for="nomPoste">
                                    Client company:
                                    <select name="company" id="company">
                                        <option value="0">select..</option><?php
                                        for ($i = 0; $i < count($company); $i++) {
                                            echo "<option value = '$id_client[$i]'> $company[$i] </option>";
                                        }
                                        ?>
                                    </select>

                                    Job:
                                    <select name="jobs" id="job">

                                    </select>

                                    Candidate:
                                    <select name="candidate" id="candidate">

                                    </select> </label>

                            </fieldset>
                            <h3>Hiring Selection Test</h3>
                            <div align="left">
                                <fieldset>
                                    <legend> Veracity of the information declared by the candidate</legend>
                                    <label>
                                        <ol>
                                            <li type="1">Identity:<input type="radio" value="1" name="identite">
                                                Ok<input type="radio" value="2" name="identite"> No<input type="radio"
                                                                                                          value="3"
                                                                                                          name="identite">No
                                                quite...

                                            <li type="1">Civil status: <input type="radio" value="1" name="civil">
                                                Ok<input type="radio" value="2" name="civil"> No<input type="radio"
                                                                                                       value="3"
                                                                                                       name="civil">No
                                                quite...

                                            <li type="1">Studies: <input type="radio" value="1" name="stuides"> Ok<input
                                                        type="radio" value="2" name="stuides"> No<input type="radio"
                                                                                                        value="3"
                                                                                                        name="stuides">No
                                                quite...

                                            <li type="1">Professional experience: <input type="radio" value="1"
                                                                                         name="experience"> Ok<input
                                                        type="radio" value="2" name="experience"> No<input type="radio"
                                                                                                           value="3"
                                                                                                           name="experience">No
                                                quite...

                                        </ol>
                                    </label>

                                </fieldset>


                                <fieldset>
                                    <legend> Presumptions</legend>
                                    <ol>
                                        <li>Religious extremism: <select name="religious" width="45" size="1">
                                                <option value="1">select...</option>
                                                <option value="2">No</option>
                                                <option value="3">Insignificant</option>
                                                <option value="4">Cognitive position taking (passive)</option>
                                                <option value="5">Operational position statement (active)</option>
                                                <option value="6">Person agitated in a critical position</option>
                                            </select>
                                        <li>Anti-Western extremism: <select name="antiwestern" width="45" size="1">
                                                <option value="1">select...</option>
                                                <option value="2">No</option>
                                                <option value="3">Insignificant</option>
                                                <option value="4">Cognitive position taking (passive)</option>
                                                <option value="5">Operational position statement (active)</option>
                                                <option value="6">Person agitated in a critical position</option>
                                            </select>
                                    </ol>
                                </fieldset>


                                <fieldset>
                                    <legend> Personal sphere:</legend>
                                    <ol>
                                        <li type="1">Physical state: <select name="physical_state" width="45" size="1">
                                                <option value="1">select...</option>
                                                <option value="1">< 5.000 UB</option>
                                                <option value="3">from 5.001 to 6.490 UB</option>
                                                <option value="4">from 6.500 to 7.000 UB</option>
                                                <option value="5">> 7.000 UB</option>
                                            </select>
                                        <li type="1">Psychological state: <select name="psycho_state" width="45"
                                                                                  size="1">
                                                <option value="1">select..</option>
                                                <option value="2">< 4.000 UB</option>
                                                <option value="3">4.001 &agrave; 5.000 UB</option>
                                                <option value="4">5.001 &agrave; 6.500 UB</option>
                                                <option value="5">> 6.500 UB</option>
                                            </select>
                                        <li type="1">Free of addictions (alcohol,..): <select name="alcohol" width="45"
                                                                                              size="1">
                                                <option value="1">select..</option>
                                                <option value="2">No</option>
                                                <option value="3">Not significant</option>
                                                <option value="4">Appreciate without being dependent</option>
                                                <option value="5">Light dependence</option>
                                                <option value="6">Significant dependence</option>
                                            </select>
                                        <li type="1">Integrity: <select name="integrity" width="45" size="1">
                                                <option value="1">select..</option>
                                                <option value="2">Honest person</option>
                                                <option value="3">He can grant himself freedoms</option>
                                                <option value="4">Risk of deviance</option>
                                                <option value="5">Fallacious integrity</option>
                                            </select>
                                    </ol>
                                    </legend>
                                </fieldset>


                                <fieldset>
                                    <legend>Professional sphere:</legend>
                                    <label>
                                        <ol>
                                            <li type="1"> Studies and and experience to assume this function: <select
                                                        name="summary_exp" width="45" size="1">
                                                    <option value="1">select..</option>
                                                    <option value="2">1. Insufficient preparation (studies or useful
                                                        experience)
                                                    </option>
                                                    <option value="3">2. Gaps in current preparation</option>
                                                    <option value="4">3. Sufficient preparation</option>
                                                    <option value="5">4. Good preparation</option>
                                                    <option value="6">5. Excellent preparation</option>
                                                </select>
                                            <li type="1"> Naturalness in safety matter: <br>
                                                <select name="safety" width="45" size="1">
                                                    <option value="1">select..</option>
                                                    <option value="2">1. Proceeds no matter how with risk taking
                                                    </option>
                                                    <option value="3">2. Often violates safety instructions</option>
                                                    <option value="4">3. Works safely without specially caring for
                                                        others
                                                    </option>
                                                    <option value="5">4. Works safely and provides for the safety of
                                                        others
                                                    </option>
                                                    <option value="6">5. Excellent security guarantor</option>
                                                </select>
                                            <li type="1"> Quality of his/ her work in this function: <select
                                                        name="quality" width="45" size="1">
                                                    <option value="1">select..</option>
                                                    <option value="2">1. Many things to complain and inadequate care
                                                    </option>
                                                    <option value="3">2. Care and unstable care, variable reliability
                                                    </option>
                                                    <option value="4">3. Work reasonably performed. Few remarks to
                                                        make
                                                    </option>
                                                    <option value="5">4. Reliable work, we can trust him</option>
                                                    <option value="6">5. Careful work of the best quality</option>
                                                </select>
                                            <li type="1"> Natural sense of organization: <select name="organization"
                                                                                                 width="45" size="1">
                                                    <option value="1">select..</option>
                                                    <option value="2">1. Without order or method. Potentially
                                                        dangerous
                                                    </option>
                                                    <option value="3">2. Order and method at the limit of the
                                                        acceptable. Must be monitored
                                                    </option>
                                                    <option value="4">3. Orderly and methodical</option>
                                                    <option value="5">4. Organization and exemplary work</option>
                                                    <option value="6">5. Demonstrates remarkable organizational
                                                        ability
                                                    </option>
                                                </select>
                                            <li type="1"> Naturalness in terms of work rate: <select
                                                        name="terms_of_work" width="45" size="1">
                                                    <option value="1">select..</option>
                                                    <option value="2">1. Insufficient speed of intervention and
                                                        reaction
                                                    </option>
                                                    <option value="3">2. Slowness at the limit of the acceptable
                                                    </option>
                                                    <option value="4">3. Reasonable work rate</option>
                                                    <option value="5">4. Achieves above average speed</option>
                                                    <option value="6">5. Excels in the use of time available</option>
                                                </select>
                                            <li type="1"> Naturalness in responsibilities: <select
                                                        name="responsibilities" width="45" size="1">
                                                    <option value="1">select..</option>
                                                    <option value="2">1. Assuming responsibility is the least of the
                                                        worries
                                                    </option>
                                                    <option value="3">2. Does what he can, but it must be followed
                                                    </option>
                                                    <option value="4">3. In normal conditions it does what it takes
                                                    </option>
                                                    <option value="5">4. Reliable, assumes no need to monitor he/ she
                                                    </option>
                                                    <option value="6">5. Excellent autonomy and judicious steps</option>
                                                </select>
                                            <li type="1"> Naturalness for initiative: <select name="initiative"
                                                                                              width="45" size="1">
                                                    <option value="1">select..</option>
                                                    <option value="2">1. You have to be constantly behind to tell what
                                                        to do
                                                    </option>
                                                    <option value="3">2. Limited motivation for initiative, must be
                                                        stimulated
                                                    </option>
                                                    <option value="4">3. Does and manage well</option>
                                                    <option value="5">4. Faced with unexpected situations he succeeds
                                                        very well
                                                    </option>
                                                    <option value="6">5. Creative and innovative</option>
                                                </select>
                                            <li type="1"> Naturalness in social behavior: <select name="social_behavior"
                                                                                                  width="45" size="1">
                                                    <option value="1">select..</option>
                                                    <option value="2">1. At first it does not arrange with anyone
                                                    </option>
                                                    <option value="3">2. Behavior and social fingering at the limit of
                                                        acceptable
                                                    </option>
                                                    <option value="4">3. Correct social behavior</option>
                                                    <option value="5">4. Good ability for communication, easily
                                                        integrates
                                                    </option>
                                                    <option value="6">5. Excellent communicator, everyone looking for
                                                        it
                                                    </option>
                                                </select>
                                            <li type="1"> Motivation and interest in investing in this function: <select
                                                        name="motivation" width="45" size="1">
                                                    <option value="1">select..</option>
                                                    <option value="2">1. The work related to this function is the least
                                                        of its interests
                                                    </option>
                                                    <option value="3">2. Limited interest, risk of a short-term
                                                        departure
                                                    </option>
                                                    <option value="4">3. Good motivation to invest in this function
                                                    </option>
                                                    <option value="5">4. Very motivated by this function</option>
                                                    <option value="6">5. Investing in this function satisfies a real
                                                        passion
                                                    </option>
                                                </select>
                                            <li type="1"> Naturalness in terms of professional availability: <select
                                                        name="professional_availability" width="45" size="1">
                                                    <option value="1">select..</option>
                                                    <option value="2">1. Reluctant against any work outside the hours
                                                    </option>
                                                    <option value="3">2. Readily dissociates to participate after
                                                        hours
                                                    </option>
                                                    <option value="4">3. Accepte parfois de travailler en dehors des
                                                        heures
                                                    </option>
                                                    <option value="5">4. Disponibilit&eacute; sup&eacute;rieure &agrave;
                                                        la moyenne
                                                    </option>
                                                    <option value="6">5. On peut toujours compter sur lui</option>
                                                </select>
                                            <li type="1"> Naturalness in attendance and punctuality at work: <select
                                                        name="attendance_and_punctuality" width="45" size="1">
                                                    <option value="1">select..</option>
                                                    <option value="2">1. On ne peut pas compter sur lui</option>
                                                    <option value="3">2. Compter sur lui c&#039;est prendre un risque
                                                    </option>
                                                    <option value="4">3. Se situe dans la moyenne
                                                        g&eacute;n&eacute;rale
                                                    </option>
                                                    <option value="5">4. Tr&egrave;s fiable</option>
                                                    <option value="6">5. S&#039;il n&#039;est pas l&agrave; ce qu&#039;il
                                                        lui est arriv&eacute; un gros probl&egrave;me
                                                    </option>
                                                </select>
                                            <li type="1"> Natural aptitude for training: <select name="training"
                                                                                                 width="45" size="1">
                                                    <option value="1">select..</option>
                                                    <option value="2">1. R&eacute;calcitrant pour montrer aux autres
                                                    </option>
                                                    <option value="3">2. Se limite &agrave; montrer l&#039;essentiel et
                                                        en garde pour lui
                                                    </option>
                                                    <option value="4">3. On peut lui confier la formation de nouveaux
                                                        collaborateurs
                                                    </option>
                                                    <option value="5">4. Il transmet ais&eacute;ment ses connaissances
                                                    </option>
                                                    <option value="6">5. Sens tr&egrave;s d&eacute;velopp&eacute; pour
                                                        transmettre ses connaissances
                                                    </option>
                                                </select>
                                            <li type="1"> Natural ability for command: <select name="command" width="45"
                                                                                               size="1">
                                                    <option value="1">select..</option>
                                                    <option value="2">1. Il n&#039;a pas d&#039;autorit&eacute; et il s&#039;y
                                                        prend tr&egrave;s mal
                                                    </option>
                                                    <option value="3">2. Ne r&eacute;ussit pas bien dans le r&ocirc;le d&#039;influence</option>
                                                    <option value="4">3. Parvient g&eacute;n&eacute;ralement &agrave;
                                                        faire passer ses instructions
                                                    </option>
                                                    <option value="5">4. Il est tr&egrave;s bon pour influencer et
                                                        exercer l&#039;autorit&eacute;
                                                    </option>
                                                    <option value="6">5. Aptitude naturelle au commandement</option>
                                                </select>
                                    </label>
                                    </ol>
                                    </legend>
                                </fieldset>
                                <p>
                                    <legend><h2>Language of the Client:</h2</legend>
                                    <label>
                                        <select name="clientLanguage" width="45">
                                            <option value="1">select..</option>
                                            <option value="2">EN</option>
                                            <option value="3">DE</option>
                                            <option value="4">FR</option>
                                            <option value="5">NL</option>
                                            <option value="6">IT</option>

                                        </select><input name="saveResult" value="SEND to Result Recrutement"
                                                        type="submit">

                                </p>

                        </form>
                    </div>
                </td>
            </tr>
        </table>
    </div>


    <script>
        //id for getting info from current company
        $('#company').on('change', function () {
            var clientID = $("#company option:selected").val();
            $("#candidate").empty(); // clear last select
            $.ajax({
                method: 'POST',
                url: 'ajax/getFunctions.php',
                data: {
                    client_id: clientID
                },
                dataType: 'html',
            }).done(function (response) {
                $('#job').html(response);
            });
        });

        $('#job').on('change', function () {
            var clientID = $("#company option:selected").val();
            $.ajax({
                method: 'POST',
                url: 'ajax/getCandidates.php',
                data: {
                    client_id: clientID
                },
                dataType: 'html',
            }).done(function (response) {
                $('#candidate').html(response);
            });
        });

    </script>
<?php

include("footer.php");
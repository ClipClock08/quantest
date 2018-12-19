<?php 

    //Connecting caps
    require_once("header_q.php");
?>
<!-- Javascript code -->
<script type="text/javascript">
    $(document).ready(function(){
        "use strict";
        //================ Check email ==================

        //regular expression for checking email
        var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
        var mail = $('input[name=email]');
        
        mail.blur(function(){
            if(mail.val() != ''){

                // Check if the email matches the regular expression.
                if(mail.val().search(pattern) == 0){
                    // We remove the error message
                    $('#valid_email_message').text('');

                    //Activate the submit button
                    $('input[type=submit]').attr('disabled', false);
                }else{
                    //We display an error message
                    $('#valid_email_message').text('Ups! Bitte überprüfen Sie Ihre E-Mail-Adresse.');

                    // Disable submit button
                    $('input[type=submit]').attr('disabled', true);
                }
            }else{
                $('#valid_email_message').text('Bitte verwenden Sie eine professionelle E-Mail-Adresse.</b>.');
            }
        });

        //================ Passwords checking ==================
        var password = $('input[name=password]');
        var confirm_password = $('input[name=confirm_password]');
        
        password.blur(function(){
            if(password.val() != ''){

                //If the length of the entered password is less than six characters, then we display an error message.
                if(password.val().length < 6){
                    //We display an error message
                    $('#valid_password_message').text('Ups! Bitte verwenden Sie mindestens 6 Zeichen.');

                    //Check if the passwords do not match, then we display an error message
                    if(password.val() !== confirm_password.val()){
                        //We display an error message
                        $('#valid_confirm_password_message').text('bitte verwenden Sie mindestens 6 Zeichen.');
                    }

                    // Desactivate the submit button
                    $('input[type=submit]').attr('disabled', true);
                    
                }else{
                    //Otherwise, if the length of the first password is more than six characters, then we also check if they match.
                    if(password.val() !== confirm_password.val()){
                        //We display an error message
                        $('#valid_confirm_password_message').text('');

                        // Disable submit button
                        $('input[type=submit]').attr('disabled', true);
                    }else{
                        // We remove the error message from the field to re-enter the password
                        $('#valid_confirm_password_message').text('');

                        //Activate the submit button
                        $('input[type=submit]').attr('disabled', false);
                    }

                    // We remove the error message from the password field
                    $('#valid_password_message').text('');
                }

            }else{
                $('#valid_password_message').text('');
            }
        });



        confirm_password.blur(function(){
            //If the passwords do not match
            if(password.val() !== confirm_password.val()){
                //We display an error message
                $('#valid_confirm_password_message').text('Falsches Passwort');

                // Disable submit button
                $('input[type=submit]').attr('disabled', true);
            }else{
                //Otherwise, check the password length
                if(password.val().length > 5){

                    // We remove the error message from the password field
                    $('#valid_password_message').text('');

                    //Activate the submit button
                    $('input[type=submit]').attr('disabled', false);
                }

                // We remove the error message from the field to re-enter the password
                $('#valid_confirm_password_message').text('');
            }

        });
    });
</script>

<!-- Block to display messages -->
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

<?php 
    //We check if the user is not authorized, then display the registration form, 
    // otherwise display a message that it is already registered
    if((!isset($_SESSION["email"]) && !isset($_SESSION["password"]))) {

        if(!isset($_GET["hidden_form"])){
?>
            <div id="form_register">
               <p> <h1>Registrieren Sie an der Schnittstelle Quantest</h1></p>
			   
                <form action="register.php" method="post" name="form_register" >
                    <fieldset>
                        <legend>Erstellen Sie ein <b>Arbeitgeber</b> konto oder ein <b>Agentur</b> konto </legend>
                        <br>
                        <input type="radio" value="Employer" name="userPro"> Arbeitgeber <input type="radio"
                                                                                               value="Agent"
                                                                                               name="userPro">Agentur<br>
                        <br>
                        <table border="0" cellpadding="0" cellspacing="2" whidt="600">
                            <tbody>
                            <tr>
                                <td valign="top" width="277">
                                    <div align="left">
                                        <b>Firmenname* </b><br>
                                    </div>
                                </td>
                                <td width="401"><input type="text" name="nomEntreprise" size="50" required></td>
                            </tr>
                            <tr>
                                <td width="277">Webseite*:</td>
                                <td width="401"><input type="text" name="siteWeb" size="50" required></td>
                            </tr>
							<tr>
                                <td width="277">Artigkeit*:</td>
                                <td width="401">
                                    <input type="radio" value="Mr" name="civilitye" required> Herr<input type="radio" value="Mrs" name="civilitye" required> Frau<input type="radio" value="Miss" name="civilitye" required>Fräulein
                                </td>
                            </tr>
                            <tr>
                                <td width="277">Ihr Vorname*:</td>
                                <td width="401"><input type="text" name="nomContact" size="24" required></td>
                            </tr>
                            <tr>
                                <td width="277">Ihr Name*:</td>
                                <td width="401"><input type="text" name="prenomContact" size="24" required></td>
                            </tr>
                            <tr>
                                <td width="277">Ihre Funktion*:</td>
                                <td width="401"><input type="text" name="fonctionContactionContact" size="50" required></td>
                            </tr>
                            <tr>
                                <td width="277">Ihre E-Mail-Adresse*:</td>
                                <td width="401"><input type="email" name="emailContact" size="35" required></td>
                            </tr>
                           
                            <tr>
                                <td> Passwort*: </td>
                                <td>
                                    <input type="password" name="password" placeholder="mindestens 6 Zeichen" required="required" /><br />
                                    <span id="valid_password_message" class="mesage_error"></span>
                                </td>
                            </tr>
                            <!-- Place for a row with a 'repeat password' field ' -->
                            <tr>
                                <td> Passwort erneut eingeben*: </td>
                                <td>
                                    <input type="password" name="confirm_password" placeholder="mindestens 6 Zeichen" required="required" /><br />
                                    <span id="valid_confirm_password_message" class="mesage_error"></span>
				<p></p>
			</td>
		</tr>
		<tr>
			<td colspan="2"><br>
				<input type="checkbox" value="checkboxValue" name="sales"> Ich habe verstanden und akzeptiere die <a href="terms_of_sale.php">Allgemeine Verkaufsbedingungen</a>*<br>
					<input type="checkbox" value="checkboxValue" name="privacy"> Ich habe verstanden und akzeptiere die Quantest <a href="confidentiality.php">Datenschutzrichtlinie</a>*
			</td>
		</tr>
		<tr>
			<td><br><input type="submit" name="btn_submit_register" value="Rekord" />
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </form>
            </div>
<?php
        }//close the hidden_form condition

    }else{ 
        //Otherwise, if the user is already authorized, then we display this block.
?>
        <div id="authorized">
            <h2><b>Sie sind bereits registriert!</b></h2>
        </div>

<?php
    }
    
    //Connecting to the footer
    require_once("footer.php");
?>
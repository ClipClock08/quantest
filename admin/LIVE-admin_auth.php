<?php
    //Connecting caps
    include_once("header_q.php");
?>

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
                    $('#valid_email_message').text('Invalid Email');

                    // Desactivate the submit button
                    $('input[type=submit]').attr('disabled', true);
                }
            }else{
                $('#valid_email_message').text('Enter your email');
            }
        });

        //================ Password length check ==================
        var password = $('input[name=password]');
        
        password.blur(function(){
            if(password.val() != ''){

                //If the length of the entered password is less than six characters, then we display an error message.
                if(password.val().length < 6){
                    //We display an error message
                    $('#valid_password_message').text('The minimum password length is 6 characters.');

                    // Desactivate the submit button
                    $('input[type=submit]').attr('disabled', true);
                    
                }else{
                    // We remove the error message
                    $('#valid_password_message').text('');

                    //Activate the submit button
                    $('input[type=submit]').attr('disabled', false);
                }
            }else{
                $('#valid_password_message').text('Enter password');
            }
        });
    });
</script>

<!-- Block to display messages -->
<div class="block_for_messages">
    <?php

        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];

             //Destroy the error_messages cell so that error messages do not reappear when the page is updated.
            unset($_SESSION["error_messages"]);
        }

        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
            
            //Destroy the success_messages cell so that messages do not reappear when the page is updated.
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>

<?php
    //We check if the user is not authorized, then we display the authorization form, 
    //otherwise display a message stating that it is already authorized
    if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
?>

<div id="form_auth">
   <p> <h1>Connecting to the Quantest interface</h1></p>
    
    <form action="auth.php" method="post">
        <table border="0" cellpadding="2" cellspacing="2" width="400">
            <tr>
                <td>
                    <fieldset>
                        <legend> Admin login </a> </legend><br>
                        <table border="0" cellpadding="0" cellspacing="2" whidt="600">
                            <tbody>
                            <tr>
                                <td valign="top" width="241">
                                    <div align="left">
                                        Username:</div>
                                </td>
                                <td width="342"><input type="text" name="email" placeholder="your email address.." size="24"></td>
                            </tr>
                            <tr>
                                <td width="241">
                                    <div align="left">
                                        Password:</div>
                                </td>
                                <td width="342"><input type="password" name="password" size="24"></td>
                            </tr>
                            <tr>
                                <td valign="top" width="241">
                                    <p></p>
                                    <p><input type="submit" name="submitButtonName" value="Log in"></p>
                                    <p></p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>
    </form>

</div>
<?php 
    }else{
?>
    <div id="authorized">
        <h2>You are already logged in.</h2>
    </div>
        
<?php
    }
?>

<?php 
    
    //Connecting to the footer
    require_once("footer.php");
?>
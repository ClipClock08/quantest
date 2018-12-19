<?php
    //Подключение шапки
    include_once("header_q.php");
?>

<script type="text/javascript">
    $(document).ready(function(){
        "use strict";
        //================ Проверка email ==================

        //регулярное выражение для проверки email
        var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
        var mail = $('input[name=email]');
        
        mail.blur(function(){
            if(mail.val() != ''){

                // Проверяем, если email соответствует регулярному выражению
                if(mail.val().search(pattern) == 0){
                    // Убираем сообщение об ошибке
                    $('#valid_email_message').text('');

                    //Активируем кнопку отправки
                    $('input[type=submit]').attr('disabled', false);
                }else{
                    //Выводим сообщение об ошибке
                    $('#valid_email_message').text('Invalid Email');

                    // Дезактивируем кнопку отправки
                    $('input[type=submit]').attr('disabled', true);
                }
            }else{
                $('#valid_email_message').text('Enter your email');
            }
        });

        //================ Проверка длины пароля ==================
        var password = $('input[name=password]');
        
        password.blur(function(){
            if(password.val() != ''){

                //Если длина введенного пароля меньше шести символов, то выводим сообщение об ошибке
                if(password.val().length < 6){
                    //Выводим сообщение об ошибке
                    $('#valid_password_message').text('The minimum password length is 6 characters.');

                    // Дезактивируем кнопку отправки
                    $('input[type=submit]').attr('disabled', true);
                    
                }else{
                    // Убираем сообщение об ошибке
                    $('#valid_password_message').text('');

                    //Активируем кнопку отправки
                    $('input[type=submit]').attr('disabled', false);
                }
            }else{
                $('#valid_password_message').text('Enter password');
            }
        });
    });
</script>

<!-- Блок для вывода сообщений -->
<div class="block_for_messages">
    <?php

        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];

             //Уничтожаем ячейку error_messages, чтобы сообщения об ошибках не появились заново при обновлении страницы
            unset($_SESSION["error_messages"]);
        }

        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
            
            //Уничтожаем ячейку success_messages,  чтобы сообщения не появились заново при обновлении страницы
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>

<?php
    //Проверяем, если пользователь не авторизован, то выводим форму авторизации, 
    //иначе выводим сообщение о том, что он уже авторизован
    if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
?>

<div id="form_auth">
   <p> <h1>Maak verbinding met de Quantest-interface</h1></p>
    
    <form action="auth.php" method="post">
        <table border="0" cellpadding="2" cellspacing="2" width="400">
            <tr>
                <td>
                    <fieldset>
                        <legend> Meld u aan of <a href="form_register.php">registreer u </a></legend><br>
                        <table border="0" cellpadding="0" cellspacing="2" whidt="600">
                            <tbody>
                            <tr>
                                <td valign="top" width="241">
                                    <div align="left">
                                        Gebruikersnaam:</div>
                                </td>
                                <td width="342"><input type="text" name="email" placeholder="uw e-mailadres.." size="24"></td>
                            </tr>
                            <tr>
                                <td width="241">
                                    <div align="left">
                                        Wachtwoord:</div>
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
                            <tr>
                                <td valign="top" colspan="2">
                                    <p><a href="recovery_pass.php"><font size="2">Ik ben mijn wachtwoord vergeten..</font></a></p>
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
        <h2>Je bent al verbonden!</h2>
    </div>
        
<?php
    }
?>

<?php 
    
    //Подключение подвала
    require_once("footer.php");
?>
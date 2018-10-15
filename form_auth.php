<?php
    //Подключение шапки
    require_once("header.php");
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
                    $('#valid_email_message').text('Не правильный Email');

                    // Дезактивируем кнопку отправки
                    $('input[type=submit]').attr('disabled', true);
                }
            }else{
                $('#valid_email_message').text('Введите Ваш email');
            }
        });

        //================ Проверка длины пароля ==================
        var password = $('input[name=password]');
        
        password.blur(function(){
            if(password.val() != ''){

                //Если длина введенного пароля меньше шести символов, то выводим сообщение об ошибке
                if(password.val().length < 6){
                    //Выводим сообщение об ошибке
                    $('#valid_password_message').text('Минимальная длина пароля 6 символов');

                    // Дезактивируем кнопку отправки
                    $('input[type=submit]').attr('disabled', true);
                    
                }else{
                    // Убираем сообщение об ошибке
                    $('#valid_password_message').text('');

                    //Активируем кнопку отправки
                    $('input[type=submit]').attr('disabled', false);
                }
            }else{
                $('#valid_password_message').text('Введите пароль');
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
    <h2>Connecting to the Quantest interface</h2>
    Please login or <a href="form_register.php">register</a>
    <form action="auth.php" method="post">
        <table border="0" cellpadding="2" cellspacing="2" width="400">
            <tr>
                <td>
                    <fieldset>
                        <legend> To log in </legend><br>
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
                            <tr>
                                <td valign="top" colspan="2">
                                    <p><a href="recovery_pass.php"><font size="2">I forgot my password</font></a></p>
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
        <h2>Вы уже авторизованы</h2>
    </div>
        
<?php
    }
?>

<?php 
    
    //Подключение подвала
    require_once("footer.php");
?>
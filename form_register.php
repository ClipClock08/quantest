<?php
    //Подключение шапки
    require_once("header.php");
?>

<!-- Код JavaScript -->
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

        //================ Прооверка паролей ==================
        var password = $('input[name=password]');
        var confirm_password = $('input[name=confirm_password]');
        
        password.blur(function(){
            if(password.val() != ''){

                //Если длина введённого пароля меньше шести символов, то выводим сообщение об ошибке
                if(password.val().length < 6){
                    //Выводим сообщение об ошибке
                    $('#valid_password_message').text('Минимальная длина пароля 6 символов');

                    //проверяем, если пароли не совпадают, то выводим сообщение об ошибке
                    if(password.val() !== confirm_password.val()){
                        //Выводим сообщение об ошибке
                        $('#valid_confirm_password_message').text('Пароли не совпадают');
                    }

                    // Дезактивируем кнопку отправки
                    $('input[type=submit]').attr('disabled', true);
                    
                }else{
                    //Иначе, если длина первого пароля больше шести символов, то мы также проверяем, если они  совпадают. 
                    if(password.val() !== confirm_password.val()){
                        //Выводим сообщение об ошибке
                        $('#valid_confirm_password_message').text('Пароли не совпадают');

                        // Дезактивируем кнопку отправки
                        $('input[type=submit]').attr('disabled', true);
                    }else{
                        // Убираем сообщение об ошибке у поля для ввода повторного пароля
                        $('#valid_confirm_password_message').text('');

                        //Активируем кнопку отправки
                        $('input[type=submit]').attr('disabled', false);
                    }

                    // Убираем сообщение об ошибке у поля для ввода пароля
                    $('#valid_password_message').text('');
                }

            }else{
                $('#valid_password_message').text('Введите пароль');
            }
        });



        confirm_password.blur(function(){
            //Если пароли не совпадают
            if(password.val() !== confirm_password.val()){
                //Выводим сообщение об ошибке
                $('#valid_confirm_password_message').text('Пароли не совпадают');

                // Дезактивируем кнопку отправки
                $('input[type=submit]').attr('disabled', true);
            }else{
                //Иначе, проверяем длину пароля
                if(password.val().length > 5){

                    // Убираем сообщение об ошибке у поля для ввода пароля
                    $('#valid_password_message').text('');

                    //Активируем кнопку отправки
                    $('input[type=submit]').attr('disabled', false);
                }

                // Убираем сообщение об ошибке у поля для ввода повторного пароля
                $('#valid_confirm_password_message').text('');
            }

        });
    });
</script>

<!-- Блок для вывода сообщений -->
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

<?php 
    //Проверяем, если пользователь не авторизован, то выводим форму регистрации, 
    //иначе выводим сообщение о том, что он уже зарегистрирован
    if((!isset($_SESSION["email"]) && !isset($_SESSION["password"]))) {

        if(!isset($_GET["hidden_form"])){
?>
            <div id="form_register">
                <h2>Registering on the Quantest interface</h2>

                <form action="register.php" method="post" name="form_register" >
                    <fieldset>
                        <legend>Creating an <b>Employer</b> or <b>Agent</b> account</legend>
                        <br>
                        <input type="radio" value="radioValue" name="userPro"> Employer <input type="radio"
                                                                                               value="radioValue"
                                                                                               name="userPro">Agent<br>
                        <br>
                        <table border="0" cellpadding="0" cellspacing="2" whidt="600">
                            <tbody>
                            <tr>
                                <td valign="top" width="277">
                                    <div align="left">
                                        <b>Company Name* </b><br>
                                    </div>
                                </td>
                                <td width="401"><input type="text" name="nomEntreprise" size="50" required></td>
                            </tr>
                            <tr>
                                <td width="277">Website*:</td>
                                <td width="401"><input type="text" name="siteWeb" size="50" required></td>
                            </tr>
                            <tr>
                                <td width="277">Your name*:</td>
                                <td width="401"><input type="text" name="nomContact" size="24" required></td>
                            </tr>
                            <tr>
                                <td width="277">Your first name*:</td>
                                <td width="401"><input type="text" name="prenomContact" size="24" required></td>
                            </tr>
                            <tr>
                                <td width="277">Your function*:</td>
                                <td width="401"><input type="text" name="fonctionContact" size="50" required></td>
                            </tr>
                            <tr>
                                <td width="277">Your email address*:</td>
                                <td width="401"><input type="email" name="emailContact" size="35" required></td>
                            </tr>
                            <tr>
                                <td width="277">Phone:</td>
                                <td width="401"><input type="text" name="telContact" size="24"></td>
                            </tr>
                            <tr>
                                <td> Пароль: </td>
                                <td>
                                    <input type="password" name="password" placeholder="минимум 6 символов" required="required" /><br />
                                    <span id="valid_password_message" class="mesage_error"></span>
                                </td>
                            </tr>
                            <!-- Место для ряда с полем ' повторите пароль ' -->
                            <tr>
                                <td> Повторите пароль: </td>
                                <td>
                                    <input type="password" name="confirm_password" placeholder="минимум 6 символов" required="required" /><br />
                                    <span id="valid_confirm_password_message" class="mesage_error"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="btn_submit_register" value="Зарегистрироваться!" />
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </form>
            </div>
<?php
        }//закрываем условие hidden_form

    }else{ 
        //Иначе, если пользователь уже авторизирован, то выводим этот блок
?>
        <div id="authorized">
            <h2>Вы уже зарегистрированы</h2>
        </div>

<?php
    }
    
    //Подключение подвала
    require_once("footer.php");
?>
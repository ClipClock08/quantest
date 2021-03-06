<?php
require_once ("../dbconnect.php");
/**
 * Created by PhpStorm.
 * User: alexdev
 * Date: 05.10.18
 * Time: 11:26
 */

?>
<!DOCTYPE html>
<html>
    <head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8" />
    <link rel="stylesheet" href="../../css/quantest.css" />
    <script src="../../js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<div id="bloc_page">
			<div align="right">
				<nav>
				    <a href="../../indexFR.htm">FR</a> | 
				    <a href="../../index.php">EN</a> | 
				    <a href="../../indexDE.htm">DE</a> | <a href="../../indexNL.htm">NL</a> | <a href="../../indexIT.htm">IT</a>
			    </nav>
		    </div>
			<div id="bloc_page">
				<header>
                    <div id="titre_principal">
                        <div id="logo">
                            <img src="../../img/logoQuantestPlat.jpg" alt="Logo Quantest" />
                        </div>
					    <div id="h2">
                        
                        <h2>Best HR Assistant
                            <br>for Successful Recruiters!</h2>    
                        </div>
                    
                    </div>
                
                <nav>
                    <ul>
                       <li><a href="../selection.php">RECRUITMENT</a></li>
                        <li><a href="../reconversion_form.php">RECONVERSION</a></li>
                        <li><a href="../form_auth.php">LOGIN</a></li>
                    </ul>
                </nav>
            </header>
	        </div> 
<table cellspacing="0" cellpadding="3" bgcolor="white" border="0" align="center" height="100%" width="904">
    <tr height="50">
        <td valign="middle" bgcolor="#003399" height="50" colspan="2">
            <div align="center">
                <h2><font color="white"><b>Pages of Quantest application site</b></font></h2>
            </div>
        </td>
    </tr>
    <tr height="33">
        <td valign="middle" bgcolor="#eee8aa" height="33" colspan="2">
            <div align="left">
                <b><font size="-1" color="#990000"></font><font color="#696969" size="-1">
                        <table border="0" cellpadding="2" cellspacing="0" height="123">
                            <tr>
                                <td>
                                    <div align="left">
                                        <font size="-1"><b>Classics features:</b></font>
                                        <font color="black" size="-1">
                                                <?php
                                                //Проверяем, авторизован ли пользователь
                                                if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
                                                    // если нет, то выводим блок со ссылками на страницу регистрации и авторизации
                                                    ?>
                                                        <a href="../form_register.php">Registration</a>

                                                        <a href="../form_auth.php">Log in</a>
                                                    <?php
                                                }else{
                                                    //Если пользователь авторизован, то выводим ссылку Выход
                                                    ?>
                                                        <a href="logout.php">Log out</a>
                                                        <a href="../profile.php">Profile</a>
                                                    <?php
                                                }
                                                ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font size="-1"><b>Users forms</b>: |
                                        <a href="../welcome.php">Welcome</a> |
                                        <a href="../selection.php">Config mode</a> |
                                        <a href="../config/manual_config.php">Manual config</a> |
                                        <a href="../config/expert_config.php">Expert config</a> |
                                        <a href="../reconversion_form.php">Reconversion</a> |
                                        <a href="../candidates_list.php">Candidates</a> |
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font size="-1"><b>Admin forms</b>: |
                                        <a href="admin_selection.php">Admin selection</a> |
                                        <a href="admin_reconversion.php">Admin reconversion</a> |
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font size="-1"><b>Individual sheet of the candidate</b>: |
                                        <a href="test_result.php">Test result form</a> |
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </font>
                </b>
            </div>
        </td>
    </tr>

</table>

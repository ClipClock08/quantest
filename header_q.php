<?php
require_once ("dbconnect.php");
/**
 * Created by PhpStorm.
 * User: alexdev
 * Date: 05.10.18
 * Time: 11:26
 */

?>
<head>
    <title>quantest.loc</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/stylequan.css">
    <link rel="stylesheet" type="text/css" href="css/starter.css">
    <script src="js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<table cellspacing="0" cellpadding="3" bgcolor="white" border="0" align="center" height="100%" width="904">
    <tr>
        <td valign="top" height="76" colspan="2">
            <div align="left">
                <img src="images/logoQuantest0.jpg" width="390" height="106" border="0"> | NL | FR | DE | EN | IT |</div>
        </td>
    </tr>
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
                                                        <a href="form_register.php">Registration</a>

                                                        <a href="form_auth.php">Log in</a>
                                                    <?php
                                                }else{
                                                    //Если пользователь авторизован, то выводим ссылку Выход
                                                    ?>
                                                        <a href="logout.php">Log out</a>
                                                    <?php
                                                }
                                                ?>
                                            <a href="profile.php">Profile</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font size="-1"><b>Users forms</b>: |
                                        <a href="welcome.php">Welcome</a> |
                                        <a href="selection.php">Config mode</a> |
                                        <a href="config/manual_config.php">Manual config</a> |
                                        <a href="config/expert_config.php">Expert config</a> |
                                        <a href="reconversion.php">Reconversion</a> |
                                        <a href="config/candidates.php">Candidates</a> |
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font size="-1"><b>Admin forms</b>: |
                                        <a href="admin/adminSelection.php">Admin selection</a> |
                                        <a href="admin/adminReconversion.php">Admin reconversion</a> |
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font size="-1"><b>Individual sheet of the candidate</b>: |
                                        <a href="admin/testResult.php">Test result form</a> |
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

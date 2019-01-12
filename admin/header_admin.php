<?php
require("C:\OSPanel\domains\quantest.loc/dbconnect.php");
/*echo "<pre>";
print_r($_SESSION);
echo "</pre>";*/
?>
<!DOCTYPE html>
<html lang="eu">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    <title>QUANTEST Admin</title>
    <link rel="stylesheet" href="../css/quantest.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>
    <script src="../js/script.js"></script>
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet"/>
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet"/>
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
</head>

<body>
<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="admin.php">
                <img src="../img/logoQuantestPlat.jpg" alt="Logo Quantest" height="70px"/>
            </a>
        </div>

        <div class="right-div">
            <?php
            //Check if the user is authorized
            if (!isset($_SESSION['email_admin']) && !isset($_SESSION['password_admin'])) {
                // if not, then display the block with links to the registration and authorization page
                ?>
                <a href="admin_auth.php">Log in</a>
                <?php
            } else {
                //If the user is authorized, then display the link Logout
                ?>
                <?php echo "Hello " . $_SESSION['email_admin'] . "!"; ?> <br><a href="logout.php"
                                                                                class="btn btn-danger pull-right">LOG ME
                    OUT</a>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- LOGO HEADER END-->
<section class="menu-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a href="client_orders.php" class="menu-top-active">Clients orders</a></li>

                        <li><a href="client_list.php">Clients</a></li>
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">ADMIN FORMS <i
                                        class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation">
                                    <a role="menuitem" tabindex="-1" href="#">Recrutement</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" tabindex="-1" href="admin_reconversion.php">Reconversion</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" tabindex="-1" href="https://quantest.online/admin/test_result.php">result selection</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" tabindex="-1" href="https://quantest.online/admin/test_result_Selection.php">result reconversion</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" tabindex="-1" href="https://quantest.online/admin/getPoints.php">get points</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

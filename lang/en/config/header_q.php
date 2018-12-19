<?php
    require_once ("../dbconnect.php");
    
   $path = $_SERVER['SCRIPT_URL'];
    
    if($path == "/" || $path == "/index.php"){
        
        $pathEn = "https://quantest.eu/index.php";
        
        $pathFr = "https://quantest.eu/indexFR.php";
         
        $pathDe = "https://quantest.eu/indexDE.php";
        
        $pathIt = "https://quantest.eu/indexIT.php";
        
        $pathNl = "https://quantest.eu/indexNL.php";
            
    } else{
        $pathEn = "https://quantest.eu".$path;
        //echo "Оригинал: $path<hr />\n";
        
        //path to Franch languages
        $pathFr = substr_replace($path, 'fr', 6, 2);
        $pathFr = "https://quantest.eu".$pathFr;
        //echo $pathFr."<br/>";
        
        //path to Deutch languages
        $pathDe = substr_replace($path, 'de', 6, 2);
        $pathDe = "https://quantest.eu".$pathDe;
        //echo $pathDe."<br/>";
        
        //path to IT languages
        $pathIt = substr_replace($path, 'it', 6, 2);
        $pathIt = "https://quantest.eu".$pathIt;
        //echo $pathIt."<br/>";
        
        //path to NL languages
        $pathNl = substr_replace($path, 'nl', 6, 2);
        $pathNl = "https://quantest.eu".$pathNl;
        //echo $pathNl."<br/>";
    }
    
    //for profile name + surname
    $email = $_SESSION['email'];
    $id = $_SESSION['id'];
    $result = $mysqli->query("SELECT * FROM users WHERE `id`= $id AND `email`= '" . $email . "'");
    if ($result) {
        $rows = mysqli_num_rows($result); // number of rows received

        for ($i = 0; $i < $rows; ++$i) {
            $row = mysqli_fetch_row($result);
                $name = $row[4];
                $surName = $row[5];
        }
        // clear the result
        mysqli_free_result($result);
    }
?>

<head>  
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="title" content="<?php echo($pageTitle);?>">
	<meta name="description" content="<?php echo($pageDescription); ?>">
    <link rel="stylesheet" href="https://quantest.eu/css/quantest.css" />
    <link rel="stylesheet" href="https://quantest.eu/css/popup.css" />
    <script src="https://quantest.eu/js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="shortcut icon" type="image/png" href="img/favicon.jpg"/>
</head>

    
	
    <body>
		<div id="bloc_page">
			<div align="right">
				<nav><a href="<?php echo $pathEn; ?>">EN</a> | <a href="<?php echo $pathFr; ?>">FR</a> | <a href="<?php echo $pathDe; ?>">DE</a> | <a href="<?php echo $pathNl; ?>">NL</a> | <a href="<?php echo $pathIt; ?>">IT</a></nav>
				<?php
                            //Check whether the user is authorized.
                            if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
                                // if not, then display the block with links to the registration and authorization page
                                ?>
                                 <a href="https://quantest.eu/lang/en/form_register.php">Registration</a> | <a href="https://quantest.eu/lang/en/form_auth.php">Log in</a>   
                                <?php
                            }else{
                                //If the user is authorized, then output the link Logout
                                ?><a href="https://quantest.eu/lang/en/profile.php">Hello! <a href="img/profile.png"><img src="../img/profile.png"></a> <b><?php echo $name ." ". $surName;?></b></a> | <a href="https://quantest.eu/lang/en/logout.php">Log out</a>
                                   
                                <?php
                            }
                        ?>
			</div>
			<div id="bloc_page">
				<header>
                <div id="titre_principal">
                    <div id="logo">
                        <a href="https://quantest.eu/">
                            <img src="https://quantest.eu/img/logoQuantestPlat.jpg" alt="Logo Quantest" />
                        </a>
                    </div>
					<div id="h2">
                        
                        <h2>Best HR Assistant
                            <br>for Successful Recruiters!</h2>    
                    </div>
                    
                </div>
                Calculate and order
                <nav>
                    <ul>
                       <li><a href="https://quantest.eu/lang/en/config/expert_config.php">RECRUITMENT</a></li>
                        <li><a href="https://quantest.eu/lang/en/reconversion_form.php">RETRAINING</a></li>
						 <li><a href="https://quantest.eu/lang/en/reconversion_form.php"><b>Calculate and order</b></a></li>
                        
                    </ul>
                </nav>
            </header>
			</div>
			<div class="wrapper">
	<div>  
  </body>
</html>

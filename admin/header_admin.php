<?php
require_once ("../dbconnect.php");
 
 //for profile name + surname
    $email = $_SESSION['email'];
    $id = $_SESSION['id'];
    $result = $mysqli->query("SELECT * FROM users WHERE `id`= $id AND `email`= '" . $email . "'");
    if ($result) {
        $rows = mysqli_num_rows($result); // количество полученных строк

        for ($i = 0; $i < $rows; ++$i) {
            $row = mysqli_fetch_row($result);
                $name = $row[4];
                $surName = $row[5];
        }
        // clear the result
        mysqli_free_result($result);
    }

?>
<!DOCTYPE html>
<html>
    <head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8" />
    <title>QUANTEST Admin</title>
    <link rel="stylesheet" href="../css/quantest.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../../js/script.js"></script>
	<meta name="robots" content="noarchive">
	<meta name="robots" content="noindex">
	<meta name="robots" content="nofollow">
	<style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 25px;
  text-align: center;
  font-size: 16px;
  cursor: pointer;
}

.button:hover {
  background-color: green;
}
</style> 
</head>
<div id="bloc_page">
			<div id="bloc_page">
				<header>
                  
                       
                          <h2>   <a href="https://quantest.online/indexFR.php"><img src="../img/logoQuantestPlat.jpg" alt="Logo Quantest" /></a>
                    
					  <b>ADMINISTRATION</b></h2>    
                       
                    
                   
                
                <nav>
                    <ul>
                       <li><a href="admin_selection.php">admin-Recrutement</a></li>
                        <li><a href="admin_reconversion.php">admin-Reconversion</a></li>
                         <?php
                            //Check if user is authorized
                            if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
                                // if not, then display the block with links to the registration and authorization page
                                ?>
									<li><a href="admin_auth.php">Log in</a></li>
                                <?php
                            }else{
                                //If the user is authorized, then display the link Logout
                                ?>
                                    <li><a href="logout.php">Log out</a></li>
                                    <li><?php echo $name ." ". $surName;?></li>
                                <?php
                            }
                        ?>
                    </ul>
                </nav>
            </header>
	        </div> 

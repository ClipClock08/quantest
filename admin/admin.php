<?php
require ("C:\OSPanel\domains\quantest.loc/dbconnect.php");
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
/*
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
*/
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
</head>

				<header>
                     <a href="index.php"><img src="../img/logoQuantestPlat.jpg" alt="Logo Quantest" /></a>
                   <h2>ADMINISTRATION</h2>    
                     
    <a href="admin_selection.php">adminRecrutement</a> 
    <a href="admin_reconversion.php">adminReconversion</a><br>
	<a href="https://quantest.online/admin/test_result.php">result_selection</a> 
	<a href="https://quantest.online/admin/test_result_Selection.php">result_reconversion</a><br>
	<a href="https://quantest.online/admin/getPoints.php">get_points</a>
                         <?php
                            //Check if the user is authorized
                            if(!isset($_SESSION['email_admin']) && !isset($_SESSION['password_admin'])){
                                // if not, then display the block with links to the registration and authorization page
                                ?>
									<a href="admin_auth.php">Log in</a>
                                <?php
                            }else{
                                //If the user is authorized, then display the link Logout
                                ?>
                                    <li><a href="logout.php">Log out</a></li>
                                    <li><?php echo $name ." ". $surName;?></li>
                                <?php
                            }
                        ?>
                   
             
            </header>
	  
<?php
			
		


include_once ("footer.php");
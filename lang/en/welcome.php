<?php
include ("header_q.php");
require_once("dbconnect.php");
if(!isset($_SESSION["email"]) && empty($_SESSION["password"])){
    exit("<p><strong>Error! </strong> You visited this page directly, so there is no data to process. You can go to the <a href=".$address_site."> home page </a>.</p>");
}
else{

    $email = $_SESSION["email"];
    $password = $_SESSION["password"];
    $user = $mysqli->query("SELECT `id` FROM `users` WHERE `email`='" . $email . "' AND `password`='" . $password . "'");
    $id_user = mysqli_fetch_array($user);
    $_SESSION['id'] = $id_user['id'];
}

//print_r($_SESSION) ;

?>
<div align="center">
    <h1>Welcome to the interface for staff selection: <strong>recruitment</strong> or <strong>retraining</strong></h1>
    <h2>Launch QUANTEST and find the best collaborator to recruit <br> or the ideal job to assign to an internal</h2>
	<p><h2>Choose between <strong>recruitment test</strong> or <strong>retraining test</strong></h2></p>
	<a href="https://quantest.eu/lang/en/config/expert_config.php"><img src="https://quantest.eu/img/recruitment.jpg" border="1" alt="recruitment test"></a><img src="https://quantest.eu/lang/en/img/spacer.gif" height="25" border="0">OR<img src="https://quantest.eu/img/spacer.gif" height="25" border="0"> <a href="https://quantest.eu/lang/en/reconversion_form.php"> <img src="https://quantest.eu/img/reconversion.jpg" border="1" alt="retraining test"></a></div>

</div>

<br/>
    <br/>
    <br/>
    <br/>
<?php




include_once ("footer.php");
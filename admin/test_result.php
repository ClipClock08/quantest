 <?php
   //Добавляем файл подключения к БД
   
    require("../dbconnect.php");
    
    $id_client = $_SESSION['id'];
    $candidat_id = $_SESSION['challenger'][0]; 
    
    
    $result = $mysqli->query("SELECT DISTINCT * FROM `admin_selection` WHERE challenger_id = '$candidat_id'");
    $rows = mysqli_num_rows($result);
        for ($i = 0; $i < $rows; ++$i) {
        
            $row = mysqli_fetch_row($result);
    
            for ($j = 0; $j < mysqli_num_fields($result) - 1; ++$j)
                $test[$i] = $row[$j];
        }
        //clear query result        
        mysqli_free_result($result);
                
        //print_r($test);
        //calculate ahe of candidate for normal view
        function calculate_age($born_date) {
          $birthday_timestamp = strtotime($born_date);
          $age = date('Y') - date('Y', $birthday_timestamp);
          if (date('md', $birthday_timestamp) > date('md')) {
            $age--;
          }
          return $age;
        }
        
        
        //get all info about our client
        //$resultUsers = $mysqli->query("SELECT DISTINCT id, type_account, company_name, website, first_name, last_name, civilitye, your_functions, email, phone FROM `users` WHERE email = '$email'");
        $resultUser = $mysqli->query("SELECT id, type_account, company_name, website, first_name, last_name, civilitye, your_functions, email, phone FROM users WHERE `id`= '$id_client'");
        $rows = mysqli_num_rows($result);
        
        for ($i = 0; $i < $rows; ++$i) {
        
            $row = mysqli_fetch_row($resultUser);
    
            for ($j = 0; $j < mysqli_num_fields($resultUser) - 1; ++$j)
                $user_info[$j] = $row[$j];
        }
        mysqli_free_result($resultUser);
    ?>

<html>
 <head>  
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Résultat du test de sélection d'un candidat | QUANTEST</title>
    <link rel="stylesheet" href="https://quantest.online/css/quantest.css" />
    <link rel="stylesheet" href="https://quantest.online/css/popup.css" />
    <script src="https://quantest.online/js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="shortcut icon" type="image/png" href="img/favicon.jpg"/>
</head>

 <body>
		<div align="center">
			<table border="1" cellpadding="2" cellspacing="2" width="838">
				<tr>
					<td width="199">
						<div align="left">
							<a href="https://quantest.online/img/logoQuantestPlat.jpg" target="_blank"><img src="https://quantest.online/img/logoQuantestPlat.jpg" border="0"></a>
							<h5>Votre meilleur assistant RH</h5>
						</div>
					</td>
					<td colspan="2" valign="middle">
						<h1>Feuille de résultats du test de sélection des candidats</h1>
						<table border="1" cellpadding="2" cellspacing="2">
							<tr>
								<td valign="top"><b>Client Name: </b><?php echo $client_name; ?></td>
								<td valign="top"><b>Contact's civilit:</b> <?php echo $user_info[6]; ?></td>
								<td valign="top"><b>Surname Sur:</b> <?php echo $user_info[5]; ?></td>
								<td valign="top"><?php echo "Test №".$id; ?><br>
									
							    Date of the test : <?php echo $create_date; ?></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="199"><b>Age of the candidate: <?php echo calculate_age($born_date); ?></b><br/><?php echo $born_date; ?></td>
					<td valign="top">echo:

						<h2><?php echo $challenger_name; ?></h2>
					</td>
					<td>echo:

						<h2><?php echo $challenger_surname; ?></h2>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<h2>Job title (title of the function):</h2>
						
					echo: job title</td>
				</tr>
				<tr>
					<td width="199"><b>Applicant service</b>: echo: Service</td>
					<td><b>Vacancy</b>: echo: Status of the function</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="3">
						<div align="center">
							
					</td>
				</tr>
			</table>
		</div>
	
  <table border="1">
   <caption>Selection test</caption>
   <tr>
    <th>id</th>
    <th>Name client</th>
    <th>Test type</th>
    <th>Candidate id</th>
    <th>Candidate name</th>
    <th>Candidate surname</th>
    <th>Born Date</th>
    <th>identity</th>
    <th>civil_status</th>
    <th>studies</th>
    <th>prof_exp</th>
    <th>religious_extremism</th>
    <th>antiwestern_extremism</th>
    <th>physical_state</th>
    <th>psychological_state</th>
    <th>alcohol</th>
    <th>integrity</th>
    <th>morality</th>
    <th>summary_exp</th>
    <th>safety</th>
    <th>quality</th>
    <th>organization</th>
    <th>terms_of_work</th>
    <th>responsibilities</th>
    <th>initiative</th>
    <th>social_behavior</th>
    <th>motivation</th>
    <th>professional_availability</th>
    <th>attendance_and_punctuality</th>
    <th>training</th>
    <th>command</th>
   </tr>

<?php
   //Добавляем файл подключения к БД
 

          $result = $mysqli->query("SELECT * FROM `admin_selection`");
    
                while($row = mysqli_fetch_array($result)) 
                {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['client_name']."</td>";
                    echo "<td>".$row['test_type']."</td>";
                    echo "<td>".$row['challenger_id']."</td>";
                    echo "<td>".$row['challenger_name']."</td>";
                    echo "<td>".$row['challenger_surname']."</td>";
                    echo "<td>".$row['born_date']."</td>";
                    echo "<td>".$row['identity']."</td>";
                    echo "<td>".$row['civil_status']."</td>";
                    echo "<td>".$row['studies']."</td>";
                    echo "<td>".$row['prof_exp']."</td>";
                    echo "<td>".$row['religious_extremism']."</td>";
                    echo "<td>".$row['antiwestern_extremism']."</td>";
                    echo "<td>".$row['physical_state']."</td>";
                    echo "<td>".$row['psychological_state']."</td>";
                    echo "<td>".$row['alcohol']."</td>";
                    echo "<td>".$row['integrity']."</td>";
                    echo "<td>".$row['morality']."</td>";
                    echo "<td>".$row['summary_exp']."</td>";
                    echo "<td>".$row['safety']."</td>";
                    echo "<td>".$row['quality']."</td>";
                    echo "<td>".$row['organization']."</td>";
                    echo "<td>".$row['terms_of_work']."</td>";
                    echo "<td>".$row['responsibilities']."</td>";
                    echo "<td>".$row['initiative']."</td>";
                    echo "<td>".$row['social_behavior']."</td>";
                    echo "<td>".$row['motivation']."</td>";
                    echo "<td>".$row['professional_availability']."</td>";
                    echo "<td>".$row['attendance_and_punctuality']."</td>";
                    echo "<td>".$row['training']."</td>";
                    echo "<td>".$row['command']."</td>";
                    
                    echo "</tr>";
                }   
    ?>
    
      </table>
      
      
<table border="1">
   <caption>Reconversion test</caption>
   <tr>
        <th>id</th>
        <th>Name client</th>
        <th>Candidate id</th>
        <th>Candidate name</th>
        <th>Candidate surname</th>
        <th>Candidate birth day</th>
        <th>interest</th>
        <th>medium_term</th>
        <th>long_term</th>
        <th>physical_adequacy</th>
        <th>behavioral_adequacy</th>
        <th>ability_to_adapt</th>
        <th>quality_work</th>
        <th>care_productivity</th>
        <th>speed_adaptation</th>
        <th>potential_evolution</th>
        <th>harmony</th>
        <th>availability</th>
   </tr>

<?php
   //Добавляем файл подключения к БД
          $result = $mysqli->query("SELECT * FROM `admin_reconversion`");
    
                while($row = mysqli_fetch_array($result)) 
                {
                    echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['client_name']."</td>";
                        echo "<td>".$row['challenger_id']."</td>";
                        echo "<td>".$row['challenger_name']."</td>";
                        echo "<td>".$row['challenger_surname']."</td>";
                        echo "<td>".$row['challenger_birthday']."</td>";
                        echo "<td>".$row['interest']."</td>";
                        echo "<td>".$row['medium_term']."</td>";
                        echo "<td>".$row['long_term']."</td>";
                        echo "<td>".$row['physical_adequacy']."</td>";
                        echo "<td>".$row['behavioral_adequacy']."</td>";
                        echo "<td>".$row['ability_to_adapt']."</td>";
                        echo "<td>".$row['quality_work']."</td>";
                        echo "<td>".$row['care_productivity']."</td>";
                        echo "<td>".$row['speed_adaptation']."</td>";
                        echo "<td>".$row['potential_evolution']."</td>";
                        echo "<td>".$row['harmony']."</td>";
                        echo "<td>".$row['availability']."</td>";
                    echo "</tr>";
                }   
    ?>
    
      </table>
      <p><a href="index.php"> Main admin page </a>.</p>
 </body>
</html>


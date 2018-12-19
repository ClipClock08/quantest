<html>
 <head>
  <meta charset="utf-8">
  <title>test result</title>
 </head>
 <body>
  <table border="1">
   <caption>Selection test</caption>
   <tr>
    <th>id</th>
    <th>Name client</th>
    <th>Test type</th>
    <th>Candidate id</th>
    <th>Candidate name</th>
    <th>Candidate surname</th>
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
    require_once("../dbconnect.php");

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
    require_once("../dbconnect.php");

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
      
 </body>
</html>
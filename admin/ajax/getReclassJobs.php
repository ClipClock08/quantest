<?php 

    include ('../../dbconnect.php');
    
    print_r($_POST);
    $result = $mysqli->query("SELECT * FROM `reconversion`WHERE user_id =".$_POST['client_id']);
    
    if($result)
    {
        $rows = mysqli_num_rows($result); // количество полученных строк
     
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            //print_r($row);
            for ($j = 0 ; $j < count($row) ; ++$j) { 
                $jobs[$i][$j] = $row[$j];
            }
        }
     
         mysqli_free_result($result);
    }
    
    echo "<option value='0'> select </option>";
    
    for($i = 0; $i < count($jobs); $i++){
        echo "<option value='{$jobs[$i][2]}'> {$jobs[$i][2]} </option>";
    }

?>
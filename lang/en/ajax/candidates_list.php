<?php 

    include ('../dbconnect.php');
    
    //print_r($_POST);
    if(isset($_POST['test_type']) && isset ($_POST['id_client'])){
        if($_POST['test_type'] == 1){ // if Recruitment
            $result = $mysqli->query("SELECT * FROM candidates WHERE user_id =".$_POST['id_client']);
        
            if($result)
            {
                $rows = mysqli_num_rows($result); // количество полученных строк
            
                for ($i = 0 ; $i < $rows ; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                    
                    for ($j = 0 ; $j < count($row) ; ++$j) { 
                        $candidate[$i][$j] = $row[$j];
                    }
                }
             
                 mysqli_free_result($result);
            
            /*echo "<pre>";
             print_r(count($reclass));
            echo "</pre>";*/
            echo "<select name = 'candidates' id='candidat'>";
            echo "<option value='0'> Choose candidate </option>";
            
                for($i = 0; $i < count($candidate); $i++){
                    echo "<option value='{$candidate[$i][2]} {$candidate[$i][3]}'> {$candidate[$i][2]} {$candidate[$i][3]}</option>";
                }
        
            echo "</select>";
            }else{
                echo "bad Query";
            }    
        }else{
            echo "do not selected any type of test";
        }
        
    }else{
        echo "Нет необходимых данных";
    }
    
?>